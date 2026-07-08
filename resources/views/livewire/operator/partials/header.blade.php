<div class="rounded-2xl bg-slate-900 border border-slate-800 shadow-xl px-8 py-6">

    <div class="flex items-center justify-between">

        {{-- Logo --}}
        <div>

            <h1 class="text-5xl font-black tracking-widest text-white">
                TRIBUNANET
            </h1>

            <p class="text-slate-400 text-lg mt-2">
                Operador Profesional de Marcador
            </p>

        </div>

        {{-- Información del partido --}}
        <div class="text-right">

            <div class="text-slate-500 uppercase tracking-widest text-sm">
                Partido
            </div>

            <div class="text-xl font-bold text-white">
                {{ strtoupper($game->homeTeam->name) }}
                <span class="text-slate-500 px-2">vs</span>
                {{ strtoupper($game->awayTeam->name) }}
            </div>

            <div class="mt-2 text-slate-400">
                {{ $game->venue }}
            </div>

        </div>

        {{-- Estado --}}
        <div class="text-center">

            <div class="text-slate-500 uppercase tracking-widest text-sm">
                Estado
            </div>

            @switch($game->status)

                @case('scheduled')
                    <div class="mt-2 px-4 py-2 rounded-full bg-yellow-500/20 text-yellow-400 font-bold">
                        PROGRAMADO
                    </div>
                    @break

                @case('live')
                    <div class="mt-2 px-4 py-2 rounded-full bg-green-500/20 text-green-400 font-bold animate-pulse">
                        ● EN JUEGO
                    </div>
                    @break

                @case('finished')
                    <div class="mt-2 px-4 py-2 rounded-full bg-red-500/20 text-red-400 font-bold">
                        FINALIZADO
                    </div>
                    @break

                @default
                    <div class="mt-2 px-4 py-2 rounded-full bg-slate-700 text-white font-bold">
                        {{ strtoupper($game->status) }}
                    </div>

            @endswitch

        </div>

    </div>

</div>