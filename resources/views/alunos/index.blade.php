@extends('layouts.app')

@section('title', 'Alunos')

@section('content')
<div class="space-y-6">
    <!-- Header with Actions -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-4xl font-black mb-2">Alunos</h1>
            <p class="text-slate-500 dark:text-slate-400">Gerencie seus alunos e acompanhe o progresso deles</p>
        </div>
        <a href="{{ route('alunos.create') }}" class="px-6 py-3 bg-primary text-background-dark font-bold rounded-xl hover:bg-primary/90 transition-colors flex items-center gap-2">
            <span class="material-symbols-outlined">add</span>
            Novo Aluno
        </a>
    </div>

    <!-- Search and Filters -->
    <div class="bg-slate-100 dark:bg-slate-900 rounded-xl p-6">
        <form method="GET" class="flex gap-4">
            <input type="text" name="search" placeholder="Buscar aluno..." value="{{ request('search') }}" 
                class="flex-1 bg-slate-50 dark:bg-slate-800 border-2 border-transparent focus:border-primary/50 rounded-xl px-4 py-3">
            <select name="status" class="bg-slate-50 dark:bg-slate-800 border-2 border-transparent focus:border-primary/50 rounded-xl px-4 py-3">
                <option value="">Todos Status</option>
                <option value="ativo" {{ request('status') === 'ativo' ? 'selected' : '' }}>Ativo</option>
                <option value="inativo" {{ request('status') === 'inativo' ? 'selected' : '' }}>Inativo</option>
            </select>
            <button type="submit" class="px-6 py-3 bg-primary text-background-dark font-bold rounded-xl hover:bg-primary/90 transition-colors">
                Filtrar
            </button>
        </form>
    </div>

    <!-- Students Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($alunos as $aluno)
            <div class="bg-slate-100 dark:bg-slate-900 rounded-xl p-6 hover:border-2 hover:border-primary/30 transition-all">
                <div class="flex items-start gap-4 mb-4">
                    <div class="w-16 h-16 rounded-full bg-primary/20 flex items-center justify-center flex-shrink-0">
                        <span class="material-symbols-outlined text-primary text-2xl">person</span>
                    </div>
                    <div class="flex-1">
                        <h3 class="font-bold text-lg mb-1">{{ $aluno->usuario->nome }}</h3>
                        <p class="text-sm text-slate-500 dark:text-slate-400">{{ $aluno->usuario->email }}</p>
                    </div>
                </div>

                <div class="space-y-2 mb-4">
                    @if($aluno->objetivo)
                        <div class="flex items-center gap-2 text-sm">
                            <span class="material-symbols-outlined text-primary text-base">flag</span>
                            <span>{{ Str::limit($aluno->objetivo, 40) }}</span>
                        </div>
                    @endif
                    @if($aluno->data_nascimento)
                        <div class="flex items-center gap-2 text-sm">
                            <span class="material-symbols-outlined text-primary text-base">cake</span>
                            <span>{{ $aluno->data_nascimento->format('d/m/Y') }} ({{ $aluno->data_nascimento->age }} anos)</span>
                        </div>
                    @endif
                </div>

                <div class="flex gap-2">
                    <a href="{{ route('alunos.show', $aluno) }}" class="flex-1 text-center px-4 py-2 bg-primary text-background-dark font-bold rounded-xl hover:bg-primary/90 transition-colors">
                        Ver Perfil
                    </a>
                    <a href="{{ route('alunos.edit', $aluno) }}" class="px-4 py-2 bg-slate-200 dark:bg-slate-800 rounded-xl hover:bg-slate-300 dark:hover:bg-slate-700 transition-colors">
                        <span class="material-symbols-outlined">edit</span>
                    </a>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12">
                <span class="material-symbols-outlined text-slate-400 text-6xl mb-4">group_off</span>
                <p class="text-slate-500 dark:text-slate-400 text-lg">Nenhum aluno encontrado</p>
                <a href="{{ route('alunos.create') }}" class="inline-block mt-4 px-6 py-3 bg-primary text-background-dark font-bold rounded-xl hover:bg-primary/90 transition-colors">
                    Adicionar Primeiro Aluno
                </a>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($alunos->hasPages())
        <div class="flex justify-center">
            {{ $alunos->links() }}
        </div>
    @endif
</div>
@endsection
