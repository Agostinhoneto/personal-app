<!DOCTYPE html>

<html class="dark" lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>FitAssist - Biblioteca de Exercícios</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet" />
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
</head>

<body class="font-display bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100 min-h-screen">
    <div class="flex h-screen overflow-hidden">
        @include('components.sidebar')
        <!-- Main Content Area -->
        <main class="flex-1 flex flex-col overflow-y-auto">
            <!-- Header Section -->
            <header class="p-8 border-b border-primary/10 flex flex-wrap items-center justify-between gap-4">
                <div>
                    <h2 class="text-3xl font-black tracking-tight">Biblioteca de Exercícios</h2>
                    <p class="text-slate-500 dark:text-slate-400 mt-1">Gerencie seu catálogo de movimentos e técnicas.</p>
                </div>
                <button class="bg-primary hover:bg-primary/90 text-background-dark font-bold py-2.5 px-6 rounded-lg flex items-center gap-2 transition-all">
                    <span class="material-symbols-outlined">add</span>
                    Adicionar Exercício
                </button>
            </header>
            <!-- Filters Section -->
            <section class="p-8 bg-slate-50/50 dark:bg-background-dark/50 space-y-6">
                <div class="flex flex-col md:flex-row gap-4">
                    <div class="relative flex-1">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">search</span>
                        <input class="w-full pl-10 pr-4 py-3 bg-white dark:bg-primary/5 border border-slate-200 dark:border-primary/20 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none text-sm transition-all" placeholder="Pesquisar exercícios..." type="text" />
                    </div>
                    <div class="flex gap-2">
                        <button class="flex items-center gap-2 px-4 py-3 bg-white dark:bg-primary/10 border border-slate-200 dark:border-primary/20 rounded-xl text-sm font-medium hover:border-primary transition-all">
                            <span class="material-symbols-outlined text-primary">filter_list</span>
                            Filtros Avançados
                        </button>
                    </div>
                </div>
                <div class="flex flex-wrap items-center gap-3">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-400 mr-2">Grupos Musculares:</span>
                    <button class="px-4 py-1.5 rounded-full bg-primary text-background-dark text-xs font-bold">Todos</button>
                    <button class="px-4 py-1.5 rounded-full bg-slate-200 dark:bg-primary/5 hover:bg-primary/20 text-slate-600 dark:text-slate-300 text-xs font-medium transition-colors">Peito</button>
                    <button class="px-4 py-1.5 rounded-full bg-slate-200 dark:bg-primary/5 hover:bg-primary/20 text-slate-600 dark:text-slate-300 text-xs font-medium transition-colors">Costas</button>
                    <button class="px-4 py-1.5 rounded-full bg-slate-200 dark:bg-primary/5 hover:bg-primary/20 text-slate-600 dark:text-slate-300 text-xs font-medium transition-colors">Pernas</button>
                    <button class="px-4 py-1.5 rounded-full bg-slate-200 dark:bg-primary/5 hover:bg-primary/20 text-slate-600 dark:text-slate-300 text-xs font-medium transition-colors">Ombros</button>
                    <button class="px-4 py-1.5 rounded-full bg-slate-200 dark:bg-primary/5 hover:bg-primary/20 text-slate-600 dark:text-slate-300 text-xs font-medium transition-colors">Braços</button>
                    <button class="px-4 py-1.5 rounded-full bg-slate-200 dark:bg-primary/5 hover:bg-primary/20 text-slate-600 dark:text-slate-300 text-xs font-medium transition-colors">Core</button>
                </div>
                <div class="flex flex-wrap items-center gap-3">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-400 mr-2">Dificuldade:</span>
                    <div class="flex p-1 bg-slate-200 dark:bg-primary/5 rounded-lg">
                        <button class="px-4 py-1 rounded-md text-xs font-bold bg-white dark:bg-background-dark shadow-sm">Iniciante</button>
                        <button class="px-4 py-1 rounded-md text-xs font-medium text-slate-500">Intermediário</button>
                        <button class="px-4 py-1 rounded-md text-xs font-medium text-slate-500">Avançado</button>
                    </div>
                </div>
            </section>
            <!-- Grid of Cards -->
            <section class="px-8 py-4 flex-1">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    <!-- Exercise Card 1 -->
                    <div class="group bg-white dark:bg-primary/5 border border-slate-200 dark:border-primary/10 rounded-2xl overflow-hidden hover:border-primary/50 transition-all flex flex-col">
                        <div class="aspect-video relative overflow-hidden">
                            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="Atleta realizando supino reto" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCdht_DNaPuPF6iflrpGYJnQD3zRsjN_NwBnYFDbY943E_DJJi5_M3QE65-W-0lagHBZijCDkoWzRXpDCjTQ5qNRphcB2w4CgzwHAhL2z68v2oo8tLzySZvhs99zNPSoz2cYRtR277R_fNIzKdR-o7WHWAh9wwGjXVRgIdbEMfqIQD9OKPH4PF9vzTqk7AEj8MEZh3K5yt-v7NVbUgJG6K0ABpFyZ-DXI_qBnXQlAoCvFOR2zeZha5sY3vMSB7Bs7Q5L3z-xRrRSBmc" />
                            <div class="absolute top-2 right-2 flex gap-1">
                                <span class="bg-background-dark/80 backdrop-blur-md text-primary px-2 py-1 rounded text-[10px] font-bold uppercase">Peito</span>
                            </div>
                        </div>
                        <div class="p-4 flex-1 flex flex-col">
                            <h3 class="font-bold text-lg mb-1">Supino Reto</h3>
                            <div class="flex items-center gap-1.5 mb-4">
                                <span class="material-symbols-outlined text-primary text-sm">signal_cellular_alt</span>
                                <span class="text-xs text-slate-500">Iniciante</span>
                            </div>
                            <div class="mt-auto flex items-center justify-between pt-4 border-t border-slate-100 dark:border-primary/10">
                                <div class="flex gap-2">
                                    <button class="p-2 rounded-lg bg-slate-100 dark:bg-primary/10 hover:bg-primary/20 text-slate-600 dark:text-primary transition-colors">
                                        <span class="material-symbols-outlined text-sm">edit</span>
                                    </button>
                                    <button class="p-2 rounded-lg bg-red-100 dark:bg-red-500/10 hover:bg-red-500/20 text-red-600 dark:text-red-400 transition-colors">
                                        <span class="material-symbols-outlined text-sm">delete</span>
                                    </button>
                                </div>
                                <button class="text-xs font-bold text-primary flex items-center gap-1 hover:underline">
                                    Ver Detalhes
                                    <span class="material-symbols-outlined text-xs">arrow_forward</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Exercise Card 2 -->
                    <div class="group bg-white dark:bg-primary/5 border border-slate-200 dark:border-primary/10 rounded-2xl overflow-hidden hover:border-primary/50 transition-all flex flex-col">
                        <div class="aspect-video relative overflow-hidden">
                            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="Atleta realizando agachamento" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAAKBv8xm5mzc4EdFEsSq4UhX-o-jDxd6VbdCOd9tNgO2U-RCN9CDMAqfzH0VljeQ1Oj40sYzou-6v8KaebhJ2Tcw49cyW9AdfM-P-mbB07YCSwUMIBUbiAk99xR5XvVR44bYL6g4ggHrnRL8EmZz3RYF7vNIFv5yROavzIOtp3URyaM-0lm-t0afYiYz9FkLaK5sHA5rBeL9b-xODPP03htwhCrY9mdARFZEYXG5LUytZLCG8G6JfEiybKZLg5omTwW6_nvDc3XzxY" />
                            <div class="absolute top-2 right-2 flex gap-1">
                                <span class="bg-background-dark/80 backdrop-blur-md text-primary px-2 py-1 rounded text-[10px] font-bold uppercase">Pernas</span>
                            </div>
                        </div>
                        <div class="p-4 flex-1 flex flex-col">
                            <h3 class="font-bold text-lg mb-1">Agachamento Livre</h3>
                            <div class="flex items-center gap-1.5 mb-4">
                                <span class="material-symbols-outlined text-primary text-sm">signal_cellular_alt_2_bar</span>
                                <span class="text-xs text-slate-500">Intermediário</span>
                            </div>
                            <div class="mt-auto flex items-center justify-between pt-4 border-t border-slate-100 dark:border-primary/10">
                                <div class="flex gap-2">
                                    <button class="p-2 rounded-lg bg-slate-100 dark:bg-primary/10 hover:bg-primary/20 text-slate-600 dark:text-primary transition-colors">
                                        <span class="material-symbols-outlined text-sm">edit</span>
                                    </button>
                                    <button class="p-2 rounded-lg bg-red-100 dark:bg-red-500/10 hover:bg-red-500/20 text-red-600 dark:text-red-400 transition-colors">
                                        <span class="material-symbols-outlined text-sm">delete</span>
                                    </button>
                                </div>
                                <button class="text-xs font-bold text-primary flex items-center gap-1 hover:underline">
                                    Ver Detalhes
                                    <span class="material-symbols-outlined text-xs">arrow_forward</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Exercise Card 3 -->
                    <div class="group bg-white dark:bg-primary/5 border border-slate-200 dark:border-primary/10 rounded-2xl overflow-hidden hover:border-primary/50 transition-all flex flex-col">
                        <div class="aspect-video relative overflow-hidden">
                            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="Atleta fazendo levantamento terra" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD4pYyXv_wQn5Yft-2vbbFsT8ytI2SaB3xPs8ybLPabq5mSGhFuZ7DXCZNQRUl6xCX3LeBnieoE_6aW7BemHNW1KyhaN01vJMmdHIGwbal7iHpuo587VY21xRq9ltcnFqDNIMVk6Q8J1glP_Orl8UuJfRGZUosPl_Ws1fvGroQJ9vrkEvK0iAqTmQ3g-ejLyca1psXhy_KAcQDTeFOIZlF27ZDTq6EEIOBDMyWQUplyNgaJuoBt2XNUv6iPW6zZ5kCMoiLNEft6Zo2m" />
                            <div class="absolute top-2 right-2 flex gap-1">
                                <span class="bg-background-dark/80 backdrop-blur-md text-primary px-2 py-1 rounded text-[10px] font-bold uppercase">Costas</span>
                            </div>
                        </div>
                        <div class="p-4 flex-1 flex flex-col">
                            <h3 class="font-bold text-lg mb-1">Levantamento Terra</h3>
                            <div class="flex items-center gap-1.5 mb-4">
                                <span class="material-symbols-outlined text-primary text-sm">signal_cellular_alt</span>
                                <span class="text-xs text-slate-500">Avançado</span>
                            </div>
                            <div class="mt-auto flex items-center justify-between pt-4 border-t border-slate-100 dark:border-primary/10">
                                <div class="flex gap-2">
                                    <button class="p-2 rounded-lg bg-slate-100 dark:bg-primary/10 hover:bg-primary/20 text-slate-600 dark:text-primary transition-colors">
                                        <span class="material-symbols-outlined text-sm">edit</span>
                                    </button>
                                    <button class="p-2 rounded-lg bg-red-100 dark:bg-red-500/10 hover:bg-red-500/20 text-red-600 dark:text-red-400 transition-colors">
                                        <span class="material-symbols-outlined text-sm">delete</span>
                                    </button>
                                </div>
                                <button class="text-xs font-bold text-primary flex items-center gap-1 hover:underline">
                                    Ver Detalhes
                                    <span class="material-symbols-outlined text-xs">arrow_forward</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Exercise Card 4 -->
                    <div class="group bg-white dark:bg-primary/5 border border-slate-200 dark:border-primary/10 rounded-2xl overflow-hidden hover:border-primary/50 transition-all flex flex-col">
                        <div class="aspect-video relative overflow-hidden">
                            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="Atleta fazendo flexão de braço" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCKWLupylaqOHH9IL26PUDV4mzsm71f24__WChGq4ogetfCx4H6nd7cYTqpRQJMQ1I58MQ1Rt1TedoxY-6v-YNseM9IpUws_xflz4I_1YlLfl60LHUhyALfrlFWPBz8sbL-mveiHEf5GZ6DUMY2WZvYlU6b8edEnbUCzwzVqT33bYdAbWWUbTffZCx47WiMwcWytTX2ZBuU1PZvXo4YaSVLEVrs2oe96_8eBRzDYmFRmXYtwExoXvTh-1ijOAAZ3TNxZOqqONGTU6iM" />
                            <div class="absolute top-2 right-2 flex gap-1">
                                <span class="bg-background-dark/80 backdrop-blur-md text-primary px-2 py-1 rounded text-[10px] font-bold uppercase">Peito</span>
                            </div>
                        </div>
                        <div class="p-4 flex-1 flex flex-col">
                            <h3 class="font-bold text-lg mb-1">Flexão de Braço</h3>
                            <div class="flex items-center gap-1.5 mb-4">
                                <span class="material-symbols-outlined text-primary text-sm">signal_cellular_alt</span>
                                <span class="text-xs text-slate-500">Iniciante</span>
                            </div>
                            <div class="mt-auto flex items-center justify-between pt-4 border-t border-slate-100 dark:border-primary/10">
                                <div class="flex gap-2">
                                    <button class="p-2 rounded-lg bg-slate-100 dark:bg-primary/10 hover:bg-primary/20 text-slate-600 dark:text-primary transition-colors">
                                        <span class="material-symbols-outlined text-sm">edit</span>
                                    </button>
                                    <button class="p-2 rounded-lg bg-red-100 dark:bg-red-500/10 hover:bg-red-500/20 text-red-600 dark:text-red-400 transition-colors">
                                        <span class="material-symbols-outlined text-sm">delete</span>
                                    </button>
                                </div>
                                <button class="text-xs font-bold text-primary flex items-center gap-1 hover:underline">
                                    Ver Detalhes
                                    <span class="material-symbols-outlined text-xs">arrow_forward</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Exercise Card 5 -->
                    <div class="group bg-white dark:bg-primary/5 border border-slate-200 dark:border-primary/10 rounded-2xl overflow-hidden hover:border-primary/50 transition-all flex flex-col">
                        <div class="aspect-video relative overflow-hidden">
                            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="Atleta fazendo barra fixa" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC7tMANLkR5Nfvz4sQk-Td7QTL7zuqDfseRfiYWIjWkPFdfRiELUeaG9fnB6EF6kxP_mXpPtiq0XZvRry7sz5HFFnF0Uo-whHZ0IzBj8FQrf3_ckgVxDth9I7w2Jzp0PUz5vekR2QIrv9eu9iX-XGkQlpocjv5EeBZL94ot70f-dEmd5b7w__iP18__P8fW7ej-XoPmpBY5cdqLw9bNle_6C9FWRLrla-Qb-FBt7CHs8u_CsOz9LZSzMUHL-t1G0iWbRxphmKn-Ju6G" />
                            <div class="absolute top-2 right-2 flex gap-1">
                                <span class="bg-background-dark/80 backdrop-blur-md text-primary px-2 py-1 rounded text-[10px] font-bold uppercase">Costas</span>
                            </div>
                        </div>
                        <div class="p-4 flex-1 flex flex-col">
                            <h3 class="font-bold text-lg mb-1">Barra Fixa</h3>
                            <div class="flex items-center gap-1.5 mb-4">
                                <span class="material-symbols-outlined text-primary text-sm">signal_cellular_alt</span>
                                <span class="text-xs text-slate-500">Intermediário</span>
                            </div>
                            <div class="mt-auto flex items-center justify-between pt-4 border-t border-slate-100 dark:border-primary/10">
                                <div class="flex gap-2">
                                    <button class="p-2 rounded-lg bg-slate-100 dark:bg-primary/10 hover:bg-primary/20 text-slate-600 dark:text-primary transition-colors">
                                        <span class="material-symbols-outlined text-sm">edit</span>
                                    </button>
                                    <button class="p-2 rounded-lg bg-red-100 dark:bg-red-500/10 hover:bg-red-500/20 text-red-600 dark:text-red-400 transition-colors">
                                        <span class="material-symbols-outlined text-sm">delete</span>
                                    </button>
                                </div>
                                <button class="text-xs font-bold text-primary flex items-center gap-1 hover:underline">
                                    Ver Detalhes
                                    <span class="material-symbols-outlined text-xs">arrow_forward</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Exercise Card 6 -->
                    <div class="group bg-white dark:bg-primary/5 border border-slate-200 dark:border-primary/10 rounded-2xl overflow-hidden hover:border-primary/50 transition-all flex flex-col">
                        <div class="aspect-video relative overflow-hidden">
                            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="Atleta fazendo rosca direta" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDUcHIHcZKVdGvhxGPt_N5T05lcRUhwnFwjW_Pqho7udEbM3_CrZFgTPcWO0RScEQnpvNpcFJT9z5i1FUMJNn5UddDankLvkHnhrjTT7a6ZGgFiMX1Kmjhq0thhEml3e07deJuf2BpdzUzfBThjI34Sjalhb31RhUvhei5N-hDXgaOEB5B4Flkdi8pK88UpJChd79CqETbxQeLsy0-HsO7B89SKd44ydqscIfqOzz8oi0ZG0K5QjGeL0zx9_ps0aGUOj5JeURUr76F8" />
                            <div class="absolute top-2 right-2 flex gap-1">
                                <span class="bg-background-dark/80 backdrop-blur-md text-primary px-2 py-1 rounded text-[10px] font-bold uppercase">Braços</span>
                            </div>
                        </div>
                        <div class="p-4 flex-1 flex flex-col">
                            <h3 class="font-bold text-lg mb-1">Rosca Direta W</h3>
                            <div class="flex items-center gap-1.5 mb-4">
                                <span class="material-symbols-outlined text-primary text-sm">signal_cellular_alt</span>
                                <span class="text-xs text-slate-500">Iniciante</span>
                            </div>
                            <div class="mt-auto flex items-center justify-between pt-4 border-t border-slate-100 dark:border-primary/10">
                                <div class="flex gap-2">
                                    <button class="p-2 rounded-lg bg-slate-100 dark:bg-primary/10 hover:bg-primary/20 text-slate-600 dark:text-primary transition-colors">
                                        <span class="material-symbols-outlined text-sm">edit</span>
                                    </button>
                                    <button class="p-2 rounded-lg bg-red-100 dark:bg-red-500/10 hover:bg-red-500/20 text-red-600 dark:text-red-400 transition-colors">
                                        <span class="material-symbols-outlined text-sm">delete</span>
                                    </button>
                                </div>
                                <button class="text-xs font-bold text-primary flex items-center gap-1 hover:underline">
                                    Ver Detalhes
                                    <span class="material-symbols-outlined text-xs">arrow_forward</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Exercise Card 7 -->
                    <div class="group bg-white dark:bg-primary/5 border border-slate-200 dark:border-primary/10 rounded-2xl overflow-hidden hover:border-primary/50 transition-all flex flex-col">
                        <div class="aspect-video relative overflow-hidden">
                            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="Atleta fazendo prancha" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBVYAfd4hHn70pMFsQJ9awhM7RJMK7az6dBZ6a6CcesPEfrDa1Fkj2Bx8W5KPDTz_XN53ddT1XW60tUP8xNU3OL3wD1OtcbrK0WRpHRsAbEZlM4LJVy1mYNYb-STt06ft1AMoVJafeISyTBxivdnqsUCHy1P2uOiP4C8ZRRtyMMjnCSAJqUBQ4m2zE8wcu--nlSfojKDS3Gi7cOd5odYxUDGLTD2Ina321RcRvP5afPKUFM8QZWNDgZBk5OfiIZ8MSiAljQXESjqVoA" />
                            <div class="absolute top-2 right-2 flex gap-1">
                                <span class="bg-background-dark/80 backdrop-blur-md text-primary px-2 py-1 rounded text-[10px] font-bold uppercase">Core</span>
                            </div>
                        </div>
                        <div class="p-4 flex-1 flex flex-col">
                            <h3 class="font-bold text-lg mb-1">Prancha Abdominal</h3>
                            <div class="flex items-center gap-1.5 mb-4">
                                <span class="material-symbols-outlined text-primary text-sm">signal_cellular_alt</span>
                                <span class="text-xs text-slate-500">Iniciante</span>
                            </div>
                            <div class="mt-auto flex items-center justify-between pt-4 border-t border-slate-100 dark:border-primary/10">
                                <div class="flex gap-2">
                                    <button class="p-2 rounded-lg bg-slate-100 dark:bg-primary/10 hover:bg-primary/20 text-slate-600 dark:text-primary transition-colors">
                                        <span class="material-symbols-outlined text-sm">edit</span>
                                    </button>
                                    <button class="p-2 rounded-lg bg-red-100 dark:bg-red-500/10 hover:bg-red-500/20 text-red-600 dark:text-red-400 transition-colors">
                                        <span class="material-symbols-outlined text-sm">delete</span>
                                    </button>
                                </div>
                                <button class="text-xs font-bold text-primary flex items-center gap-1 hover:underline">
                                    Ver Detalhes
                                    <span class="material-symbols-outlined text-xs">arrow_forward</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Exercise Card 8 (Add New Placeholder) -->
                    <div class="border-2 border-dashed border-primary/20 rounded-2xl flex flex-col items-center justify-center p-8 hover:border-primary/60 transition-all cursor-pointer bg-primary/5">
                        <div class="size-12 rounded-full bg-primary/10 flex items-center justify-center mb-4">
                            <span class="material-symbols-outlined text-primary">add_circle</span>
                        </div>
                        <p class="font-bold text-center">Novo Exercício</p>
                        <p class="text-xs text-slate-500 text-center mt-1">Crie um movimento personalizado para seus alunos.</p>
                    </div>
                </div>
            </section>
            <!-- Pagination Section -->
            <footer class="p-8 border-t border-primary/10 bg-background-light dark:bg-background-dark/80 backdrop-blur-lg mt-auto">
                <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                    <p class="text-sm text-slate-500">Mostrando <span class="font-bold text-slate-900 dark:text-slate-100">7</span> de <span class="font-bold text-slate-900 dark:text-slate-100">124</span> exercícios</p>
                    <div class="flex items-center gap-2">
                        <button class="p-2 rounded-lg border border-slate-200 dark:border-primary/20 hover:bg-primary/10 disabled:opacity-50 disabled:cursor-not-allowed">
                            <span class="material-symbols-outlined text-sm">chevron_left</span>
                        </button>
                        <button class="size-9 rounded-lg bg-primary text-background-dark font-bold text-sm shadow-lg shadow-primary/20">1</button>
                        <button class="size-9 rounded-lg border border-slate-200 dark:border-primary/20 hover:bg-primary/10 text-sm font-medium">2</button>
                        <button class="size-9 rounded-lg border border-slate-200 dark:border-primary/20 hover:bg-primary/10 text-sm font-medium">3</button>
                        <span class="px-2 text-slate-400">...</span>
                        <button class="size-9 rounded-lg border border-slate-200 dark:border-primary/20 hover:bg-primary/10 text-sm font-medium">12</button>
                        <button class="p-2 rounded-lg border border-slate-200 dark:border-primary/20 hover:bg-primary/10">
                            <span class="material-symbols-outlined text-sm">chevron_right</span>
                        </button>
                    </div>
                </div>
            </footer>
        </main>
    </div>
</body>

</html>