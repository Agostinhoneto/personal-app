@extends('layouts.app')

@section('title', 'Mensagens')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-4xl font-black mb-2">Mensagens</h1>
            <p class="text-slate-500 dark:text-slate-400">Comunique-se com seus alunos e personal</p>
        </div>
        <button onclick="document.getElementById('nova-mensagem-modal').classList.remove('hidden')" 
            class="px-6 py-3 bg-primary text-background-dark font-bold rounded-xl hover:bg-primary/90 transition-colors flex items-center gap-2">
            <span class="material-symbols-outlined">add</span>
            Nova Mensagem
        </button>
    </div>

    <div class="grid grid-cols-3 gap-6">
        <!-- Messages List -->
        <div class="col-span-1 bg-slate-100 dark:bg-slate-900 rounded-xl p-6 max-h-[calc(100vh-200px)] overflow-y-auto">
            <h2 class="font-bold mb-4">Caixa de Entrada</h2>
            <div class="space-y-2">
                @forelse($mensagens as $mensagem)
                    <a href="{{ route('mensagens.show', $mensagem) }}" 
                        class="block p-4 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors {{ !$mensagem->lida ? 'bg-primary/5 border-l-4 border-primary' : '' }}">
                        <div class="flex items-start gap-3">
                            <div class="w-10 h-10 rounded-full bg-primary/20 flex items-center justify-center flex-shrink-0">
                                <span class="material-symbols-outlined text-primary text-sm">person</span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="font-semibold {{ !$mensagem->lida ? 'text-primary' : '' }} truncate">
                                    {{ $mensagem->remetente->nome }}
                                </p>
                                <p class="text-sm text-slate-500 dark:text-slate-400 truncate">{{ $mensagem->assunto }}</p>
                                <p class="text-xs text-slate-400 mt-1">{{ $mensagem->created_at->diffForHumans() }}</p>
                            </div>
                            @if(!$mensagem->lida)
                                <span class="w-2 h-2 rounded-full bg-primary"></span>
                            @endif
                        </div>
                    </a>
                @empty
                    <div class="text-center py-8">
                        <span class="material-symbols-outlined text-slate-400 text-4xl mb-2">inbox</span>
                        <p class="text-slate-500 dark:text-slate-400 text-sm">Nenhuma mensagem</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Message Content -->
        <div class="col-span-2 bg-slate-100 dark:bg-slate-900 rounded-xl p-6">
            @if(isset($mensagemAtual))
                <div class="space-y-6">
                    <div class="flex items-start gap-4 pb-6 border-b border-slate-200 dark:border-slate-800">
                        <div class="w-16 h-16 rounded-full bg-primary/20 flex items-center justify-center">
                            <span class="material-symbols-outlined text-primary text-2xl">person</span>
                        </div>
                        <div class="flex-1">
                            <h2 class="text-2xl font-bold mb-1">{{ $mensagemAtual->assunto }}</h2>
                            <p class="text-sm text-slate-500 dark:text-slate-400">
                                De: {{ $mensagemAtual->remetente->nome }} • {{ $mensagemAtual->created_at->format('d/m/Y H:i') }}
                            </p>
                        </div>
                        <button class="text-slate-500 hover:text-red-500 transition-colors">
                            <span class="material-symbols-outlined">delete</span>
                        </button>
                    </div>

                    <div class="prose prose-slate dark:prose-invert max-w-none">
                        <p>{{ $mensagemAtual->mensagem }}</p>
                    </div>

                    @if($mensagemAtual->anexos->count() > 0)
                        <div class="border-t border-slate-200 dark:border-slate-800 pt-6">
                            <p class="text-sm font-bold mb-3">Anexos ({{ $mensagemAtual->anexos->count() }})</p>
                            <div class="space-y-2">
                                @foreach($mensagemAtual->anexos as $anexo)
                                    <a href="#" class="flex items-center gap-3 p-3 bg-slate-50 dark:bg-slate-800 rounded-xl hover:bg-slate-200 dark:hover:bg-slate-700 transition-colors">
                                        <span class="material-symbols-outlined text-primary">attachment</span>
                                        <span class="flex-1">{{ $anexo->nome_arquivo }}</span>
                                        <span class="text-xs text-slate-500">{{ number_format($anexo->tamanho / 1024, 2) }} KB</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <div class="border-t border-slate-200 dark:border-slate-800 pt-6">
                        <button class="px-6 py-3 bg-primary text-background-dark font-bold rounded-xl hover:bg-primary/90 transition-colors">
                            Responder
                        </button>
                    </div>
                </div>
            @else
                <div class="flex items-center justify-center h-full">
                    <div class="text-center">
                        <span class="material-symbols-outlined text-slate-400 text-6xl mb-4">mail</span>
                        <p class="text-slate-500 dark:text-slate-400">Selecione uma mensagem para ler</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Nova Mensagem Modal -->
<div id="nova-mensagem-modal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">
    <div class="bg-slate-100 dark:bg-slate-900 rounded-xl p-8 max-w-2xl w-full mx-4">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold">Nova Mensagem</h2>
            <button onclick="document.getElementById('nova-mensagem-modal').classList.add('hidden')" 
                class="text-slate-500 hover:text-red-500">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>

        <form method="POST" action="{{ route('mensagens.store') }}" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-bold mb-2">Destinatário</label>
                <select name="destinatario_id" required 
                    class="w-full bg-slate-50 dark:bg-slate-800 border-2 border-transparent focus:border-primary/50 rounded-xl px-4 py-3">
                    <option value="">Selecione...</option>
                    @foreach($contatos ?? [] as $contato)
                        <option value="{{ $contato->id }}">{{ $contato->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-bold mb-2">Assunto</label>
                <input type="text" name="assunto" required 
                    class="w-full bg-slate-50 dark:bg-slate-800 border-2 border-transparent focus:border-primary/50 rounded-xl px-4 py-3">
            </div>

            <div>
                <label class="block text-sm font-bold mb-2">Mensagem</label>
                <textarea name="mensagem" rows="6" required 
                    class="w-full bg-slate-50 dark:bg-slate-800 border-2 border-transparent focus:border-primary/50 rounded-xl px-4 py-3"></textarea>
            </div>

            <div class="flex gap-3">
                <button type="submit" class="flex-1 px-6 py-3 bg-primary text-background-dark font-bold rounded-xl hover:bg-primary/90 transition-colors">
                    Enviar
                </button>
                <button type="button" onclick="document.getElementById('nova-mensagem-modal').classList.add('hidden')" 
                    class="px-6 py-3 bg-slate-200 dark:bg-slate-800 font-bold rounded-xl hover:bg-slate-300 dark:hover:bg-slate-700 transition-colors">
                    Cancelar
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
