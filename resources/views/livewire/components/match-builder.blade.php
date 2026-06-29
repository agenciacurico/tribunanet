<div class="max-w-5xl mx-auto">

    <div class="rounded-3xl bg-slate-900 p-8 shadow-2xl">

        <h1 class="text-5xl font-black mb-10">

            🎥 Preparar Transmisión

        </h1>

        <form wire:submit.prevent="startTransmission">

            <div class="grid grid-cols-2 gap-8">

                {{-- LOCAL --}}
                <div>

                    <label class="block mb-3 text-xl font-bold">

                        Equipo Local

                    </label>

                    <select
                        wire:model="home_team_id"
                        class="w-full rounded-xl bg-slate-800 border border-slate-700 p-4">

                        <option value="">
                            Seleccione...
                        </option>

                        @foreach($teams as $team)

                            <option value="{{ $team->id }}">

                                {{ $team->club?->name }} - {{ $team->name }}

                            </option>

                        @endforeach

                    </select>

                    @error('home_team_id')
                        <p class="text-red-400 mt-2">{{ $message }}</p>
                    @enderror

                </div>

                {{-- VISITA --}}
                <div>

                    <label class="block mb-3 text-xl font-bold">

                        Equipo Visita

                    </label>

                    <select
                        wire:model="away_team_id"
                        class="w-full rounded-xl bg-slate-800 border border-slate-700 p-4">

                        <option value="">
                            Seleccione...
                        </option>

                        @foreach($teams as $team)

                            <option value="{{ $team->id }}">

                                {{ $team->club?->name }} - {{ $team->name }}

                            </option>

                        @endforeach

                    </select>

                    @error('away_team_id')
                        <p class="text-red-400 mt-2">{{ $message }}</p>
                    @enderror

                </div>

                {{-- CATEGORÍA --}}
                <div>

                    <label class="block mb-3 text-xl font-bold">

                        Categoría

                    </label>

                    <select
                        wire:model="category_id"
                        class="w-full rounded-xl bg-slate-800 border border-slate-700 p-4">

                        <option value="">
                            Sin categoría
                        </option>

                        @foreach($categories as $category)

                            <option value="{{ $category->id }}">

                                {{ $category->name }}

                            </option>

                        @endforeach

                    </select>

                </div>

                {{-- CANCHA --}}
                <div>

                    <label class="block mb-3 text-xl font-bold">

                        Cancha

                    </label>

                    <input
                        type="text"
                        wire:model="venue"
                        placeholder="Ej.: Gimnasio Abraham Milad"
                        class="w-full rounded-xl bg-slate-800 border border-slate-700 p-4">

                    @error('venue')
                        <p class="text-red-400 mt-2">{{ $message }}</p>
                    @enderror

                </div>

                {{-- FECHA --}}
                <div>

                    <label class="block mb-3 text-xl font-bold">

                        Fecha

                    </label>

                    <input
                        type="date"
                        wire:model="game_date"
                        class="w-full rounded-xl bg-slate-800 border border-slate-700 p-4">

                </div>

                {{-- HORA --}}
                <div>

                    <label class="block mb-3 text-xl font-bold">

                        Hora

                    </label>

                    <input
                        type="time"
                        wire:model="game_time"
                        class="w-full rounded-xl bg-slate-800 border border-slate-700 p-4">

                </div>

            </div>

            <div class="mt-10">

                <h2 class="text-2xl font-bold mb-4">

                    🏐 ¿Quién comienza con el saque?

                </h2>

                <div class="flex gap-8">

                    <label class="flex items-center gap-2">

                        <input
                            type="radio"
                            wire:model="serving_team"
                            value="home">

                        Local

                    </label>

                    <label class="flex items-center gap-2">

                        <input
                            type="radio"
                            wire:model="serving_team"
                            value="away">

                        Visita

                    </label>

                </div>

            </div>

            <button
                type="submit"
                class="mt-10 w-full rounded-2xl bg-cyan-600 hover:bg-cyan-700 transition py-6 text-3xl font-black">

                🔴 INICIAR TRANSMISIÓN

            </button>

        </form>

    </div>

</div>