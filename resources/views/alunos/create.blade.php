<html lang="pt-BR">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#22C55E", // Bright Neon Green
                        "primary-hover": "#16a34a",
                        "deep-bg": "#050805", // Very dark green-black
                        "surface-dark": "#0A100A", // Slightly lighter sidebar/cards
                        "card-bg": "#0D140D",
                        "border-green": "#162216",
                        "accent-green": "#22C55E",
                    },
                    fontFamily: {
                        "display": ["Inter", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.375rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "2xl": "1rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
    <style type="text/tailwindcss">
        body { font-family: 'Inter', sans-serif; }
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
        .sidebar-active { 
            background: linear-gradient(90deg, rgba(34, 197, 94, 0.15) 0%, rgba(34, 197, 94, 0) 100%); 
            color: #22C55E;
            border-left: 3px solid #22C55E;
        }
        input, select, textarea {
            background-color: #0D140D !important;
            border-color: #162216 !important;
            color: #e2e8f0 !important;
        }
        input:focus, select:focus, textarea:focus {
            border-color: #22C55E !important;
            ring-color: #22C55E !important;
            outline: none !important;
        }
        ::placeholder {
            color: #4b5563 !important;
        }
    </style>
</head>

<body class="bg-deep-bg text-slate-200 font-display">
    <div class="flex min-h-screen">
        <aside class="w-64 bg-surface-dark flex flex-col fixed h-full border-r border-border-green">
            <div class="p-6 flex items-center gap-3">
                <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center text-deep-bg shadow-[0_0_15px_rgba(34,197,94,0.3)]">
                    <span class="material-symbols-outlined font-bold">fitness_center</span>
                </div>
                <div>
                    <h1 class="font-black text-xl leading-none text-white tracking-tighter">FitAssist</h1>
                </div>
            </div>
            <nav class="flex-1 px-4 py-4 space-y-1">
                <a class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:text-primary transition-colors" href="#">
                    <span class="material-symbols-outlined">dashboard</span>
                    <span class="text-sm font-semibold">Dashboard</span>
                </a>
                <a class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:text-primary transition-colors" href="#">
                    <span class="material-symbols-outlined">exercise</span>
                    <span class="text-sm font-semibold">Treinos</span>
                </a>
                <a class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:text-primary transition-colors" href="#">
                    <span class="material-symbols-outlined">library_books</span>
                    <span class="text-sm font-semibold">Biblioteca</span>
                </a>
                <a class="flex items-center gap-3 px-4 py-3 sidebar-active transition-colors" href="#">
                    <span class="material-symbols-outlined">group</span>
                    <span class="text-sm font-semibold">Alunos</span>
                </a>
            </nav>
            <div class="p-4 border-t border-border-green">
                <div class="flex items-center gap-3 p-2">
                    <div class="w-10 h-10 rounded-full border border-primary/30 p-0.5 overflow-hidden">
                        <img class="w-full h-full object-cover rounded-full" data-alt="Profile picture of the current user" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAyi66WWCRotdv98CAMICNdpI3ZTxrSzxr26zwW0im8mEUukKe_UvY5pzgEOLMdlx4LxTMPpEJxtwj8v8IfsnXUddzWlHOYFNSkKsq5ek_3jzga9MwvZf5kp2v77_nHEPSMObkSXIvzR0thW2RV7AxJtFjyKTL41x-ePfFXq1RWGdiLi1zofAABXA5chH5pdWZGZ_idxWU7rzx85aLHzIQboTLEDthRgbXvy05uzcbtvRtelhh1cbNXkqsrboLeAjnToZb7zs8fpcmJ" />
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-bold truncate text-white">Marcos Silva</p>
                        <p class="text-xs text-slate-500 truncate">Personal Trainer</p>
                    </div>
                </div>
            </div>
        </aside>
        <main class="flex-1 ml-64">
            <header class="h-16 border-b border-border-green bg-surface-dark/95 backdrop-blur-md flex items-center justify-between px-8 sticky top-0 z-10">
                <h2 class="text-lg font-bold text-white">Criar Novo Aluno</h2>
                <div class="flex items-center gap-4">
                    <button class="p-2.5 text-slate-400 hover:bg-white/5 rounded-lg relative">
                        <span class="material-symbols-outlined">notifications</span>
                        <span class="absolute top-2.5 right-2.5 w-2 h-2 bg-primary rounded-full border-2 border-surface-dark"></span>
                    </button>
                    <button class="px-5 py-2 bg-primary text-deep-bg font-bold rounded-lg hover:bg-primary-hover transition-all shadow-[0_0_20px_rgba(34,197,94,0.2)]">
                        Salvar Aluno
                    </button>
                </div>
            </header>
            <div class="p-8 max-w-5xl mx-auto space-y-8">
                <div class="flex flex-col items-center sm:flex-row gap-8 bg-card-bg p-8 rounded-2xl border border-border-green">
                    <div class="relative group">
                        <div class="w-32 h-32 rounded-full border-2 border-dashed border-primary/40 flex flex-col items-center justify-center bg-deep-bg text-primary/60 transition-all hover:border-primary cursor-pointer overflow-hidden">
                            <span class="material-symbols-outlined text-4xl mb-1">add_a_photo</span>
                            <span class="text-[10px] font-bold uppercase tracking-widest">Upload</span>
                        </div>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xl font-bold text-white mb-2">Foto do Aluno</h3>
                        <p class="text-slate-500 text-sm mb-5 leading-relaxed">Carregue uma imagem clara do aluno para facilitar a identificação. Formatos aceitos: JPG, PNG até 2MB.</p>
                        <button class="px-6 py-2.5 bg-white/5 border border-white/10 text-white rounded-lg text-sm font-bold hover:bg-white/10 transition-colors">
                            Selecionar Imagem
                        </button>
                    </div>
                </div>
                <form class="space-y-8">
                    <section class="bg-card-bg p-8 rounded-2xl border border-primary/20 shadow-lg relative overflow-hidden">
                        <div class="absolute top-0 left-0 w-1 h-full bg-primary"></div>
                        <div class="flex items-center gap-3 mb-8">
                            <span class="material-symbols-outlined text-primary">info</span>
                            <h3 class="text-sm font-black uppercase tracking-widest text-primary">Informações Básicas</h3>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-3">
                                <label class="text-xs font-bold uppercase tracking-widest text-slate-500">Nome Completo</label>
                                <input class="w-full px-4 py-3 rounded-xl focus:ring-1" placeholder="Ex: João da Silva" type="text" />
                            </div>
                            <div class="space-y-3">
                                <label class="text-xs font-bold uppercase tracking-widest text-slate-500">CPF</label>
                                <input class="w-full px-4 py-3 rounded-xl focus:ring-1" placeholder="000.000.000-00" type="text" />
                            </div>
                            <div class="md:col-span-2 space-y-3">
                                <label class="text-xs font-bold uppercase tracking-widest text-slate-500">Objetivo Principal</label>
                                <input class="w-full px-4 py-3 rounded-xl focus:ring-1" placeholder="Ex: Hipertrofia de membros superiores e perda de gordura" type="text" />
                            </div>
                        </div>
                    </section>
                    <section class="bg-card-bg p-8 rounded-2xl border border-border-green shadow-lg">
                        <div class="flex items-center gap-3 mb-8">
                            <span class="material-symbols-outlined text-primary">contact_phone</span>
                            <h3 class="text-sm font-black uppercase tracking-widest text-white">Dados de Contato</h3>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-3">
                                <label class="text-xs font-bold uppercase tracking-widest text-slate-500">E-mail</label>
                                <input class="w-full px-4 py-3 rounded-xl focus:ring-1" placeholder="aluno@email.com" type="email" />
                            </div>
                            <div class="space-y-3">
                                <label class="text-xs font-bold uppercase tracking-widest text-slate-500">WhatsApp</label>
                                <input class="w-full px-4 py-3 rounded-xl focus:ring-1" placeholder="(00) 0 0000-0000" type="tel" />
                            </div>
                        </div>
                    </section>
                    <section class="bg-card-bg p-8 rounded-2xl border border-border-green shadow-lg">
                        <div class="flex items-center gap-3 mb-8">
                            <span class="material-symbols-outlined text-primary">payments</span>
                            <h3 class="text-sm font-black uppercase tracking-widest text-white">Plano / Assinatura</h3>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                            <div class="space-y-3">
                                <label class="text-xs font-bold uppercase tracking-widest text-slate-500">Plano</label>
                                <select class="w-full px-4 py-3 rounded-xl focus:ring-1 appearance-none">
                                    <option value="">Selecione um plano</option>
                                    <option value="mensal">Mensal</option>
                                    <option value="trimestral">Trimestral</option>
                                    <option value="anual">Anual</option>
                                    <option value="personal">Personal VIP</option>
                                </select>
                            </div>
                            <div class="space-y-3">
                                <label class="text-xs font-bold uppercase tracking-widest text-slate-500">Vencimento</label>
                                <input class="w-full px-4 py-3 rounded-xl focus:ring-1" type="date" />
                            </div>
                            <div class="space-y-3">
                                <label class="text-xs font-bold uppercase tracking-widest text-slate-500">Status</label>
                                <div class="flex items-center gap-2 h-[50px]">
                                    <span class="px-3 py-1 bg-primary/20 text-primary text-[10px] font-black uppercase tracking-widest rounded-full">Ativo</span>
                                    <span class="text-slate-600 text-[10px] font-bold">MUDAR STATUS</span>
                                </div>
                            </div>
                        </div>
                    </section>
                    <div class="flex items-center justify-end gap-6 pt-4 pb-12">
                        <button class="text-sm font-bold text-slate-500 hover:text-white transition-colors" type="button">
                            Descartar Alterações
                        </button>
                        <button class="px-12 py-3.5 bg-primary text-deep-bg font-black rounded-xl shadow-[0_0_30px_rgba(34,197,94,0.3)] hover:scale-[1.02] active:scale-95 transition-all" type="submit">
                            SALVAR ALUNO
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>

</body>

</html>