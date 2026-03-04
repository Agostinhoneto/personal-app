<?php

namespace App\Http\Controllers;

use App\Models\Mensagem;
use Illuminate\Http\Request;

class MensagemController extends Controller
{
    public function index(Request $request)
    {
        $query = Mensagem::with(['remetente', 'destinatario', 'anexos']);

        if ($request->has('destinatario_id')) {
            $query->where('destinatario_id', $request->destinatario_id);
        }

        if ($request->has('remetente_id')) {
            $query->where('remetente_id', $request->remetente_id);
        }

        $mensagens = $query->orderBy('created_at', 'desc')->paginate(15);
        return response()->json($mensagens);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'remetente_id' => 'required|exists:usuarios,id',
            'destinatario_id' => 'required|exists:usuarios,id',
            'assunto' => 'nullable|string|max:100',
            'mensagem' => 'required|string',
        ]);

        $mensagem = Mensagem::create($validated);
        return response()->json($mensagem, 201);
    }

    public function show(Mensagem $mensagem)
    {
        $mensagem->load(['remetente', 'destinatario', 'anexos']);
        return response()->json($mensagem);
    }

    public function marcarComoLida(Mensagem $mensagem)
    {
        $mensagem->update([
            'lida' => true,
            'data_leitura' => now(),
        ]);
        return response()->json($mensagem);
    }

    public function destroy(Mensagem $mensagem)
    {
        $mensagem->delete();
        return response()->json(['message' => 'Mensagem deletada com sucesso']);
    }
}
