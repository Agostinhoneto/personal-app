<!DOCTYPE html>
<html class="dark" lang="en">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>FitAssist - Trainer Dashboard</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "on-surface": "#f5f8f5",
                        "surface-container-highest": "#262826",
                        "secondary-fixed": "#8cfc76",
                        "secondary": "#70de5d",
                        "inverse-on-surface": "#0a0c0a",
                        "outline": "#334155",
                        "background": "#0a0c0a",
                        "on-secondary-container": "#d9ffca",
                        "error-container": "#93000a",
                        "secondary-fixed-dim": "#70de5d",
                        "on-background": "#f5f8f5",
                        "surface-variant": "#0f172a",
                        "tertiary-fixed-dim": "#f4b8b6",
                        "tertiary-container": "#ffc2c0",
                        "error": "#ef4444",
                        "tertiary": "#ffe8e7",
                        "surface-tint": "#0df20d",
                        "surface-container-high": "#1c1e1c",
                        "surface": "#0a0c0a",
                        "on-secondary": "#003a00",
                        "on-surface-variant": "#cbd5e1",
                        "primary-container": "#0df20d1a",
                        "on-primary": "#0a0c0a",
                        "primary-fixed-dim": "#00e605",
                        "secondary-container": "#008200",
                        "surface-container-low": "#0d0f0d",
                        "primary-fixed": "#77ff61",
                        "tertiary-fixed": "#ffdad8",
                        "inverse-surface": "#f5f8f5",
                        "on-secondary-fixed": "#002200",
                        "on-tertiary-container": "#7b4d4c",
                        "on-error": "#ffffff",
                        "on-primary-fixed": "#002200",
                        "surface-container": "#121412",
                        "surface-bright": "#1a1c1a",
                        "surface-container-lowest": "#050605",
                        "primary": "#0df20d",
                        "on-tertiary-fixed": "#321111",
                        "on-error-container": "#ffdad6",
                        "surface-dim": "#080a08",
                        "on-primary-fixed-variant": "#005300",
                        "on-tertiary": "#4b2525",
                        "on-primary-container": "#0df20d",
                        "on-tertiary-fixed-variant": "#663b3a",
                        "inverse-primary": "#006e00",
                        "on-secondary-fixed-variant": "#005300",
                        "outline-variant": "#1e293b"
                    },
                    borderRadius: {
                        DEFAULT: "0.25rem",
                        lg: "0.5rem",
                        xl: "0.75rem",
                        full: "9999px"
                    },
                    fontFamily: {
                        headline: ["Inter"],
                        body: ["Inter"],
                        label: ["Inter"]
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #0a0c0a; color: #f5f8f5; }
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
        .neon-glow { text-shadow: 0 0 10px rgba(13, 242, 13, 0.4); }
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="bg-background text-on-background antialiased selection:bg-primary selection:text-on-primary">
    <!-- SideNavBar -->
    <aside class="h-screen w-64 fixed left-0 top-0 bg-[#0a0c0a] flex flex-col border-r border-white/10 z-50 hidden md:flex">
        <div class="px-6 py-8">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-primary flex items-center justify-center text-on-primary font-black text-xl">F</div>
                <div>
                    <h1 class="text-xl font-black text-[#0df20d]">FitAssist</h1>
                    <p class="text-[0.65rem] font-bold uppercase tracking-widest text-slate-500">PRO TRAINER</p>
                </div>
            </div>
        </div>
        <nav class="flex-1 px-4 space-y-2 font-['Inter'] text-[0.875rem]">
            <a class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all bg-[#0df20d]/10 text-[#0df20d] border-l-4 border-[#0df20d]" href="#">
                <span class="material-symbols-outlined">dashboard</span>
                <span class="font-bold">Dashboard</span>
            </a>
            <a href="{{ route('alunos.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all text-slate-500 hover:text-slate-200 hover:bg-white/5">
                <span class="material-symbols-outlined">group</span>
                <span>Clients</span>
            </a>
            <a href="{{ route('treinos.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all text-slate-500 hover:text-slate-200 hover:bg-white/5">
                <span class="material-symbols-outlined">fitness_center</span>
                <span>Workouts</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all text-slate-500 hover:text-slate-200 hover:bg-white/5" href="#">
                <span class="material-symbols-outlined">calendar_today</span>
                <span>Schedule</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all text-slate-500 hover:text-slate-200 hover:bg-white/5" href="#">
                <span class="material-symbols-outlined">insights</span>
                <span>Analytics</span>
            </a>
        </nav>
        <div class="px-4 py-6 mt-auto border-t border-white/5">
            <a href="{{ route('treinos.index') }}" class="w-full bg-primary text-on-primary py-3 rounded-xl font-bold text-sm active:scale-95 transition-transform flex items-center justify-center gap-2 mb-4">
                <span class="material-symbols-outlined text-[20px]">person_add</span>
                Add New Client
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-slate-500 hover:text-slate-200 hover:bg-white/5 transition-all text-[0.875rem]">
                    <span class="material-symbols-outlined">logout</span>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- TopNavBar -->
    <header class="fixed top-0 w-full z-40 bg-background-dark/80 backdrop-blur-md md:pl-64 border-b border-white/5">
        <div class="flex justify-between items-center px-8 py-4 w-full">
            <div class="md:hidden flex items-center gap-3">
                <span class="text-[1.125rem] font-bold text-[#0df20d] uppercase tracking-widest">FitAssist</span>
            </div>
            <div class="hidden md:flex items-center bg-surface-container rounded-full px-4 py-2 border border-white/10 w-96">
                <span class="material-symbols-outlined text-slate-400 text-[20px]">search</span>
                <input class="bg-transparent border-none focus:ring-0 text-sm text-on-surface w-full ml-2" placeholder="Search clients, plans, or sessions..." type="text" />
            </div>
            <div class="flex items-center gap-4">
                <button class="w-10 h-10 rounded-full flex items-center justify-center text-slate-400 hover:bg-white/5 transition-colors">
                    <span class="material-symbols-outlined">notifications</span>
                </button>
                <button class="w-10 h-10 rounded-full flex items-center justify-center text-slate-400 hover:bg-white/5 transition-colors">
                    <span class="material-symbols-outlined">settings</span>
                </button>
                <div class="h-10 w-[1px] bg-white/10 mx-2"></div>
                <div class="flex items-center gap-3">
                    <div class="text-right hidden sm:block">
                        <p class="text-xs font-bold text-on-surface">{{ $userName }}</p>
                        <p class="text-[10px] text-primary uppercase font-bold tracking-tighter">Elite Trainer</p>
                    </div>
                    <div class="w-10 h-10 rounded-full border-2 border-primary/20 bg-primary/20 flex items-center justify-center">
                        <span class="material-symbols-outlined text-primary">person</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="md:pl-64 pt-24 pb-12 min-h-screen">
        <div class="px-8 max-w-[1400px] mx-auto">
            <!-- Welcome Header -->
            <section class="mb-10">
                <h2 class="text-3xl font-black tracking-tight text-on-surface neon-glow">Performance Hub</h2>
                <p class="text-slate-400 mt-1">Hello {{ $userName }}, you have <span class="text-primary font-bold">{{ $sessionsToday }} sessions</span> scheduled for today.</p>
            </section>

            <!-- Bento Grid Stats -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-surface-container rounded-xl p-6 border border-white/5 flex flex-col relative overflow-hidden group">
                    <div class="absolute -right-4 -bottom-4 opacity-5 group-hover:opacity-10 transition-opacity">
                        <span class="material-symbols-outlined text-[100px]">groups</span>
                    </div>
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center text-primary">
                            <span class="material-symbols-outlined">groups</span>
                        </div>
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Total Students</span>
                    </div>
                    <div class="flex items-end gap-2">
                        <h3 class="text-3xl font-black text-on-surface">{{ $totalClients }}</h3>
                        <span class="text-[0.75rem] font-bold text-primary pb-1">+{{ $newClientsMonth }} this month</span>
                    </div>
                </div>

                <div class="bg-surface-container rounded-xl p-6 border border-white/5 flex flex-col relative overflow-hidden group">
                    <div class="absolute -right-4 -bottom-4 opacity-5 group-hover:opacity-10 transition-opacity">
                        <span class="material-symbols-outlined text-[100px]">fitness_center</span>
                    </div>
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center text-primary">
                            <span class="material-symbols-outlined">fitness_center</span>
                        </div>
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Active Workouts</span>
                    </div>
                    <div class="flex items-end gap-2">
                        <h3 class="text-3xl font-black text-on-surface">{{ $activeSessions }}</h3>
                        <span class="text-[0.75rem] font-bold text-primary pb-1">Live Now</span>
                    </div>
                </div>

                <div class="bg-surface-container rounded-xl p-6 border border-white/5 flex flex-col relative overflow-hidden group">
                    <div class="absolute -right-4 -bottom-4 opacity-5 group-hover:opacity-10 transition-opacity">
                        <span class="material-symbols-outlined text-[100px]">timer</span>
                    </div>
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center text-primary">
                            <span class="material-symbols-outlined">timer</span>
                        </div>
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Sessions Today</span>
                    </div>
                    <div class="flex items-end gap-2">
                        <h3 class="text-3xl font-black text-on-surface">{{ $sessionsToday }}</h3>
                        <span class="text-[0.75rem] font-bold text-slate-500 pb-1">Scheduled</span>
                    </div>
                </div>

                <div class="bg-surface-container rounded-xl p-6 border border-white/5 flex flex-col relative overflow-hidden group">
                    <div class="absolute -right-4 -bottom-4 opacity-5 group-hover:opacity-10 transition-opacity">
                        <span class="material-symbols-outlined text-[100px]">analytics</span>
                    </div>
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center text-primary">
                            <span class="material-symbols-outlined">analytics</span>
                        </div>
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Avg Completion</span>
                    </div>
                    <div class="flex items-end gap-2">
                        <h3 class="text-3xl font-black text-on-surface">{{ $avgCompletion }}</h3>
                        <span class="text-[0.75rem] font-bold text-primary pb-1">↑ 8%</span>
                    </div>
                </div>
            </div>

            <!-- Content Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                <!-- Left Column -->
                <div class="lg:col-span-8 space-y-8">
                    <!-- Chart Placeholder -->
                    <div class="bg-surface-container rounded-xl p-8 border border-white/5">
                        <div class="flex justify-between items-center mb-8">
                            <div>
                                <h4 class="text-lg font-bold">Client Engagement</h4>
                                <p class="text-xs text-slate-500">Avg. calories burned per week</p>
                            </div>
                            <div class="flex gap-2">
                                <button class="text-[10px] px-3 py-1 bg-primary text-on-primary font-bold rounded-full">WEEK</button>
                                <button class="text-[10px] px-3 py-1 bg-white/5 text-slate-400 font-bold rounded-full hover:bg-white/10 transition-colors">MONTH</button>
                            </div>
                        </div>
                        <div class="h-64 w-full flex items-end justify-between gap-2 px-2">
                            <div class="w-full bg-primary/5 rounded-t-lg relative group">
                                <div class="absolute bottom-0 w-full bg-primary/20 h-[40%] rounded-t-lg transition-all group-hover:bg-primary/40"></div>
                                <div class="absolute -top-6 left-1/2 -translate-x-1/2 opacity-0 group-hover:opacity-100 text-[10px] font-bold text-primary">450</div>
                            </div>
                            <div class="w-full bg-primary/5 rounded-t-lg relative group">
                                <div class="absolute bottom-0 w-full bg-primary/20 h-[65%] rounded-t-lg transition-all group-hover:bg-primary/40"></div>
                                <div class="absolute -top-6 left-1/2 -translate-x-1/2 opacity-0 group-hover:opacity-100 text-[10px] font-bold text-primary">720</div>
                            </div>
                            <div class="w-full bg-primary/5 rounded-t-lg relative group">
                                <div class="absolute bottom-0 w-full bg-primary/40 h-[90%] rounded-t-lg transition-all"></div>
                                <div class="absolute -top-6 left-1/2 -translate-x-1/2 opacity-100 text-[10px] font-bold text-primary">980</div>
                            </div>
                            <div class="w-full bg-primary/5 rounded-t-lg relative group">
                                <div class="absolute bottom-0 w-full bg-primary/20 h-[50%] rounded-t-lg transition-all group-hover:bg-primary/40"></div>
                                <div class="absolute -top-6 left-1/2 -translate-x-1/2 opacity-0 group-hover:opacity-100 text-[10px] font-bold text-primary">540</div>
                            </div>
                            <div class="w-full bg-primary/5 rounded-t-lg relative group">
                                <div class="absolute bottom-0 w-full bg-primary/20 h-[75%] rounded-t-lg transition-all group-hover:bg-primary/40"></div>
                                <div class="absolute -top-6 left-1/2 -translate-x-1/2 opacity-0 group-hover:opacity-100 text-[10px] font-bold text-primary">810</div>
                            </div>
                            <div class="w-full bg-primary/5 rounded-t-lg relative group">
                                <div class="absolute bottom-0 w-full bg-primary/20 h-[55%] rounded-t-lg transition-all group-hover:bg-primary/40"></div>
                                <div class="absolute -top-6 left-1/2 -translate-x-1/2 opacity-0 group-hover:opacity-100 text-[10px] font-bold text-primary">600</div>
                            </div>
                            <div class="w-full bg-primary/5 rounded-t-lg relative group">
                                <div class="absolute bottom-0 w-full bg-primary/20 h-[30%] rounded-t-lg transition-all group-hover:bg-primary/40"></div>
                                <div class="absolute -top-6 left-1/2 -translate-x-1/2 opacity-0 group-hover:opacity-100 text-[10px] font-bold text-primary">320</div>
                            </div>
                        </div>
                        <div class="flex justify-between mt-4 px-2 text-[10px] font-bold text-slate-500 uppercase tracking-widest">
                            <span>Mon</span><span>Tue</span><span>Wed</span><span>Thu</span><span>Fri</span><span>Sat</span><span>Sun</span>
                        </div>
                    </div>

                    <!-- Upcoming Sessions -->
                    <div class="bg-surface-container rounded-xl p-6 border border-white/5">
                        <div class="flex justify-between items-center mb-6">
                            <h4 class="text-lg font-bold">Upcoming Sessions</h4>
                            <a href="" class="text-xs font-bold text-primary hover:underline">View Calendar</a>
                        </div>
                        <div class="space-y-4">
                            @forelse($todaySessions as $session)
                            <div class="flex items-center justify-between p-4 bg-white/5 rounded-xl border border-white/5 hover:border-primary/20 transition-colors group">
                                <div class="flex items-center gap-4">
                                    <div class="relative">
                                        <div class="w-12 h-12 rounded-full bg-primary/20 flex items-center justify-center">
                                            <span class="material-symbols-outlined text-primary">person</span>
                                        </div>
                                        <div class="absolute bottom-0 right-0 w-3 h-3 bg-primary rounded-full border-2 border-surface-container"></div>
                                    </div>
                                    <div>
                                        <h5 class="font-bold text-sm">{{ $session['client'] }}</h5>
                                        <p class="text-xs text-slate-400">{{ $session['title'] }}</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm font-black text-on-surface">{{ $session['time'] }}</p>
                                    <p class="text-[10px] font-bold text-slate-500 uppercase">Session</p>
                                </div>
                                <a href="{{ route('treinos.index') }}" class="w-10 h-10 rounded-full flex items-center justify-center text-slate-500 hover:text-primary transition-colors">
                                    <span class="material-symbols-outlined">chevron_right</span>
                                </a>
                            </div>
                            @empty
                            <div class="p-8 text-center text-slate-500">
                                No sessions scheduled for today
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="lg:col-span-4 space-y-8">
                    <!-- New Students Quick View -->
                    <div class="bg-surface-container rounded-xl p-6 border border-white/5">
                        <h4 class="text-lg font-bold mb-6">New Students</h4>
                        <div class="space-y-6">
                            @forelse($newClients as $client)
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-lg bg-primary/20 flex items-center justify-center">
                                    <span class="material-symbols-outlined text-primary">person</span>
                                </div>
                                <div class="flex-1">
                                    <h5 class="text-sm font-bold">{{ $client['name'] }}</h5>
                                    <p class="text-[10px] text-primary font-bold uppercase tracking-tighter">{{ $client['message'] }}</p>
                                </div>
                                <a href="{{ route('alunos.index') }}" class="px-3 py-1 bg-white/5 border border-white/10 rounded-lg text-[10px] font-bold hover:bg-primary hover:text-on-primary transition-all">ASSESS</a>
                            </div>
                            @empty
                            <p class="text-center text-slate-500">No new students recently</p>
                            @endforelse
                        </div>
                        <a href="{{ route('alunos.index') }}" class="w-full mt-6 py-2 bg-white/5 text-slate-400 text-xs font-bold rounded-lg hover:bg-white/10 transition-colors block text-center">View All Applications</a>
                    </div>

                    <!-- Recent Activity Feed -->
                    <div class="bg-surface-container rounded-xl p-6 border border-white/5">
                        <h4 class="text-lg font-bold mb-6">Recent Activity</h4>
                        <div class="relative pl-6 space-y-8 before:absolute before:left-[11px] before:top-2 before:bottom-2 before:w-[2px] before:bg-white/5">
                            @forelse($activities as $activity)
                            <div class="relative">
                                <div class="absolute -left-6 top-1 w-3 h-3 bg-primary rounded-full shadow-[0_0_8px_rgba(13,242,13,0.6)]"></div>
                                <p class="text-xs text-slate-400 leading-relaxed"><span class="text-on-surface font-bold">{{ $activity['client'] }}</span> {{ $activity['activity'] }}</p>
                                <span class="text-[10px] font-bold text-slate-500 uppercase mt-1 block">{{ $activity['time'] }}</span>
                            </div>
                            @empty
                            <p class="text-center text-slate-500">No recent activity</p>
                            @endforelse
                        </div>
                    </div>

                    <!-- Motivational CTA Card -->
                    <div class="rounded-xl p-6 relative overflow-hidden bg-gradient-to-br from-primary/20 to-transparent border border-primary/20">
                        <div class="relative z-10">
                            <h4 class="text-lg font-black italic uppercase leading-none mb-2">Push Beyond</h4>
                            <p class="text-xs text-slate-300 mb-4">Your current streak: {{ $totalClients }} active students. Top performer this month.</p>
                            <a href="{{ route('treinos.index') }}" class="flex items-center gap-2 text-primary font-bold text-xs uppercase tracking-widest">
                                View Milestones
                                <span class="material-symbols-outlined text-sm">trending_up</span>
                            </a>
                        </div>
                        <div class="absolute -right-4 -bottom-4 opacity-10">
                            <span class="material-symbols-outlined text-[120px]">bolt</span>
                        </div>
                    </div>

                    <!-- Weekly Performance Summary -->
                    <div class="rounded-xl p-6 bg-primary/10 border border-primary/20">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-full bg-primary flex items-center justify-center text-on-primary">
                                <span class="material-symbols-outlined text-2xl">bolt</span>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-on-surface text-base font-bold">Weekly Performance</h3>
                                <p class="text-primary/70 text-xs">You have {{ $totalClients }} active students. Great work!</p>
                            </div>
                            <a href="" class="bg-primary text-on-primary px-3 py-1.5 rounded-lg font-bold text-xs whitespace-nowrap">Report</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- BottomNavBar for Mobile -->
    <nav class="md:hidden fixed bottom-0 left-0 right-0 bg-background-dark/95 backdrop-blur-lg flex justify-around py-4 z-50">
        <a class="flex flex-col items-center gap-1 text-[#0df20d]" href="#">
            <span class="material-symbols-outlined">dashboard</span>
            <span class="text-[10px] font-bold">Dash</span>
        </a>
        <a href="{{ route('alunos.index') }}" class="flex flex-col items-center gap-1 text-slate-500">
            <span class="material-symbols-outlined">group</span>
            <span class="text-[10px] font-bold">Clients</span>
        </a>
        <div class="relative -top-8">
            <a href="{{ route('treinos.index') }}" class="w-14 h-14 bg-primary rounded-full shadow-[0_0_20px_rgba(13,242,13,0.4)] flex items-center justify-center text-on-primary">
                <span class="material-symbols-outlined text-3xl">add</span>
            </a>
        </div>
        <a class="flex flex-col items-center gap-1 text-slate-500" href="#">
            <span class="material-symbols-outlined">calendar_today</span>
            <span class="text-[10px] font-bold">Plan</span>
        </a>
        <a class="flex flex-col items-center gap-1 text-slate-500" href="#">
            <span class="material-symbols-outlined">insights</span>
            <span class="text-[10px] font-bold">Stats</span>
        </a>
    </nav>

    <!-- Footer -->
    <footer class="md:pl-64 px-8 py-8 border-t border-white/10 mt-auto">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="flex items-center gap-2">
                <span class="material-symbols-outlined text-primary">exercise</span>
                <span class="font-bold text-on-surface">FitAssist</span>
                <span class="text-slate-500 text-sm ml-2">© 2024 Coach Dashboard</span>
            </div>
            <div class="flex gap-6 text-sm text-slate-500">
                <a href="" class="hover:text-primary transition-colors">Privacy Policy</a>
                <a href="" class="hover:text-primary transition-colors">Support Center</a>
                <a href="" class="hover:text-primary transition-colors">Community</a>
            </div>
        </div>
    </footer>
</body>
</html>