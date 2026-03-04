<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    public function index()
    {
        $personais = Personal::with('usuario')->paginate(15);
        return response()->json($personais);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'usuario_id' => 'required|exists:usuarios,id',
            'cref' => 'nullable|string|max:20',
            'especialidade' => 'nullable|string|max:100',
            'biografia' => 'nullable|string',
        ]);

        $personal = Personal::create($validated);
        return response()->json($personal, 201);
    }

    public function show(Personal $personal)
    {
        $personal->load([
            'usuario',
            'alunos.usuario',
            'categoriasTreino',
            'exercicios',
            'planosAssinatura'
        ]);
        return response()->json($personal);
    }

    public function update(Request $request, Personal $personal)
    {
        $validated = $request->validate([
            'cref' => 'nullable|string|max:20',
            'especialidade' => 'nullable|string|max:100',
            'biografia' => 'nullable|string',
        ]);

        $personal->update($validated);
        return response()->json($personal);
    }

    public function destroy(Personal $personal)
    {
        $personal->delete();
        return response()->json(['message' => 'Personal deletado com sucesso']);
    }

    public function alunos(Personal $personal)
    {
        $alunos = $personal->alunos()->with('usuario')->get();
        return response()->json($alunos);
    }
}
