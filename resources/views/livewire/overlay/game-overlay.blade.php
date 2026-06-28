<div wire:poll.500ms class="fixed bottom-8 left-1/2 -translate-x-1/2 w-[1200px]">

    <div class="bg-slate-900/90 backdrop-blur-xl rounded-2xl shadow-2xl px-8 py-5">

        <div class="grid grid-cols-3 items-center">

            {{-- LOCAL --}}
            <div class="text-center">

                <div class="text-white text-4xl font-black uppercase mb-3">
                    {{ $game->homeTeam->name }}
                </div>

                @if($game->serving_team_id == $game->home_team_id)
                    <div class="text-green-400 text-xl mb-2">
                        🏐 SAQUE
                    </div>
                @else
                    <div class="h-8"></div>
                @endif

                <div class="text-cyan-400 text-8xl font-black leading-none">
                    {{ str_pad($currentSet->home_score,3,'0',STR_PAD_LEFT) }}
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
                    <div class="text-green-400 text-xl mb-2">
                        🏐 SAQUE
                    </div>
                @else
                    <div class="h-8"></div>
                @endif

                <div class="text-red-400 text-8xl font-black leading-none">
                    {{ str_pad($currentSet->away_score,3,'0',STR_PAD_LEFT) }}
                </div>

            </div>

        </div>

    </div>

</div>