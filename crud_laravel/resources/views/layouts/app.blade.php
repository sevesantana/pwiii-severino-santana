<!doctype html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>@yield('title', 'Usuários')</title>

        <!-- Google Fonts: Outfit -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <!-- Vite Assets -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="min-h-screen font-sans antialiased text-slate-100 selection:bg-indigo-500/30 selection:text-white">
        <!-- Background Orbs -->
        <div class="bbai-bg">
            <div class="orb orb-1"></div>
            <div class="orb orb-2"></div>
            <div class="orb orb-3"></div>
        </div>

        <div class="relative z-10 min-h-screen flex items-center justify-center px-4 py-8 sm:px-6 md:py-12">
            <main class="w-full max-w-4xl mx-auto flex flex-col justify-center">
                
                <!-- Feedback Messages (Toasts) -->
                @if (session('success'))
                    <div class="bbai-flash bbai-flash-success flex items-center gap-3 animate-fade-in" role="status" aria-live="polite">
                        <!-- SVG Check Icon -->
                        <svg class="w-5 h-5 text-emerald-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span class="text-sm font-medium">{{ session('success') }}</span>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="bbai-flash bbai-flash-error flex items-start gap-3 animate-fade-in" role="alert">
                        <!-- SVG Alert Icon -->
                        <svg class="w-5 h-5 text-rose-400 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                        <div class="text-sm font-medium">
                            <ul class="bbai-flash-list list-none p-0 m-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                <!-- Main Glass Card Container -->
                <div class="bbai-glass">
                    @yield('header')
                    @yield('content')
                </div>

            </main>
        </div>
    </body>
</html>
