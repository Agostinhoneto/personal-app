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
        <!-- Sidebar Navigation -->
        <aside class="w-64 border-r border-primary/10 bg-background-light dark:bg-background-dark flex flex-col hidden lg:flex">
            <div class="p-6 flex items-center gap-3">
                <div class="size-8 bg-primary rounded flex items-center justify-center text-background-dark">
                    <span class="material-symbols-outlined font-bold">exercise</span>
                </div>
                <h2 class="text-xl font-bold tracking-tight text-slate-900 dark:text-slate-100">FitAssist</h2>
            </div>
            <nav class="flex-1 px-4 space-y-2 mt-4">
                <a class="flex items-center gap-3 px-3 py-2 text-slate-600 dark:text-slate-400 hover:bg-primary/10 hover:text-primary rounded-lg transition-colors" href="#">
                    <span class="material-symbols-outlined">grid_view</span>
                    <span class="font-medium text-sm">Dashboard</span>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 bg-primary/20 text-primary rounded-lg transition-colors" href="#">
                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1">fitness_center</span>
                    <span class="font-medium text-sm">Treinos</span>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 text-slate-600 dark:text-slate-400 hover:bg-primary/10 hover:text-primary rounded-lg transition-colors" href="#">
                    <span class="material-symbols-outlined">menu_book</span>
                    <span class="font-medium text-sm">Biblioteca</span>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 text-slate-600 dark:text-slate-400 hover:bg-primary/10 hover:text-primary rounded-lg transition-colors" href="#">
                    <span class="material-symbols-outlined">group</span>
                    <span class="font-medium text-sm">Alunos</span>
                </a>
            </nav>
            <div class="p-4 border-t border-primary/10">
                <div class="flex items-center gap-3 p-2">
                    <div class="size-10 rounded-full bg-primary/30 flex items-center justify-center overflow-hidden border border-primary/50">
                        <img class="w-full h-full object-cover" data-alt="Profile photo of a professional gym trainer" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBTerw4bBXGYk7KIxnKBtfcgc8RGhdu7r1bzX2RQGHGUNRqPlVQFFGOGh0jwy2jNCRLDoJJ3lu0rb0EKXfPM40q2Oauz80tyxAjMwZ7XYs_oAbOkCltDcA3X_MpSUuP5CwT4egofPShZyOXaolUGdyyUK08r47oZd987fsDLrOnsmeeQSAGjXVY1UuASVvC9T3KYOnPAvs0R5j5QlKkt3wMTZzjcRWknGuUo_akXXQmv35jAiXImLKM9Yq8Xoxk4MhtvP7FZjUfn-C7" />
                    </div>
                    <div>
                        <p class="text-xs font-bold">Marcos Silva</p>
                        <p class="text-[10px] opacity-60">Personal Trainer</p>
                    </div>
                </div>
            </div>
        </aside>
        <!-- Main Content -->
        <main class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Header -->
            <header class="h-16 border-b border-primary/10 flex items-center justify-between px-8 bg-background-light dark:bg-background-dark">
                <div class="flex items-center gap-4">
                    <button class="lg:hidden text-slate-100">
                        <span class="material-symbols-outlined">menu</span>
                    </button>
                    <h1 class="text-lg font-semibold tracking-tight">Criar Novo Treino</h1>
                </div>
                <div class="flex items-center gap-4">
                    <button class="size-10 flex items-center justify-center rounded-lg bg-slate-800/50 text-slate-400 hover:text-primary transition-colors">
                        <span class="material-symbols-outlined">notifications</span>
                    </button>
                    <button class="bg-primary hover:bg-primary/90 text-background-dark px-4 py-2 rounded-lg font-bold text-sm transition-all shadow-lg shadow-primary/10">
                        Salvar Treino
                    </button>
                </div>
            </header>
            <!-- Scrollable Editor Area -->
            <div class="flex-1 overflow-y-auto bg-slate-50 dark:bg-[#0a150a] p-4 lg:p-8">
                <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-8">
                    <!-- Left: Workout Details & Exercises -->
                    <div class="lg:col-span-8 space-y-6">
                        <!-- Basic Info Card -->
                        <section class="bg-background-light dark:bg-background-dark border border-primary/10 rounded-xl p-6 shadow-sm">
                            <h2 class="text-sm font-bold uppercase tracking-wider text-primary mb-6 flex items-center gap-2">
                                <span class="material-symbols-outlined text-sm">info</span> Informações Básicas
                            </h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="col-span-1 md:col-span-2">
                                    <label class="block text-xs font-medium mb-2 opacity-70 uppercase tracking-tight">Nome do Treino</label>
                                    <input class="w-full bg-slate-100 dark:bg-slate-900/50 border border-slate-200 dark:border-primary/10 rounded-lg px-4 py-3 focus:ring-1 focus:ring-primary focus:border-primary outline-none text-sm transition-all" placeholder="Ex: Treino A - Hipertrofia de Peitoral" type="text" />
                                </div>
                                <div>
                                    <label class="block text-xs font-medium mb-2 opacity-70 uppercase tracking-tight">Grupo Muscular Alvo</label>
                                    <select class="w-full bg-slate-100 dark:bg-slate-900/50 border border-slate-200 dark:border-primary/10 rounded-lg px-4 py-3 focus:ring-1 focus:ring-primary focus:border-primary outline-none text-sm appearance-none transition-all">
                                        <option>Peitoral e Tríceps</option>
                                        <option>Costas e Bíceps</option>
                                        <option>Membros Inferiores</option>
                                        <option>Ombros e Trapézio</option>
                                        <option>Full Body</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-xs font-medium mb-2 opacity-70 uppercase tracking-tight">Nível de Dificuldade</label>
                                    <div class="flex gap-2">
                                        <button class="flex-1 py-2 text-xs font-bold border border-primary/20 rounded-lg hover:bg-primary/10 transition-colors">Iniciante</button>
                                        <button class="flex-1 py-2 text-xs font-bold bg-primary/20 border border-primary/40 text-primary rounded-lg">Intermédio</button>
                                        <button class="flex-1 py-2 text-xs font-bold border border-primary/20 rounded-lg hover:bg-primary/10 transition-colors">Avançado</button>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Exercise List -->
                        <section class="space-y-4">
                            <div class="flex items-center justify-between mb-2">
                                <h2 class="text-lg font-bold">Plano de Exercícios</h2>
                                <span class="text-xs text-slate-400 bg-slate-800 px-2 py-1 rounded">3 exercícios adicionados</span>
                            </div>
                            <!-- Exercise Card 1 -->
                            <div class="bg-background-light dark:bg-background-dark border border-primary/10 rounded-xl p-4 md:p-6 shadow-sm group">
                                <div class="flex flex-col md:flex-row gap-6">
                                    <div class="w-full md:w-32 h-24 rounded-lg bg-slate-100 dark:bg-slate-800 overflow-hidden relative border border-primary/5">
                                        <img class="w-full h-full object-cover" data-alt="Man performing chest press on a bench" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCs3M00d2nypQZwJLnT-A9VnqUO7qpA2WIJ3feTxJYXfxkJK2mCyfGyZdNOAU4S55dQY7T0n_AGRqbVlQoXK2EpszBxrFXS9Nf6abYTKd0zm9331z8GRjsdQ3ya6ABrL0YtbrXzqQ7S0hCUoDPfIkuG75aTx6Qi1U4OOPuSe1mGoqlar2c-7JOBCCo_dB_h1xcRad8_WhA1Gt9cS0S45-h3JTrDykeOqEMFeVNkM_rS4FZlYa7FdhsX0qGSW5sduzexWDlTjUsMX2Fs" />
                                        <div class="absolute inset-0 bg-primary/10"></div>
                                    </div>
                                    <div class="flex-1 space-y-4">
                                        <div class="flex items-start justify-between">
                                            <div>
                                                <h3 class="font-bold text-lg">Supino Reto com Barra</h3>
                                                <p class="text-xs text-primary font-medium">Peitoral Maior</p>
                                            </div>
                                            <button class="text-slate-500 hover:text-red-500 transition-colors">
                                                <span class="material-symbols-outlined">delete</span>
                                            </button>
                                        </div>
                                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                            <div class="space-y-1">
                                                <label class="text-[10px] uppercase font-bold opacity-50">Séries</label>
                                                <input class="w-full bg-slate-100 dark:bg-slate-900 border border-primary/10 rounded px-3 py-2 text-sm focus:ring-1 focus:ring-primary outline-none" type="number" value="4" />
                                            </div>
                                            <div class="space-y-1">
                                                <label class="text-[10px] uppercase font-bold opacity-50">Repetições</label>
                                                <input class="w-full bg-slate-100 dark:bg-slate-900 border border-primary/10 rounded px-3 py-2 text-sm focus:ring-1 focus:ring-primary outline-none" type="text" value="10-12" />
                                            </div>
                                            <div class="space-y-1">
                                                <label class="text-[10px] uppercase font-bold opacity-50">Carga (kg)</label>
                                                <input class="w-full bg-slate-100 dark:bg-slate-900 border border-primary/10 rounded px-3 py-2 text-sm focus:ring-1 focus:ring-primary outline-none" type="number" value="60" />
                                            </div>
                                            <div class="space-y-1">
                                                <label class="text-[10px] uppercase font-bold opacity-50">Descanso</label>
                                                <input class="w-full bg-slate-100 dark:bg-slate-900 border border-primary/10 rounded px-3 py-2 text-sm focus:ring-1 focus:ring-primary outline-none" type="text" value="60s" />
                                            </div>
                                        </div>
                                        <div>
                                            <label class="text-[10px] uppercase font-bold opacity-50 mb-1 block">Observações para o aluno</label>
                                            <textarea class="w-full bg-slate-100 dark:bg-slate-900 border border-primary/10 rounded px-3 py-2 text-xs focus:ring-1 focus:ring-primary outline-none h-16 resize-none" placeholder="Ex: Focar na cadência e não encostar a barra no peito"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Exercise Card 2 -->
                            <div class="bg-background-light dark:bg-background-dark border border-primary/10 rounded-xl p-4 md:p-6 shadow-sm group">
                                <div class="flex flex-col md:flex-row gap-6">
                                    <div class="w-full md:w-32 h-24 rounded-lg bg-slate-100 dark:bg-slate-800 overflow-hidden relative border border-primary/5">
                                        <img class="w-full h-full object-cover" data-alt="Woman doing pushups in gym" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCmN4RMeDhlxe1N3xeirpQQFpTE7oGd6EisPeBsG6qipaNMTV0fUG_VDA8ao83kDuapsCQttgEZlCk_jx1ZExWA5MxPigV7G-k3fDmBUphPPDA3qFvvFPjSs_5K-OUICha6EdRkGsiFAK6VOG7jOt4Kcsbobla4UO-abkS2dRisn0NbWe380Ea-fvlyWEzt1pplI2aIhloA7F6QglGbxavEuBBPMFFYkBJD84Cb5nB_Ean1R0eIH2qurvZvV5AyE6H2tkIgimKFet8i" />
                                        <div class="absolute inset-0 bg-primary/10"></div>
                                    </div>
                                    <div class="flex-1 space-y-4">
                                        <div class="flex items-start justify-between">
                                            <div>
                                                <h3 class="font-bold text-lg">Flexão de Braços</h3>
                                                <p class="text-xs text-primary font-medium">Peitoral / Tríceps</p>
                                            </div>
                                            <button class="text-slate-500 hover:text-red-500 transition-colors">
                                                <span class="material-symbols-outlined">delete</span>
                                            </button>
                                        </div>
                                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                            <div class="space-y-1">
                                                <label class="text-[10px] uppercase font-bold opacity-50">Séries</label>
                                                <input class="w-full bg-slate-100 dark:bg-slate-900 border border-primary/10 rounded px-3 py-2 text-sm focus:ring-1 focus:ring-primary outline-none" type="number" value="3" />
                                            </div>
                                            <div class="space-y-1">
                                                <label class="text-[10px] uppercase font-bold opacity-50">Repetições</label>
                                                <input class="w-full bg-slate-100 dark:bg-slate-900 border border-primary/10 rounded px-3 py-2 text-sm focus:ring-1 focus:ring-primary outline-none" type="text" value="Até a falha" />
                                            </div>
                                            <div class="space-y-1">
                                                <label class="text-[10px] uppercase font-bold opacity-50">Carga (kg)</label>
                                                <input class="w-full bg-slate-100 dark:bg-slate-900 border border-primary/10 rounded px-3 py-2 text-sm focus:ring-1 focus:ring-primary outline-none" disabled="" type="text" value="Peso do corpo" />
                                            </div>
                                            <div class="space-y-1">
                                                <label class="text-[10px] uppercase font-bold opacity-50">Descanso</label>
                                                <input class="w-full bg-slate-100 dark:bg-slate-900 border border-primary/10 rounded px-3 py-2 text-sm focus:ring-1 focus:ring-primary outline-none" type="text" value="45s" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="w-full py-4 border-2 border-dashed border-primary/20 rounded-xl text-primary font-bold hover:bg-primary/5 transition-all flex items-center justify-center gap-2 group">
                                <span class="material-symbols-outlined group-hover:scale-110 transition-transform">add_circle</span>
                                Adicionar Manualmente
                            </button>
                        </section>
                    </div>
                    <!-- Right Sidebar: Exercise Library -->
                    <div class="lg:col-span-4 space-y-6">
                        <section class="bg-background-light dark:bg-background-dark border border-primary/10 rounded-xl overflow-hidden flex flex-col h-[calc(100vh-12rem)] shadow-lg sticky top-0">
                            <div class="p-4 border-b border-primary/10 bg-primary/5">
                                <h2 class="font-bold flex items-center gap-2 mb-4">
                                    <span class="material-symbols-outlined text-primary">search</span>
                                    Biblioteca de Exercícios
                                </h2>
                                <div class="relative">
                                    <input class="w-full bg-slate-100 dark:bg-slate-900/50 border border-slate-200 dark:border-primary/10 rounded-lg pl-10 pr-4 py-2 text-xs outline-none focus:ring-1 focus:ring-primary transition-all" placeholder="Buscar exercício..." type="text" />
                                    <span class="material-symbols-outlined absolute left-3 top-2 text-sm opacity-50">search</span>
                                </div>
                                <div class="flex gap-2 mt-4 overflow-x-auto pb-1 no-scrollbar">
                                    <button class="text-[10px] font-bold px-3 py-1 bg-primary text-background-dark rounded-full whitespace-nowrap">Tudo</button>
                                    <button class="text-[10px] font-bold px-3 py-1 bg-slate-800 text-slate-300 rounded-full whitespace-nowrap border border-white/5">Peito</button>
                                    <button class="text-[10px] font-bold px-3 py-1 bg-slate-800 text-slate-300 rounded-full whitespace-nowrap border border-white/5">Costas</button>
                                    <button class="text-[10px] font-bold px-3 py-1 bg-slate-800 text-slate-300 rounded-full whitespace-nowrap border border-white/5">Pernas</button>
                                </div>
                            </div>
                            <div class="flex-1 overflow-y-auto p-4 space-y-3">
                                <!-- Library Item 1 -->
                                <div class="group flex items-center gap-3 p-2 rounded-lg hover:bg-primary/10 border border-transparent hover:border-primary/20 cursor-pointer transition-all">
                                    <div class="size-12 rounded bg-slate-800 flex-shrink-0 overflow-hidden">
                                        <img class="w-full h-full object-cover" data-alt="Dumbbell press exercise demonstration" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDJ-_SPCu9C9ebEUXQtR3qIYqF1ISjzooPMdd4UEoukey7b_B08sLBUpOoYULMmb_nKwvE1GXmOHxoxdhNLeud4CVqHf6AaKrg_j2tfFdSR1b9Uoe0ESSAKsOPtLVf3DmkPR7lrE4UkEldCX-zET6f8b1I4yABtTHMewcv0ZuABCUdxU2ZOeU9oeMJO311RKiSVDt5jIDWl0ty5-xNKa6zsebMOY7H_tPXdaKauoWj7C1jKFVBISjkNeL9kGguXhRifZtImA3a_uW7B" />
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-xs font-bold truncate">Supino com Halteres</p>
                                        <p class="text-[10px] text-primary opacity-80 uppercase">Peito</p>
                                    </div>
                                    <span class="material-symbols-outlined text-slate-500 group-hover:text-primary transition-colors">add</span>
                                </div>
                                <!-- Library Item 2 -->
                                <div class="group flex items-center gap-3 p-2 rounded-lg hover:bg-primary/10 border border-transparent hover:border-primary/20 cursor-pointer transition-all">
                                    <div class="size-12 rounded bg-slate-800 flex-shrink-0 overflow-hidden">
                                        <img class="w-full h-full object-cover" data-alt="Cable crossover machine in gym" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCZ3_QpswzkH7nAf94lVpRrDsMTlOg_12lAHRHRlXJPcCNavJ_Bt5PdY2kecsBnAepF8usIHcW3k52whDibUUq5EWcrX5EO4UqPT69hD1uDeUyW-FzcyqSpTAZX1zX08gAKLR9s13qi2muuKkHSEAbLM9SEQz_BoZ1xerF4NGT5zIDzYnA4QVvdX-yPwwHISdSt3tP2aFKkL0HFq57l4_G0J8YdKQ-s21QNBOSodUI-AeJo1_j995NorAWusnSEL79y0GnGMYDupzOZ" />
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-xs font-bold truncate">Crossover Polia Alta</p>
                                        <p class="text-[10px] text-primary opacity-80 uppercase">Peito</p>
                                    </div>
                                    <span class="material-symbols-outlined text-slate-500 group-hover:text-primary transition-colors">add</span>
                                </div>
                                <!-- Library Item 3 -->
                                <div class="group flex items-center gap-3 p-2 rounded-lg hover:bg-primary/10 border border-transparent hover:border-primary/20 cursor-pointer transition-all">
                                    <div class="size-12 rounded bg-slate-800 flex-shrink-0 overflow-hidden">
                                        <img class="w-full h-full object-cover" data-alt="Barbell shoulder press technique" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBCwCBELPguzNsplkzUBStkiIPBHVNaCRHQC0zLCBg8ySf-lA-TEQPumKLheaE0sbXqHpBuWy8H_9mNZqlvC5EaQyPSiKQJqHJg9d8gkynR0IvPXcffiTAGNGx146_A1sUcLdsG0NtJvBizj02EHN_SKfTZb6FZCJxYz5gnC0OfQn80uqasHbz0hy_wcqkH5eSRHaJTz3ZaL1_FJrhW2iivStqD9l4GQ0K1ex3IAySmT7FV7CPkNNu50bwzs6zgQlylpTgNVitl3mec" />
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-xs font-bold truncate">Desenvolvimento Barra</p>
                                        <p class="text-[10px] text-primary opacity-80 uppercase">Ombros</p>
                                    </div>
                                    <span class="material-symbols-outlined text-slate-500 group-hover:text-primary transition-colors">add</span>
                                </div>
                                <!-- Library Item 4 -->
                                <div class="group flex items-center gap-3 p-2 rounded-lg hover:bg-primary/10 border border-transparent hover:border-primary/20 cursor-pointer transition-all">
                                    <div class="size-12 rounded bg-slate-800 flex-shrink-0 overflow-hidden">
                                        <img class="w-full h-full object-cover" data-alt="Leg press gym equipment" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDlhrsBZpphvmt2Ze_LKgucRTRAdFqOVfdqSZARlMI_6c87wR-bAbwWUlGKODL_4kxnsH2Cd0aEwZLb0fcI-R2LEoHkSJYB_YpFE6NBXiXfm6Zleu_nh7v0RAjRQ9fW1FIgYqAp_jNSKpCtMQAg0v5wOPQgdre2vGNV1DyGizJZHNn6fimGuHBIHgU_qS8mnJU6q7gKEmsdroG5rf_qCKaORIaMpdrgDdhaHev-xjI-yJkSqXgxNyBXxcP3-Db6zEOijKh1pMgYA6-R" />
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-xs font-bold truncate">Leg Press 45º</p>
                                        <p class="text-[10px] text-primary opacity-80 uppercase">Pernas</p>
                                    </div>
                                    <span class="material-symbols-outlined text-slate-500 group-hover:text-primary transition-colors">add</span>
                                </div>
                                <!-- Library Item 5 -->
                                <div class="group flex items-center gap-3 p-2 rounded-lg hover:bg-primary/10 border border-transparent hover:border-primary/20 cursor-pointer transition-all">
                                    <div class="size-12 rounded bg-slate-800 flex-shrink-0 overflow-hidden">
                                        <img class="w-full h-full object-cover" data-alt="Lat pulldown machine exercise" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBQhNJFlQ8YJ-A4CzV5F9wYgWroB6gSpQV5ml6d4_JaGAlOX8J_ThL0p016w2E4wex8eKeOLygprm89Vu8uQO8uVX_AIsA7Y-LgSUBUWYfD7hItGPe6Av2V8jQloMDqv8XGq2Kcqeb9r9zL82mqy4yqcJWUHCBAJ650sr9mBq4HJp-qUOMRomKGY9bbuwxMq-cxFP1irr74QhkOzR5-3U-pt93MYEaCa8aAkcPOOFkZuFPxC8LvmhZU5fk61ag-t6xtkY-z3WZPtWk3" />
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-xs font-bold truncate">Puxada Frontal</p>
                                        <p class="text-[10px] text-primary opacity-80 uppercase">Costas</p>
                                    </div>
                                    <span class="material-symbols-outlined text-slate-500 group-hover:text-primary transition-colors">add</span>
                                </div>
                            </div>
                            <div class="p-4 border-t border-primary/10">
                                <button class="w-full py-2 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 text-xs font-bold rounded-lg transition-colors">Ver Mais Exercícios</button>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
            <!-- Mobile Action Bar -->
            <footer class="lg:hidden p-4 bg-background-light dark:bg-background-dark border-t border-primary/10">
                <button class="w-full bg-primary text-background-dark py-3 rounded-xl font-bold text-base shadow-lg shadow-primary/20">
                    Salvar Treino
                </button>
            </footer>
        </main>
    </div>
</body>

</html>