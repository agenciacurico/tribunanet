<div class="max-w-5xl mx-auto">

    <div class="rounded-3xl bg-slate-900 p-8 shadow-xl">

        <h1 class="text-4xl font-black mb-8">

            🎥 Preparar Transmisión

        </h1>

        <form wire:submit="createMatch">

            <div class="grid grid-cols-2 gap-6">

                <div>

                    <label class="font-bold">

                        Equipo Local

                    </label>

                    <select
                        wire:model="home_team_id"
                        class="w-full rounded-xl bg-slate-800 border border-slate-700 mt-2 p-4">

                        <option value="">Seleccione...</option>

                        @foreach($teams as $team)

                            <option value="{{ $team->id }}">

                                {{ $team->club->name }} - {{ $team->name }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div>

                    <label class="font-bold">

                        Equipo Visita

                    </label>

                    <select
                        wire:model="away_team_id"
                        class="w-full rounded-xl bg-slate-800 border border-slate-700 mt-2 p-4">

                        <option value="">Seleccione...</option>

                        @foreach($teams as $team)

                            <option value="{{ $team->id }}">

                                {{ $team->club->name }} - {{ $team->name }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div>

                    <label class="font-bold">

                        Categoría

                    </label>

                    <select
                        wire:model="category_id"
                        class="w-full rounded-xl bg-slate-800 border border-slate-700 mt-2 p-4">

                        <option value="">Sin categoría</option>

                        @foreach($categories as $category)

                            <option value="{{ $category->id }}">

                                {{ $category->name }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div>

                    <label class="font-bold">

                        Cancha

                    </label>

                    <input
                        wire:model="venue"
                        type="text"
                        class="w-full rounded-xl bg-slate-800 border border-slate-700 mt-2 p-4">

                </div>

                <div>

                    <label class="font-bold">

                        Fecha

                    </label>

                    <input
                        wire:model="game_date"
                        type="date"
                        class="w-full rounded-xl bg-slate-800 border border-slate-700 mt-2 p-4">

                </div>

                <div>

                    <label class="font-bold">

                        Hora

                    </label>

                    <input
                        wire:model="game_time"
                        type="time"
                        class="w-full rounded-xl bg-slate-800 border border-slate-700 mt-2 p-4">

                </div>

            </div>

            <div class="mt-8">

                <h2 class="text-2xl font-bold mb-4">

                    ¿Quién comienza con el saque?

                </h2>

                <label class="mr-8">

                    <input
                        type="radio"
                        wire:model="serving_team"
                        value="home">

                    Local

                </label>

                <label>

                    <input
                        type="radio"
                        wire:model="serving_team"
                        value="away">

                    Visita

                </label>

            </div>

            <button
                class="mt-10 w-full rounded-2xl bg-cyan-600 hover:bg-cyan-700 py-6 text-3xl font-black">

                ▶ COMENZAR PARTIDO

            </button>

        </form>

    </div>

</div>