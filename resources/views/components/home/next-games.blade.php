<section class="mt-16">

    <h2 class="text-3xl font-black mb-8">

        📅 Próximos partidos

    </h2>

    <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">

        @forelse($nextGames as $game)

            <div class="rounded-xl border border-slate-800 bg-slate-900 p-6">

                <div class="text-emerald-400 text-sm font-semibold">

                    {{ $game->game_date?->format('d/m/Y') }}

                    ·

                    {{ $game->game_time?->format('H:i') }}

                </div>

                <div class="mt-5 font-bold text-xl">

                    {{ $game->homeTeam->name }}

                </div>

                <div class="text-center my-3 text-slate-500">

                    VS

                </div>

                <div class="font-bold text-xl">

                    {{ $game->awayTeam->name }}

                </div>

                <a
                    href="{{ route('game.show',$game) }}"
                    class="block mt-6 rounded-lg bg-slate-800 py-3 text-center hover:bg-slate-700">

                    Ver partido

                </a>

            </div>

        @empty

            <div class="col-span-full rounded-xl border border-dashed border-slate-700 p-10 text-center">

                No existen próximos partidos.

            </div>

        @endforelse

    </div>

</section>