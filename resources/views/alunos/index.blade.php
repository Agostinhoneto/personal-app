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
                        <input class="w-full pl-10 pr-4 py-2 bg-background-light dark:bg-slate-900 border border-primary/20 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/50 text-slate-100" placeholder="Search by name, email or plan..." type="text" />
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="flex bg-primary/10 p-1 rounded-lg">
                            <button class="px-4 py-1.5 rounded-md bg-primary text-background-dark text-sm font-semibold">Active</button>
                            <button class="px-4 py-1.5 rounded-md text-slate-600 dark:text-slate-400 text-sm font-medium hover:text-primary transition-colors">Inactive</button>
                            <button class="px-4 py-1.5 rounded-md text-slate-600 dark:text-slate-400 text-sm font-medium hover:text-primary transition-colors">All</button>
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
                                    <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500">Student</th>
                                    <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500">Status</th>
                                    <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500">Program</th>
                                    <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500">Progress</th>
                                    <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500 text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-primary/5">
                                <!-- Row 1 -->
                                <tr class="hover:bg-primary/5 transition-colors group">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <img class="w-10 h-10 rounded-full object-cover border border-primary/30" data-alt="Portrait of a male fitness student" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDULnkcM4OLBMW6l30YpaUdcjI2ZjKXzQOibjl7y4PniCBttrU_EYmpKvuuaYTo-ge3Akkt_C02EOvQo8JFPt6q5C5vNrl8K-_AbQKJ3xaY1_r0VxN1lGn2LKiBn_VEwXcwsCPt3DP7HqaVsde9T9azYckNEe4Oil3tRq_bUpTC5-qgEnvyFoa2PgCaz09K_74dqzh1K_UJztGoPt1h31fq9jQOieu95E9fZ_1ljMPqAr3FivtVNje8xc3Qj7A3DJNapeTC_oPgZLzN" />
                                            <div>
                                                <div class="font-medium text-slate-900 dark:text-slate-100">Marcus Thorne</div>
                                                <div class="text-xs text-slate-500">marcus.t@email.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-primary/20 text-primary">
                                            <span class="w-1.5 h-1.5 rounded-full bg-primary mr-2"></span>
                                            Active
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-slate-300">Hypertrophy Max</div>
                                        <div class="text-xs text-slate-500">Ends in 12 days</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="w-full max-w-xs bg-slate-800 rounded-full h-1.5">
                                            <div class="bg-primary h-1.5 rounded-full" style="width: 75%"></div>
                                        </div>
                                        <span class="text-[10px] text-slate-500 mt-1 block">75% Completion</span>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <button class="text-slate-400 hover:text-primary transition-colors">
                                            <span class="material-icons">chevron_right</span>
                                        </button>
                                    </td>
                                </tr>
                                <!-- Row 2 -->
                                <tr class="hover:bg-primary/5 transition-colors group">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <img class="w-10 h-10 rounded-full object-cover border border-primary/30" data-alt="Portrait of a female fitness student" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBvwkOsoOb6d9Dfnpgh3CNPCscDgpAf1QJB3PEN0UdGQQX3A4TGRn78rlS1IEWbqGsQH_IX0HTuiatrsKL5xzaxEsJD_KkSOKnyfSwS0ovpzBR6tI1rFk8YRKsAva2-WTdf9MxqxF3OjqxfCMsZ6ofbBkL1CdubjWNw0OmqbdHTheT1k9xSX3yt5ILmYpYK6GafB3zy7cxhQDpwHK736cYobc9oXMb_KsozDjJN0dpvdGyXCeC0E2FcErd3JXl1cQ9Un-V9jIw2H7nR" />
                                            <div>
                                                <div class="font-medium text-slate-900 dark:text-slate-100">Sarah Jenkins</div>
                                                <div class="text-xs text-slate-500">s.jenkins@email.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-primary/20 text-primary">
                                            <span class="w-1.5 h-1.5 rounded-full bg-primary mr-2"></span>
                                            Active
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-slate-300">Weight Loss Core</div>
                                        <div class="text-xs text-slate-500">Ends in 45 days</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="w-full max-w-xs bg-slate-800 rounded-full h-1.5">
                                            <div class="bg-primary h-1.5 rounded-full" style="width: 40%"></div>
                                        </div>
                                        <span class="text-[10px] text-slate-500 mt-1 block">40% Completion</span>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <button class="text-slate-400 hover:text-primary transition-colors">
                                            <span class="material-icons">chevron_right</span>
                                        </button>
                                    </td>
                                </tr>
                                <!-- Row 3 -->
                                <tr class="hover:bg-primary/5 transition-colors group">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <img class="w-10 h-10 rounded-full object-cover border border-primary/30" data-alt="Portrait of a young male athlete" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDB8g0sFkR29brIiw5jEN1gcFGmVPLz3p4oKpGMjHcIKuTPO-gAPdWRlsksA8VEzc_UJqjC5Yh-7V9HX2yC9__9ka0N_hzqFoBdFPRCwYFRDXwv3zFH6cJO8Y2dHFz_931k1aT2UYlIrDyTrdlFjbf0xtQia2HOSRIYx1K0MTT_0SWjxEg_4Y4H0etn5EGntvTFGbR5xi0rKEtv8OMvYPhIwYgiuGYDpbbCexgH1H5TKC7leIy13ncMs-gGZCAYNS8CU-SlvXp3qQwU" />
                                            <div>
                                                <div class="font-medium text-slate-900 dark:text-slate-100">Leo Castelo</div>
                                                <div class="text-xs text-slate-500">leo_gym@email.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-slate-800 text-slate-500">
                                            <span class="w-1.5 h-1.5 rounded-full bg-slate-600 mr-2"></span>
                                            Inactive
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-slate-300">Basic Strength</div>
                                        <div class="text-xs text-slate-500 text-red-400">Subscription expired</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="w-full max-w-xs bg-slate-800 rounded-full h-1.5">
                                            <div class="bg-slate-600 h-1.5 rounded-full" style="width: 100%"></div>
                                        </div>
                                        <span class="text-[10px] text-slate-500 mt-1 block">100% Completion</span>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <button class="text-slate-400 hover:text-primary transition-colors">
                                            <span class="material-icons">chevron_right</span>
                                        </button>
                                    </td>
                                </tr>
                                <!-- Row 4 -->
                                <tr class="hover:bg-primary/5 transition-colors group">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <img class="w-10 h-10 rounded-full object-cover border border-primary/30" data-alt="Portrait of a focused female trainee" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBfpPm5Ia7kogyTRvOzy6PbdbHgJYLfph--noOGqJ17B2plcsgaDtdawoeJwIA5GBbpu1mPmDHd62VnkISxYg5wTiS52Ftkzb3KMkhTdQO165sLYqXHiPC6OkkrohO6BcpzM_Zl3mRf7SPcEKsqxl4vLmdh94kBvDYsFn7MzIO3YfVBNsZsDxOB5mfQLG3k-MoT6--tVv2AnwOjtdL8NUdYTcE8B1KKaM29TrDvPBVCeGVP8cnBDUSlfE6f8UnyLn4bJKPf4Fg5NEK3" />
                                            <div>
                                                <div class="font-medium text-slate-900 dark:text-slate-100">Elena Vance</div>
                                                <div class="text-xs text-slate-500">evance@email.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-primary/20 text-primary">
                                            <span class="w-1.5 h-1.5 rounded-full bg-primary mr-2"></span>
                                            Active
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-slate-300">Mobility Pro</div>
                                        <div class="text-xs text-slate-500">Ends in 22 days</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="w-full max-w-xs bg-slate-800 rounded-full h-1.5">
                                            <div class="bg-primary h-1.5 rounded-full" style="width: 15%"></div>
                                        </div>
                                        <span class="text-[10px] text-slate-500 mt-1 block">15% Completion</span>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <button class="text-slate-400 hover:text-primary transition-colors">
                                            <span class="material-icons">chevron_right</span>
                                        </button>
                                    </td>
                                </tr>
                                <!-- Row 5 -->
                                <tr class="hover:bg-primary/5 transition-colors group">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 rounded-full bg-primary/20 flex items-center justify-center text-primary font-bold border border-primary/30">DM</div>
                                            <div>
                                                <div class="font-medium text-slate-900 dark:text-slate-100">David Miller</div>
                                                <div class="text-xs text-slate-500">d.miller@email.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-primary/20 text-primary">
                                            <span class="w-1.5 h-1.5 rounded-full bg-primary mr-2"></span>
                                            Active
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-slate-300">Powerlifting Intro</div>
                                        <div class="text-xs text-slate-500">Ends in 3 days</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="w-full max-w-xs bg-slate-800 rounded-full h-1.5">
                                            <div class="bg-primary h-1.5 rounded-full" style="width: 90%"></div>
                                        </div>
                                        <span class="text-[10px] text-slate-500 mt-1 block">90% Completion</span>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <button class="text-slate-400 hover:text-primary transition-colors">
                                            <span class="material-icons">chevron_right</span>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Pagination -->
                    <div class="px-6 py-4 border-t border-primary/10 flex items-center justify-between">
                        <p class="text-sm text-slate-500">Showing 1 to 5 of 42 students</p>
                        <div class="flex gap-2">
                            <button class="p-2 rounded border border-primary/20 hover:bg-primary/10 disabled:opacity-50" disabled="">
                                <span class="material-icons text-sm">keyboard_arrow_left</span>
                            </button>
                            <button class="w-8 h-8 rounded bg-primary text-background-dark font-bold text-sm">1</button>
                            <button class="w-8 h-8 rounded hover:bg-primary/10 text-slate-400 text-sm">2</button>
                            <button class="w-8 h-8 rounded hover:bg-primary/10 text-slate-400 text-sm">3</button>
                            <button class="p-2 rounded border border-primary/20 hover:bg-primary/10">
                                <span class="material-icons text-sm">keyboard_arrow_right</span>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Stats Footer -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mt-8">
                    <div class="p-4 bg-background-light dark:bg-slate-900 rounded-xl border border-primary/10">
                        <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Total Students</p>
                        <div class="flex items-end justify-between">
                            <h3 class="text-2xl font-bold">42</h3>
                            <span class="text-xs text-primary">+3 this month</span>
                        </div>
                    </div>
                    <div class="p-4 bg-background-light dark:bg-slate-900 rounded-xl border border-primary/10">
                        <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Average Progress</p>
                        <div class="flex items-end justify-between">
                            <h3 class="text-2xl font-bold">64%</h3>
                            <div class="w-16 h-1 bg-slate-800 rounded-full mb-2 overflow-hidden">
                                <div class="bg-primary h-full" style="width: 64%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 bg-background-light dark:bg-slate-900 rounded-xl border border-primary/10">
                        <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Upcoming Renewals</p>
                        <div class="flex items-end justify-between">
                            <h3 class="text-2xl font-bold">8</h3>
                            <span class="text-xs text-yellow-400">Action required</span>
                        </div>
                    </div>
                    <div class="p-4 bg-background-light dark:bg-slate-900 rounded-xl border border-primary/10">
                        <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Active Plans</p>
                        <div class="flex items-end justify-between">
                            <h3 class="text-2xl font-bold">35</h3>
                            <span class="material-icons text-primary">trending_up</span>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>