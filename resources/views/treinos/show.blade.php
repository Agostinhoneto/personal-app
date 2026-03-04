@extends('layouts.app')

@section('title', $treino->nome)

@section('content')
<div class="space-y-6">
    <!-- Back Button -->
    <a href="{{ route('treinos.index') }}" class="inline-flex items-center gap-2 text-slate-500 hover:text-primary transition-colors">
        <span class="material-symbols-outlined">arrow_back</span>
        Voltar para Treinos
    </a>

    <!-- Treino Header -->
    <div class="bg-slate-100 dark:bg-slate-900 rounded-xl p-8">
        <div class="flex items-start justify-between mb-6">
            <div class="flex items-start gap-4">
                <div class="w-16 h-16 rounded-xl bg-primary/20 flex items-center justify-center">
                    <span class="material-symbols-outlined text-primary text-3xl">assignment</span>
                </div>
                <div>
                    <h1 class="text-4xl font-black mb-2">{{ $treino->nome }}</h1>
                    <p class="text-slate-500 dark:text-slate-400">{{ $treino->aluno->usuario->nome }}</p>
                </div>
            </div>
            <div class="flex gap-2">
                <span class="px-4 py-2 rounded-xl text-sm font-bold 
                    {{ $treino->status === 'ativo' ? 'bg-primary/10 text-primary' : 
                       ($treino->status === 'concluido' ? 'bg-blue-500/10 text-blue-500' : 'bg-slate-500/10 text-slate-500') }}">
                    {{ ucfirst($treino->status) }}
                </span>
                @if(auth()->user()->tipo === 'personal')
                    <a href="{{ route('treinos.edit', $treino) }}" class="px-4 py-2 bg-primary text-background-dark font-bold rounded-xl hover:bg-primary/90 transition-colors">
                        Editar
                    </a>
                @endif
            </div>
        </div>

        <div class="grid grid-cols-3 gap-6">
            <div>
                <p class="text-xs text-slate-500 dark:text-slate-400 mb-1">Período</p>
                <p class="font-bold">{{ $treino->data_inicio->format('d/m/Y') }} - {{ $treino->data_fim ? $treino->data_fim->format('d/m/Y') : 'Atual' }}</p>
            </div>
            <div>
                <p class="text-xs text-slate-500 dark:text-slate-400 mb-1">Total de Exercícios</p>
                <p class="font-bold">{{ $treino->exercicios->count() }}</p>
            </div>
            <div>
                <p class="text-xs text-slate-500 dark:text-slate-400 mb-1">Personal Trainer</p>
                <p class="font-bold">{{ $treino->personal->usuario->nome }}</p>
            </div>
        </div>

        @if($treino->objetivo)
            <div class="mt-6 p-4 bg-slate-50 dark:bg-slate-800 rounded-xl">
                <p class="text-xs text-slate-500 dark:text-slate-400 mb-2">Objetivo do Treino</p>
                <p class="font-semibold">{{ $treino->objetivo }}</p>
            </div>
        @endif
    </div>

    <!-- Exercises List -->
    <div class="space-y-4">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-bold">Exercícios</h2>
            @if(auth()->user()->tipo === 'personal')
                <button class="px-4 py-2 bg-primary text-background-dark font-bold rounded-xl hover:bg-primary/90 transition-colors">
                    + Adicionar Exercício
                </button>
            @endif
        </div>

        @forelse($treino->exercicios->sortBy('ordem') as $treinoExercicio)
            <div class="bg-slate-100 dark:bg-slate-900 rounded-xl p-6">
                <div class="flex items-start gap-6">
                    <div class="w-12 h-12 rounded-full bg-primary/20 flex items-center justify-center flex-shrink-0">
                        <span class="font-black text-primary">{{ $treinoExercicio->ordem }}</span>
                    </div>
                    
                    <div class="flex-1">
                        <h3 class="font-bold text-xl mb-2">{{ $treinoExercicio->exercicio->nome }}</h3>
                        
                        <div class="grid grid-cols-4 gap-4 mb-4">
                            <div class="bg-slate-50 dark:bg-slate-800 rounded-xl p-3">
                                <p class="text-xs text-slate-500 dark:text-slate-400 mb-1">Séries</p>
                                <p class="text-lg font-bold text-primary">{{ $treinoExercicio->series }}</p>
                            </div>
                            <div class="bg-slate-50 dark:bg-slate-800 rounded-xl p-3">
                                <p class="text-xs text-slate-500 dark:text-slate-400 mb-1">Repetições</p>
                                <p class="text-lg font-bold text-blue-500">{{ $treinoExercicio->repeticoes }}</p>
                            </div>
                            <div class="bg-slate-50 dark:bg-slate-800 rounded-xl p-3">
                                <p class="text-xs text-slate-500 dark:text-slate-400 mb-1">Carga</p>
                                <p class="text-lg font-bold text-purple-500">{{ $treinoExercicio->carga }} kg</p>
                            </div>
                            <div class="bg-slate-50 dark:bg-slate-800 rounded-xl p-3">
                                <p class="text-xs text-slate-500 dark:text-slate-400 mb-1">Descanso</p>
                                <p class="text-lg font-bold text-orange-500">{{ $treinoExercicio->tempo_descanso }}s</p>
                            </div>
                        </div>

                        @if($treinoExercicio->observacoes)
                            <div class="p-3 bg-slate-50 dark:bg-slate-800 rounded-xl">
                                <p class="text-xs text-slate-500 dark:text-slate-400 mb-1">Observações</p>
                                <p class="text-sm">{{ $treinoExercicio->observacoes }}</p>
                            </div>
                        @endif
                    </div>

                    @if(auth()->user()->tipo === 'aluno')
                        <button class="px-4 py-2 bg-primary text-background-dark font-bold rounded-xl hover:bg-primary/90 transition-colors">
                            Registrar
                        </button>
                    @endif
                </div>
            </div>
        @empty
            <div class="text-center py-12 bg-slate-100 dark:bg-slate-900 rounded-xl">
                <span class="material-symbols-outlined text-slate-400 text-6xl mb-4">fitness_center</span>
                <p class="text-slate-500 dark:text-slate-400 text-lg">Nenhum exercício no treino</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
