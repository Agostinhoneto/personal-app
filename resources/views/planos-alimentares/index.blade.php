@extends('layouts.app')

@section('title', 'Planos Alimentares')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-4xl font-black mb-2">Planos Alimentares</h1>
            <p class="text-slate-500 dark:text-slate-400">Gerencie a alimentação dos seus alunos</p>
        </div>
        @if(auth()->user()->tipo === 'personal')
            <a href="{{ route('planos-alimentares.create') }}" class="px-6 py-3 bg-primary text-background-dark font-bold rounded-xl hover:bg-primary/90 transition-colors flex items-center gap-2">
                <span class="material-symbols-outlined">add</span>
                Novo Plano
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
            <button type="submit" class="px-6 py-3 bg-primary text-background-dark font-bold rounded-xl hover:bg-primary/90 transition-colors">
                Filtrar
            </button>
        </form>
    </div>

    <!-- Planos Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @forelse($planos as $plano)
            <div class="bg-slate-100 dark:bg-slate-900 rounded-xl p-6 hover:border-2 hover:border-primary/30 transition-all">
                <div class="flex items-start gap-4 mb-4">
                    <div class="w-16 h-16 rounded-xl bg-orange-500/20 flex items-center justify-center flex-shrink-0">
                        <span class="material-symbols-outlined text-orange-500 text-3xl">restaurant</span>
                    </div>
                    <div class="flex-1">
                        <h3 class="font-bold text-xl mb-1">{{ $plano->nome }}</h3>
                        <p class="text-sm text-slate-500 dark:text-slate-400">{{ $plano->aluno->usuario->nome }}</p>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div class="bg-slate-50 dark:bg-slate-800 rounded-xl p-4">
                        <p class="text-xs text-slate-500 dark:text-slate-400 mb-1">Calorias</p>
                        <p class="text-2xl font-black text-orange-500">{{ $plano->calorias_diarias }}</p>
                        <p class="text-xs text-slate-500 dark:text-slate-400">kcal/dia</p>
                    </div>
                    <div class="bg-slate-50 dark:bg-slate-800 rounded-xl p-4">
                        <p class="text-xs text-slate-500 dark:text-slate-400 mb-1">Refeições</p>
                        <p class="text-2xl font-black text-primary">{{ $plano->refeicoes->count() }}</p>
                        <p class="text-xs text-slate-500 dark:text-slate-400">por dia</p>
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-2 mb-4">
                    <div class="text-center p-2 bg-slate-50 dark:bg-slate-800 rounded-lg">
                        <p class="text-xs text-slate-500 dark:text-slate-400">Proteínas</p>
                        <p class="font-bold text-sm">{{ $plano->proteinas }}g</p>
                    </div>
                    <div class="text-center p-2 bg-slate-50 dark:bg-slate-800 rounded-lg">
                        <p class="text-xs text-slate-500 dark:text-slate-400">Carboidratos</p>
                        <p class="font-bold text-sm">{{ $plano->carboidratos }}g</p>
                    </div>
                    <div class="text-center p-2 bg-slate-50 dark:bg-slate-800 rounded-lg">
                        <p class="text-xs text-slate-500 dark:text-slate-400">Gorduras</p>
                        <p class="font-bold text-sm">{{ $plano->gorduras }}g</p>
                    </div>
                </div>

                <div class="flex items-center gap-2 text-sm text-slate-500 dark:text-slate-400 mb-4">
                    <span class="material-symbols-outlined text-base">calendar_today</span>
                    <span>{{ $plano->data_inicio->format('d/m/Y') }} - {{ $plano->data_fim ? $plano->data_fim->format('d/m/Y') : 'Atual' }}</span>
                </div>

                <a href="{{ route('planos-alimentares.show', $plano) }}" class="block w-full text-center px-4 py-2 bg-orange-500 text-white font-bold rounded-xl hover:bg-orange-600 transition-colors">
                    Ver Plano
                </a>
            </div>
        @empty
            <div class="col-span-full text-center py-12">
                <span class="material-symbols-outlined text-slate-400 text-6xl mb-4">restaurant</span>
                <p class="text-slate-500 dark:text-slate-400 text-lg">Nenhum plano alimentar encontrado</p>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($planos->hasPages())
        <div class="flex justify-center">
            {{ $planos->links() }}
        </div>
    @endif
</div>
@endsection
