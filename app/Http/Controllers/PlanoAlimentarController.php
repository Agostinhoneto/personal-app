<?php

namespace App\Http\Controllers;

use App\Models\PlanoAlimentar;
use Illuminate\Http\Request;

class PlanoAlimentarController extends Controller
{
    public function index(Request $request)
    {
        $query = PlanoAlimentar::with(['aluno.usuario', 'personal.usuario', 'refeicoes']);

        if ($request->has('aluno_id')) {
            $query->where('aluno_id', $request->aluno_id);
        }

        $planos = $query->orderBy('data_inicio', 'desc')->paginate(15);
        return response()->json($planos);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'aluno_id' => 'required|exists:alunos,id',
            'personal_id' => 'required|exists:personais,id',
            'nome' => 'required|string|max:100',
            'data_inicio' => 'required|date',
            'data_fim' => 'nullable|date',
            'calorias_diarias' => 'nullable|integer',
            'proteinas' => 'nullable|integer',
            'carboidratos' => 'nullable|integer',
            'gorduras' => 'nullable|integer',
            'observacoes' => 'nullable|string',
        ]);

        $plano = PlanoAlimentar::create($validated);
        return response()->json($plano, 201);
    }

    public function show(PlanoAlimentar $planoAlimentar)
    {
        $planoAlimentar->load([
            'aluno.usuario',
            'personal.usuario',
            'refeicoes.alimentos.alimento'
        ]);
        return response()->json($planoAlimentar);
    }

    public function update(Request $request, PlanoAlimentar $planoAlimentar)
    {
        $validated = $request->validate([
            'nome' => 'sometimes|string|max:100',
            'data_inicio' => 'sometimes|date',
            'data_fim' => 'nullable|date',
            'calorias_diarias' => 'nullable|integer',
            'proteinas' => 'nullable|integer',
            'carboidratos' => 'nullable|integer',
            'gorduras' => 'nullable|integer',
            'observacoes' => 'nullable|string',
        ]);

        $planoAlimentar->update($validated);
        return response()->json($planoAlimentar);
    }

    public function destroy(PlanoAlimentar $planoAlimentar)
    {
        $planoAlimentar->delete();
        return response()->json(['message' => 'Plano alimentar deletado com sucesso']);
    }
}
