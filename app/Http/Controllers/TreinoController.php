<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Exercicio;
use App\Models\Personal;
use App\Models\Treino;
use App\Models\TreinoExercicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TreinoController extends Controller
{
    public function index(Request $request)
    {
        $personal = $this->getAuthenticatedPersonal();

        $query = Treino::where('personal_id', $personal->id)
            ->with(['aluno.usuario', 'personal.usuario', 'exercicios.exercicio']);

        if ($request->filled('aluno_id')) {
            $query->where('aluno_id', $request->aluno_id);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $treinos = $query->orderBy('data_inicio', 'desc')->paginate(15);

        return view('treinos.index', compact('treinos'));
    }

    public function create(Request $request)
    {
        $personal = $this->getAuthenticatedPersonal();
        $alunos = Aluno::where('personal_id', $personal->id)->with('usuario')->orderBy('id')->get();
        $exercicios = Exercicio::where('personal_id', $personal->id)->with('categoria')->orderBy('nome')->get();

        return view('treinos.create', [
            'alunos' => $alunos,
            'exercicios' => $exercicios,
            'selectedAlunoId' => $request->integer('aluno_id') ?: null,
        ]);
    }

    public function store(Request $request)
    {
        $personal = $this->getAuthenticatedPersonal();
        $validated = $request->validate($this->rules($personal->id));

        try {
            $treino = DB::transaction(function () use ($validated, $personal) {
                $treino = Treino::create([
                    'aluno_id' => $validated['aluno_id'],
                    'personal_id' => $personal->id,
                    'nome' => $validated['nome'],
                    'data_inicio' => $validated['data_inicio'],
                    'data_fim' => $validated['data_fim'] ?? null,
                    'objetivo' => $validated['objetivo'] ?? null,
                    'status' => $validated['status'] ?? 'ativo',
                ]);

                $this->syncExercises($treino, $validated['exercicios']);

                return $treino;
            });

            return redirect()
                ->route('treinos.show', $treino)
                ->with('success', 'Treino criado com sucesso');
        } catch (\Exception $e) {
            Log::error('Erro ao criar treino', [
                'error' => $e->getMessage(),
                'user_id' => Auth::id(),
            ]);

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Erro ao criar treino: ' . $e->getMessage());
        }
    }

    public function show(Treino $treino)
    {
        $this->ensureTreinoBelongsToAuthenticatedPersonal($treino);

        $treino->load([
            'aluno.usuario',
            'personal.usuario',
            'exercicios.exercicio.categoria'
        ]);

        return view('treinos.show', compact('treino'));
    }

    public function edit(Treino $treino)
    {
        $this->ensureTreinoBelongsToAuthenticatedPersonal($treino);

        $personal = $this->getAuthenticatedPersonal();
        $treino->load(['exercicios.exercicio', 'aluno.usuario']);

        return view('treinos.edit', [
            'treino' => $treino,
            'alunos' => Aluno::where('personal_id', $personal->id)->with('usuario')->orderBy('id')->get(),
            'exercicios' => Exercicio::where('personal_id', $personal->id)->with('categoria')->orderBy('nome')->get(),
        ]);
    }

    public function update(Request $request, Treino $treino)
    {
        $this->ensureTreinoBelongsToAuthenticatedPersonal($treino);
        $personal = $this->getAuthenticatedPersonal();
        $validated = $request->validate($this->rules($personal->id));

        try {
            DB::transaction(function () use ($validated, $treino) {
                $treino->update([
                    'aluno_id' => $validated['aluno_id'],
                    'nome' => $validated['nome'],
                    'data_inicio' => $validated['data_inicio'],
                    'data_fim' => $validated['data_fim'] ?? null,
                    'objetivo' => $validated['objetivo'] ?? null,
                    'status' => $validated['status'] ?? 'ativo',
                ]);

                $treino->exercicios()->delete();
                $this->syncExercises($treino, $validated['exercicios']);
            });

            return redirect()
                ->route('treinos.show', $treino)
                ->with('success', 'Treino atualizado com sucesso');
        } catch (\Exception $e) {
            Log::error('Erro ao atualizar treino', [
                'treino_id' => $treino->id,
                'error' => $e->getMessage(),
                'user_id' => Auth::id(),
            ]);

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Erro ao atualizar treino: ' . $e->getMessage());
        }
    }

    public function destroy(Treino $treino)
    {
        $this->ensureTreinoBelongsToAuthenticatedPersonal($treino);

        $treino->delete();

        return redirect()->route('treinos.index')->with('success', 'Treino deletado com sucesso');
    }

    private function getAuthenticatedPersonal(): Personal
    {
        $personal = Personal::where('usuario_id', Auth::id())->first();

        abort_if(!$personal, 404, 'Personal não encontrado');

        return $personal;
    }

    private function ensureTreinoBelongsToAuthenticatedPersonal(Treino $treino): void
    {
        abort_if($treino->personal_id !== $this->getAuthenticatedPersonal()->id, 403);
    }

    private function rules(int $personalId): array
    {
        return [
            'aluno_id' => [
                'required',
                'exists:alunos,id',
                function ($attribute, $value, $fail) use ($personalId) {
                    $belongsToPersonal = Aluno::where('id', $value)
                        ->where('personal_id', $personalId)
                        ->exists();

                    if (! $belongsToPersonal) {
                        $fail('O aluno selecionado não pertence a este personal.');
                    }
                },
            ],
            'nome' => 'required|string|max:100',
            'data_inicio' => 'required|date',
            'data_fim' => 'nullable|date|after_or_equal:data_inicio',
            'objetivo' => 'nullable|string',
            'status' => 'required|in:ativo,inativo,concluido',
            'exercicios' => 'required|array|min:1',
            'exercicios.*.exercicio_id' => [
                'required',
                'exists:exercicios,id',
                function ($attribute, $value, $fail) use ($personalId) {
                    $belongsToPersonal = Exercicio::where('id', $value)
                        ->where('personal_id', $personalId)
                        ->exists();

                    if (! $belongsToPersonal) {
                        $fail('Um dos exercícios selecionados não pertence a este personal.');
                    }
                },
            ],
            'exercicios.*.series' => 'nullable|integer|min:1|max:99',
            'exercicios.*.repeticoes' => 'nullable|string|max:20',
            'exercicios.*.carga' => 'nullable|numeric|min:0|max:999.99',
            'exercicios.*.descanso' => 'nullable|string|max:20',
            'exercicios.*.observacoes' => 'nullable|string|max:1000',
        ];
    }

    private function syncExercises(Treino $treino, array $exercicios): void
    {
        foreach (array_values($exercicios) as $index => $exercicio) {
            TreinoExercicio::create([
                'treino_id' => $treino->id,
                'exercicio_id' => $exercicio['exercicio_id'],
                'series' => $exercicio['series'] ?? null,
                'repeticoes' => $exercicio['repeticoes'] ?? null,
                'carga' => $exercicio['carga'] ?? null,
                'tempo_descanso' => $this->normalizeRestTime($exercicio['descanso'] ?? null),
                'observacoes' => $exercicio['observacoes'] ?? null,
                'ordem' => $index + 1,
            ]);
        }
    }

    private function normalizeRestTime(?string $rest): ?int
    {
        if ($rest === null || trim($rest) === '') {
            return null;
        }

        preg_match('/\d+/', $rest, $matches);

        return isset($matches[0]) ? (int) $matches[0] : null;
    }
}
