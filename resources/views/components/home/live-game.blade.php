<section id="live">

    <div class="flex items-center gap-3 mb-2">

        <div class="w-3 h-3 rounded-full bg-red-500 animate-pulse"></div>

        <h2 class="text-2xl md:text-3xl font-black">
            Partido en vivo
        </h2>

    </div>

    <p class="text-slate-400 mb-6">
        Sigue el marcador en tiempo real.
    </p>

    @if($liveGame)

        @php
            $set = $liveGame->sets
                ->where('set_number', $liveGame->current_set)
                ->first();
        @endphp

        <div class="overflow-hidden rounded-2xl border border-slate-800 bg-slate-900 shadow-lg">

            {{-- CABECERA --}}
            <div class="flex items-center justify-between border-b border-slate-800 px-5 py-3">

                <div class="flex items-center gap-2">

                    <span class="h-2.5 w-2.5 rounded-full bg-red-500 animate-pulse"></span>

                    <span class="text-sm font-bold uppercase tracking-widest text-red-400">
                        En Vivo
                    </span>

                </div>

                <span class="text-sm text-slate-400">
                    Set {{ $liveGame->current_set }}
                </span>

            </div>

            {{-- CONTENIDO --}}
            <div class="p-6 md:p-8">

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-center">

                    {{-- LOCAL --}}
                    <div class="text-center">

                        <div class="mx-auto mb-4 flex h-20 w-20 md:h-24 md:w-24 items-center justify-center rounded-full bg-slate-800 text-4xl">
                            🏐
                        </div>

                        <h3 class="text-xl md:text-2xl font-bold break-words">
                            {{ $liveGame->homeTeam->name }}
                        </h3>

                        <p class="mt-1 text-sm text-slate-500">
                            Local
                        </p>

                    </div>

                    {{-- MARCADOR --}}
                    <div class="text-center order-first md:order-none">

                        <div class="text-5xl md:text-7xl font-black leading-none">

                            {{ $set?->home_score ?? 0 }}

                            <span class="mx-2 md:mx-4 text-slate-600">
                                -
                            </span>

                            {{ $set?->away_score ?? 0 }}

                        </div>

                        <div class="mt-5 flex flex-col md:flex-row justify-center items-center gap-4 md:gap-8">

                            <div>

                                <div class="text-xs uppercase tracking-wide text-slate-500">
                                    Sets
                                </div>

                                <div class="text-xl font-bold">

                                    {{ $liveGame->homeSetsWon() }}

                                    -

                                    {{ $liveGame->awaySetsWon() }}

                                </div>

                            </div>

                            <div>

                                <div class="text-xs uppercase tracking-wide text-slate-500">
                                    Sirve
                                </div>

                                <div class="font-semibold text-emerald-400">

                                    {{ $liveGame->servingTeam?->name ?? '---' }}

                                </div>

                            </div>

                        </div>

                    </div>

                    {{-- VISITA --}}
                    <div class="text-center">

                        <div class="mx-auto mb-4 flex h-20 w-20 md:h-24 md:w-24 items-center justify-center rounded-full bg-slate-800 text-4xl">
                            🏐
                        </div>

                        <h3 class="text-xl md:text-2xl font-bold break-words">
                            {{ $liveGame->awayTeam->name }}
                        </h3>

                        <p class="mt-1 text-sm text-slate-500">
                            Visita
                        </p>

                    </div>

                </div>

                <div class="mt-8 text-center">

                    <a href="{{ route('game.show', $liveGame) }}"
                       class="inline-flex items-center justify-center rounded-xl bg-emerald-500 px-8 py-3 font-bold text-slate-950 transition hover:bg-emerald-400">

                        Ver partido

                    </a>

                </div>

            </div>

        </div>

    @else

        <div class="rounded-2xl border border-dashed border-slate-700 bg-slate-900 p-10 text-center">

            <div class="text-5xl mb-4">
                🏐
            </div>

            <h3 class="text-2xl font-bold">
                No hay partidos en vivo
            </h3>

            <p class="mt-2 text-slate-400">
                Cuando comience un encuentro aparecerá aquí automáticamente.
            </p>

        </div>

    @endif

</section>