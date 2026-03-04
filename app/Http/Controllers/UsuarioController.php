<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::with(['personal', 'aluno'])->paginate(15);
        return response()->json($usuarios);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:100',
            'email' => 'required|email|unique:usuarios,email',
            'senha' => 'required|string|min:6',
            'tipo' => 'required|in:admin,personal,aluno',
            'telefone' => 'nullable|string|max:20',
            'foto' => 'nullable|string|max:255',
            'status' => 'boolean',
        ]);

        $validated['senha'] = Hash::make($validated['senha']);

        $usuario = Usuario::create($validated);
        return response()->json($usuario, 201);
    }

    public function show(Usuario $usuario)
    {
        $usuario->load(['personal', 'aluno', 'mensagensEnviadas', 'mensagensRecebidas']);
        return response()->json($usuario);
    }

    public function update(Request $request, Usuario $usuario)
    {
        $validated = $request->validate([
            'nome' => 'sometimes|string|max:100',
            'email' => 'sometimes|email|unique:usuarios,email,' . $usuario->id,
            'senha' => 'sometimes|string|min:6',
            'tipo' => 'sometimes|in:admin,personal,aluno',
            'telefone' => 'nullable|string|max:20',
            'foto' => 'nullable|string|max:255',
            'status' => 'boolean',
        ]);

        if (isset($validated['senha'])) {
            $validated['senha'] = Hash::make($validated['senha']);
        }

        $usuario->update($validated);
        return response()->json($usuario);
    }

    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return response()->json(['message' => 'Usuário deletado com sucesso']);
    }
}
