<div class="rounded-2xl bg-slate-900 border border-slate-800 shadow-xl p-6">

    <h2 class="text-2xl font-bold mb-6">
        Jugadores
    </h2>

    {{-- LOCAL --}}
    <div>

        <div class="text-cyan-400 font-black uppercase mb-3">
            {{ $game->homeTeam->name }}
        </div>

        <div class="space-y-2">

            @foreach($homePlayers as $player)

                <div class="flex items-center justify-between bg-slate-800 rounded-lg px-4 py-3">

                    <div>

                        <span class="font-black text-cyan-400">
                            #{{ $player->jersey_number }}
                        </span>

                        <span class="ml-3">
                            {{ $player->person->full_name }}
                        </span>

                    </div>
                    

                    <button
                        wire:click="showPlayer({{ $player->id }})"
                        class="rounded-lg bg-blue-600 hover:bg-blue-700 px-3 py-2">

                        📺

                    </button>

                </div>

            @endforeach

        </div>

    </div>

    {{-- VISITA --}}
    <div class="mt-8">

        <div class="text-red-400 font-black uppercase mb-3">
            {{ $game->awayTeam->name }}
        </div>

        <div class="space-y-2">

            @foreach($awayPlayers as $player)

                <div class="flex items-center justify-between bg-slate-800 rounded-lg px-4 py-3">

                    <div>

                        <span class="font-black text-red-400">
                            #{{ $player->jersey_number }}
                        </span>

                        <span class="ml-3">
                            {{ $player->person->full_name }}
                        </span>

                    </div>

                    <button
                        wire:click="showPlayer({{ $player->id }})"
                        class="rounded-lg bg-blue-600 hover:bg-blue-700 px-3 py-2">

                        📺

                    </button>

                </div>

            @endforeach

        </div>

    </div>

</div>