<div wire:poll.1s class="fixed inset-0">

    {{-- ========================================================= --}}
    {{-- CAPA DE ESCENAS                                           --}}
    {{-- ========================================================= --}}
    <div
        id="scene-layer"
        class="absolute inset-0 pointer-events-none z-50">
    </div>

    {{-- ========================================================= --}}
    {{-- MARCADOR                                                  --}}
    {{-- ========================================================= --}}
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 max-w-[1200px] w-[95vw]">

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

                    <div class="text-cyan-400 text-7xl font-black leading-none">
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

                    <div class="text-red-400 text-7xl font-black leading-none">
                        {{ str_pad($currentSet->away_score, 2, '0', STR_PAD_LEFT) }}
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>