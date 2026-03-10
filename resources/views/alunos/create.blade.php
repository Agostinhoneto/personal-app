<!DOCTYPE html>
<html class="dark" lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Criar Novo Aluno - FitAssist</title>
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

        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100 antialiased min-h-screen">
    <div class="flex h-screen overflow-hidden">
        <aside class="w-64 border-r border-primary/10 bg-background-light dark:bg-background-dark flex flex-col hidden lg:flex">
            <div class="p-6 flex items-center gap-3">
                <div class="size-8 bg-primary rounded flex items-center justify-center text-background-dark">
                    <span class="material-symbols-outlined font-bold">exercise</span>
                </div>
                <h2 class="text-xl font-bold tracking-tight text-slate-900 dark:text-slate-100">FitAssist</h2>
            </div>
                   @include('components.sidebar')

            <div class="p-4 border-t border-primary/10">
                <div class="flex items-center gap-3 p-2">
                    <div class="size-10 rounded-full bg-primary/30 flex items-center justify-center overflow-hidden border border-primary/50">
                        <img class="w-full h-full object-cover" data-alt="Profile photo of a professional gym trainer" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBTerw4bBXGYk7KIxnKBtfcgc8RGhdu7r1bzX2RQGHGUNRqPlVQFFGOGh0jwy2jNCRLDoJJ3lu0rb0EKXfPM40q2Oauz80tyxAjMwZ7XYs_oAbOkCltDcA3X_MpSUuP5CwT4egofPShZyOXaolUGdyyUK08r47oZd987fsDLrOnsmeeQSAGjXVY1UuASVvC9T3KYOnPAvs0R5j5QlKkt3wMTZzjcRWknGuUo_akXXQmv35jAiXImLKM9Yq8Xoxk4MhtvP7FZjUfn-C7" />
                    </div>
                    <div>
                        <p class="text-xs font-bold text-slate-900 dark:text-slate-100">Marcos Silva</p>
                        <p class="text-[10px] opacity-60 text-slate-600 dark:text-slate-400">Personal Trainer</p>
                    </div>
                </div>
            </div>
        </aside>
        <main class="flex-1 flex flex-col overflow-hidden">
            <header class="h-16 border-b border-primary/10 flex items-center justify-between px-8 bg-background-light dark:bg-background-dark shrink-0">
                <div class="flex items-center gap-4">
                    <button class="lg:hidden text-slate-900 dark:text-slate-100">
                        <span class="material-symbols-outlined">menu</span>
                    </button>
                    <h1 class="text-lg font-semibold tracking-tight">Criar Novo Aluno</h1>
                </div>
                <div class="flex items-center gap-4">
                    <button type="button" class="size-10 flex items-center justify-center rounded-lg bg-slate-100 dark:bg-slate-800/50 text-slate-500 dark:text-slate-400 hover:text-primary transition-colors">
                        <span class="material-symbols-outlined">notifications</span>
                    </button>
                    <a href="{{ route('alunos.index') }}" class="hidden md:block text-slate-600 dark:text-slate-400 hover:text-primary px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                        Cancelar
                    </a>
                    <button type="submit" class="bg-primary hover:bg-primary/90 text-background-dark px-6 py-2 rounded-lg font-bold text-sm transition-all shadow-lg shadow-primary/10">
                        Salvar Aluno
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

                    <form action="{{ route('alunos.store') }}" method="POST" class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                        @csrf
                        <div class="lg:col-span-8 space-y-6">
                            <div class="bg-background-light dark:bg-background-dark border border-primary/10 rounded-xl p-6 shadow-sm flex flex-col md:flex-row items-center gap-6">
                                <div class="relative group">
                                    <div class="size-28 rounded-full bg-slate-200 dark:bg-slate-800 border-2 border-dashed border-primary/30 flex items-center justify-center overflow-hidden">
                                        <span class="material-symbols-outlined text-4xl opacity-20">person</span>
                                    </div>
                                    <button class="absolute bottom-0 right-0 size-8 bg-primary rounded-full flex items-center justify-center text-background-dark shadow-lg border-2 border-background-dark hover:scale-105 transition-transform" type="button">
                                        <span class="material-symbols-outlined text-sm">add_a_photo</span>
                                    </button>
                                </div>
                                <div class="text-center md:text-left">
                                    <h3 class="font-bold text-lg">Foto do Aluno</h3>
                                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Clique no ícone para fazer upload de uma imagem (PNG, JPG).</p>
                                </div>
                            </div>
                            <section class="bg-background-light dark:bg-background-dark border border-primary/10 rounded-xl p-6 shadow-sm">
                                <h2 class="text-sm font-bold uppercase tracking-wider text-primary mb-6 flex items-center gap-2">
                                    <span class="material-symbols-outlined text-sm">badge</span> INFORMAÇÕES BÁSICAS
                                </h2>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="col-span-1 md:col-span-2">
                                        <label class="block text-xs font-medium mb-2 opacity-70 uppercase tracking-tight">Nome Completo *</label>
                                        <input name="nome" value="{{ old('nome') }}" class="w-full bg-slate-100 dark:bg-slate-900/50 border border-slate-200 dark:border-primary/10 rounded-lg px-4 py-3 focus:ring-1 focus:ring-primary focus:border-primary outline-none text-sm transition-all" placeholder="Digite o nome do aluno" type="text" required />
                                    </div>
                                    <div>
                                        <label class="block text-xs font-medium mb-2 opacity-70 uppercase tracking-tight">E-mail *</label>
                                        <input name="email" value="{{ old('email') }}" class="w-full bg-slate-100 dark:bg-slate-900/50 border border-slate-200 dark:border-primary/10 rounded-lg px-4 py-3 focus:ring-1 focus:ring-primary focus:border-primary outline-none text-sm transition-all" placeholder="exemplo@email.com" type="email" required />
                                    </div>
                                    <div>
                                        <label class="block text-xs font-medium mb-2 opacity-70 uppercase tracking-tight">Telefone</label>
                                        <input name="telefone" value="{{ old('telefone') }}" class="w-full bg-slate-100 dark:bg-slate-900/50 border border-slate-200 dark:border-primary/10 rounded-lg px-4 py-3 focus:ring-1 focus:ring-primary focus:border-primary outline-none text-sm transition-all" placeholder="(00) 00000-0000" type="text" />
                                    </div>
                                    <div>
                                        <label class="block text-xs font-medium mb-2 opacity-70 uppercase tracking-tight">Gênero *</label>
                                        <select name="sexo" class="w-full bg-slate-100 dark:bg-slate-900/50 border border-slate-200 dark:border-primary/10 rounded-lg px-4 py-3 focus:ring-1 focus:ring-primary focus:border-primary outline-none text-sm appearance-none transition-all" required>
                                            <option disabled="" {{ old('sexo') ? '' : 'selected' }} value="">Selecione</option>
                                            <option value="M" {{ old('sexo') == 'M' ? 'selected' : '' }}>Masculino</option>
                                            <option value="F" {{ old('sexo') == 'F' ? 'selected' : '' }}>Feminino</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-xs font-medium mb-2 opacity-70 uppercase tracking-tight">Data de Nascimento *</label>
                                        <input name="data_nascimento" value="{{ old('data_nascimento') }}" class="w-full bg-slate-100 dark:bg-slate-900/50 border border-slate-200 dark:border-primary/10 rounded-lg px-4 py-3 focus:ring-1 focus:ring-primary focus:border-primary outline-none text-sm transition-all" type="date" required />
                                    </div>
                                </div>
                            </section>
                            <section class="bg-background-light dark:bg-background-dark border border-primary/10 rounded-xl p-6 shadow-sm">
                                <h2 class="text-sm font-bold uppercase tracking-wider text-primary mb-6 flex items-center gap-2">
                                    <span class="material-symbols-outlined text-sm">straighten</span> MEDIDAS INICIAIS
                                </h2>
                                <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
                                    <div>
                                        <label class="block text-xs font-medium mb-2 opacity-70 uppercase tracking-tight">Peso (kg)</label>
                                        <input name="peso" value="{{ old('peso') }}" class="w-full bg-slate-100 dark:bg-slate-900/50 border border-slate-200 dark:border-primary/10 rounded-lg px-4 py-3 focus:ring-1 focus:ring-primary focus:border-primary outline-none text-sm transition-all" placeholder="0.0" step="0.1" type="number" min="0" />
                                    </div>
                                    <div>
                                        <label class="block text-xs font-medium mb-2 opacity-70 uppercase tracking-tight">Altura (cm)</label>
                                        <input name="altura" value="{{ old('altura') }}" class="w-full bg-slate-100 dark:bg-slate-900/50 border border-slate-200 dark:border-primary/10 rounded-lg px-4 py-3 focus:ring-1 focus:ring-primary focus:border-primary outline-none text-sm transition-all" placeholder="170" type="number" min="0" />
                                    </div>
                                    <div class="col-span-2 md:col-span-1">
                                        <label class="block text-xs font-medium mb-2 opacity-70 uppercase tracking-tight">Gordura Corporal (%)</label>
                                        <input name="gordura_corporal" value="{{ old('gordura_corporal') }}" class="w-full bg-slate-100 dark:bg-slate-900/50 border border-slate-200 dark:border-primary/10 rounded-lg px-4 py-3 focus:ring-1 focus:ring-primary focus:border-primary outline-none text-sm transition-all" placeholder="0.0" step="0.1" type="number" min="0" max="100" />
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
                                        <textarea name="objetivo" class="w-full bg-slate-100 dark:bg-slate-900/50 border border-slate-200 dark:border-primary/10 rounded-lg px-4 py-3 focus:ring-1 focus:ring-primary focus:border-primary outline-none text-xs transition-all h-24 resize-none" placeholder="Ex: Ganho de massa muscular, Perda de peso, Condicionamento físico...">{{ old('objetivo') }}</textarea>
                                    </div>
                                    <div class="p-4 bg-primary/5 rounded-lg border border-primary/10">
                                        <div class="flex justify-between items-center mb-2">
                                            <span class="text-xs font-medium opacity-60">Acesso do Aluno</span>
                                            <span class="text-[10px] font-bold px-2 py-0.5 bg-primary/20 text-primary rounded uppercase">Será Criado</span>
                                        </div>
                                        <p class="text-xs text-slate-500">Senha padrão: <span class="font-mono font-bold">senha123</span></p>
                                        <p class="text-[10px] text-slate-400 mt-1">O aluno poderá alterar a senha no primeiro acesso</p>
                                    </div>
                                    <div class="space-y-2">
                                        <div class="flex items-start gap-2">
                                            <span class="material-symbols-outlined text-primary text-sm mt-0.5">info</span>
                                            <div>
                                                <p class="text-[10px] text-slate-500">Após criar o aluno, você poderá:</p>
                                                <ul class="text-[10px] text-slate-400 mt-1 space-y-0.5 ml-3 list-disc">
                                                    <li>Criar treinos personalizados</li>
                                                    <li>Fazer avaliações físicas</li>
                                                    <li>Montar planos alimentares</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <div class="p-4 rounded-xl border border-dashed border-primary/20 flex items-start gap-3">
                                <span class="material-symbols-outlined text-primary">help_outline</span>
                                <div>
                                    <h4 class="text-xs font-bold uppercase">Precisa de ajuda?</h4>
                                    <p class="text-[10px] opacity-60 mt-1">O aluno receberá um link para baixar o app e configurar a senha após o cadastro.</p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <footer class="lg:hidden p-4 bg-background-light dark:bg-background-dark border-t border-primary/10 shrink-0">
                <button type="submit" class="w-full bg-primary text-background-dark py-3 rounded-xl font-bold text-base shadow-lg shadow-primary/20">
                    Salvar Aluno
                </button>
            </footer>
        </main>
    </div>

</body>

</html>