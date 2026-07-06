@extends('layouts.tribunanet')

@section('title', $game->display_name)

@section('content')

<div class="max-w-7xl mx-auto px-6 py-8">

    {{-- CABECERA --}}
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6 mb-8">

        <div>

            <a href="{{ route('home') }}"
               class="text-emerald-400 hover:text-emerald-300">

                ← Volver

            </a>

            <h1 class="mt-3 text-4xl font-black">

                {{ $game->homeTeam->name }}

                <span class="text-slate-500 mx-3">
                    vs
                </span>

                {{ $game->awayTeam->name }}

            </h1>

            <div class="mt-3 text-slate-400">

                {{ $game->tournament?->name }}

                ·

                {{ $game->category?->name }}

            </div>

        </div>

        <div>

            @if($game->status === 'live')

                <span class="inline-flex items-center gap-2 rounded-full bg-red-600 px-4 py-2 font-bold">

                    <span class="h-3 w-3 rounded-full bg-white animate-pulse"></span>

                    EN VIVO

                </span>

            @endif

        </div>

    </div>

    @php
        $set = $game->sets
            ->where('set_number', $game->current_set)
            ->first();
    @endphp

    {{-- MARCADOR --}}
    <div class="rounded-2xl border border-slate-800 bg-slate-900 p-10">

        <div class="grid grid-cols-3 items-center gap-8">

            <div class="text-center">

                <div class="text-3xl font-black">

                    {{ $game->homeTeam->name }}

                </div>

                <div class="mt-6 text-6xl font-black">

                    {{ $set?->home_score ?? 0 }}

                </div>

            </div>

            <div class="text-center">

                <div class="text-slate-400">

                    SET

                </div>

                <div class="text-5xl font-black mt-2">

                    {{ $game->current_set }}

                </div>

                <div class="mt-6">

                    Sets

                    {{ $game->homeSetsWon() }}

                    -

                    {{ $game->awaySetsWon() }}

                </div>

                <div class="mt-3 text-emerald-400 font-semibold">

                    Sirve

                    {{ $game->servingTeam?->name }}

                </div>

            </div>

            <div class="text-center">

                <div class="text-3xl font-black">

                    {{ $game->awayTeam->name }}

                </div>

                <div class="mt-6 text-6xl font-black">

                    {{ $set?->away_score ?? 0 }}

                </div>

            </div>

        </div>

    </div>

    {{-- ACCIONES --}}
    <div class="grid md:grid-cols-3 gap-6 mt-8">

        <a href="{{ route('operator.game', $game) }}"
           class="rounded-xl bg-emerald-500 p-6 text-center font-bold text-slate-950 hover:bg-emerald-400">

            🎮 Operador

        </a>

        <a href="{{ route('overlay.game', $game) }}"
           class="rounded-xl bg-sky-500 p-6 text-center font-bold text-white hover:bg-sky-400">

            📺 Overlay

        </a>

        <a href="#"
           class="rounded-xl bg-red-600 p-6 text-center font-bold text-white">

            ▶ Ver transmisión

        </a>

    </div>

    {{-- EVENTOS --}}
    <div class="mt-12">

        <h2 class="text-2xl font-black mb-6">

            Eventos del partido

        </h2>

        <div class="rounded-xl border border-slate-800 bg-slate-900">

            @forelse($game->events()->latest()->take(20)->get() as $event)

                <div class="flex items-center justify-between border-b border-slate-800 px-6 py-4">

                    <div>

                        {{ ucfirst($event->event_type) }}

                    </div>

                    <div class="text-slate-500 text-sm">

                        {{ $event->created_at->format('H:i:s') }}

                    </div>

                </div>

            @empty

                <div class="p-10 text-center text-slate-500">

                    No hay eventos registrados.

                </div>

            @endforelse

        </div>

    </div>

</div>

@endsection