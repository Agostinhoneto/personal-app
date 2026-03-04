@extends('layouts.app')

@section('title', $plano->nome)

@section('content')
<div class="space-y-6">
    <!-- Back Button -->
    <a href="{{ route('planos-alimentares.index') }}" class="inline-flex items-center gap-2 text-slate-500 hover:text-primary transition-colors">
        <span class="material-symbols-outlined">arrow_back</span>
        Voltar para Planos
    </a>

    <!-- Plan Header -->
    <div class="bg-slate-100 dark:bg-slate-900 rounded-xl p-8">
        <div class="flex items-start justify-between mb-6">
            <div class="flex items-start gap-4">
                <div class="w-16 h-16 rounded-xl bg-orange-500/20 flex items-center justify-center">
                    <span class="material-symbols-outlined text-orange-500 text-3xl">restaurant</span>
                </div>
                <div>
                    <h1 class="text-4xl font-black mb-2">{{ $plano->nome }}</h1>
                    <p class="text-slate-500 dark:text-slate-400">{{ $plano->aluno->usuario->nome }}</p>
                </div>
            </div>
            @if(auth()->user()->tipo === 'personal')
                <a href="{{ route('planos-alimentares.edit', $plano) }}" class="px-4 py-2 bg-primary text-background-dark font-bold rounded-xl hover:bg-primary/90 transition-colors">
                    Editar
                </a>
            @endif
        </div>

        <!-- Macros Summary -->
        <div class="grid grid-cols-4 gap-6 mb-6">
            <div class="bg-slate-50 dark:bg-slate-800 rounded-xl p-6 text-center">
                <span class="material-symbols-outlined text-orange-500 text-4xl mb-2">local_fire_department</span>
                <p class="text-3xl font-black mb-1">{{ $plano->calorias_diarias }}</p>
                <p class="text-xs text-slate-500 dark:text-slate-400">kcal/dia</p>
            </div>
            <div class="bg-slate-50 dark:bg-slate-800 rounded-xl p-6 text-center">
                <span class="material-symbols-outlined text-red-500 text-4xl mb-2">egg</span>
                <p class="text-3xl font-black mb-1">{{ $plano->proteinas }}</p>
                <p class="text-xs text-slate-500 dark:text-slate-400">g Proteínas</p>
            </div>
            <div class="bg-slate-50 dark:bg-slate-800 rounded-xl p-6 text-center">
                <span class="material-symbols-outlined text-blue-500 text-4xl mb-2">grain</span>
                <p class="text-3xl font-black mb-1">{{ $plano->carboidratos }}</p>
                <p class="text-xs text-slate-500 dark:text-slate-400">g Carboidratos</p>
            </div>
            <div class="bg-slate-50 dark:bg-slate-800 rounded-xl p-6 text-center">
                <span class="material-symbols-outlined text-yellow-500 text-4xl mb-2">water_drop</span>
                <p class="text-3xl font-black mb-1">{{ $plano->gorduras }}</p>
                <p class="text-xs text-slate-500 dark:text-slate-400">g Gorduras</p>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-6">
            <div>
                <p class="text-xs text-slate-500 dark:text-slate-400 mb-1">Período</p>
                <p class="font-bold">{{ $plano->data_inicio->format('d/m/Y') }} - {{ $plano->data_fim ? $plano->data_fim->format('d/m/Y') : 'Atual' }}</p>
            </div>
            <div>
                <p class="text-xs text-slate-500 dark:text-slate-400 mb-1">Personal Trainer</p>
                <p class="font-bold">{{ $plano->personal->usuario->nome }}</p>
            </div>
        </div>

        @if($plano->observacoes)
            <div class="mt-6 p-4 bg-slate-50 dark:bg-slate-800 rounded-xl">
                <p class="text-xs text-slate-500 dark:text-slate-400 mb-2">Observações</p>
                <p class="font-semibold">{{ $plano->observacoes }}</p>
            </div>
        @endif
    </div>

    <!-- Meals -->
    <div class="space-y-4">
        <h2 class="text-2xl font-bold">Refeições</h2>

        @forelse($plano->refeicoes->sortBy('ordem') as $refeicao)
            <div class="bg-slate-100 dark:bg-slate-900 rounded-xl p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-full bg-orange-500/20 flex items-center justify-center">
                            <span class="font-black text-orange-500">{{ $refeicao->ordem }}</span>
                        </div>
                        <div>
                            <h3 class="font-bold text-xl">{{ $refeicao->nome }}</h3>
                            @if($refeicao->horario)
                                <p class="text-sm text-slate-500 dark:text-slate-400">
                                    <span class="material-symbols-outlined text-xs">schedule</span>
                                    {{ $refeicao->horario->format('H:i') }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>

                @if($refeicao->alimentos->count() > 0)
                    <div class="space-y-3">
                        @foreach($refeicao->alimentos as $refeicaoAlimento)
                            <div class="flex items-center gap-4 p-4 bg-slate-50 dark:bg-slate-800 rounded-xl">
                                <div class="flex-1">
                                    <p class="font-semibold">{{ $refeicaoAlimento->alimento->nome }}</p>
                                    <p class="text-sm text-slate-500 dark:text-slate-400">
                                        {{ $refeicaoAlimento->quantidade }} {{ $refeicaoAlimento->unidade }}
                                    </p>
                                </div>
                                <div class="grid grid-cols-3 gap-4 text-center">
                                    <div>
                                        <p class="text-xs text-slate-500 dark:text-slate-400">Calorias</p>
                                        <p class="font-bold text-sm">{{ $refeicaoAlimento->alimento->calorias }}kcal</p>
                                    </div>
                                    <div>
                                        <p class="text-xs text-slate-500 dark:text-slate-400">Proteínas</p>
                                        <p class="font-bold text-sm">{{ $refeicaoAlimento->alimento->proteinas }}g</p>
                                    </div>
                                    <div>
                                        <p class="text-xs text-slate-500 dark:text-slate-400">Carboidratos</p>
                                        <p class="font-bold text-sm">{{ $refeicaoAlimento->alimento->carboidratos }}g</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-center text-slate-500 dark:text-slate-400 py-4">Nenhum alimento adicionado</p>
                @endif
            </div>
        @empty
            <div class="text-center py-12 bg-slate-100 dark:bg-slate-900 rounded-xl">
                <span class="material-symbols-outlined text-slate-400 text-6xl mb-4">restaurant_menu</span>
                <p class="text-slate-500 dark:text-slate-400 text-lg">Nenhuma refeição cadastrada</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
