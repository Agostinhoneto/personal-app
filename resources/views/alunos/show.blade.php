@extends('layouts.app')

@section('title', 'Detalhes do Aluno')

@section('content')
<div class="space-y-6">
    <!-- Back Button -->
    <a href="{{ route('alunos.index') }}" class="inline-flex items-center gap-2 text-slate-500 hover:text-primary transition-colors">
        <span class="material-symbols-outlined">arrow_back</span>
        Voltar para Alunos
    </a>

    <!-- Student Profile Header -->
    <div class="bg-slate-100 dark:bg-slate-900 rounded-xl p-8">
        <div class="flex items-start gap-6">
            <div class="w-24 h-24 rounded-full bg-primary/20 flex items-center justify-center flex-shrink-0">
                <span class="material-symbols-outlined text-primary text-5xl">person</span>
            </div>
            <div class="flex-1">
                <h1 class="text-4xl font-black mb-2">{{ $aluno->usuario->nome }}</h1>
                <p class="text-slate-500 dark:text-slate-400 mb-4">{{ $aluno->usuario->email }}</p>
                
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    @if($aluno->data_nascimento)
                        <div>
                            <p class="text-xs text-slate-500 dark:text-slate-400 mb-1">Idade</p>
                            <p class="font-bold">{{ $aluno->data_nascimento->age }} anos</p>
                        </div>
                    @endif
                    @if($aluno->sexo)
                        <div>
                            <p class="text-xs text-slate-500 dark:text-slate-400 mb-1">Sexo</p>
                            <p class="font-bold">{{ $aluno->sexo === 'M' ? 'Masculino' : 'Feminino' }}</p>
                        </div>
                    @endif
                    <div>
                        <p class="text-xs text-slate-500 dark:text-slate-400 mb-1">Telefone</p>
                        <p class="font-bold">{{ $aluno->usuario->telefone ?? 'Não informado' }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-slate-500 dark:text-slate-400 mb-1">Status</p>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold {{ $aluno->usuario->status ? 'bg-primary/10 text-primary' : 'bg-red-500/10 text-red-500' }}">
                            {{ $aluno->usuario->status ? 'Ativo' : 'Inativo' }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('alunos.edit', $aluno) }}" class="px-4 py-2 bg-primary text-background-dark font-bold rounded-xl hover:bg-primary/90 transition-colors">
                    <span class="material-symbols-outlined">edit</span>
                </a>
            </div>
        </div>

        @if($aluno->objetivo)
            <div class="mt-6 p-4 bg-slate-50 dark:bg-slate-800 rounded-xl">
                <p class="text-xs text-slate-500 dark:text-slate-400 mb-2">Objetivo</p>
                <p class="font-semibold">{{ $aluno->objetivo }}</p>
            </div>
        @endif
    </div>

    <!-- Tabs -->
    <div class="bg-slate-100 dark:bg-slate-900 rounded-xl overflow-hidden">
        <div class="flex border-b border-slate-200 dark:border-slate-800">
            <button class="tab-button active px-6 py-4 font-bold" data-tab="treinos">Treinos</button>
            <button class="tab-button px-6 py-4 font-bold" data-tab="avaliacoes">Avaliações</button>
            <button class="tab-button px-6 py-4 font-bold" data-tab="nutricao">Nutrição</button>
        </div>

        <!-- Treinos Tab -->
        <div id="treinos-tab" class="tab-content p-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-2xl font-bold">Treinos</h2>
                <a href="{{ route('treinos.create', ['aluno_id' => $aluno->id]) }}" class="px-4 py-2 bg-primary text-background-dark font-bold rounded-xl hover:bg-primary/90 transition-colors">
                    + Novo Treino
                </a>
            </div>
            <div class="space-y-4">
                @forelse($aluno->treinos as $treino)
                    <div class="flex items-center gap-4 p-4 bg-slate-50 dark:bg-slate-800 rounded-xl">
                        <span class="material-symbols-outlined text-primary text-3xl">assignment</span>
                        <div class="flex-1">
                            <h3 class="font-bold">{{ $treino->nome }}</h3>
                            <p class="text-sm text-slate-500 dark:text-slate-400">
                                {{ $treino->data_inicio->format('d/m/Y') }} - 
                                {{ $treino->data_fim ? $treino->data_fim->format('d/m/Y') : 'Atual' }}
                            </p>
                        </div>
                        <span class="px-3 py-1 rounded-full text-xs font-bold 
                            {{ $treino->status === 'ativo' ? 'bg-primary/10 text-primary' : ($treino->status === 'concluido' ? 'bg-blue-500/10 text-blue-500' : 'bg-slate-500/10 text-slate-500') }}">
                            {{ ucfirst($treino->status) }}
                        </span>
                        <a href="{{ route('treinos.show', $treino) }}" class="px-4 py-2 bg-primary text-background-dark font-bold rounded-xl hover:bg-primary/90 transition-colors">
                            Ver
                        </a>
                    </div>
                @empty
                    <p class="text-center text-slate-500 dark:text-slate-400 py-8">Nenhum treino cadastrado</p>
                @endforelse
            </div>
        </div>

        <!-- Avaliacoes Tab -->
        <div id="avaliacoes-tab" class="tab-content hidden p-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-2xl font-bold">Avaliações Físicas</h2>
                <a href="{{ route('avaliacoes.create', ['aluno_id' => $aluno->id]) }}" class="px-4 py-2 bg-primary text-background-dark font-bold rounded-xl hover:bg-primary/90 transition-colors">
                    + Nova Avaliação
                </a>
            </div>
            <div class="space-y-4">
                @forelse($aluno->avaliacoes->take(5) as $avaliacao)
                    <div class="flex items-center gap-4 p-4 bg-slate-50 dark:bg-slate-800 rounded-xl">
                        <span class="material-symbols-outlined text-purple-500 text-3xl">monitoring</span>
                        <div class="flex-1 grid grid-cols-4 gap-4">
                            <div>
                                <p class="text-xs text-slate-500 dark:text-slate-400">Data</p>
                                <p class="font-bold">{{ $avaliacao->data_avaliacao->format('d/m/Y') }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500 dark:text-slate-400">Peso</p>
                                <p class="font-bold">{{ $avaliacao->peso }} kg</p>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500 dark:text-slate-400">IMC</p>
                                <p class="font-bold">{{ $avaliacao->imc }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500 dark:text-slate-400">% Gordura</p>
                                <p class="font-bold">{{ $avaliacao->gordura_corporal }}%</p>
                            </div>
                        </div>
                        <a href="{{ route('avaliacoes.show', $avaliacao) }}" class="px-4 py-2 bg-purple-500 text-white font-bold rounded-xl hover:bg-purple-600 transition-colors">
                            Ver
                        </a>
                    </div>
                @empty
                    <p class="text-center text-slate-500 dark:text-slate-400 py-8">Nenhuma avaliação realizada</p>
                @endforelse
            </div>
        </div>

        <!-- Nutricao Tab -->
        <div id="nutricao-tab" class="tab-content hidden p-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-2xl font-bold">Planos Alimentares</h2>
                <a href="{{ route('planos-alimentares.create', ['aluno_id' => $aluno->id]) }}" class="px-4 py-2 bg-primary text-background-dark font-bold rounded-xl hover:bg-primary/90 transition-colors">
                    + Novo Plano
                </a>
            </div>
            <div class="space-y-4">
                @forelse($aluno->planosAlimentares as $plano)
                    <div class="flex items-center gap-4 p-4 bg-slate-50 dark:bg-slate-800 rounded-xl">
                        <span class="material-symbols-outlined text-orange-500 text-3xl">restaurant</span>
                        <div class="flex-1">
                            <h3 class="font-bold">{{ $plano->nome }}</h3>
                            <p class="text-sm text-slate-500 dark:text-slate-400">
                                {{ $plano->calorias_diarias }} kcal/dia - 
                                {{ $plano->data_inicio->format('d/m/Y') }}
                            </p>
                        </div>
                        <a href="{{ route('planos-alimentares.show', $plano) }}" class="px-4 py-2 bg-orange-500 text-white font-bold rounded-xl hover:bg-orange-600 transition-colors">
                            Ver
                        </a>
                    </div>
                @empty
                    <p class="text-center text-slate-500 dark:text-slate-400 py-8">Nenhum plano alimentar cadastrado</p>
                @endforelse
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.querySelectorAll('.tab-button').forEach(button => {
        button.addEventListener('click', () => {
            const tabName = button.dataset.tab;
            
            // Update buttons
            document.querySelectorAll('.tab-button').forEach(btn => btn.classList.remove('active', 'text-primary', 'border-b-2', 'border-primary'));
            button.classList.add('active', 'text-primary', 'border-b-2', 'border-primary');
            
            // Update content
            document.querySelectorAll('.tab-content').forEach(content => content.classList.add('hidden'));
            document.getElementById(tabName + '-tab').classList.remove('hidden');
        });
    });
</script>
@endpush
@endsection
