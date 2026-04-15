<!DOCTYPE html>
<html class="dark" lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Editar Treino - FitAssist</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
    <style>
        body { font-family: 'Inter', sans-serif; }
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
    </style>
</head>
<body class="bg-slate-50 text-slate-900 dark:bg-[#102210] dark:text-slate-100 min-h-screen">
    <div class="flex min-h-screen">
        @include('components.sidebar')
        <main class="flex-1 p-6 md:p-8">
            <div class="mx-auto max-w-6xl">
                <div class="mb-8 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                    <div>
                        <p class="text-sm text-slate-500 dark:text-slate-400">Treinos / {{ $treino->nome }} / Editar</p>
                        <h1 class="text-3xl font-black">Editar Treino</h1>
                    </div>
                    <div class="flex gap-3">
                        <a href="{{ route('treinos.show', $treino) }}" class="rounded-xl border border-slate-300 px-4 py-2 text-sm font-semibold text-slate-600 transition-colors hover:border-primary hover:text-primary dark:border-white/10 dark:text-slate-300">
                            Cancelar
                        </a>
                        <button form="treinoForm" class="rounded-xl bg-primary px-5 py-2.5 text-sm font-bold text-slate-900 transition-opacity hover:opacity-90">
                            Salvar Alterações
                        </button>
                    </div>
                </div>

                @if(session('error'))
                    <div class="mb-6 rounded-xl border border-red-500/30 bg-red-500/10 px-4 py-3 text-sm text-red-400">
                        {{ session('error') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="mb-6 rounded-xl border border-red-500/30 bg-red-500/10 px-4 py-3">
                        <p class="mb-2 text-sm font-bold text-red-400">Corrija os erros abaixo:</p>
                        <ul class="list-disc pl-5 text-sm text-red-300">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form id="treinoForm" method="POST" action="{{ route('treinos.update', $treino) }}" class="grid gap-8 lg:grid-cols-[1.1fr_0.9fr]">
                    @csrf
                    @method('PUT')

                    <section class="space-y-6">
                        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm dark:border-white/10 dark:bg-[#0f1d0f]">
                            <h2 class="mb-6 text-sm font-bold uppercase tracking-wider text-primary">Informações Básicas</h2>
                            <div class="grid gap-5 md:grid-cols-2">
                                <div class="md:col-span-2">
                                    <label class="mb-2 block text-xs font-semibold uppercase tracking-wide text-slate-500">Nome do treino</label>
                                    <input name="nome" type="text" value="{{ old('nome', $treino->nome) }}" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none transition focus:border-primary focus:ring-0 dark:border-white/10 dark:bg-slate-900/60" required>
                                </div>
                                <div>
                                    <label class="mb-2 block text-xs font-semibold uppercase tracking-wide text-slate-500">Aluno</label>
                                    <select name="aluno_id" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none transition focus:border-primary focus:ring-0 dark:border-white/10 dark:bg-slate-900/60" required>
                                        <option value="">Selecione um aluno</option>
                                        @foreach($alunos as $aluno)
                                            <option value="{{ $aluno->id }}" {{ (string) old('aluno_id', $treino->aluno_id) === (string) $aluno->id ? 'selected' : '' }}>
                                                {{ $aluno->usuario->nome }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label class="mb-2 block text-xs font-semibold uppercase tracking-wide text-slate-500">Status</label>
                                    <select name="status" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none transition focus:border-primary focus:ring-0 dark:border-white/10 dark:bg-slate-900/60" required>
                                        @foreach(['ativo' => 'Ativo', 'inativo' => 'Inativo', 'concluido' => 'Concluído'] as $value => $label)
                                            <option value="{{ $value }}" {{ old('status', $treino->status) === $value ? 'selected' : '' }}>{{ $label }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label class="mb-2 block text-xs font-semibold uppercase tracking-wide text-slate-500">Data de início</label>
                                    <input name="data_inicio" type="date" value="{{ old('data_inicio', optional($treino->data_inicio)->format('Y-m-d')) }}" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none transition focus:border-primary focus:ring-0 dark:border-white/10 dark:bg-slate-900/60" required>
                                </div>
                                <div>
                                    <label class="mb-2 block text-xs font-semibold uppercase tracking-wide text-slate-500">Data de fim</label>
                                    <input name="data_fim" type="date" value="{{ old('data_fim', optional($treino->data_fim)->format('Y-m-d')) }}" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none transition focus:border-primary focus:ring-0 dark:border-white/10 dark:bg-slate-900/60">
                                </div>
                                <div class="md:col-span-2">
                                    <label class="mb-2 block text-xs font-semibold uppercase tracking-wide text-slate-500">Objetivo</label>
                                    <textarea name="objetivo" rows="4" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none transition focus:border-primary focus:ring-0 dark:border-white/10 dark:bg-slate-900/60">{{ old('objetivo', $treino->objetivo) }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm dark:border-white/10 dark:bg-[#0f1d0f]">
                            <div class="mb-6 flex items-center justify-between gap-4">
                                <div>
                                    <h2 class="text-sm font-bold uppercase tracking-wider text-primary">Exercícios do Treino</h2>
                                    <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Atualize a estrutura do treino e a ordem dos exercícios.</p>
                                </div>
                                <button type="button" id="addExercise" class="rounded-xl border border-primary/30 px-4 py-2 text-sm font-bold text-primary transition-colors hover:bg-primary/10">
                                    Adicionar Exercício
                                </button>
                            </div>

                            <div id="exerciseRows" class="space-y-4"></div>
                        </div>
                    </section>

                    <aside class="space-y-6">
                        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm dark:border-white/10 dark:bg-[#0f1d0f]">
                            <h2 class="mb-4 text-sm font-bold uppercase tracking-wider text-primary">Biblioteca Disponível</h2>
                            <div class="space-y-3">
                                @foreach($exercicios as $exercicio)
                                    <button
                                        type="button"
                                        class="exercise-shortcut flex w-full items-start gap-3 rounded-xl border border-slate-200 px-4 py-3 text-left transition-colors hover:border-primary/40 hover:bg-primary/5 dark:border-white/10"
                                        data-id="{{ $exercicio->id }}"
                                    >
                                        <span class="mt-0.5 rounded-lg bg-primary/15 px-2 py-1 text-xs font-bold text-primary">{{ $exercicio->categoria->nome ?? 'Sem categoria' }}</span>
                                        <span class="text-sm font-semibold">{{ $exercicio->nome }}</span>
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    </aside>
                </form>
            </div>
        </main>
    </div>

    <template id="exerciseRowTemplate">
        <div class="exercise-row rounded-2xl border border-slate-200 p-4 dark:border-white/10">
            <div class="mb-4 flex items-center justify-between gap-4">
                <h3 class="text-sm font-bold uppercase tracking-wide text-slate-500">Exercício <span class="exercise-number"></span></h3>
                <button type="button" class="remove-exercise rounded-lg px-3 py-1 text-xs font-bold text-red-400 transition-colors hover:bg-red-500/10">Remover</button>
            </div>
            <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-5">
                <div class="xl:col-span-2">
                    <label class="mb-2 block text-xs font-semibold uppercase tracking-wide text-slate-500">Exercício</label>
                    <select data-field="exercicio_id" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none transition focus:border-primary focus:ring-0 dark:border-white/10 dark:bg-slate-900/60" required>
                        <option value="">Selecione</option>
                        @foreach($exercicios as $exercicio)
                            <option value="{{ $exercicio->id }}">{{ $exercicio->nome }}{{ $exercicio->categoria ? ' - '.$exercicio->categoria->nome : '' }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="mb-2 block text-xs font-semibold uppercase tracking-wide text-slate-500">Séries</label>
                    <input data-field="series" type="number" min="1" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none transition focus:border-primary focus:ring-0 dark:border-white/10 dark:bg-slate-900/60" value="3">
                </div>
                <div>
                    <label class="mb-2 block text-xs font-semibold uppercase tracking-wide text-slate-500">Repetições</label>
                    <input data-field="repeticoes" type="text" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none transition focus:border-primary focus:ring-0 dark:border-white/10 dark:bg-slate-900/60" value="10-12">
                </div>
                <div>
                    <label class="mb-2 block text-xs font-semibold uppercase tracking-wide text-slate-500">Carga</label>
                    <input data-field="carga" type="number" step="0.01" min="0" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none transition focus:border-primary focus:ring-0 dark:border-white/10 dark:bg-slate-900/60">
                </div>
                <div>
                    <label class="mb-2 block text-xs font-semibold uppercase tracking-wide text-slate-500">Descanso</label>
                    <input data-field="descanso" type="text" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none transition focus:border-primary focus:ring-0 dark:border-white/10 dark:bg-slate-900/60" value="60s">
                </div>
                <div class="md:col-span-2 xl:col-span-5">
                    <label class="mb-2 block text-xs font-semibold uppercase tracking-wide text-slate-500">Observações</label>
                    <textarea data-field="observacoes" rows="3" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none transition focus:border-primary focus:ring-0 dark:border-white/10 dark:bg-slate-900/60"></textarea>
                </div>
            </div>
        </div>
    </template>

    <script>
        const exerciseRows = document.getElementById('exerciseRows');
        const template = document.getElementById('exerciseRowTemplate');
        const oldExercises = @json(array_values(old('exercicios', $treino->exercicios->map(fn ($item) => [
            'exercicio_id' => $item->exercicio_id,
            'series' => $item->series,
            'repeticoes' => $item->repeticoes,
            'carga' => $item->carga,
            'descanso' => $item->tempo_descanso ? $item->tempo_descanso . 's' : null,
            'observacoes' => $item->observacoes,
        ])->toArray())));

        function updateRowNames() {
            [...exerciseRows.querySelectorAll('.exercise-row')].forEach((row, index) => {
                row.querySelector('.exercise-number').textContent = index + 1;
                row.querySelectorAll('[data-field]').forEach((field) => {
                    field.name = `exercicios[${index}][${field.dataset.field}]`;
                });
            });
        }

        function addExerciseRow(values = {}) {
            const fragment = template.content.cloneNode(true);
            const row = fragment.querySelector('.exercise-row');

            row.querySelectorAll('[data-field]').forEach((field) => {
                const key = field.dataset.field;
                if (values[key] !== undefined && values[key] !== null) {
                    field.value = values[key];
                }
            });

            row.querySelector('.remove-exercise').addEventListener('click', () => {
                row.remove();
                updateRowNames();
            });

            exerciseRows.appendChild(row);
            updateRowNames();
        }

        document.getElementById('addExercise').addEventListener('click', () => addExerciseRow());

        document.querySelectorAll('.exercise-shortcut').forEach((button) => {
            button.addEventListener('click', () => {
                addExerciseRow({ exercicio_id: button.dataset.id });
            });
        });

        if (oldExercises.length) {
            oldExercises.forEach(addExerciseRow);
        } else {
            addExerciseRow();
        }
    </script>
</body>
</html>
