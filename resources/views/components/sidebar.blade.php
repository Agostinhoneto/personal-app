<!-- Sidebar Navigation -->
<aside class="w-64 flex flex-col border-r border-primary/10 bg-background-light dark:bg-background-dark shrink-0">
    <div class="p-6 flex items-center gap-3">
        <div class="size-10 rounded-full bg-primary flex items-center justify-center text-background-dark font-bold text-xl overflow-hidden">
            <span class="material-symbols-outlined font-bold">fitness_center</span>
        </div>
        <div>
            <h1 class="text-lg font-bold leading-tight">FitAssist</h1>
            <p class="text-xs text-primary/70">Personal Trainer</p>
        </div>
    </div>
    <nav class="flex-1 px-4 py-4 space-y-1">
        <a class="flex items-center gap-3 px-3 py-2 {{ request()->routeIs('dashboard') ? 'bg-primary/20 text-primary' : 'text-slate-600 dark:text-slate-400 hover:bg-primary/10 hover:text-primary' }} rounded-lg transition-colors" href="{{ route('dashboard') }}">
            <span class="material-symbols-outlined">dashboard</span>
            <span class="text-sm font-medium">Dashboard</span>
        </a>
        <a class="flex items-center gap-3 px-3 py-2 {{ request()->routeIs('alunos.*') ? 'bg-primary/20 text-primary' : 'text-slate-600 dark:text-slate-400 hover:bg-primary/10 hover:text-primary' }} rounded-lg transition-colors" href="{{ route('alunos.index') }}">
            <span class="material-symbols-outlined">group</span>
            <span class="text-sm font-medium">Alunos</span>
        </a>
        <a class="flex items-center gap-3 px-3 py-2 {{ request()->routeIs('treinos.*') ? 'bg-primary/20 text-primary' : 'text-slate-600 dark:text-slate-400 hover:bg-primary/10 hover:text-primary' }} rounded-lg transition-colors" href="{{ route('treinos.index') }}">
            <span class="material-symbols-outlined">fitness_center</span>
            <span class="text-sm font-medium">Treinos</span>
        </a>
        <a class="flex items-center gap-3 px-3 py-2 {{ request()->routeIs('exercicios.*') ? 'bg-primary/20 text-primary' : 'text-slate-600 dark:text-slate-400 hover:bg-primary/10 hover:text-primary' }} rounded-lg transition-colors" href="{{ route('exercicios.index') }}">
            <span class="material-symbols-outlined">menu_book</span>
            <span class="text-sm font-medium">Biblioteca</span>
        </a>
        <a class="flex items-center gap-3 px-3 py-2 text-slate-600 dark:text-slate-400 hover:bg-primary/10 hover:text-primary rounded-lg transition-colors" href="#">
            <span class="material-symbols-outlined">settings</span>
            <span class="text-sm font-medium">Configurações</span>
        </a>
    </nav>
    <div class="p-4 border-t border-primary/10">
        <div class="flex items-center gap-3 p-2">
            <div class="size-8 rounded-full bg-primary/20 flex items-center justify-center">
                <span class="material-symbols-outlined text-primary text-sm">person</span>
            </div>
            <div class="flex-1 overflow-hidden">
                <p class="text-xs font-bold truncate">{{ Auth::user()->name ?? 'Usuário' }}</p>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-[10px] text-slate-500 hover:text-primary truncate">Sair da conta</button>
                </form>
            </div>
        </div>
    </div>
</aside>
