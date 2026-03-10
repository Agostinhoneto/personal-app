<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Personal;
use App\Models\Treino;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AlunoController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $personal = Personal::where('usuario_id', $user->id)->first();
        
        if (!$personal) {
            return redirect()->route('dashboard')->with('error', 'Personal não encontrado');
        }

        // Buscar alunos do personal com relacionamentos necessários
        $alunos = Aluno::where('personal_id', $personal->id)
            ->with([
                'usuario',
                'treinos' => function($query) {
                    $query->where('status', 'ativo')
                        ->with('exercicios')
                        ->latest();
                }
            ])
            ->paginate(10);

        // Calcular estatísticas
        $totalAlunos = Aluno::where('personal_id', $personal->id)->count();
        
        $novosAlunosMes = Aluno::where('personal_id', $personal->id)
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();
        
        // Calcular progresso médio baseado nos treinos
        $alunosComTreino = Aluno::where('personal_id', $personal->id)
            ->whereHas('treinos', function($query) {
                $query->where('status', 'ativo');
            })
            ->with(['treinos' => function($query) {
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
            'usuario_id' => 'required|exists:usuarios,id',
            'personal_id' => 'required|exists:personais,id',
            'data_nascimento' => 'nullable|date',
            'sexo' => 'nullable|in:M,F',
            'objetivo' => 'nullable|string',
        ]);

        $aluno = Aluno::create($validated);
        return response()->json($aluno, 201);
    }

    public function create ()
    {
        // Retorna a view para criar um novo aluno
        return view('alunos.create');
    }
    
    public function show(Aluno $aluno)
    {
        $aluno->load([
            'usuario',
            'personal.usuario',
            'avaliacoes',
            'treinos',
            'planosAlimentares',
            'assinaturas'
        ]);
        return response()->json($aluno);
    }

    public function update(Request $request, Aluno $aluno)
    {
        $validated = $request->validate([
            'personal_id' => 'sometimes|exists:personais,id',
            'data_nascimento' => 'nullable|date',
            'sexo' => 'nullable|in:M,F',
            'objetivo' => 'nullable|string',
        ]);

        $aluno->update($validated);
        return response()->json($aluno);
    }

    public function destroy(Aluno $aluno)
    {
        $aluno->delete();
        return response()->json(['message' => 'Aluno deletado com sucesso']);
    }
}
