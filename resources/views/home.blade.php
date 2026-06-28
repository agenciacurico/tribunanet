@extends('layouts.tribunanet')

@section('title', 'TribunaNet')

@section('content')

<div class="max-w-7xl mx-auto px-8 py-14">

    <div class="grid grid-cols-3 gap-8">

        {{-- Nueva transmisión --}}
        <a
            href="{{ route('new.transmission') }}"
            class="col-span-2 rounded-3xl bg-cyan-600 hover:bg-cyan-700 transition shadow-2xl p-10">

            <div class="text-7xl">

                🎥

            </div>

            <h2 class="text-5xl font-black mt-6">

                NUEVA TRANSMISIÓN

            </h2>

            <p class="mt-4 text-2xl text-cyan-100">

                Configura un partido y comienza a transmitir en menos de un minuto.

            </p>

        </a>

        {{-- Administración --}}
        <a
            href="/admin"
            class="rounded-3xl bg-slate-900 border border-slate-800 hover:border-cyan-500 transition p-8">

            <div class="text-5xl">

                ⚙

            </div>

            <h2 class="text-3xl font-bold mt-6">

                Administración

            </h2>

            <p class="text-slate-400 mt-3">

                Clubes, equipos, campeonatos y usuarios.

            </p>

        </a>

        {{-- Mis partidos --}}
        <a
            href="#"
            class="rounded-3xl bg-slate-900 border border-slate-800 hover:border-cyan-500 transition p-8">

            <div class="text-5xl">

                📂

            </div>

            <h2 class="text-3xl font-bold mt-6">

                Mis Partidos

            </h2>

            <p class="text-slate-400 mt-3">

                Reanuda o revisa transmisiones anteriores.

            </p>

        </a>

        {{-- Overlay --}}
        <a
            href="#"
            class="rounded-3xl bg-slate-900 border border-slate-800 hover:border-cyan-500 transition p-8">

            <div class="text-5xl">

                📺

            </div>

            <h2 class="text-3xl font-bold mt-6">

                Modo TV

            </h2>

            <p class="text-slate-400 mt-3">

                Overlay para OBS, PRISM y pantallas LED.

            </p>

        </a>

        {{-- Estadísticas --}}
        <a
            href="#"
            class="rounded-3xl bg-slate-900 border border-slate-800 hover:border-cyan-500 transition p-8">

            <div class="text-5xl">

                📊

            </div>

            <h2 class="text-3xl font-bold mt-6">

                Estadísticas

            </h2>

            <p class="text-slate-400 mt-3">

                Consulta el rendimiento de tus partidos.

            </p>

        </a>

    </div>

</div>

@endsection