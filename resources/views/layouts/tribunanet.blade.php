<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'TribunaNet')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body class="bg-slate-950 text-white">

<div class="min-h-screen flex flex-col">

    <header class="sticky top-0 z-50 border-b border-slate-800 bg-slate-950/90 backdrop-blur">

        <div class="max-w-7xl mx-auto h-16 px-6 flex items-center justify-between">

            <a href="{{ route('home') }}" class="flex items-center gap-3">

                <span class="text-3xl">🏐</span>

                <span class="text-3xl font-black tracking-wider">
                    TRIBUNA<span class="text-emerald-400">NET</span>
                </span>

            </a>

            <nav class="hidden md:flex items-center gap-8">

                <a href="#" class="hover:text-emerald-400 transition">
                    En Vivo
                </a>

                <a href="#" class="hover:text-emerald-400 transition">
                    Próximos
                </a>

                <a href="#" class="hover:text-emerald-400 transition">
                    Resultados
                </a>

            </nav>

            @auth

                <a href="{{ route('dashboard') }}"
                   class="rounded-lg bg-emerald-500 px-5 py-2 font-semibold text-slate-950 hover:bg-emerald-400">
                    Panel
                </a>

            @else

                <a href="{{ route('login') }}"
                   class="rounded-lg border border-slate-700 px-5 py-2 hover:bg-slate-800">
                    Iniciar sesión
                </a>

            @endauth

        </div>

    </header>

    <main class="flex-1">

        @yield('content')

    </main>

    <footer class="border-t border-slate-800 bg-slate-900">

        <div class="max-w-7xl mx-auto px-6 py-6 flex flex-col md:flex-row justify-between text-sm text-slate-500">

            <span>© {{ date('Y') }} TribunaNet</span>

            <span>Desarrollado por Agencia Curicó</span>

        </div>

    </footer>

</div>

@livewireScripts

</body>
</html>