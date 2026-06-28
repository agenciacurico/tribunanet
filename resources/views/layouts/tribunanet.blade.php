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

    {{-- ===========================
        CABECERA
    ============================ --}}
    <header class="bg-slate-900 border-b border-slate-800">

        <div class="max-w-7xl mx-auto px-8 py-6 flex justify-between items-center">

            <div>

                <h1 class="text-5xl font-black tracking-widest">

                    🏐 TRIBUNANET

                </h1>

                <p class="text-slate-400 mt-2">

                    Opera • Transmite • Comparte

                </p>

            </div>

            <div class="text-right">

                <div class="text-slate-500 text-sm">

                    Versión 1.0

                </div>

                <div class="text-xl font-bold">

                    Mario Torres

                </div>

            </div>

        </div>

    </header>

    {{-- ===========================
        CONTENIDO
    ============================ --}}
    <main class="flex-1">

        @yield('content')

    </main>

    {{-- ===========================
        FOOTER
    ============================ --}}
    <footer class="bg-slate-900 border-t border-slate-800">

        <div class="max-w-7xl mx-auto px-8 py-5 flex justify-between text-slate-500">

            <span>

                © 2026 TribunaNet

            </span>

            <span>

                Desarrollado en Curicó 🇨🇱

            </span>

        </div>

    </footer>

</div>

@livewireScripts

</body>

</html>