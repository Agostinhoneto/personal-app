<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Personal;
use App\Models\Treino;
use App\Models\Usuario;
use App\Models\Avaliacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class AlunoController extends Controller
{
    public function index()
    {
        $personal = $this->getAuthenticatedPersonal();

        $alunos = Aluno::where('personal_id', $personal->id)
            ->with([
                'usuario',
                'treinos' => function ($query) {
                    $query->where('status', 'ativo')
                        ->with('exercicios')
                        ->latest();
                }
            ])
            ->paginate(10);

        $totalAlunos = Aluno::where('personal_id', $personal->id)->count();

        $novosAlunosMes = Aluno::where('personal_id', $personal->id)
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();

        $alunosComTreino = Aluno::where('personal_id', $personal->id)
            ->whereHas('treinos', function ($query) {
                $query->where('status', 'ativo');
            })
            ->with(['treinos' => function ($query) {
                $query->where('status', 'ativo');
            }])
            ->get();

        $progressoMedio = 0;
        if ($alunosComTreino->count() > 0) {
            $somaProgresso = 0;
            foreach ($alunosComTreino as $aluno) {
                $treino = $aluno->treinos->first();
                if ($treino && $treino->data_inicio && $treino->data_fim) {
                    $totalDias = Carbon::parse($treino->data_inicio)->diffInDays($treino->data_fim);
                    $diasPassados = Carbon::parse($treino->data_inicio)->diffInDays(Carbon::now());
                    $progresso = $totalDias > 0 ? min(100, ($diasPassados / $totalDias) * 100) : 0;
                    $somaProgresso += $progresso;
                }
            }
            $progressoMedio = round($somaProgresso / $alunosComTreino->count());
        }

        $planosAtivos = Treino::where('personal_id', $personal->id)
            ->where('status', 'ativo')
            ->count();

        return view('alunos.index', compact(
            'alunos',
            'totalAlunos',
            'novosAlunosMes',
            'progressoMedio',
            'planosAtivos'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email',
            'telefone' => 'nullable|string|max:20',
            'data_nascimento' => 'required|date',
            'sexo' => 'required|in:M,F',
            'objetivo' => 'nullable|string|max:500',
            'peso' => 'nullable|numeric|min:0',
            'altura' => 'nullable|numeric|min:0',
            'gordura_corporal' => 'nullable|numeric|min:0|max:100',
        ]);

        $personal = $this->getAuthenticatedPersonal();

        try {
            $aluno = DB::transaction(function () use ($validated, $personal) {
                $usuario = Usuario::create([
                    'nome' => $validated['nome'],
                    'email' => $validated['email'],
                    'password' => Hash::make('senha123'),
                    'tipo' => 'aluno',
                    'telefone' => $validated['telefone'] ?? null,
                    'status' => true,
                ]);

                $aluno = Aluno::create([
                    'usuario_id' => $usuario->id,
                    'personal_id' => $personal->id,
                    'data_nascimento' => $validated['data_nascimento'],
                    'sexo' => $validated['sexo'],
                    'objetivo' => $validated['objetivo'] ?? null,
                ]);

                if ($this->hasInitialEvaluationData($validated)) {
                    $peso = $validated['peso'] ?? null;
                    $alturaEmMetros = isset($validated['altura']) ? $validated['altura'] / 100 : null;
                    $imc = ($peso !== null && $alturaEmMetros && $alturaEmMetros > 0)
                        ? round($peso / ($alturaEmMetros * $alturaEmMetros), 2)
                        : null;

                    Avaliacao::create([
                        'aluno_id' => $aluno->id,
                        'personal_id' => $personal->id,
                        'data_avaliacao' => Carbon::now(),
                        'peso' => $peso,
                        'altura' => $alturaEmMetros,
                        'imc' => $imc,
                        'gordura_corporal' => $validated['gordura_corporal'] ?? null,
                    ]);
                }

                return $aluno->load('usuario');
            });

            // ===============================
            // ENVIO PARA N8N (Com proteção)
            // ===============================
            try {
                $response = Http::timeout(10)
                    ->post('http://n8n:5678/webhook/9b965150-ec4e-4c4e-a545-b484d2b3bfce', [
                        'aluno_id' => $aluno->id,
                        'nome' => $usuario->nome,
                        'email' => $usuario->email,
                        'telefone' => $usuario->telefone,
                        'personal_id' => $personal->id,
                        'data_criacao' => now()->toIso8601String()
                    ]);

                if ($response->failed()) {
                    Log::warning('N8N webhook retornou erro', [
                        'status' => $response->status(),
                        'aluno_id' => $aluno->id,
                        'response' => $response->body()
                    ]);
                }
            } catch (\Exception $e) {
                Log::error('Falha ao enviar dados para N8N', [
                    'aluno_id' => $aluno->id,
                    'error' => $e->getMessage()
                ]);
            }
            // ===============================

            return redirect()->route('alunos.index')->with('success', 'Aluno criado com sucesso!');
        } catch (\Exception $e) {
            Log::error('Erro ao criar aluno', [
                'error' => $e->getMessage(),
                'user_id' => Auth::id(),
            ]);

            return redirect()->back()->withInput()->with('error', 'Erro ao criar aluno: ' . $e->getMessage());
        }
    }

    public function create()
    {
        return view('alunos.create');
    }

    public function show(Aluno $aluno)
    {
        $this->ensureAlunoBelongsToAuthenticatedPersonal($aluno);

        $aluno->load([
            'usuario',
            'personal.usuario',
            'avaliacoes' => fn ($query) => $query->latest('data_avaliacao'),
            'treinos' => fn ($query) => $query->latest('data_inicio')->with('exercicios.exercicio'),
            'planosAlimentares',
            'assinaturas'
        ]);

        return view('alunos.show', compact(
            'aluno'
        )); 
    }

    public function update(Request $request, Aluno $aluno)
    {
        $this->ensureAlunoBelongsToAuthenticatedPersonal($aluno);

        $validated = $request->validate([
            'data_nascimento' => 'nullable|date',
            'sexo' => 'nullable|in:M,F',
            'objetivo' => 'nullable|string',
        ]);

        $aluno->update($validated);
        return response()->json($aluno);
    }

    public function destroy(Aluno $aluno)
    {
        $this->ensureAlunoBelongsToAuthenticatedPersonal($aluno);

        $aluno->delete();

        return redirect()->route('alunos.index')->with('success', 'Aluno deletado com sucesso');
    }

    private function getAuthenticatedPersonal(): Personal
    {
        $personal = Personal::where('usuario_id', Auth::id())->first();

        abort_if(!$personal, 404, 'Personal não encontrado');

        return $personal;
    }

    private function ensureAlunoBelongsToAuthenticatedPersonal(Aluno $aluno): void
    {
        abort_if($aluno->personal_id !== $this->getAuthenticatedPersonal()->id, 403);
    }

    private function hasInitialEvaluationData(array $validated): bool
    {
        return collect(['peso', 'altura', 'gordura_corporal'])
            ->contains(fn ($field) => isset($validated[$field]) && $validated[$field] !== '');
    }
}
