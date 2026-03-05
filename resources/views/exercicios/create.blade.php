<!DOCTYPE html>

<html class="dark" lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100..700,0..1&amp;display=swap" rel="stylesheet" />
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
        .form-select {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%230df20d' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 0.5rem center;
            background-repeat: no-repeat;
            background-size: 1.5em 1.5em;
            padding-right: 2.5rem;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark font-display text-slate-900 dark:text-slate-100 min-h-screen">
    <div class="relative flex flex-col min-h-screen w-full overflow-x-hidden">
        <header class="flex items-center justify-between px-6 py-4 border-b border-white/10 bg-background-dark/50 backdrop-blur-md sticky top-0 z-50">
            <div class="flex items-center gap-3">
                <div class="flex items-center justify-center w-10 h-10 bg-primary/20 rounded-lg">
                    <span class="material-symbols-outlined text-primary">exercise</span>
                </div>
                <h2 class="text-xl font-bold tracking-tight text-slate-100 uppercase">Fit<span class="text-primary">Assist</span></h2>
            </div>
            <div class="flex items-center gap-4">
                <button class="p-2 text-slate-400 hover:text-primary transition-colors">
                    <span class="material-symbols-outlined">notifications</span>
                </button>
                <div class="w-8 h-8 rounded-full bg-primary/20 border border-primary/40 flex items-center justify-center">
                    <span class="material-symbols-outlined text-sm text-primary">person</span>
                </div>
            </div>
        </header>
        <main class="flex-1 max-w-5xl mx-auto w-full p-6 lg:p-10">
            <div class="flex flex-col gap-8">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div>
                        <h1 class="text-3xl font-bold text-slate-100 tracking-tight">Cadastrar Novo Exercício</h1>
                        <p class="text-slate-400 mt-1">Preencha os detalhes para adicionar um novo exercício à biblioteca.</p>
                    </div>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <div class="lg:col-span-2 flex flex-col gap-6">
                        <div class="bg-white/5 border border-white/10 rounded-xl p-6 shadow-xl">
                            <h3 class="text-lg font-semibold mb-6 flex items-center gap-2">
                                <span class="material-symbols-outlined text-primary">description</span> Informações Básicas
                            </h3>
                            <div class="space-y-6">
                                <div class="flex flex-col gap-2">
                                    <label class="text-sm font-medium text-slate-300">Nome do Exercício</label>
                                    <input class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-3 focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all text-slate-100 placeholder:text-slate-600" placeholder="Ex: Supino Reto com Halteres" type="text" />
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="flex flex-col gap-2">
                                        <label class="text-sm font-medium text-slate-300">Grupo Muscular Alvo</label>
                                        <select class="form-select w-full bg-white/5 border border-white/10 rounded-lg px-4 py-3 focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all text-slate-100">
                                            <option class="bg-background-dark" disabled="" selected="" value="">Selecione o músculo</option>
                                            <option class="bg-background-dark" value="peito">Peito</option>
                                            <option class="bg-background-dark" value="costas">Costas</option>
                                            <option class="bg-background-dark" value="pernas">Pernas</option>
                                            <option class="bg-background-dark" value="ombros">Ombros</option>
                                            <option class="bg-background-dark" value="braços">Braços</option>
                                        </select>
                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <label class="text-sm font-medium text-slate-300">Equipamento Necessário</label>
                                        <select class="form-select w-full bg-white/5 border border-white/10 rounded-lg px-4 py-3 focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all text-slate-100">
                                            <option class="bg-background-dark" disabled="" selected="" value="">Selecione o equipamento</option>
                                            <option class="bg-background-dark" value="halteres">Halteres</option>
                                            <option class="bg-background-dark" value="barra">Barra</option>
                                            <option class="bg-background-dark" value="maquina">Máquina</option>
                                            <option class="bg-background-dark" value="polia">Polia</option>
                                            <option class="bg-background-dark" value="nenhum">Peso do Corpo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="flex flex-col gap-2">
                                    <label class="text-sm font-medium text-slate-300">Nível de Dificuldade</label>
                                    <div class="flex gap-4">
                                        <label class="flex-1 cursor-pointer">
                                            <input class="hidden peer" name="difficulty" type="radio" value="beginner" />
                                            <div class="flex items-center justify-center p-3 rounded-lg border border-white/10 bg-white/5 peer-checked:bg-primary/20 peer-checked:border-primary peer-checked:text-primary transition-all text-slate-400">Iniciante</div>
                                        </label>
                                        <label class="flex-1 cursor-pointer">
                                            <input checked="" class="hidden peer" name="difficulty" type="radio" value="intermediate" />
                                            <div class="flex items-center justify-center p-3 rounded-lg border border-white/10 bg-white/5 peer-checked:bg-primary/20 peer-checked:border-primary peer-checked:text-primary transition-all text-slate-400">Intermediário</div>
                                        </label>
                                        <label class="flex-1 cursor-pointer">
                                            <input class="hidden peer" name="difficulty" type="radio" value="advanced" />
                                            <div class="flex items-center justify-center p-3 rounded-lg border border-white/10 bg-white/5 peer-checked:bg-primary/20 peer-checked:border-primary peer-checked:text-primary transition-all text-slate-400">Avançado</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="flex flex-col gap-2">
                                    <label class="text-sm font-medium text-slate-300">Instruções e Dicas de Execução</label>
                                    <textarea class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-3 focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all text-slate-100 placeholder:text-slate-600 resize-none" placeholder="Descreva o passo a passo da execução correta..." rows="6"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col gap-6">
                        <div class="bg-white/5 border border-white/10 rounded-xl p-6 shadow-xl">
                            <h3 class="text-lg font-semibold mb-6 flex items-center gap-2">
                                <span class="material-symbols-outlined text-primary">video_library</span> Mídia
                            </h3>
                            <div class="flex flex-col gap-4">
                                <div class="aspect-video w-full bg-background-dark border-2 border-dashed border-white/10 rounded-lg flex flex-col items-center justify-center gap-3 group hover:border-primary/50 cursor-pointer transition-colors" data-alt="Placeholder for exercise video or image preview">
                                    <span class="material-symbols-outlined text-4xl text-slate-600 group-hover:text-primary">upload_file</span>
                                    <div class="text-center">
                                        <p class="text-sm font-medium text-slate-400 group-hover:text-slate-200">Upload de vídeo ou foto</p>
                                        <p class="text-xs text-slate-600">MP4, GIF ou JPG (Máx 20MB)</p>
                                    </div>
                                </div>
                                <div class="p-4 bg-primary/5 border border-primary/20 rounded-lg">
                                    <p class="text-xs text-primary/80 flex gap-2">
                                        <span class="material-symbols-outlined text-[16px]">info</span>
                                        Vídeos curtos ajudam os usuários a entenderem melhor a técnica.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-3">
                            <button class="w-full py-4 bg-primary text-background-dark font-bold rounded-lg hover:shadow-[0_0_20px_rgba(13,242,13,0.4)] transition-all flex items-center justify-center gap-2">
                                <span class="material-symbols-outlined">save</span> Salvar Exercício
                            </button>
                            <button class="w-full py-4 bg-white/5 text-slate-300 font-semibold rounded-lg hover:bg-white/10 transition-all border border-white/10">
                                Cancelar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer class="mt-auto py-8 px-6 border-t border-white/5 text-center">
            <p class="text-slate-600 text-sm">© 2024 FitAssist Platform. Todos os direitos reservados.</p>
        </footer>
    </div>
</body>

</html>