<?php

namespace App\Http\Controllers;

use App\Models\Avaliacao;
use Illuminate\Http\Request;

class AvaliacaoController extends Controller
{
    public function index(Request $request)
    {
        $query = Avaliacao::with(['aluno.usuario', 'personal.usuario', 'dobrasCutaneas', 'medidasCorporais', 'sinaisVitais']);

        if ($request->has('aluno_id')) {
            $query->where('aluno_id', $request->aluno_id);
        }

        $avaliacoes = $query->orderBy('data_avaliacao', 'desc')->paginate(15);
        return response()->json($avaliacoes);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'aluno_id' => 'required|exists:alunos,id',
            'personal_id' => 'required|exists:personais,id',
            'data_avaliacao' => 'required|date',
            'peso' => 'nullable|numeric',
            'altura' => 'nullable|numeric',
            'imc' => 'nullable|numeric',
            'gordura_corporal' => 'nullable|numeric',
            'massa_muscular' => 'nullable|numeric',
        ]);

        $avaliacao = Avaliacao::create($validated);
        return response()->json($avaliacao, 201);
    }

    public function show(Avaliacao $avaliacao)
    {
        $avaliacao->load(['aluno.usuario', 'personal.usuario', 'dobrasCutaneas', 'medidasCorporais', 'sinaisVitais']);
        return response()->json($avaliacao);
    }

    public function update(Request $request, Avaliacao $avaliacao)
    {
        $validated = $request->validate([
            'data_avaliacao' => 'sometimes|date',
            'peso' => 'nullable|numeric',
            'altura' => 'nullable|numeric',
            'imc' => 'nullable|numeric',
            'gordura_corporal' => 'nullable|numeric',
            'massa_muscular' => 'nullable|numeric',
        ]);

        $avaliacao->update($validated);
        return response()->json($avaliacao);
    }

    public function destroy(Avaliacao $avaliacao)
    {
        $avaliacao->delete();
        return response()->json(['message' => 'Avaliação deletada com sucesso']);
    }
}
