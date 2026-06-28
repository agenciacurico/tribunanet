<div class="rounded-2xl bg-slate-900 border border-slate-800 shadow-xl p-6">

    {{-- SET ACTUAL --}}
    <div class="text-center">

        <div class="text-4xl font-black text-yellow-400 tracking-widest">
            SET {{ $game->current_set }}
        </div>

        <div class="mt-2 text-slate-500 uppercase tracking-[0.25em]">
            Sets Ganados
        </div>

        <div class="flex justify-center items-center gap-6 mt-2">

            <span class="text-5xl font-black text-cyan-400">
                {{ $homeSets }}
            </span>

            <span class="text-4xl text-slate-600">
                -
            </span>

            <span class="text-5xl font-black text-red-400">
                {{ $awaySets }}
            </span>

        </div>

    </div>

    {{-- EQUIPOS --}}
    <div class="grid grid-cols-2 gap-8 mt-6">

        <div class="text-center">

            <div class="flex justify-center items-center gap-2">

                @if($game->serving_team_id == $game->home_team_id)
                    <div class="w-4 h-4 rounded-full bg-green-400 animate-pulse"></div>
                @else
                    <div class="w-4 h-4 rounded-full bg-slate-700"></div>
                @endif

                <div class="text-slate-400 uppercase tracking-widest text-sm">
                    LOCAL
                </div>

            </div>

            <h2 class="mt-2 text-4xl font-black">
                {{ strtoupper($game->homeTeam->name) }}
            </h2>

        </div>

        <div class="text-center">

            <div class="flex justify-center items-center gap-2">

                @if($game->serving_team_id == $game->away_team_id)
                    <div class="w-4 h-4 rounded-full bg-green-400 animate-pulse"></div>
                @else
                    <div class="w-4 h-4 rounded-full bg-slate-700"></div>
                @endif

                <div class="text-slate-400 uppercase tracking-widest text-sm">
                    VISITA
                </div>

            </div>

            <h2 class="mt-2 text-4xl font-black">
                {{ strtoupper($game->awayTeam->name) }}
            </h2>

        </div>

    </div>

    {{-- MARCADOR --}}
    <div class="grid grid-cols-3 items-center mt-6">

        <div class="text-center">

            <div class="text-[140px] font-black leading-none text-cyan-400">
                {{ str_pad($currentSet->home_score, 2, '0', STR_PAD_LEFT) }}
            </div>

        </div>

        <div class="text-center">

            <div class="text-7xl text-slate-700 font-thin">
                :
            </div>

        </div>

        <div class="text-center">

            <div class="text-[140px] font-black leading-none text-red-400">
                {{ str_pad($currentSet->away_score, 2, '0', STR_PAD_LEFT) }}
            </div>

        </div>

    </div>

</div>