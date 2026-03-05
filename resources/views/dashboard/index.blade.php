@extends('layouts.app')

@section('title', 'Dashboard - FitAssist')

@section('content')
<div class="space-y-8 px-6 py-8 max-w-7xl mx-auto">
    <!-- Header -->
    <div>
        <h1 class="text-4xl font-black mb-2">Dashboard</h1>
        <p class="text-slate-500 dark:text-slate-400">Bem-vindo de volta, {{ Auth::user()->nome }}!</p>
    </div>

    @if(Auth::user()->tipo === 'personal')
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="bg-slate-100 dark:bg-slate-900 rounded-xl p-6 border-2 border-transparent hover:border-primary/30 transition-colors">
                <div class="flex items-center justify-between mb-4">
                    <span class="material-symbols-outlined text-primary text-3xl">group</span>
                    <span class="bg-primary/10 text-primary text-xs font-bold px-3 py-1 rounded-full">Total</span>
                </div>
                <h3 class="text-3xl font-black mb-1">{{ $totalAlunos ?? 0 }}</h3>
                <p class="text-sm text-slate-500 dark:text-slate-400">Alunos Ativos</p>
            </div>

            <div class="bg-slate-100 dark:bg-slate-900 rounded-xl p-6 border-2 border-transparent hover:border-primary/30 transition-colors">
                <div class="flex items-center justify-between mb-4">
                    <span class="material-symbols-outlined text-blue-500 text-3xl">assignment</span>
                    <span class="bg-blue-500/10 text-blue-500 text-xs font-bold px-3 py-1 rounded-full">Ativos</span>
                </div>
                <h3 class="text-3xl font-black mb-1">{{ $treinosAtivos ?? 0 }}</h3>
                <p class="text-sm text-slate-500 dark:text-slate-400">Treinos em Andamento</p>
            </div>

            <div class="bg-slate-100 dark:bg-slate-900 rounded-xl p-6 border-2 border-transparent hover:border-primary/30 transition-colors">
                <div class="flex items-center justify-between mb-4">
                    <span class="material-symbols-outlined text-purple-500 text-3xl">monitoring</span>
                    <span class="bg-purple-500/10 text-purple-500 text-xs font-bold px-3 py-1 rounded-full">Mês</span>
                </div>
                <h3 class="text-3xl font-black mb-1">{{ $avaliacoesRealizadas ?? 0 }}</h3>
                <p class="text-sm text-slate-500 dark:text-slate-400">Avaliações Este Mês</p>
            </div>

            <div class="bg-slate-100 dark:bg-slate-900 rounded-xl p-6 border-2 border-transparent hover:border-primary/30 transition-colors">
                <div class="flex items-center justify-between mb-4">
                    <span class="material-symbols-outlined text-orange-500 text-3xl">restaurant</span>
                    <span class="bg-orange-500/10 text-orange-500 text-xs font-bold px-3 py-1 rounded-full">Ativos</span>
                </div>
                <h3 class="text-3xl font-black mb-1">{{ $planosAlimentares ?? 0 }}</h3>
                <p class="text-sm text-slate-500 dark:text-slate-400">Planos Alimentares</p>
            </div>
        </div>

        <!-- Client Activity -->
        <div class="bg-slate-100 dark:bg-slate-900 rounded-xl p-6">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-bold">Client Activity</h2>
                <a href="{{ route('alunos.index') }}" class="text-primary hover:underline font-semibold text-sm flex items-center gap-1">
                    View All Activity
                    <span class="material-icons text-sm">arrow_forward</span>
                </a>
            </div>
            <div class="space-y-4">
                <div class="flex items-start gap-4 p-4 bg-slate-50 dark:bg-slate-800 rounded-xl">
                    <div class="w-10 h-10 rounded-full bg-primary/20 flex items-center justify-center flex-shrink-0">
                        <span class="material-icons text-primary">fitness_center</span>
                    </div>
                    <div class="flex-1">
                        <p class="font-medium text-slate-900 dark:text-slate-100">John Doe completed a workout session.</p>
                        <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Today, 10:30 AM</p>
                    </div>
                </div>
                <div class="flex items-start gap-4 p-4 bg-slate-50 dark:bg-slate-800 rounded-xl">
                    <div class="w-10 h-10 rounded-full bg-blue-500/20 flex items-center justify-center flex-shrink-0">
                        <span class="material-icons text-blue-500">monitoring</span>
                    </div>
                    <div class="flex-1">
                        <p class="font-medium text-slate-900 dark:text-slate-100">Sarah Jenkins completed a physical assessment.</p>
                        <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Yesterday, 3:45 PM</p>
                    </div>
                </div>
                <div class="flex items-start gap-4 p-4 bg-slate-50 dark:bg-slate-800 rounded-xl">
                    <div class="w-10 h-10 rounded-full bg-orange-500/20 flex items-center justify-center flex-shrink-0">
                        <span class="material-icons text-orange-500">restaurant</span>
                    </div>
                    <div class="flex-1">
                        <p class="font-medium text-slate-900 dark:text-slate-100">Marcus Thorne started a new meal plan.</p>
                        <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">2 days ago</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Students -->
        <div class="bg-slate-100 dark:bg-slate-900 rounded-xl p-6">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-bold">Alunos Recentes</h2>
                <a href="{{ route('alunos.index') }}" class="text-primary hover:underline font-semibold text-sm">Ver Todos</a>
            </div>
            <div class="space-y-4">
                @forelse($alunosRecentes ?? [] as $aluno)
                    <div class="flex items-center gap-4 p-4 bg-slate-50 dark:bg-slate-800 rounded-xl">
                        <div class="w-12 h-12 rounded-full bg-primary/20 flex items-center justify-center">
                            <span class="material-symbols-outlined text-primary">person</span>
                        </div>
                        <div class="flex-1">
                            <p class="font-semibold">{{ $aluno->usuario->nome }}</p>
                            <p class="text-sm text-slate-500 dark:text-slate-400">{{ $aluno->objetivo }}</p>
                        </div>
                        <a href="{{ route('alunos.show', $aluno) }}" class="px-4 py-2 bg-primary text-background-dark font-bold rounded-xl hover:bg-primary/90 transition-colors">
                            Ver Perfil
                        </a>
                    </div>
                @empty
                    <p class="text-center text-slate-500 dark:text-slate-400 py-8">Nenhum aluno cadastrado ainda.</p>
                @endforelse
            </div>
        </div>
    @else
        <!-- Student Dashboard -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-slate-100 dark:bg-slate-900 rounded-xl p-6">
                <div class="flex items-center gap-4 mb-4">
                    <span class="material-symbols-outlined text-primary text-4xl">assignment</span>
                    <div>
                        <h3 class="text-2xl font-black">{{ $meuTreino?->nome ?? 'Sem Treino' }}</h3>
                        <p class="text-sm text-slate-500 dark:text-slate-400">Treino Atual</p>
                    </div>
                </div>
                @if($meuTreino)
                    <a href="{{ route('treinos.show', $meuTreino) }}" class="block w-full text-center px-4 py-2 bg-primary text-background-dark font-bold rounded-xl hover:bg-primary/90 transition-colors">
                        Ver Treino
                    </a>
                @endif
            </div>

            <div class="bg-slate-100 dark:bg-slate-900 rounded-xl p-6">
                <div class="flex items-center gap-4 mb-4">
                    <span class="material-symbols-outlined text-purple-500 text-4xl">monitoring</span>
                    <div>
                        <h3 class="text-2xl font-black">{{ $ultimaAvaliacao?->peso ?? '--' }} kg</h3>
                        <p class="text-sm text-slate-500 dark:text-slate-400">Última Avaliação</p>
                    </div>
                </div>
                <a href="{{ route('avaliacoes.index') }}" class="block w-full text-center px-4 py-2 bg-purple-500 text-white font-bold rounded-xl hover:bg-purple-600 transition-colors">
                    Ver Histórico
                </a>
            </div>

            <div class="bg-slate-100 dark:bg-slate-900 rounded-xl p-6">
                <div class="flex items-center gap-4 mb-4">
                    <span class="material-symbols-outlined text-orange-500 text-4xl">restaurant</span>
                    <div>
                        <h3 class="text-2xl font-black">{{ $planoAtual?->calorias_diarias ?? '--' }} kcal</h3>
                        <p class="text-sm text-slate-500 dark:text-slate-400">Meta Diária</p>
                    </div>
                </div>
                @if($planoAtual)
                    <a href="{{ route('planos-alimentares.show', $planoAtual) }}" class="block w-full text-center px-4 py-2 bg-orange-500 text-white font-bold rounded-xl hover:bg-orange-600 transition-colors">
                        Ver Plano
                    </a>
                @endif
            </div>
        </div>

        <!-- My Progress -->
        <div class="bg-slate-100 dark:bg-slate-900 rounded-xl p-6">
            <h2 class="text-2xl font-bold mb-6">Meu Personal</h2>
            @if($meuPersonal)
                <div class="flex items-center gap-4 p-4 bg-slate-50 dark:bg-slate-800 rounded-xl">
                    <div class="w-16 h-16 rounded-full bg-primary/20 flex items-center justify-center">
                        <span class="material-symbols-outlined text-primary text-3xl">person</span>
                    </div>
                    <div class="flex-1">
                        <p class="font-bold text-xl">{{ $meuPersonal->usuario->nome }}</p>
                        <p class="text-sm text-slate-500 dark:text-slate-400">{{ $meuPersonal->especialidade }}</p>
                        <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">CREF: {{ $meuPersonal->cref }}</p>
                    </div>
                </div>
            @else
                <p class="text-center text-slate-500 dark:text-slate-400 py-8">Você ainda não está vinculado a nenhum personal trainer.</p>
            @endif
        </div>
    @endif
</div>
@endsection
