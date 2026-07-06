<section class="mt-16">

    <h2 class="text-3xl font-black mb-8">

        🏆 Últimos resultados

    </h2>

    <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">

        @forelse($finishedGames as $game)

            <div class="rounded-xl border border-slate-800 bg-slate-900 p-6">

                <div class="text-sm text-slate-400">

                    {{ $game->game_date?->format('d/m/Y') }}

                </div>

                <div class="mt-5">

                    <div class="font-bold">

                        {{ $game->homeTeam->name }}

                    </div>

                    <div class="my-2 text-center text-slate-500">

                        VS

                    </div>

                    <div class="font-bold">

                        {{ $game->awayTeam->name }}

                    </div>

                </div>

                <a
                    href="{{ route('game.show',$game) }}"
                    class="block mt-6 rounded-lg bg-slate-800 py-3 text-center hover:bg-slate-700">

                    Ver resumen

                </a>

            </div>

        @empty

            <div class="col-span-full rounded-xl border border-dashed border-slate-700 p-10 text-center">

                No existen resultados.

            </div>

        @endforelse

    </div>

</section>