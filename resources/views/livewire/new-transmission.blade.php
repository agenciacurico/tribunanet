<div class="min-h-screen bg-slate-950 text-white">

    <div class="max-w-5xl mx-auto py-12 px-6">

        {{-- Cabecera --}}
        <div class="text-center mb-12">

            <h1 class="text-6xl font-black tracking-widest">

                🎥 NUEVA TRANSMISIÓN

            </h1>

            <p class="text-slate-400 text-xl mt-4">

                Configura el partido y comienza la transmisión.

            </p>

        </div>

        {{-- Barra de progreso --}}
        <div class="flex justify-center gap-3 mb-12">

            @for($i = 1; $i <= 4; $i++)

                <div
                    class="w-16 h-3 rounded-full
                    {{ $step >= $i ? 'bg-cyan-500' : 'bg-slate-700' }}">
                </div>

            @endfor

        </div>

        <div class="rounded-3xl bg-slate-900 shadow-2xl p-10">

            {{-- PASO 1 --}}
            @if($step == 1)

                <h2 class="text-4xl font-black mb-8">

                    🏠 Equipo Local

                </h2>

                <select
                    wire:model="homeTeam"
                    class="w-full rounded-xl bg-slate-800 border border-slate-700 p-5 text-2xl">

                    <option value="">Seleccione un equipo...</option>

                    @foreach($teams as $team)

                        <option value="{{ $team->id }}">
                            {{ $team->name }}
                        </option>

                    @endforeach

                </select>

            @endif

            {{-- PASO 2 --}}
            @if($step == 2)

                <h2 class="text-4xl font-black mb-8">

                    🚌 Equipo Visita

                </h2>

                <select
                    wire:model="awayTeam"
                    class="w-full rounded-xl bg-slate-800 border border-slate-700 p-5 text-2xl">

                    <option value="">Seleccione un equipo...</option>

                    @foreach($teams as $team)

                        @if($team->id != $homeTeam)

                            <option value="{{ $team->id }}">
                                {{ $team->name }}
                            </option>

                        @endif

                    @endforeach

                </select>

            @endif

            {{-- PASO 3 --}}
            @if($step == 3)

                <h2 class="text-4xl font-black mb-8">

                    🏟 Cancha

                </h2>

                <input
                    wire:model="venue"
                    type="text"
                    placeholder="Ej.: Gimnasio Abraham Milad"
                    class="w-full rounded-xl bg-slate-800 border border-slate-700 p-5 text-2xl">

            @endif

            {{-- PASO 4 --}}
            @if($step == 4)

                <h2 class="text-4xl font-black mb-8">

                    🏐 ¿Quién ganó el sorteo?

                </h2>

                <div class="grid grid-cols-2 gap-6">

                    <button
                        wire:click="$set('coinWinner','home')"
                        class="rounded-2xl py-8 text-3xl font-bold transition
                        {{ $coinWinner == 'home'
                            ? 'bg-cyan-600'
                            : 'bg-slate-800 hover:bg-slate-700' }}">

                        LOCAL

                    </button>

                    <button
                        wire:click="$set('coinWinner','away')"
                        class="rounded-2xl py-8 text-3xl font-bold transition
                        {{ $coinWinner == 'away'
                            ? 'bg-red-600'
                            : 'bg-slate-800 hover:bg-slate-700' }}">

                        VISITA

                    </button>

                </div>

            @endif

        </div>

        {{-- Navegación --}}
        <div class="flex justify-between mt-10">

            <button
                wire:click="previousStep"
                @disabled($step == 1)
                class="rounded-xl bg-slate-700 hover:bg-slate-600 disabled:opacity-30 px-8 py-4 text-xl font-bold">

                ← Anterior

            </button>

            @if($step < 4)

                <button
                    wire:click="nextStep"
                    class="rounded-xl bg-cyan-600 hover:bg-cyan-700 px-8 py-4 text-xl font-bold">

                    Siguiente →

                </button>

            @else

                <button
                    class="rounded-xl bg-green-600 hover:bg-green-700 px-10 py-4 text-xl font-black">

                    ▶ COMENZAR PARTIDO

                </button>

            @endif

        </div>

    </div>

</div>