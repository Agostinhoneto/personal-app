<?php

namespace App\Http\Controllers;

use App\Models\Exercicio;
use Illuminate\Http\Request;

class ExercicioController extends Controller
{
    public function index(Request $request)
    {
        $query = Exercicio::with(['personal.usuario', 'categoria']);

        if ($request->has('personal_id')) {
            $query->where('personal_id', $request->personal_id);
        }

        if ($request->has('categoria_id')) {
            $query->where('categoria_id', $request->categoria_id);
        }

        $exercicios = $query->paginate(15);
        return view('exercicios.index', compact('exercicios'));
        
    }

    public function create()
    {
        return view('exercicios.create');
    }   

    public function store(Request $request)
    {
        $validated = $request->validate([
            'personal_id' => 'required|exists:personais,id',
            'nome' => 'required|string|max:100',
            'categoria_id' => 'required|exists:categorias_treino,id',
            'descricao' => 'nullable|string',
            'video_url' => 'nullable|string|max:255',
            'imagem' => 'nullable|string|max:255',
        ]);

        $exercicio = Exercicio::create($validated);
        return response()->json($exercicio, 201);
    }

    public function show(Exercicio $exercicio)
    {
        $exercicio->load(['personal.usuario', 'categoria']);
        return response()->json($exercicio);
    }

    public function update(Request $request, Exercicio $exercicio)
    {
        $validated = $request->validate([
            'nome' => 'sometimes|string|max:100',
            'categoria_id' => 'sometimes|exists:categorias_treino,id',
            'descricao' => 'nullable|string',
            'video_url' => 'nullable|string|max:255',
            'imagem' => 'nullable|string|max:255',
        ]);

        $exercicio->update($validated);
        return response()->json($exercicio);
    }

    public function destroy(Exercicio $exercicio)
    {
        $exercicio->delete();
        return response()->json(['message' => 'Exercício deletado com sucesso']);
    }
}
