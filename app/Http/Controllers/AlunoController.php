<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function index()
    {
        $alunos = Aluno::with(['usuario', 'personal.usuario'])->paginate(15);
        return view('alunos.index', compact('alunos'));      
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
