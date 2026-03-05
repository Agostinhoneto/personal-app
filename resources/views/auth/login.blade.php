<!DOCTYPE html>
<html class="dark" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>FitAssist - Trainer Login</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&amp;display=swap" rel="stylesheet" />
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

        .bg-mesh {
            background-color: #102210;
            background-image:
                radial-gradient(at 0% 0%, rgba(13, 242, 13, 0.15) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(13, 242, 13, 0.1) 0px, transparent 50%);
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100 min-h-screen flex items-center justify-center font-display bg-mesh">
    <div class="relative w-full max-w-[1200px] flex flex-col md:flex-row h-full md:h-[800px] shadow-2xl rounded-xl overflow-hidden border border-primary/10 mx-4">
        <div class="hidden md:flex flex-col justify-between w-1/2 p-12 bg-cover bg-center relative" data-alt="Equipamentos de treino intensos em uma academia moderna e de alto padrão" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCKuY4PpMFu-_V9WR6BIAp2Z9Q-6k_gaNJ1A77GUK8M6qXlpL_ehnV8QrnXtLABeeF8-sFUQN521aW1J_en4dIqT7cESH9Wz6EvVOOPFeeHuBfRd6YpqlXu79VB-A68unZdWq2caQtMoEwTN-YwG-4b6rgTjiwCVlAADgcghYTbPYEbdf4iKHi8T6Jtli3138y1HkssdVkldhsDZznsZy7O22ltnemwjK09tB2KP0VAAs4_GHE4D8p4cUJIeThz9un-XDIBB7DTSim1");'>
            <div class="absolute inset-0 bg-gradient-to-t from-background-dark via-background-dark/40 to-transparent"></div>
            <div class="relative z-10 flex items-center gap-3">
                <div class="bg-primary p-2 rounded-lg text-background-dark">
                    <span class="material-symbols-outlined font-bold">exercise</span>
                </div>
                <h1 class="text-2xl font-black tracking-tighter uppercase italic">FitAssist</h1>
            </div>
            <div class="relative z-10">
                <blockquote class="text-3xl font-bold leading-tight mb-4">
                    "O único treino ruim é aquele que não aconteceu."
                </blockquote>
                <p class="text-primary font-medium">Junte-se a mais de 5.000 treinadores otimizando seu fluxo de trabalho.</p>
            </div>
        </div>
        <div class="w-full md:w-1/2 bg-background-light dark:bg-background-dark p-8 md:p-16 flex flex-col justify-center">
            <div class="max-w-md mx-auto w-full">
                <div class="md:hidden flex items-center gap-2 mb-8 justify-center">
                    <span class="material-symbols-outlined text-primary text-3xl">exercise</span>
                    <h2 class="text-2xl font-bold tracking-tight">FitAssist</h2>
                </div>
                <div class="mb-10 text-center md:text-left">
                    <h3 class="text-4xl font-black mb-3 tracking-tight">Bem-vindo</h3>
                    <p class="text-slate-500 dark:text-slate-400">Entre no painel do treinador para gerenciar seus alunos.</p>
                </div>
                <form class="space-y-6" method="POST" action="{{ route('login') }}">
                    @csrf

                    @if ($errors->any())
                    <div class="bg-red-500/10 border-2 border-red-500/50 rounded-xl p-4">
                        <div class="flex items-start gap-3">
                            <span class="material-symbols-outlined text-red-500">error</span>
                            <div class="flex-1">
                                <p class="font-semibold text-red-500 mb-1">Não foi possível entrar</p>
                                <ul class="text-sm text-red-400 space-y-1">
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endif

                    <div>
                        <label class="block text-sm font-semibold mb-2 text-slate-700 dark:text-slate-300">Endereço de Email</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-primary transition-colors">
                                <span class="material-symbols-outlined text-xl">mail</span>
                            </div>
                            <input name="email" class="w-full bg-slate-100 dark:bg-slate-800/50 border-2 border-transparent focus:border-primary/50 focus:ring-0 rounded-xl py-4 pl-12 pr-4 text-slate-900 dark:text-white transition-all placeholder:text-slate-500" placeholder="treinador@fitassist.com" type="email" value="{{ old('email') }}" required autofocus />
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between items-center mb-2">
                            <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300">Senha</label>
                            <a class="text-xs font-bold text-primary hover:underline uppercase tracking-wider" href="{{ route('password.request') }}">Esqueceu a senha?</a>
                        </div>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-primary transition-colors">
                                <span class="material-symbols-outlined text-xl">lock</span>
                            </div>
                            <input name="password" class="w-full bg-slate-100 dark:bg-slate-800/50 border-2 border-transparent focus:border-primary/50 focus:ring-0 rounded-xl py-4 pl-12 pr-12 text-slate-900 dark:text-white transition-all placeholder:text-slate-500" placeholder="••••••••" type="password" required />
                            <button class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-slate-200" type="button">
                                <span class="material-symbols-outlined text-xl">visibility</span>
                            </button>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <input name="remember" class="w-4 h-4 rounded border-slate-300 dark:border-slate-700 text-primary focus:ring-primary bg-transparent" id="remember" type="checkbox" />
                        <label class="ml-2 text-sm text-slate-600 dark:text-slate-400" for="remember">Manter conectado por 30 dias</label>
                    </div>
                    <button class="w-full bg-primary hover:bg-primary/90 text-background-dark font-black py-4 rounded-xl transition-all shadow-[0_0_20px_rgba(13,242,13,0.3)] hover:shadow-[0_0_30px_rgba(13,242,13,0.5)] transform hover:-translate-y-0.5 active:translate-y-0 flex items-center justify-center gap-2 text-lg uppercase tracking-tight" type="submit">
                        Entrar no Painel
                        <span class="material-symbols-outlined">arrow_forward</span>
                    </button>
                </form>
                <div class="mt-10 flex flex-col items-center gap-6">
                    <div class="relative w-full flex items-center justify-center">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-slate-200 dark:border-slate-800"></div>
                        </div>
                        <span class="relative px-4 bg-background-light dark:bg-background-dark text-slate-500 text-xs font-bold uppercase tracking-widest">ou entrar com</span>
                    </div>
                    <div class="grid grid-cols-2 gap-4 w-full">
                        <button class="flex items-center justify-center gap-2 py-3 px-4 rounded-xl border-2 border-slate-200 dark:border-slate-800 hover:border-primary/30 transition-colors bg-transparent">
                            <img alt="Google" class="w-5 h-5" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD1n_PBjC8qX7663nTXqYUQFNgfRKIicItyFkrEbzSOw5VyePBNp5rnvZWz35IXmiyf-2kGaGVylX2MOxMBByPXX2TyXkydc6nBFGmW9Ul0xwu93-HzeGwRYGY9Qcq2FgtsZhLdKxjWkrqPOEoliPIZCphT3CeBeVSMSocNRTp9fFLiizmhHh_SD7bIl5-I69d1iEY2IqIA1DItX1YRAURdUFGtX7zx2UQN12rXEd8tMEln_MMki1lq0Hn1uyKkDny26RB8AyMEjvn2" />
                            <span class="text-sm font-semibold">Google</span>
                        </button>
                        <button class="flex items-center justify-center gap-2 py-3 px-4 rounded-xl border-2 border-slate-200 dark:border-slate-800 hover:border-primary/30 transition-colors bg-transparent">
                            <img alt="Apple" class="w-5 h-5 dark:invert" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAa0jlZynUi9f38CVDMYZwNd1BirZAyOxs0i0hXEO9qqV6FYeTRB54TUnb1YIK8yxeXEKfZchDir-efl7TDfTmQAcSi7tQ5X_flJhXi7XeuMt1ZDFRQxqI40h1fMuW6DGFHpbpdQsSiwlCjDdNyOTSjr4TjWKFHZIy54BykPduE_n7SKP165utG-ogqEJy13L7zWqfOhjCku-7qzzHUWuUoOl1DDs-2vworHZl8yZHC2g70lGMu3HbySJsgtSBGcDlpuDssT6bt9RNZ" />
                            <span class="text-sm font-semibold">Apple</span>
                        </button>
                    </div>
                    <p class="text-sm text-slate-500">
                        Não tem uma conta?
                        <a class="text-primary font-bold hover:underline" href="{{ route('register') }}">Comece seu teste gratuito</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="fixed bottom-6 left-6 hidden lg:block">
        <div class="flex items-center gap-4 text-xs font-bold uppercase tracking-widest text-slate-500">
            <a class="hover:text-primary transition-colors" href="#">Política de Privacidade</a>
            <span>•</span>
            <a class="hover:text-primary transition-colors" href="#">Termos de Serviço</a>
            <span>•</span>
            <a class="hover:text-primary transition-colors" href="#">Suporte</a>
        </div>
    </div>
</body>
</html>