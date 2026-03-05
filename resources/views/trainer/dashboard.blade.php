<!DOCTYPE html>

<html class="dark" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>FitAssist - Trainer Dashboard</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&amp;display=swap" rel="stylesheet" />
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

<body class="bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100 min-h-screen font-display">
    <div class="relative flex h-auto min-h-screen w-full flex-col overflow-x-hidden">
        <div class="layout-container flex h-full grow flex-col">
            <header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-primary/10 px-6 lg:px-40 py-4 bg-background-light dark:bg-background-dark sticky top-0 z-50">
                <div class="flex items-center gap-3 text-primary">
                    <div class="size-8 flex items-center justify-center bg-primary rounded-lg text-background-dark">
                        <span class="material-symbols-outlined font-bold">exercise</span>
                    </div>
                    <h2 class="text-slate-900 dark:text-slate-100 text-xl font-black leading-tight tracking-tight">FitAssist</h2>
                </div>
                <div class="flex flex-1 justify-end gap-6 items-center">
                    <label class="hidden md:flex flex-col min-w-40 h-10 max-w-64">
                        <div class="flex w-full flex-1 items-stretch rounded-lg h-full overflow-hidden border border-primary/20 bg-slate-100 dark:bg-primary/5">
                            <div class="text-slate-400 dark:text-primary/60 flex items-center justify-center pl-4">
                                <span class="material-symbols-outlined text-xl">search</span>
                            </div>
                            <input class="form-input flex w-full min-w-0 flex-1 border-none bg-transparent focus:ring-0 text-sm placeholder:text-slate-400 dark:placeholder:text-primary/40" placeholder="Search clients, plans..." value="" />
                        </div>
                    </label>
                    <div class="flex gap-3">
                        <a href="" class="flex size-10 cursor-pointer items-center justify-center rounded-lg bg-slate-100 dark:bg-primary/10 text-slate-600 dark:text-primary hover:bg-primary/20 transition-colors">
                            <span class="material-symbols-outlined">notifications</span>
                        </a>
                        <a href="" class="flex size-10 cursor-pointer items-center justify-center rounded-lg bg-slate-100 dark:bg-primary/10 text-slate-600 dark:text-primary hover:bg-primary/20 transition-colors">
                            <span class="material-symbols-outlined">settings</span>
                        </a>
                    </div>
                    <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10 border-2 border-primary" data-alt="Portrait of a professional fitness trainer" style="background-image: url('');"></div>
                    <form method="POST" action="{{ route('logout') }}" class="ml-4">
                        @csrf
                        <button type="submit" class="text-sm text-slate-600 dark:text-primary hover:underline">Sair</button>
                    </form>
                </div>
            </header>
            <main class="px-6 lg:px-40 py-8 max-w-[1440px] mx-auto w-full">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
                    <div class="flex flex-col gap-1">
                        <h1 class="text-slate-900 dark:text-slate-100 text-4xl font-black leading-tight tracking-tight">Trainer Dashboard</h1>
                        <p class="text-slate-500 dark:text-primary/60 text-base">Bem vindo, {{ $userName }}. Você tem {{ $sessionsToday }} sessões hoje.</p>
                    </div>
                    <a href="{{ route('treinos.create') }}" class="bg-primary text-background-dark px-6 py-2.5 rounded-lg font-bold flex items-center gap-2 hover:opacity-90 transition-opacity">
                        <span class="material-symbols-outlined">add</span>
                        Novo Plano de Treino
                    </a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
                    <div class="flex flex-col gap-2 rounded-xl p-6 bg-white dark:bg-primary/5 border border-slate-200 dark:border-primary/10 shadow-sm">
                        <div class="flex justify-between items-start">
                            <p class="text-slate-500 dark:text-primary/70 text-sm font-semibold uppercase tracking-wider">Total Clients</p>
                            <span class="material-symbols-outlined text-primary">Grupos</span>
                        </div>
                        <p class="text-slate-900 dark:text-slate-100 text-3xl font-black">{{ $totalClients }}</p>
                        <div class="flex items-center gap-1 text-primary text-sm font-bold">
                            <span class="material-symbols-outlined text-sm">trending_up</span>
                            <span>+{{ $newClientsMonth }} Mês Atual</span>
                        </div>
                    </div>
                    <div class="flex flex-col gap-2 rounded-xl p-6 bg-white dark:bg-primary/5 border border-slate-200 dark:border-primary/10 shadow-sm">
                        <div class="flex justify-between items-start">
                            <p class="text-slate-500 dark:text-primary/70 text-sm font-semibold uppercase tracking-wider">Active Sessions</p>
                            <span class="material-symbols-outlined text-primary">fitness_center</span>
                        </div>
                        <p class="text-slate-900 dark:text-slate-100 text-3xl font-black">{{ $activeSessions }}</p>
                        <div class="flex items-center gap-1 text-red-500 text-sm font-bold">
                            <span class="material-symbols-outlined text-sm">trending_down</span>
                            <span>% from last week</span>
                        </div>
                    </div>
                    <div class="flex flex-col gap-2 rounded-xl p-6 bg-white dark:bg-primary/5 border border-slate-200 dark:border-primary/10 shadow-sm">
                        <div class="flex justify-between items-start">
                            <p class="text-slate-500 dark:text-primary/70 text-sm font-semibold uppercase tracking-wider">Avg. Completion</p>
                            <span class="material-symbols-outlined text-primary">analytics</span>
                        </div>
                        <p class="text-slate-900 dark:text-slate-100 text-3xl font-black">{{ $avgCompletion }}</p>
                        <div class="flex items-center gap-1 text-primary text-sm font-bold">
                            <span class="material-symbols-outlined text-sm">check_circle</span>
                            <span>Avaliações este mês</span>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                    <div class="lg:col-span-8 flex flex-col gap-6">
                        <div class="flex flex-col bg-white dark:bg-primary/5 border border-slate-200 dark:border-primary/10 rounded-xl overflow-hidden">
                            <div class="p-6 border-b border-slate-200 dark:border-primary/10 flex justify-between items-center">
                                <h2 class="text-slate-900 dark:text-slate-100 text-xl font-bold">Today's Schedule</h2>
                                <a href="" class="text-primary text-sm font-bold hover:underline">View Calendar</a>
                            </div>
                            <div class="flex flex-col divide-y divide-slate-200 dark:divide-primary/10">
                                @forelse($todaySessions as $session)
                                <div class="p-4 flex items-center justify-between hover:bg-slate-50 dark:hover:bg-primary/10 transition-colors">
                                    <div class="flex items-center gap-4">
                                        <div class="text-primary flex items-center justify-center rounded-lg bg-primary/20 shrink-0 size-12">
                                            <span class="material-symbols-outlined">fitness_center</span>
                                        </div>
                                        <div>
                                            <p class="text-slate-900 dark:text-slate-100 font-bold">{{ $session['title'] }}</p>
                                            <p class="text-slate-500 dark:text-primary/60 text-sm">{{ $session['client'] }} - {{ $session['time'] }}</p>
                                        </div>
                                    </div>
                                    <div class="flex gap-2">
                                        <a href="{{ route('treinos.index') }}" class="bg-slate-100 dark:bg-white/10 text-slate-600 dark:text-slate-300 px-3 py-1.5 rounded-lg text-xs font-bold">Details</a>
                                    </div>
                                </div>
                                @empty
                                <div class="p-8 text-center text-slate-500 dark:text-primary/60">
                                    Nenhum treino agendado para hoje
                                </div>
                                @endforelse
                            </div>
                        </div>
                        <div class="bg-primary/10 border border-primary/20 rounded-xl p-6 flex items-center gap-6">
                            <div class="size-16 rounded-full bg-primary flex items-center justify-center text-background-dark">
                                <span class="material-symbols-outlined text-3xl font-bold">bolt</span>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-slate-900 dark:text-slate-100 text-lg font-bold">Weekly Performance Summary</h3>
                                <p class="text-slate-600 dark:text-primary/70 text-sm">Você tem {{ $totalClients }} alunos ativos. Continue com o ótimo trabalho!</p>
                            </div>
                            <a href="" class="bg-primary text-background-dark px-4 py-2 rounded-lg font-bold text-sm whitespace-nowrap">Generate Report</a>
                        </div>
                    </div>
                    <div class="lg:col-span-4 flex flex-col gap-6">
                        <div class="bg-white dark:bg-primary/5 border border-slate-200 dark:border-primary/10 rounded-xl p-6">
                            <h2 class="text-slate-900 dark:text-slate-100 text-lg font-bold mb-4">New Client Alerts</h2>
                            <div class="flex flex-col gap-4">
                                @forelse($newClients as $client)
                                <div class="flex items-center gap-3 p-3 rounded-lg bg-slate-50 dark:bg-primary/10 border-l-4 border-primary">
                                    <div class="size-10 rounded-full overflow-hidden flex-shrink-0 bg-primary/20 flex items-center justify-center">
                                        @if($client['avatar'])
                                        <img class="w-full h-full object-cover" alt="{{ $client['name'] }}" src="{{ $client['avatar'] }}" />
                                        @else
                                        <span class="material-symbols-outlined text-primary">person</span>
                                        @endif
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-slate-900 dark:text-slate-100 font-bold text-sm truncate">{{ $client['name'] }}</p>
                                        <p class="text-slate-500 dark:text-primary/60 text-xs">{{ $client['message'] }}</p>
                                    </div>
                                    <a href="{{ route('alunos.index') }}" class="text-primary hover:text-white transition-colors">
                                        <span class="material-symbols-outlined">arrow_forward</span>
                                    </a>
                                </div>
                                @empty
                                <p class="text-center text-slate-500 dark:text-primary/60">Nenhum aluno novo recentemente</p>
                                @endforelse
                            </div>
                        </div>
                        <div class="bg-white dark:bg-primary/5 border border-slate-200 dark:border-primary/10 rounded-xl p-6">
                            <h2 class="text-slate-900 dark:text-slate-100 text-lg font-bold mb-4">Client Activity</h2>
                            <div class="space-y-4">
                                @forelse($activities as $activity)
                                <div class="flex items-start gap-3">
                                    <div class="size-2 rounded-full bg-primary mt-2"></div>
                                    <p class="text-sm text-slate-600 dark:text-slate-300">
                                        <span class="font-bold text-slate-900 dark:text-white">{{ $activity['client'] }}</span> {{ $activity['activity'] }}
                                        <span class="block text-xs text-slate-400 dark:text-primary/40 mt-1">{{ $activity['time'] }}</span>
                                    </p>
                                </div>
                                @empty
                                <p class="text-center text-slate-500 dark:text-primary/60">Nenhuma atividade recente</p>
                                @endforelse
                            </div>
                            <a href="{{ route('alunos.index') }}" class="w-full mt-6 py-2 border border-primary/20 rounded-lg text-primary text-sm font-bold hover:bg-primary/5 transition-colors block text-center">View All Activity</a>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="px-6 lg:px-40 py-8 border-t border-primary/10 mt-auto">
                <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                    <div class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary">exercise</span>
                        <span class="font-bold text-slate-900 dark:text-slate-100">FitAssist</span>
                        <span class="text-slate-400 dark:text-primary/40 text-sm ml-2">© 2024 Coach Dashboard</span>
                    </div>
                    <div class="flex gap-6 text-sm text-slate-500 dark:text-primary/60">
                        <a href="" class="hover:text-primary transition-colors">Privacy Policy</a>
                        <a href="" class="hover:text-primary transition-colors">Support Center</a>
                        <a href="" class="hover:text-primary transition-colors">Community</a>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>

</html>