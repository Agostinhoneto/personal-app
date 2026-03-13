<!DOCTYPE html>
<html class="dark" lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100..700,0..1&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />

    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#0df20d",
                        "background-light": "#f5f8f5",
                        "background-dark": "#0a0c0a",
                    },
                    fontFamily: {
                        "display": ["Inter", "sans-serif"]
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
            font-variation-settings: 'FILL' 0,
                'wght' 400,
                'GRAD' 0,
                'opsz' 24;
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100 min-h-screen">

    <div class="flex h-screen overflow-hidden">

        <!-- Sidebar -->
        <aside class="w-64 flex flex-col bg-slate-900/50 dark:bg-slate-950/50 border-r border-slate-200 dark:border-white/10">

            <div class="p-6 flex items-center gap-3">
                <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center text-background-dark">
                    <span class="material-symbols-outlined font-bold">fitness_center</span>
                </div>

                <div>
                    <h1 class="text-lg font-bold tracking-tight">FitAssist</h1>
                    <p class="text-xs text-slate-500 dark:text-slate-400">Professional Training</p>
                </div>
            </div>

            <nav class="flex-1 px-4 space-y-1">

                <a class="flex items-center gap-3 px-3 py-2 rounded-lg text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-white/5 transition-colors"
                    href="{{ route('dashboard') }}">
                    <span class="material-symbols-outlined">dashboard</span>
                    <span class="text-sm font-medium">Dashboard</span>
                </a>

                <a class="flex items-center gap-3 px-3 py-2 rounded-lg text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-white/5 transition-colors"
                    href="{{ route('treinos.index') }}">
                    <span class="material-symbols-outlined">exercise</span>
                    <span class="text-sm font-medium">Treinos</span>
                </a>

                <a class="flex items-center gap-3 px-3 py-2 rounded-lg text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-white/5 transition-colors"
                    href="">
                    <span class="material-symbols-outlined">library_books</span>
                    <span class="text-sm font-medium">Biblioteca</span>
                </a>

                <a class="flex items-center gap-3 px-3 py-2 rounded-lg bg-primary/10 text-primary transition-colors"
                    href="{{ route('alunos.index') }}">
                    <span class="material-symbols-outlined">group</span>
                    <span class="text-sm font-medium">Alunos</span>
                </a>

            </nav>

            <div class="p-4 border-t border-slate-200 dark:border-white/10">

                <div class="bg-primary/5 rounded-xl p-4 mb-4">
                    <p class="text-xs font-bold text-primary uppercase tracking-wider mb-2">Plano Pro</p>

                    <button class="w-full py-2 bg-primary text-background-dark text-xs font-bold rounded-lg hover:brightness-110 transition-all">
                        UPGRADE PLANO
                    </button>
                </div>

                <div class="flex items-center gap-3 px-2">

                    <div class="w-10 h-10 rounded-full bg-slate-800 border border-white/10 overflow-hidden">
                        <img class="w-full h-full object-cover"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuBRMoKH5b_Ql4pCCg7pn0t_K8SDQEwS_T60V2UjovqT56kHg2HYbb2q92SdvydFeQvlW0fxbZuivPDdgFhV46mJGRGSfN1RlTg9rABzu_9-UVTk9JmSPYO91ZiOU12-F3P9CN5eu6MG1vrourIR2hFMTN0-QbPpLwy0v_K1kaLbwjWkFS7WPJH7VHs3swaDSW3KAq0LKxIlYQ04DRhyyc7skXVx-0LAFnIkhYUAdd6ls9A3q9HBGzNkPts2qQOfzW5hSm1padliUF4a" />
                    </div>

                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-bold truncate">Marcos Silva</p>
                        <p class="text-xs text-slate-500 truncate">Personal Trainer</p>
                    </div>

                    <span class="material-symbols-outlined text-slate-500 cursor-pointer hover:text-white transition-colors">
                        settings
                    </span>

                </div>

            </div>

        </aside>

        <!-- Conteúdo -->
        <main class="flex-1 flex flex-col overflow-y-auto">

            <header class="h-16 border-b border-slate-200 dark:border-white/10 flex items-center justify-between px-8 bg-background-light dark:bg-background-dark/80 backdrop-blur-md sticky top-0 z-10">

                <div class="flex items-center gap-2 text-sm">
                    <a class="text-slate-500 hover:text-primary transition-colors"
                        href="{{ route('alunos.index') }}">Alunos</a>

                    <span class="text-slate-600">/</span>

                    <span class="font-medium text-slate-900 dark:text-slate-100">
                        {{ $aluno->nome }}
                    </span>
                </div>

                <div class="flex items-center gap-4">

                    <button onclick="window.location.href='{{ route('alunos.edit',$aluno->id) }}'"
                        class="p-2 rounded-lg bg-slate-100 dark:bg-white/5 text-slate-500 hover:text-primary transition-colors">
                        <span class="material-symbols-outlined">edit</span>
                    </button>

                    <button onclick="if(confirm('Deseja excluir este aluno?')){document.getElementById('delete-aluno').submit();}"
                        class="p-2 rounded-lg bg-slate-100 dark:bg-white/5 text-slate-500 hover:text-red-500 transition-colors">
                        <span class="material-symbols-outlined">delete</span>
                    </button>

                </div>

            </header>

            <form id="delete-aluno"
                action="{{ route('alunos.destroy',$aluno->id) }}"
                method="POST"
                class="hidden">
                @csrf
                @method('DELETE')
            </form>

            <div class="max-w-6xl w-full mx-auto p-8 space-y-8">

                <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">

                    <div class="flex items-center gap-6">

                        <div class="w-24 h-24 rounded-full border-4 border-primary/20 p-1">
                            <img class="w-full h-full rounded-full object-cover"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuAbq-OM1ItKnk4w-V2R_Mv24I0yT7zp-mWQueR6_ySOOuU2Qz7yFBtF6nrDGDkN3sf1g1M6z0xji7j49umqAHXSIhIY4VLGG8E943NcUTZO3lZ9qz2b-C6hvXSWkmxGs49nAeO0ozBXXMMa9KwPNnhGIGDE0F8eXW_TzA-bcgvDd-M_aVELjx_Mmvz5E5Xn7MSBcK1BqZDfPBfNMHs0WLRo7rcQXh5uNVt7Rk56jGFQzpo2G1ZZcOXsSqRXaAKSvZ_SHeUe49N0vWIv" />
                        </div>

                        <div>
                            <h2 class="text-3xl font-bold text-slate-900 dark:text-slate-100">
                                {{ $aluno->nome }}
                            </h2>

                            <p class="text-slate-500 dark:text-slate-400">
                                {{ $aluno->email }}
                            </p>
                        </div>

                    </div>

                    <a class="inline-flex items-center justify-center px-4 py-2 rounded-lg bg-white/5 border border-white/10 text-sm font-medium hover:bg-white/10 transition-colors"
                        href="{{ route('alunos.index') }}">

                        <span class="material-symbols-outlined text-lg mr-2">arrow_back</span>
                        Voltar para Alunos

                    </a>

                </div>

                <div class="space-y-6">

                    <div class="flex border-b border-slate-200 dark:border-white/10">

                        <button class="px-6 py-3 border-b-2 border-primary text-primary font-bold text-sm">
                            Treinos
                        </button>

                        <button class="px-6 py-3 text-slate-500 hover:text-slate-900 dark:hover:text-slate-100 font-medium text-sm transition-colors">
                            Avaliações
                        </button>

                        <button class="px-6 py-3 text-slate-500 hover:text-slate-900 dark:hover:text-slate-100 font-medium text-sm transition-colors">
                            Nutrição
                        </button>

                    </div>

                    <div class="space-y-4">

                        <div class="flex items-center justify-between">

                            <h3 class="text-lg font-bold">Planos de Treino</h3>
                            <a href="{{ route('treinos.create', ['aluno_id' => $aluno->id]) }}"
                                class="flex items-center gap-2 px-4 py-2 bg-primary text-background-dark font-bold text-sm rounded-lg hover:brightness-110 transition-all">
                                <span class="material-symbols-outlined text-lg">add</span>
                                Novo Treino
                            </a>
                        </div>
                        <div class="flex flex-col items-center justify-center py-20 bg-white/5 rounded-2xl border-2 border-dashed border-white/5">
                            <div class="w-16 h-16 rounded-full bg-white/5 flex items-center justify-center mb-4">
                                <span class="material-symbols-outlined text-slate-500 text-3xl">
                                    fitness_center
                                </span>
                            </div>
                            <p class="text-lg font-medium text-slate-400">
                                Nenhum treino cadastrado
                            </p>
                            <p class="text-sm text-slate-500 mt-1 text-center max-w-xs">
                                Comece criando um novo plano de exercícios personalizado para o {{ $aluno->nome }}.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>