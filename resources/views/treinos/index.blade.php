<!DOCTYPE html>

<html class="dark" lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>FitAssist - Meus Treinos</title>
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

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100">
    <div class="flex min-h-screen">
        @include('components.sidebar')
        <!-- Main Content -->
        <main class="flex-1 flex flex-col overflow-y-auto">
            <!-- Header -->
            <header class="px-8 pt-8 pb-4 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div>
                    <h2 class="text-3xl font-black tracking-tight uppercase italic">Meus Treinos</h2>
                    <p class="text-slate-500 dark:text-slate-400">Gerencie e crie rotinas personalizadas para seus alunos.</p>
                </div>
                <a href="/treinos/create">
                    <button class="bg-primary hover:bg-primary/90 text-background-dark font-bold px-6 py-2.5 rounded-lg flex items-center gap-2 transition-transform active:scale-95 shadow-lg shadow-primary/20">
                        <span class="material-symbols-outlined">add</span>
                        <span>Criar Novo Treino</span>
                    </button>
                </a>
            </header>
            <!-- Search and Filters -->
            <section class="px-8 py-4 space-y-4">
                <div class="flex flex-col lg:flex-row gap-4">
                    <div class="relative flex-1">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">search</span>
                        <input class="w-full bg-slate-100 dark:bg-primary/5 border-none focus:ring-2 focus:ring-primary rounded-lg pl-10 pr-4 py-2.5 text-sm" placeholder="Buscar treinos..." type="text" />
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <div class="group relative">
                            <button class="flex items-center gap-2 px-4 py-2.5 bg-slate-100 dark:bg-primary/5 rounded-lg text-sm font-medium hover:bg-slate-200 dark:hover:bg-primary/10 border border-transparent dark:border-primary/10">
                                <span>Nível</span>
                                <span class="material-symbols-outlined text-xs">keyboard_arrow_down</span>
                            </button>
                        </div>
                        <div class="group relative">
                            <button class="flex items-center gap-2 px-4 py-2.5 bg-slate-100 dark:bg-primary/5 rounded-lg text-sm font-medium hover:bg-slate-200 dark:hover:bg-primary/10 border border-transparent dark:border-primary/10">
                                <span>Divisão</span>
                                <span class="material-symbols-outlined text-xs">keyboard_arrow_down</span>
                            </button>
                        </div>
                        <button class="flex items-center gap-2 px-4 py-2.5 bg-slate-200 dark:bg-primary/20 rounded-lg text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-primary">
                            Limpar Filtros
                        </button>
                    </div>
                </div>
                <div class="flex flex-wrap gap-2">
                    <span class="px-3 py-1 rounded-full bg-primary/10 text-primary text-xs font-semibold border border-primary/30 flex items-center gap-1">Iniciante <span class="material-symbols-outlined text-[14px] cursor-pointer">close</span></span>
                    <span class="px-3 py-1 rounded-full bg-primary/10 text-primary text-xs font-semibold border border-primary/30 flex items-center gap-1">ABC <span class="material-symbols-outlined text-[14px] cursor-pointer">close</span></span>
                </div>
            </section>
            <!-- Workout Grid -->
            <section class="px-8 py-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                @php
                    $images = [
                        'https://lh3.googleusercontent.com/aida-public/AB6AXuAtfBS09ttZdN79lw_iZY655RIDcIVs_FSg3rPiQ5nZeKAEMizE2Zh2pDRaXu7so8QCw3Yh55zUa_lGa-1rgvERw1P99Bxn9xXyO3pWTLFRecWET6eF81EJy6N7pEytEdmVPEQFbc_VEos7cIB1eqzZ59JpkYTQMw8ssiGLWBEgyYqhS6qiR1XIh7Yc0qULxHza8tidC7ujVA2rdkjJLYWTQHpV2DGHbZHngo7WUFCdX_-Wk5fbDrSR2ChKkfZgW-5zQJB55DHh3-qv',
                        'https://lh3.googleusercontent.com/aida-public/AB6AXuCvlJEkAWf3d2NDVZ4T7wy5jh_cx9xtHpQ6N25vTzi3vXwSH7VX3hpfO3evNrw9mdx5msJ38QB__YzxA1j4Qn9ryB-m7Cl-5ytjM1BxWnmv7mLF7d5xv8L0veDseOP-R2UaWgtZN77cLlxMKIszWtqZsTJoRsbLE1SfBdnCZzfFPJADIliIFRF-ZMDTM6dhcMixIDUGbSXAFGxhPbuGE1zYGUfKYM-HEakq7xDttdytAWYzzieilxfAKLXfZJY0m71DDbQY1RCD9UKq',
                        'https://lh3.googleusercontent.com/aida-public/AB6AXuDfLc3LQQvOXckki5-owJkfq2EevhUci8hqVKjBGz75tzU3nKvdLQH-ZRCRVYaRdm75kV8NggbxTp4fV8HlQYpDIgsTzWK0lSbH6Cm_8gDlgWcxNbyNHXEp4AgRRc-V0K-qewwBwd9N1wmcF33P7To8JVa9rzGGjZlF7mvJ1dVe-X1m9lF5v1poNP7pNXLR7yE2O0OuE9p_B3zusqlUlFh1ILsft2z_AK5neTdcDA4fq2gegPOL2MX2AwMyOCGQGA6ig9EPKRT1fiOD'
                    ];
                    $niveisMap = ['ativo' => 'Ativo', 'concluido' => 'Concluído', 'pausado' => 'Pausado'];
                @endphp

                @forelse($treinos as $index => $treino)
                <!-- Card Treino -->
                <div class="bg-slate-50 dark:bg-[#162a16] border border-slate-200 dark:border-primary/10 rounded-xl overflow-hidden flex flex-col group hover:shadow-2xl hover:shadow-primary/5 transition-all">
                    <div class="h-48 bg-slate-200 dark:bg-slate-800 relative overflow-hidden">
                        <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110 opacity-80" alt="{{ $treino->nome }}" src="{{ $images[$index % 3] }}" />
                        <div class="absolute inset-0 bg-gradient-to-t from-background-dark/80 to-transparent"></div>
                        <div class="absolute bottom-4 left-4 right-4 flex justify-between items-center">
                            <span class="bg-primary/90 text-background-dark text-[10px] font-bold uppercase tracking-widest px-2 py-0.5 rounded">
                                {{ $niveisMap[$treino->status] ?? $treino->status }}
                            </span>
                            <span class="text-white text-xs font-medium flex items-center gap-1">
                                <span class="material-symbols-outlined text-[16px]">format_list_bulleted</span> 
                                {{ $treino->exercicios->count() }} Exercícios
                            </span>
                        </div>
                    </div>
                    <div class="p-5 flex-1 flex flex-col">
                        <h3 class="text-lg font-bold mb-2 group-hover:text-primary transition-colors">{{ $treino->nome }}</h3>
                        <div class="flex flex-wrap gap-1.5 mb-4">
                            <span class="px-2 py-0.5 bg-slate-200 dark:bg-slate-800 rounded text-[10px] font-medium uppercase text-slate-600 dark:text-slate-400">
                                {{ $treino->aluno->usuario->nome }}
                            </span>
                            @if($treino->objetivo)
                                <span class="px-2 py-0.5 bg-slate-200 dark:bg-slate-800 rounded text-[10px] font-medium uppercase text-slate-600 dark:text-slate-400">
                                    {{ Str::limit($treino->objetivo, 15) }}
                                </span>
                            @endif
                        </div>
                        <p class="text-xs text-slate-500 dark:text-slate-400 mb-4">
                            Início: {{ $treino->data_inicio->format('d/m/Y') }}
                            @if($treino->data_fim)
                                | Fim: {{ $treino->data_fim->format('d/m/Y') }}
                            @endif
                        </p>
                        <div class="mt-auto grid grid-cols-2 gap-2">
                            <a href="{{ route('treinos.edit', $treino->id) }}" class="flex-1 bg-primary/10 hover:bg-primary/20 text-primary border border-primary/20 text-xs font-bold py-2 rounded-lg transition-colors text-center">
                                EDITAR
                            </a>
                            <a href="{{ route('treinos.show', $treino->id) }}" class="flex-1 bg-slate-200 dark:bg-slate-800 hover:bg-slate-300 dark:hover:bg-slate-700 text-slate-700 dark:text-slate-300 text-xs font-bold py-2 rounded-lg transition-colors text-center">
                                DETALHES
                            </a>
                            <form action="{{ route('treinos.destroy', $treino->id) }}" method="POST" class="col-span-2" onsubmit="return confirm('Tem certeza que deseja excluir este treino?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full border border-red-500/30 text-red-500 hover:bg-red-500/10 text-[10px] font-bold py-1.5 rounded-lg transition-colors mt-2 flex items-center justify-center gap-1">
                                    <span class="material-symbols-outlined text-[14px]">delete</span> EXCLUIR TREINO
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @empty
                <!-- Empty State -->
                <div class="col-span-full flex flex-col items-center justify-center py-16 gap-4">
                    <div class="w-20 h-20 rounded-full bg-slate-200 dark:bg-primary/10 flex items-center justify-center text-slate-400 dark:text-primary/40">
                        <span class="material-symbols-outlined text-5xl">fitness_center</span>
                    </div>
                    <div class="text-center">
                        <p class="font-bold text-lg mb-2">Nenhum treino encontrado</p>
                        <p class="text-sm text-slate-500 dark:text-slate-400">Comece criando um novo plano de treino para seus alunos</p>
                    </div>
                    <a href="{{ route('treinos.create') }}" class="bg-primary hover:bg-primary/90 text-background-dark font-bold px-6 py-2.5 rounded-lg flex items-center gap-2 transition-transform active:scale-95 shadow-lg shadow-primary/20 mt-4">
                        <span class="material-symbols-outlined">add</span>
                        <span>Criar Primeiro Treino</span>
                    </a>
                </div>
                @endforelse

                <!-- Add New Placeholder Card -->
                @if($treinos->count() > 0)
                <a href="{{ route('treinos.create') }}" class="border-2 border-dashed border-primary/20 rounded-xl flex flex-col items-center justify-center p-8 gap-4 hover:border-primary/40 hover:bg-primary/5 transition-all cursor-pointer">
                    <div class="w-12 h-12 rounded-full bg-primary/20 flex items-center justify-center text-primary">
                        <span class="material-symbols-outlined text-3xl">add</span>
                    </div>
                    <div class="text-center">
                        <p class="font-bold">Criar Nova Rotina</p>
                        <p class="text-xs text-slate-500">Adicione um novo plano de treino para seus alunos</p>
                    </div>
                </a>
                @endif
            </section>

            <!-- Pagination -->
            @if($treinos->hasPages())
            <div class="px-8 pb-8">
                {{ $treinos->links() }}
            </div>
            @endif
        </main>
    </div>
</body>

</html>