@extends('layouts.app')

@section('title', 'Avaliações Físicas')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-4xl font-black mb-2">Avaliações Físicas</h1>
            <p class="text-slate-500 dark:text-slate-400">Acompanhe a evolução física dos alunos</p>
        </div>
        @if(auth()->user()->tipo === 'personal')
            <a href="{{ route('avaliacoes.create') }}" class="px-6 py-3 bg-primary text-background-dark font-bold rounded-xl hover:bg-primary/90 transition-colors flex items-center gap-2">
                <span class="material-symbols-outlined">add</span>
                Nova Avaliação
            </a>
        @endif
    </div>

    <!-- Filters -->
    <div class="bg-slate-100 dark:bg-slate-900 rounded-xl p-6">
        <form method="GET" class="flex gap-4">
            <input type="text" name="search" placeholder="Buscar por aluno..." value="{{ request('search') }}" 
                class="flex-1 bg-slate-50 dark:bg-slate-800 border-2 border-transparent focus:border-primary/50 rounded-xl px-4 py-3">
            <input type="date" name="data_inicio" value="{{ request('data_inicio') }}" 
                class="bg-slate-50 dark:bg-slate-800 border-2 border-transparent focus:border-primary/50 rounded-xl px-4 py-3">
            <input type="date" name="data_fim" value="{{ request('data_fim') }}" 
                class="bg-slate-50 dark:bg-slate-800 border-2 border-transparent focus:border-primary/50 rounded-xl px-4 py-3">
            <button type="submit" class="px-6 py-3 bg-primary text-background-dark font-bold rounded-xl hover:bg-primary/90 transition-colors">
                Filtrar
            </button>
        </form>
    </div>

    <!-- Evaluations List -->
    <div class="space-y-4">
        @forelse($avaliacoes as $avaliacao)
            <div class="bg-slate-100 dark:bg-slate-900 rounded-xl p-6 hover:border-2 hover:border-primary/30 transition-all">
                <div class="flex items-start gap-6">
                    <div class="w-16 h-16 rounded-full bg-purple-500/20 flex items-center justify-center flex-shrink-0">
                        <span class="material-symbols-outlined text-purple-500 text-2xl">monitoring</span>
                    </div>
                    
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-4">
                            <h3 class="font-bold text-xl">{{ $avaliacao->aluno->usuario->nome }}</h3>
                            <span class="text-sm text-slate-500 dark:text-slate-400">•</span>
                            <span class="text-sm text-slate-500 dark:text-slate-400">{{ $avaliacao->data_avaliacao->format('d/m/Y') }}</span>
                        </div>

                        <div class="grid grid-cols-2 md:grid-cols-5 gap-6">
                            <div class="bg-slate-50 dark:bg-slate-800 rounded-xl p-4">
                                <p class="text-xs text-slate-500 dark:text-slate-400 mb-1">Peso</p>
                                <p class="text-2xl font-black text-primary">{{ $avaliacao->peso ?? '--' }}</p>
                                <p class="text-xs text-slate-500 dark:text-slate-400">kg</p>
                            </div>
                            <div class="bg-slate-50 dark:bg-slate-800 rounded-xl p-4">
                                <p class="text-xs text-slate-500 dark:text-slate-400 mb-1">Altura</p>
                                <p class="text-2xl font-black text-blue-500">{{ $avaliacao->altura ?? '--' }}</p>
                                <p class="text-xs text-slate-500 dark:text-slate-400">m</p>
                            </div>
                            <div class="bg-slate-50 dark:bg-slate-800 rounded-xl p-4">
                                <p class="text-xs text-slate-500 dark:text-slate-400 mb-1">IMC</p>
                                <p class="text-2xl font-black text-purple-500">{{ $avaliacao->imc ?? '--' }}</p>
                                <p class="text-xs text-slate-500 dark:text-slate-400">kg/m²</p>
                            </div>
                            <div class="bg-slate-50 dark:bg-slate-800 rounded-xl p-4">
                                <p class="text-xs text-slate-500 dark:text-slate-400 mb-1">Gordura</p>
                                <p class="text-2xl font-black text-orange-500">{{ $avaliacao->gordura_corporal ?? '--' }}</p>
                                <p class="text-xs text-slate-500 dark:text-slate-400">%</p>
                            </div>
                            <div class="bg-slate-50 dark:bg-slate-800 rounded-xl p-4">
                                <p class="text-xs text-slate-500 dark:text-slate-400 mb-1">Massa Muscular</p>
                                <p class="text-2xl font-black text-green-500">{{ $avaliacao->massa_muscular ?? '--' }}</p>
                                <p class="text-xs text-slate-500 dark:text-slate-400">kg</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex gap-2">
                        <a href="{{ route('avaliacoes.show', $avaliacao) }}" class="px-4 py-2 bg-primary text-background-dark font-bold rounded-xl hover:bg-primary/90 transition-colors">
                            Ver Detalhes
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center py-12 bg-slate-100 dark:bg-slate-900 rounded-xl">
                <span class="material-symbols-outlined text-slate-400 text-6xl mb-4">monitoring</span>
                <p class="text-slate-500 dark:text-slate-400 text-lg">Nenhuma avaliação encontrada</p>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($avaliacoes->hasPages())
        <div class="flex justify-center">
            {{ $avaliacoes->links() }}
        </div>
    @endif
</div>
@endsection
