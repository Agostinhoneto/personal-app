@extends('layouts.app')

@section('title', 'Treinos')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-4xl font-black mb-2">Treinos</h1>
            <p class="text-slate-500 dark:text-slate-400">Gerencie os treinos dos seus alunos</p>
        </div>
        @if(auth()->user()->tipo === 'personal')
            <a href="{{ route('treinos.create') }}" class="px-6 py-3 bg-primary text-background-dark font-bold rounded-xl hover:bg-primary/90 transition-colors flex items-center gap-2">
                <span class="material-symbols-outlined">add</span>
                Novo Treino
            </a>
        @endif
    </div>

    <!-- Filters -->
    <div class="bg-slate-100 dark:bg-slate-900 rounded-xl p-6">
        <form method="GET" class="flex gap-4">
            <input type="text" name="search" placeholder="Buscar treino..." value="{{ request('search') }}" 
                class="flex-1 bg-slate-50 dark:bg-slate-800 border-2 border-transparent focus:border-primary/50 rounded-xl px-4 py-3">
            <select name="status" class="bg-slate-50 dark:bg-slate-800 border-2 border-transparent focus:border-primary/50 rounded-xl px-4 py-3">
                <option value="">Todos Status</option>
                <option value="ativo" {{ request('status') === 'ativo' ? 'selected' : '' }}>Ativo</option>
                <option value="inativo" {{ request('status') === 'inativo' ? 'selected' : '' }}>Inativo</option>
                <option value="concluido" {{ request('status') === 'concluido' ? 'selected' : '' }}>Concluído</option>
            </select>
            <button type="submit" class="px-6 py-3 bg-primary text-background-dark font-bold rounded-xl hover:bg-primary/90 transition-colors">
                Filtrar
            </button>
        </form>
    </div>

    <!-- Treinos Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($treinos as $treino)
            <div class="bg-slate-100 dark:bg-slate-900 rounded-xl p-6 hover:border-2 hover:border-primary/30 transition-all">
                <div class="flex items-start justify-between mb-4">
                    <div class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-primary text-3xl">assignment</span>
                        <div>
                            <h3 class="font-bold text-lg">{{ $treino->nome }}</h3>
                            <p class="text-sm text-slate-500 dark:text-slate-400">{{ $treino->aluno->usuario->nome }}</p>
                        </div>
                    </div>
                    <span class="px-3 py-1 rounded-full text-xs font-bold 
                        {{ $treino->status === 'ativo' ? 'bg-primary/10 text-primary' : 
                           ($treino->status === 'concluido' ? 'bg-blue-500/10 text-blue-500' : 'bg-slate-500/10 text-slate-500') }}">
                        {{ ucfirst($treino->status) }}
                    </span>
                </div>

                <div class="space-y-2 mb-4">
                    <div class="flex items-center gap-2 text-sm">
                        <span class="material-symbols-outlined text-primary text-base">calendar_today</span>
                        <span>{{ $treino->data_inicio->format('d/m/Y') }} - {{ $treino->data_fim ? $treino->data_fim->format('d/m/Y') : 'Atual' }}</span>
                    </div>
                    @if($treino->objetivo)
                        <div class="flex items-center gap-2 text-sm">
                            <span class="material-symbols-outlined text-primary text-base">flag</span>
                            <span>{{ Str::limit($treino->objetivo, 30) }}</span>
                        </div>
                    @endif
                    <div class="flex items-center gap-2 text-sm">
                        <span class="material-symbols-outlined text-primary text-base">fitness_center</span>
                        <span>{{ $treino->exercicios->count() }} exercícios</span>
                    </div>
                </div>

                <a href="{{ route('treinos.show', $treino) }}" class="block w-full text-center px-4 py-2 bg-primary text-background-dark font-bold rounded-xl hover:bg-primary/90 transition-colors">
                    Ver Treino
                </a>
            </div>
        @empty
            <div class="col-span-full text-center py-12">
                <span class="material-symbols-outlined text-slate-400 text-6xl mb-4">assignment</span>
                <p class="text-slate-500 dark:text-slate-400 text-lg">Nenhum treino encontrado</p>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($treinos->hasPages())
        <div class="flex justify-center">
            {{ $treinos->links() }}
        </div>
    @endif
</div>
@endsection
