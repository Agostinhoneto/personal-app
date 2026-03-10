<!DOCTYPE html>

<html class="dark" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>FitAssist - Configuração de Alunos</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
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
</head>

<body class="font-display bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100 min-h-screen">
    <div class="flex min-h-screen">
        @include('components.sidebar')
        <!-- Main Content -->
        <main class="flex-1 flex flex-col">
            <!-- Header -->
            <header class="h-16 border-b border-primary/10 flex items-center justify-between px-8 bg-background-light/50 dark:bg-background-dark/50 backdrop-blur-md sticky top-0 z-10">
                <h1 class="text-lg font-semibold">Configuração de Alunos</h1>
                <div class="flex items-center gap-4">
                    <button class="p-2 rounded-full hover:bg-primary/10 text-slate-600 dark:text-slate-400">
                        <span class="material-icons">notifications</span>
                    </button>
                    <div class="flex items-center gap-3 pl-4 border-l border-primary/10">
                        <div class="text-right">
                            <p class="text-sm font-medium">Alex Rivera</p>
                            <p class="text-xs text-primary">Head Coach</p>
                        </div>
                        <img class="w-10 h-10 rounded-full border-2 border-primary object-cover" data-alt="Profile picture of a fitness coach" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA21KPNmY-hBKwfpnXpVusEuJoP20W6xaz27iznI_5YIetxptaXK6oppYwHOQqMGCgPBhWuQp1Fwj6PZ-mwRg1URqZAWtBfZ_RO5xFlWOKCDgKtChL8FcI9DdzSx9EIiuEoExPo0pUp-8jno3RdX4jk3PVfeQIY7q17VpP7GIhKOcjoM2fGBzBu70Yup2cVPgez3d5E3YVaG1uYiFU_bPZzNl3i9lRiQJ5hMtnr7nfpAeJFof6IOT4nrydc1J4q0liShqbiu6CfDUXZ" />
                    </div>
                </div>
            </header>
            <!-- Table Content -->
            <div class="p-8 max-w-7xl mx-auto w-full">
                <!-- Action Bar -->
                <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
                    <div class="relative flex-1 max-w-md">
                        <span class="material-icons absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">search</span>
                        <input class="w-full pl-10 pr-4 py-2 bg-background-light dark:bg-slate-900 border border-primary/20 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/50 text-slate-100" placeholder="Pesquisar por nome, email ou plano..." type="text" />
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="flex bg-primary/10 p-1 rounded-lg">
                            <button class="px-4 py-1.5 rounded-md bg-primary text-background-dark text-sm font-semibold">Ativos</button>
                            <button class="px-4 py-1.5 rounded-md text-slate-600 dark:text-slate-400 text-sm font-medium hover:text-primary transition-colors">Inativos</button>
                            <button class="px-4 py-1.5 rounded-md text-slate-600 dark:text-slate-400 text-sm font-medium hover:text-primary transition-colors">Todos</button>
                        </div>
                        <a href="{{ route('alunos.create') }}">
                            <button class="flex items-center gap-2 bg-primary px-4 py-2 rounded-lg text-background-dark font-bold hover:brightness-110 transition-all">
                                <span class="material-icons text-sm">person_add</span>
                                <span>Criar Aluno</span>
                            </button>
                        </a>
                    </div>
                </div>
                <!-- Table Card -->
                <div class="bg-background-light dark:bg-slate-900/50 rounded-xl border border-primary/10 overflow-hidden shadow-2xl">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead>
                                <tr class="border-b border-primary/10 bg-primary/5">
                                    <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500">Alunos</th>
                                    <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500">Status</th>
                                    <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500">Programa</th>
                                    <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500">Progresso</th>
                                    <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500 text-right">Ação</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-primary/5">
                                @forelse($alunos as $aluno)
                                @php
                                    // Buscar treino ativo do aluno
                                    $treinoAtivo = $aluno->treinos->first();
                                    $status = $treinoAtivo ? 'Ativo' : 'Inativo';
                                    $statusClass = $treinoAtivo ? 'bg-primary/20 text-primary' : 'bg-slate-800 text-slate-500';
                                    $statusDotClass = $treinoAtivo ? 'bg-primary' : 'bg-slate-600';
                                    
                                    // Calcular progresso
                                    $progresso = 0;
                                    $diasRestantes = 0;
                                    $programaNome = 'Sem programa';
                                    $programaStatus = '';
                                    
                                    if ($treinoAtivo && $treinoAtivo->data_inicio && $treinoAtivo->data_fim) {
                                        $programaNome = $treinoAtivo->nome;
                                        $dataInicio = \Carbon\Carbon::parse($treinoAtivo->data_inicio);
                                        $dataFim = \Carbon\Carbon::parse($treinoAtivo->data_fim);
                                        $hoje = \Carbon\Carbon::now();
                                        
                                        $totalDias = $dataInicio->diffInDays($dataFim);
                                        $diasPassados = $dataInicio->diffInDays($hoje);
                                        $diasRestantes = $hoje->diffInDays($dataFim, false);
                                        
                                        if ($totalDias > 0) {
                                            $progresso = min(100, round(($diasPassados / $totalDias) * 100));
                                        }
                                        
                                        if ($diasRestantes > 0) {
                                            $programaStatus = "Termina em {$diasRestantes} dias";
                                        } elseif ($diasRestantes === 0) {
                                            $programaStatus = "Termina hoje";
                                        } else {
                                            $programaStatus = "Expirado";
                                            $status = 'Inativo';
                                            $statusClass = 'bg-slate-800 text-slate-500';
                                            $statusDotClass = 'bg-slate-600';
                                        }
                                    }
                                    
                                    // Avatar ou iniciais
                                    $avatar = $aluno->usuario->foto ?? null;
                                    $iniciais = strtoupper(substr($aluno->usuario->nome, 0, 1));
                                    if (str_word_count($aluno->usuario->nome) > 1) {
                                        $palavras = explode(' ', $aluno->usuario->nome);
                                        $iniciais = strtoupper(substr($palavras[0], 0, 1) . substr(end($palavras), 0, 1));
                                    }
                                @endphp
                                <tr class="hover:bg-primary/5 transition-colors group">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            @if($avatar)
                                                <img class="w-10 h-10 rounded-full object-cover border border-primary/30" alt="{{ $aluno->usuario->nome }}" src="{{ $avatar }}" />
                                            @else
                                                <div class="w-10 h-10 rounded-full bg-primary/20 flex items-center justify-center text-primary font-bold border border-primary/30">
                                                    {{ $iniciais }}
                                                </div>
                                            @endif
                                            <div>
                                                <div class="font-medium text-slate-900 dark:text-slate-100">{{ $aluno->usuario->nome }}</div>
                                                <div class="text-xs text-slate-500">{{ $aluno->usuario->email }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $statusClass }}">
                                            <span class="w-1.5 h-1.5 rounded-full {{ $statusDotClass }} mr-2"></span>
                                            {{ $status }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-slate-300">{{ $programaNome }}</div>
                                        <div class="text-xs text-slate-500 {{ $diasRestantes < 0 ? 'text-red-400' : '' }}">
                                            {{ $programaStatus }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="w-full max-w-xs bg-slate-800 rounded-full h-1.5">
                                            <div class="h-1.5 rounded-full {{ $progresso > 0 ? 'bg-primary' : 'bg-slate-600' }}" style="width: {{ $progresso }}%"></div>
                                        </div>
                                        <span class="text-[10px] text-slate-500 mt-1 block">{{ $progresso }}% Concluído</span>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <a href="{{ route('alunos.show', $aluno->id) }}" class="text-slate-400 hover:text-primary transition-colors">
                                            <span class="material-icons">chevron_right</span>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-8 text-center text-slate-500">
                                        <div class="flex flex-col items-center gap-2">
                                            <span class="material-icons text-4xl text-slate-600">person_off</span>
                                            <p>Nenhum aluno cadastrado ainda</p>
                                            <a href="{{ route('alunos.create') }}" class="mt-2 text-primary hover:underline text-sm">
                                                Criar primeiro aluno
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- Pagination -->
                    <div class="px-6 py-4 border-t border-primary/10 flex items-center justify-between">
                        <p class="text-sm text-slate-500">
                            Mostrando {{ $alunos->firstItem() ?? 0 }} a {{ $alunos->lastItem() ?? 0 }} de {{ $alunos->total() }} alunos
                        </p>
                        <div class="flex gap-2">
                            @if ($alunos->onFirstPage())
                                <button class="p-2 rounded border border-primary/20 opacity-50 cursor-not-allowed" disabled>
                                    <span class="material-icons text-sm">keyboard_arrow_left</span>
                                </button>
                            @else
                                <a href="{{ $alunos->previousPageUrl() }}" class="p-2 rounded border border-primary/20 hover:bg-primary/10">
                                    <span class="material-icons text-sm">keyboard_arrow_left</span>
                                </a>
                            @endif

                            @php
                                $start = max(1, $alunos->currentPage() - 1);
                                $end = min($alunos->lastPage(), $alunos->currentPage() + 1);
                            @endphp

                            @if($start > 1)
                                <a href="{{ $alunos->url(1) }}" class="w-8 h-8 rounded hover:bg-primary/10 text-slate-400 text-sm flex items-center justify-center">1</a>
                                @if($start > 2)
                                    <span class="w-8 h-8 flex items-center justify-center text-slate-500">...</span>
                                @endif
                            @endif

                            @for($page = $start; $page <= $end; $page++)
                                @if ($page == $alunos->currentPage())
                                    <button class="w-8 h-8 rounded bg-primary text-background-dark font-bold text-sm">{{ $page }}</button>
                                @else
                                    <a href="{{ $alunos->url($page) }}" class="w-8 h-8 rounded hover:bg-primary/10 text-slate-400 text-sm flex items-center justify-center">{{ $page }}</a>
                                @endif
                            @endfor

                            @if($end < $alunos->lastPage())
                                @if($end < $alunos->lastPage() - 1)
                                    <span class="w-8 h-8 flex items-center justify-center text-slate-500">...</span>
                                @endif
                                <a href="{{ $alunos->url($alunos->lastPage()) }}" class="w-8 h-8 rounded hover:bg-primary/10 text-slate-400 text-sm flex items-center justify-center">{{ $alunos->lastPage() }}</a>
                            @endif

                            @if ($alunos->hasMorePages())
                                <a href="{{ $alunos->nextPageUrl() }}" class="p-2 rounded border border-primary/20 hover:bg-primary/10">
                                    <span class="material-icons text-sm">keyboard_arrow_right</span>
                                </a>
                            @else
                                <button class="p-2 rounded border border-primary/20 opacity-50 cursor-not-allowed" disabled>
                                    <span class="material-icons text-sm">keyboard_arrow_right</span>
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- Stats Footer -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mt-8">
                    <div class="p-4 bg-background-light dark:bg-slate-900 rounded-xl border border-primary/10">
                        <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Total de Alunos</p>
                        <div class="flex items-end justify-between">
                            <h3 class="text-2xl font-bold">{{ $totalAlunos }}</h3>
                            <span class="text-xs text-primary">+{{ $novosAlunosMes }} este mês</span>
                        </div>
                    </div>
                    <div class="p-4 bg-background-light dark:bg-slate-900 rounded-xl border border-primary/10">
                        <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Progresso Médio</p>
                        <div class="flex items-end justify-between">
                            <h3 class="text-2xl font-bold">{{ $progressoMedio }}%</h3>
                            <div class="w-16 h-1 bg-slate-800 rounded-full mb-2 overflow-hidden">
                                <div class="bg-primary h-full" style="width: {{ $progressoMedio }}%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 bg-background-light dark:bg-slate-900 rounded-xl border border-primary/10">
                        <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Renovações Pendentes</p>
                        <div class="flex items-end justify-between">
                            <h3 class="text-2xl font-bold">-</h3>
                            <span class="text-xs text-slate-500">Em breve</span>
                        </div>
                    </div>
                    <div class="p-4 bg-background-light dark:bg-slate-900 rounded-xl border border-primary/10">
                        <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Planos Ativos</p>
                        <div class="flex items-end justify-between">
                            <h3 class="text-2xl font-bold">{{ $planosAtivos }}</h3>
                            <span class="material-icons text-primary">trending_up</span>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>