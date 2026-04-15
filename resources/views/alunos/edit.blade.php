<!DOCTYPE html>
<html class="dark" lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Editar Aluno - FitAssist</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&amp;display=swap" rel="stylesheet" />
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
            <header class="h-16 border-b border-primary/10 flex items-center justify-between px-8 bg-background-light dark:bg-background-dark shrink-0">
                <div class="flex items-center gap-4">
                    <button class="lg:hidden text-slate-900 dark:text-slate-100">
                        <span class="material-symbols-outlined">menu</span>
                    </button>
                    <div>
                        <h1 class="text-lg font-semibold tracking-tight">Editar Aluno</h1>
                        <p class="text-xs text-slate-500 dark:text-slate-400">{{ $aluno->usuario->nome }}</p>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <a href="{{ route('alunos.show', $aluno->id) }}" class="hidden md:block text-slate-600 dark:text-slate-400 hover:text-primary px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                        Cancelar
                    </a>
                    <button type="submit" form="formEditarAluno" class="bg-primary hover:bg-primary/90 text-background-dark px-6 py-2 rounded-lg font-bold text-sm transition-all shadow-lg shadow-primary/10">
                        Salvar Alterações
                    </button>
                </div>
            </header>

            <div class="flex-1 overflow-y-auto bg-slate-50 dark:bg-[#0a150a] p-4 lg:p-8">
                <div class="max-w-5xl mx-auto">
                    @if(session('success'))
                        <div class="mb-6 bg-primary/10 border border-primary/20 rounded-lg p-4 flex items-center gap-3">
                            <span class="material-symbols-outlined text-primary">check_circle</span>
                            <p class="text-sm">{{ session('success') }}</p>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="mb-6 bg-red-500/10 border border-red-500/20 rounded-lg p-4 flex items-center gap-3">
                            <span class="material-symbols-outlined text-red-500">error</span>
                            <p class="text-sm text-red-500">{{ session('error') }}</p>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="mb-6 bg-red-500/10 border border-red-500/20 rounded-lg p-4">
                            <div class="flex items-center gap-3 mb-2">
                                <span class="material-symbols-outlined text-red-500">error</span>
                                <p class="text-sm font-bold text-red-500">Erros de validação:</p>
                            </div>
                            <ul class="list-disc list-inside text-sm text-red-400 space-y-1">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form id="formEditarAluno" action="{{ route('alunos.update', $aluno->id) }}" method="POST" class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                        @csrf
                        @method('PUT')

                        <div class="lg:col-span-8 space-y-6">
                            <section class="bg-background-light dark:bg-background-dark border border-primary/10 rounded-xl p-6 shadow-sm">
                                <h2 class="text-sm font-bold uppercase tracking-wider text-primary mb-6 flex items-center gap-2">
                                    <span class="material-symbols-outlined text-sm">badge</span> INFORMAÇÕES BÁSICAS
                                </h2>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="col-span-1 md:col-span-2">
                                        <label class="block text-xs font-medium mb-2 opacity-70 uppercase tracking-tight">Nome Completo *</label>
                                        <input name="nome" value="{{ old('nome', $aluno->usuario->nome) }}" class="w-full bg-slate-100 dark:bg-slate-900/50 border border-slate-200 dark:border-primary/10 rounded-lg px-4 py-3 focus:ring-1 focus:ring-primary focus:border-primary outline-none text-sm transition-all" placeholder="Digite o nome do aluno" type="text" required />
                                    </div>
                                    <div>
                                        <label class="block text-xs font-medium mb-2 opacity-70 uppercase tracking-tight">E-mail *</label>
                                        <input name="email" value="{{ old('email', $aluno->usuario->email) }}" class="w-full bg-slate-100 dark:bg-slate-900/50 border border-slate-200 dark:border-primary/10 rounded-lg px-4 py-3 focus:ring-1 focus:ring-primary focus:border-primary outline-none text-sm transition-all" placeholder="exemplo@email.com" type="email" required />
                                    </div>
                                    <div>
                                        <label class="block text-xs font-medium mb-2 opacity-70 uppercase tracking-tight">Telefone</label>
                                        <input name="telefone" value="{{ old('telefone', $aluno->usuario->telefone) }}" class="w-full bg-slate-100 dark:bg-slate-900/50 border border-slate-200 dark:border-primary/10 rounded-lg px-4 py-3 focus:ring-1 focus:ring-primary focus:border-primary outline-none text-sm transition-all" placeholder="(00) 00000-0000" type="text" />
                                    </div>
                                    <div>
                                        <label class="block text-xs font-medium mb-2 opacity-70 uppercase tracking-tight">Gênero *</label>
                                        <select name="sexo" class="w-full bg-slate-100 dark:bg-slate-900/50 border border-slate-200 dark:border-primary/10 rounded-lg px-4 py-3 focus:ring-1 focus:ring-primary focus:border-primary outline-none text-sm appearance-none transition-all" required>
                                            <option value="M" {{ old('sexo', $aluno->sexo) == 'M' ? 'selected' : '' }}>Masculino</option>
                                            <option value="F" {{ old('sexo', $aluno->sexo) == 'F' ? 'selected' : '' }}>Feminino</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-xs font-medium mb-2 opacity-70 uppercase tracking-tight">Data de Nascimento *</label>
                                        <input name="data_nascimento" value="{{ old('data_nascimento', optional($aluno->data_nascimento)->format('Y-m-d')) }}" class="w-full bg-slate-100 dark:bg-slate-900/50 border border-slate-200 dark:border-primary/10 rounded-lg px-4 py-3 focus:ring-1 focus:ring-primary focus:border-primary outline-none text-sm transition-all" type="date" required />
                                    </div>
                                </div>
                            </section>
                        </div>

                        <div class="lg:col-span-4 space-y-6">
                            <section class="bg-background-light dark:bg-background-dark border border-primary/10 rounded-xl p-6 shadow-sm sticky top-8">
                                <h2 class="text-sm font-bold uppercase tracking-wider text-primary mb-6 flex items-center gap-2">
                                    <span class="material-symbols-outlined text-sm">target</span> OBJETIVO E INFORMAÇÕES
                                </h2>
                                <div class="space-y-6">
                                    <div>
                                        <label class="block text-xs font-medium mb-2 opacity-70 uppercase tracking-tight">Objetivo do Aluno</label>
                                        <textarea name="objetivo" class="w-full bg-slate-100 dark:bg-slate-900/50 border border-slate-200 dark:border-primary/10 rounded-lg px-4 py-3 focus:ring-1 focus:ring-primary focus:border-primary outline-none text-xs transition-all h-24 resize-none" placeholder="Ex: Ganho de massa muscular, Perda de peso, Condicionamento físico...">{{ old('objetivo', $aluno->objetivo) }}</textarea>
                                    </div>
                                    <div class="p-4 bg-primary/5 rounded-lg border border-primary/10">
                                        <div class="flex justify-between items-center mb-2">
                                            <span class="text-xs font-medium opacity-60">Status da Conta</span>
                                            <span class="text-[10px] font-bold px-2 py-0.5 bg-primary/20 text-primary rounded uppercase">{{ $aluno->usuario->status ? 'Ativo' : 'Inativo' }}</span>
                                        </div>
                                        <p class="text-xs text-slate-500">E-mail verificado:
                                            <span class="font-mono font-bold">{{ $aluno->usuario->email_verified_at ? 'Sim' : 'Não' }}</span>
                                        </p>
                                        <p class="text-[10px] text-slate-400 mt-1">Use esta tela para manter os dados cadastrais sempre atualizados.</p>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </form>
                </div>
            </div>

            <footer class="lg:hidden p-4 bg-background-light dark:bg-background-dark border-t border-primary/10 shrink-0">
                <button type="submit" form="formEditarAluno" class="w-full bg-primary text-background-dark py-3 rounded-xl font-bold text-base shadow-lg shadow-primary/20">
                    Salvar Alterações
                </button>
            </footer>
        </main>
    </div>
</body>

</html>
