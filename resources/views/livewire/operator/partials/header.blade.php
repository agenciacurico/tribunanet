<div class="rounded-2xl bg-slate-900 shadow-lg p-6">

    <div class="flex justify-between items-center">

        <div>

            <h1 class="text-5xl font-black tracking-widest text-white">
                🏐 TRIBUNANET
            </h1>

            <p class="text-slate-400 mt-2 text-lg">
                Operador Profesional de Marcador
            </p>

        </div>

        <div class="text-right">

            <div class="text-slate-400 uppercase text-sm">
                Estado
            </div>

            <div class="text-2xl font-bold">

                @if($game->status == 'live')
                    <span class="text-green-400">EN JUEGO</span>

                @elseif($game->status == 'scheduled')
                    <span class="text-yellow-400">PROGRAMADO</span>

                @else
                    <span class="text-red-400">
                        {{ strtoupper($game->status) }}
                    </span>
                @endif

            </div>

        </div>

    </div>

</div>