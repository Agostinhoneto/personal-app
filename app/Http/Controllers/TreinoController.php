<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Exercicio;
use App\Models\Personal;
use App\Models\Treino;
use Illuminate\Http\Request;

class TreinoController extends Controller
{
    public function index(Request $request)
    {
        $query = Treino::with(['aluno.usuario', 'personal.usuario', 'exercicios.exercicio']);

        if ($request->has('aluno_id')) {
            $query->where('aluno_id', $request->aluno_id);
        }

        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        $treinos = $query->orderBy('data_inicio', 'desc')->paginate(15);
        return response()->json($treinos);
    }

    public function create()
    {
        // Retornar dados necessários para criar um treino (ex: lista de alunos, personal, exercícios)
        $alunos = Aluno::with('usuario')->get();
        $personais = Personal::with('usuario')->get();
        $exercicios = Exercicio::with('categoria')->get();

        $data = [
            'alunos' => $alunos,
            'personais' => $personais,
            'exercicios' => $exercicios,
        ];
        return view('trainer.create', $data);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'aluno_id' => 'required|exists:alunos,id',
            'personal_id' => 'required|exists:personais,id',
            'nome' => 'required|string|max:100',
            'data_inicio' => 'required|date',
            'data_fim' => 'nullable|date',
            'objetivo' => 'nullable|string',
            'status' => 'sometimes|in:ativo,inativo,concluido',
        ]);

        $treino = Treino::create($validated);
        return response()->json($treino, 201);
    }

    public function show(Treino $treino)
    {
        $treino->load([
            'aluno.usuario',
            'personal.usuario',
            'exercicios.exercicio.categoria'
        ]);
        return response()->json($treino);
    }

    public function update(Request $request, Treino $treino)
    {
        $validated = $request->validate([
            'nome' => 'sometimes|string|max:100',
            'data_inicio' => 'sometimes|date',
            'data_fim' => 'nullable|date',
            'objetivo' => 'nullable|string',
            'status' => 'sometimes|in:ativo,inativo,concluido',
        ]);

        $treino->update($validated);
        return response()->json($treino);
    }

    public function destroy(Treino $treino)
    {
        $treino->delete();
        return response()->json(['message' => 'Treino deletado com sucesso']);
    }
}
