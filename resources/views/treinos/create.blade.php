<!DOCTYPE html>

<html class="dark" lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#0df20d",
                        "background-light": "#f5f8f5",
                        "background-dark": "#102210",
                    },
                    fontFamily: {
                        "display": ["Inter"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100 antialiased min-h-screen">
    <div class="flex h-screen overflow-hidden">
        @include('components.sidebar')
        <main class="flex-1 flex flex-col overflow-hidden">
            <form id="treinoForm" method="POST" action="{{ route('treinos.store') }}" class="flex-1 flex flex-col overflow-hidden">
                @csrf
                <header class="h-16 border-b border-primary/10 flex items-center justify-between px-8 bg-background-light dark:bg-background-dark">
                    <div class="flex items-center gap-4">
                        <button type="button" class="lg:hidden text-slate-100">
                            <span class="material-symbols-outlined">menu</span>
                        </button>
                        <h1 class="text-lg font-semibold tracking-tight">Criar Novo Treino</h1>
                    </div>
                    <div class="flex items-center gap-4">
                        <a href="{{ route('treinos.index') }}" class="hidden md:block text-slate-600 dark:text-slate-400 hover:text-primary px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                            Cancelar
                        </a>
                        <button type="submit" class="bg-primary hover:bg-primary/90 text-background-dark px-4 py-2 rounded-lg font-bold text-sm transition-all shadow-lg shadow-primary/10">
                            Salvar Treino
                        </button>
                    </div>
                </header>

                <div class="flex-1 overflow-y-auto bg-slate-50 dark:bg-[#0a150a] p-4 lg:p-8">
                    <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-8">
                        <div class="lg:col-span-8 space-y-6">
                            @if(session('error'))
                                <div class="rounded-xl border border-red-500/20 bg-red-500/10 px-4 py-3 text-sm text-red-400">
                                    {{ session('error') }}
                                </div>
                            @endif

                            @if($errors->any())
                                <div class="rounded-xl border border-red-500/20 bg-red-500/10 px-4 py-3">
                                    <p class="mb-2 text-sm font-bold text-red-400">Corrija os erros abaixo:</p>
                                    <ul class="list-disc pl-5 text-sm text-red-300">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <section class="bg-background-light dark:bg-background-dark border border-primary/10 rounded-xl p-6 shadow-sm">
                                <h2 class="text-sm font-bold uppercase tracking-wider text-primary mb-6 flex items-center gap-2">
                                    <span class="material-symbols-outlined text-sm">info</span> Informações Básicas
                                </h2>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="col-span-1 md:col-span-2">
                                        <label class="block text-xs font-medium mb-2 opacity-70 uppercase tracking-tight">Nome do Treino</label>
                                        <input name="nome" required class="w-full bg-slate-100 dark:bg-slate-900/50 border border-slate-200 dark:border-primary/10 rounded-lg px-4 py-3 focus:ring-1 focus:ring-primary focus:border-primary outline-none text-sm transition-all" placeholder="Ex: Treino A - Hipertrofia de Peitoral" type="text" value="{{ old('nome') }}" />
                                    </div>
                                    <div>
                                        <label class="block text-xs font-medium mb-2 opacity-70 uppercase tracking-tight">Aluno</label>
                                        <select name="aluno_id" class="w-full bg-slate-100 dark:bg-slate-900/50 border border-slate-200 dark:border-primary/10 rounded-lg px-4 py-3 focus:ring-1 focus:ring-primary focus:border-primary outline-none text-sm appearance-none transition-all" required>
                                            <option value="">Selecione o aluno</option>
                                            @foreach($alunos as $aluno)
                                                <option value="{{ $aluno->id }}" {{ (string) old('aluno_id', $selectedAlunoId) === (string) $aluno->id ? 'selected' : '' }}>
                                                    {{ $aluno->usuario->nome }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-xs font-medium mb-2 opacity-70 uppercase tracking-tight">Status</label>
                                        <select name="status" class="w-full bg-slate-100 dark:bg-slate-900/50 border border-slate-200 dark:border-primary/10 rounded-lg px-4 py-3 focus:ring-1 focus:ring-primary focus:border-primary outline-none text-sm appearance-none transition-all" required>
                                            @foreach(['ativo' => 'Ativo', 'inativo' => 'Inativo', 'concluido' => 'Concluído'] as $value => $label)
                                                <option value="{{ $value }}" {{ old('status', 'ativo') === $value ? 'selected' : '' }}>{{ $label }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-xs font-medium mb-2 opacity-70 uppercase tracking-tight">Data de Início</label>
                                        <input name="data_inicio" class="w-full bg-slate-100 dark:bg-slate-900/50 border border-slate-200 dark:border-primary/10 rounded-lg px-4 py-3 focus:ring-1 focus:ring-primary focus:border-primary outline-none text-sm transition-all" type="date" value="{{ old('data_inicio', now()->format('Y-m-d')) }}" required />
                                    </div>
                                    <div>
                                        <label class="block text-xs font-medium mb-2 opacity-70 uppercase tracking-tight">Data de Fim</label>
                                        <input name="data_fim" class="w-full bg-slate-100 dark:bg-slate-900/50 border border-slate-200 dark:border-primary/10 rounded-lg px-4 py-3 focus:ring-1 focus:ring-primary focus:border-primary outline-none text-sm transition-all" type="date" value="{{ old('data_fim') }}" />
                                    </div>
                                    <div class="col-span-1 md:col-span-2">
                                        <label class="block text-xs font-medium mb-2 opacity-70 uppercase tracking-tight">Objetivo</label>
                                        <textarea name="objetivo" class="w-full bg-slate-100 dark:bg-slate-900/50 border border-slate-200 dark:border-primary/10 rounded-lg px-4 py-3 focus:ring-1 focus:ring-primary focus:border-primary outline-none text-xs transition-all h-24 resize-none" placeholder="Ex: Ganho de massa muscular, condicionamento ou reabilitação.">{{ old('objetivo') }}</textarea>
                                    </div>
                                </div>
                            </section>

                            <section class="space-y-4">
                                <div class="flex items-center justify-between mb-2">
                                    <h2 class="text-lg font-bold">Plano de Exercícios</h2>
                                    <span id="exercicioCount" class="text-xs text-slate-400 bg-slate-800 px-2 py-1 rounded">0 exercícios adicionados</span>
                                </div>
                                <div id="exerciciosList" class="space-y-4"></div>
                                <button type="button" id="addExercise" class="w-full py-4 border-2 border-dashed border-primary/20 rounded-xl text-primary font-bold hover:bg-primary/5 transition-all flex items-center justify-center gap-2 group">
                                    <span class="material-symbols-outlined group-hover:scale-110 transition-transform">add_circle</span>
                                    Adicionar Manualmente
                                </button>
                            </section>
                        </div>

                        <div class="lg:col-span-4 space-y-6">
                            <section class="bg-background-light dark:bg-background-dark border border-primary/10 rounded-xl overflow-hidden flex flex-col h-[calc(100vh-12rem)] shadow-lg sticky top-0">
                                <div class="p-4 border-b border-primary/10 bg-primary/5">
                                    <h2 class="font-bold flex items-center gap-2 mb-4">
                                        <span class="material-symbols-outlined text-primary">search</span>
                                        Biblioteca de Exercícios
                                    </h2>
                                    <p class="text-xs text-slate-500 dark:text-slate-400">Clique em um exercício para adicioná-lo ao treino.</p>
                                </div>
                                <div class="flex-1 overflow-y-auto p-4 space-y-3">
                                    @forelse($exercicios as $exercicio)
                                        <div
                                            onclick="adicionarExercicioDaBiblioteca('{{ addslashes($exercicio->nome) }}', '{{ addslashes($exercicio->categoria->nome ?? 'Sem categoria') }}', '{{ $exercicio->id }}')"
                                            class="group flex items-center gap-3 p-3 rounded-lg hover:bg-primary/10 border border-transparent hover:border-primary/20 cursor-pointer transition-all"
                                        >
                                            <div class="size-12 rounded bg-slate-800 flex-shrink-0 overflow-hidden flex items-center justify-center">
                                                <span class="material-symbols-outlined text-primary">fitness_center</span>
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <p class="text-xs font-bold truncate">{{ $exercicio->nome }}</p>
                                                <p class="text-[10px] text-primary opacity-80 uppercase">{{ $exercicio->categoria->nome ?? 'Sem categoria' }}</p>
                                            </div>
                                            <span class="material-symbols-outlined text-slate-500 group-hover:text-primary transition-colors">add</span>
                                        </div>
                                    @empty
                                        <p class="text-sm text-slate-500 dark:text-slate-400">Nenhum exercício cadastrado para este personal.</p>
                                    @endforelse
                                </div>
                            </section>
                        </div>
                    </div>
                </div>

                <footer class="lg:hidden p-4 bg-background-light dark:bg-background-dark border-t border-primary/10">
                    <button type="submit" class="w-full bg-primary text-background-dark py-3 rounded-xl font-bold text-base shadow-lg shadow-primary/20">
                        Salvar Treino
                    </button>
                </footer>
            </form>
        </main>
    </div>

    <template id="exerciseRowTemplate">
        <div class="bg-background-light dark:bg-background-dark border border-primary/10 rounded-xl p-4 md:p-6 shadow-sm group exercise-row">
            <div class="flex flex-col md:flex-row gap-6">
                <div class="w-full md:w-32 h-24 rounded-lg bg-slate-100 dark:bg-slate-800 overflow-hidden relative border border-primary/5 flex items-center justify-center">
                    <span class="material-symbols-outlined text-3xl text-primary/70">fitness_center</span>
                </div>
                <div class="flex-1 space-y-4">
                    <div class="flex items-start justify-between">
                        <div class="min-w-0">
                            <h3 class="font-bold text-lg exercise-title">Novo Exercício</h3>
                            <p class="text-xs text-primary font-medium exercise-category">Selecione abaixo</p>
                        </div>
                        <button type="button" class="text-slate-500 hover:text-red-500 transition-colors remove-exercise">
                            <span class="material-symbols-outlined">delete</span>
                        </button>
                    </div>

                    <div>
                        <label class="text-[10px] uppercase font-bold opacity-50 mb-1 block">Exercício da Biblioteca</label>
                        <select data-field="exercicio_id" class="w-full bg-slate-100 dark:bg-slate-900 border border-primary/10 rounded px-3 py-2 text-sm focus:ring-1 focus:ring-primary outline-none exercise-select" required>
                            <option value="">Selecione um exercício</option>
                            @foreach($exercicios as $exercicio)
                                <option value="{{ $exercicio->id }}" data-nome="{{ $exercicio->nome }}" data-categoria="{{ $exercicio->categoria->nome ?? 'Sem categoria' }}">
                                    {{ $exercicio->nome }}{{ $exercicio->categoria ? ' - '.$exercicio->categoria->nome : '' }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div class="space-y-1">
                            <label class="text-[10px] uppercase font-bold opacity-50">Séries</label>
                            <input data-field="series" class="w-full bg-slate-100 dark:bg-slate-900 border border-primary/10 rounded px-3 py-2 text-sm focus:ring-1 focus:ring-primary outline-none" type="number" min="1" value="3" />
                        </div>
                        <div class="space-y-1">
                            <label class="text-[10px] uppercase font-bold opacity-50">Repetições</label>
                            <input data-field="repeticoes" class="w-full bg-slate-100 dark:bg-slate-900 border border-primary/10 rounded px-3 py-2 text-sm focus:ring-1 focus:ring-primary outline-none" type="text" value="10-12" />
                        </div>
                        <div class="space-y-1">
                            <label class="text-[10px] uppercase font-bold opacity-50">Carga (kg)</label>
                            <input data-field="carga" class="w-full bg-slate-100 dark:bg-slate-900 border border-primary/10 rounded px-3 py-2 text-sm focus:ring-1 focus:ring-primary outline-none" type="number" min="0" step="0.01" value="" />
                        </div>
                        <div class="space-y-1">
                            <label class="text-[10px] uppercase font-bold opacity-50">Descanso</label>
                            <input data-field="descanso" class="w-full bg-slate-100 dark:bg-slate-900 border border-primary/10 rounded px-3 py-2 text-sm focus:ring-1 focus:ring-primary outline-none" type="text" value="60s" />
                        </div>
                    </div>
                    <div>
                        <label class="text-[10px] uppercase font-bold opacity-50 mb-1 block">Observações para o aluno</label>
                        <textarea data-field="observacoes" class="w-full bg-slate-100 dark:bg-slate-900 border border-primary/10 rounded px-3 py-2 text-xs focus:ring-1 focus:ring-primary outline-none h-16 resize-none" placeholder="Ex: Focar na cadência e não encostar a barra no peito"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </template>

    <script>
        const exerciseRows = document.getElementById('exerciciosList');
        const template = document.getElementById('exerciseRowTemplate');
        const oldExercises = @json(array_values(old('exercicios', [])));

        function updateRowNames() {
            [...exerciseRows.querySelectorAll('.exercise-row')].forEach((row, index) => {
                row.querySelectorAll('[data-field]').forEach((field) => {
                    field.name = `exercicios[${index}][${field.dataset.field}]`;
                });
            });
            atualizarContador();
        }

        function updateExerciseHeader(row) {
            const select = row.querySelector('.exercise-select');
            const selected = select.options[select.selectedIndex];
            row.querySelector('.exercise-title').textContent = selected?.dataset?.nome || 'Novo Exercício';
            row.querySelector('.exercise-category').textContent = selected?.dataset?.categoria || 'Selecione abaixo';
        }

        function addExerciseRow(values = {}) {
            const fragment = template.content.cloneNode(true);
            const row = fragment.querySelector('.exercise-row');
            const select = row.querySelector('.exercise-select');

            row.querySelectorAll('[data-field]').forEach((field) => {
                const key = field.dataset.field;
                if (values[key] !== undefined && values[key] !== null) {
                    field.value = values[key];
                }
            });

            select.addEventListener('change', () => updateExerciseHeader(row));

            row.querySelector('.remove-exercise').addEventListener('click', () => {
                row.remove();
                updateRowNames();
            });

            exerciseRows.appendChild(row);
            updateExerciseHeader(row);
            updateRowNames();
        }

        function adicionarExercicioDaBiblioteca(nome, categoria, exercicioId) {
            addExerciseRow({
                exercicio_id: exercicioId,
            });
        }

        document.getElementById('addExercise').addEventListener('click', () => addExerciseRow());

        function atualizarContador() {
            const count = exerciseRows.querySelectorAll('.exercise-row').length;
            document.getElementById('exercicioCount').textContent = `${count} exercício${count !== 1 ? 's' : ''} adicionado${count !== 1 ? 's' : ''}`;
        }

        if (oldExercises.length) {
            oldExercises.forEach(addExerciseRow);
        } else {
            addExerciseRow();
        }
    </script>
</body>

</html>
