<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>FitAssist - @yield('title')</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800,900" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1" rel="stylesheet" />
    
    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: '#0df20d',
                        'background-light': '#f5f8f5',
                        'background-dark': '#102210',
                    },
                },
            },
        }
    </script>
</head>
<body class="font-sans antialiased bg-background-light dark:bg-background-dark">
    <div class="min-h-screen">
        <!-- Navigation -->
        <nav class="bg-white dark:bg-background-dark border-b border-primary/10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <a href="{{ url('/') }}" class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary">exercise</span>
                            <span class="font-black text-xl text-slate-900 dark:text-slate-100">FitAssist</span>
                        </a>
                    </div>

                    <div class="flex items-center gap-4">
                        @auth
                            <a href="{{ route('dashboard') }}" class="text-slate-600 dark:text-slate-300 hover:text-primary transition-colors">
                                Dashboard
                            </a>
                            
                            <!-- Settings Dropdown -->
                            <div class="relative" x-data="{ open: false }">
                                <button @click="open = !open" class="flex items-center gap-2 text-slate-600 dark:text-slate-300 hover:text-primary">
                                    <span>{{ Auth::user()->name }}</span>
                                    <span class="material-symbols-outlined">arrow_drop_down</span>
                                </button>
                                
                                <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white dark:bg-background-dark rounded-lg shadow-lg border border-primary/10">
                                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-slate-600 dark:text-slate-300 hover:bg-primary/10">
                                        Profile
                                    </a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-slate-600 dark:text-slate-300 hover:bg-primary/10">
                                            Logout
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @else
                            <a href="{{ route('login') }}" class="text-slate-600 dark:text-slate-300 hover:text-primary">Login</a>
                            <a href="{{ route('register') }}" class="bg-primary text-background-dark px-4 py-2 rounded-lg font-semibold">Register</a>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>
    </div>

    <!-- Alpine.js for dropdown -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>