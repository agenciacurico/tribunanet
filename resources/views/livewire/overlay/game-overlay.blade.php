<div wire:poll.1s class="fixed inset-0 pointer-events-none">

    {{-- =========================
         JUGADOR DESTACADO
    ========================== --}}
    @if($featuredPlayer)

        <div class="absolute top-10 left-10">

            <div class="w-[520px] rounded-2xl overflow-hidden bg-slate-900/95 border border-cyan-500 shadow-2xl">

                <div class="bg-cyan-500 text-black font-black uppercase px-6 py-2 tracking-widest">
                    Jugador Destacado
                </div>

                <div class="flex items-center gap-6 p-6">

                    {{-- FOTO --}}
                    <div class="w-28 h-28 rounded-full overflow-hidden bg-slate-700 border-2 border-cyan-400">

                        @if($featuredPlayer->person && $featuredPlayer->person->photo)

                            <img
                                src="{{ asset('storage/' . $featuredPlayer->person->photo) }}"
                                alt="{{ $featuredPlayer->person->full_name }}"
                                class="w-full h-full object-cover">

                        @else

                            <div class="w-full h-full flex items-center justify-center text-6xl">
                                👤
                            </div>

                        @endif

                    </div>

                    {{-- DATOS --}}
                    <div class="flex-1">

                        <div class="text-4xl font-black text-white uppercase">
                            {{ $featuredPlayer->person->full_name }}
                        </div>

                        <div class="mt-2 text-cyan-400 text-3xl font-bold">
                            #{{ $featuredPlayer->jersey_number }}
                        </div>

                        @if($featuredPlayer->position)
                            <div class="mt-1 text-slate-300 text-xl uppercase">
                                {{ $featuredPlayer->position }}
                            </div>
                        @endif

                        <div class="mt-3 text-yellow-400 text-xl uppercase">
                            {{ $featuredPlayer->team->name }}
                        </div>

                    </div>

                </div>

            </div>

        </div>

    @endif

    {{-- =========================
         MARCADOR
    ========================== --}}

    <div class="fixed bottom-8 left-1/2 -translate-x-1/2 max-w-[1200px] w-[95vw]">

        <div class="bg-slate-900/90 backdrop-blur-xl rounded-2xl shadow-2xl px-8 py-5">

            <div class="grid grid-cols-3 items-center">

                {{-- LOCAL --}}
                <div class="text-center">

                    <div class="text-white text-4xl font-black uppercase mb-3">
                        {{ $game->homeTeam->name }}
                    </div>

                    @if($game->serving_team_id == $game->home_team_id)
                        <div class="flex justify-center mb-3">
                            <div class="w-5 h-5 rounded-full bg-green-400 shadow-[0_0_15px_#4ade80]"></div>
                        </div>
                    @else
                        <div class="h-8"></div>
                    @endif

                    <div
                        id="home-score"
                        class="text-cyan-400 text-7xl font-black leading-none">
                        {{ str_pad($currentSet->home_score, 2, '0', STR_PAD_LEFT) }}
                    </div>

                </div>

                {{-- CENTRO --}}
                <div class="text-center">

                    <div class="text-yellow-400 text-5xl font-black">
                        SET {{ $game->current_set }}
                    </div>

                    <div class="text-slate-300 uppercase tracking-widest mt-4">
                        Sets
                    </div>

                    <div class="flex justify-center gap-10 mt-3">

                        <span class="text-cyan-400 text-5xl font-black">
                            {{ $homeSets }}
                        </span>

                        <span class="text-white text-4xl">
                            -
                        </span>

                        <span class="text-red-400 text-5xl font-black">
                            {{ $awaySets }}
                        </span>

                    </div>

                </div>

                {{-- VISITA --}}
                <div class="text-center">

                    <div class="text-white text-4xl font-black uppercase mb-3">
                        {{ $game->awayTeam->name }}
                    </div>

                    @if($game->serving_team_id == $game->away_team_id)
                        <div class="flex justify-center mb-3">
                            <div class="w-5 h-5 rounded-full bg-green-400 shadow-[0_0_15px_#4ade80]"></div>
                        </div>
                    @else
                        <div class="h-8"></div>
                    @endif

                    <div
                        id="away-score"
                        class="text-red-400 text-7xl font-black leading-none">
                        {{ str_pad($currentSet->away_score, 2, '0', STR_PAD_LEFT) }}
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>