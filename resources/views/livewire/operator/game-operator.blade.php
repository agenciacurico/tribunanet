<div class="min-h-screen bg-slate-950 text-white">

    {{-- ========================================================= --}}
    {{-- PANTALLA DE INICIO DEL PARTIDO                           --}}
    {{-- ========================================================= --}}

    @if($game->status === 'scheduled')

        <div class="flex items-center justify-center min-h-screen">

            <div class="w-full max-w-3xl bg-slate-900 rounded-3xl shadow-2xl p-12">

                <div class="text-center">

                    <h1 class="text-6xl font-black tracking-widest">
                        TRIBUNANET
                    </h1>

                    <p class="text-slate-400 mt-3 text-xl">
                        Preparación del Partido
                    </p>

                </div>

                <div class="mt-12 text-center">

                    <h2 class="text-5xl font-black">
                        {{ strtoupper($game->homeTeam->name) }}
                    </h2>

                    <div class="text-3xl text-slate-500 my-8">
                        VS
                    </div>

                    <h2 class="text-5xl font-black">
                        {{ strtoupper($game->awayTeam->name) }}
                    </h2>

                </div>

                <div class="mt-12">

                    <div class="text-center text-2xl font-bold mb-6">
                        ¿Quién realizará el primer saque?
                    </div>

                    <div class="grid grid-cols-2 gap-6">

                        <button
                            wire:click="$set('firstServeTeam', {{ $game->home_team_id }})"
                            class="rounded-2xl py-8 text-3xl font-black transition
                            {{ $firstServeTeam == $game->home_team_id
                                ? 'bg-cyan-500'
                                : 'bg-slate-700 hover:bg-slate-600' }}">

                            🟦 LOCAL

                        </button>

                        <button
                            wire:click="$set('firstServeTeam', {{ $game->away_team_id }})"
                            class="rounded-2xl py-8 text-3xl font-black transition
                            {{ $firstServeTeam == $game->away_team_id
                                ? 'bg-red-500'
                                : 'bg-slate-700 hover:bg-slate-600' }}">

                            🟥 VISITA

                        </button>

                    </div>

                </div>

                <div class="mt-12">

                    <button
                        wire:click="startGame"
                        @disabled(!$firstServeTeam)
                        class="w-full rounded-2xl bg-green-600 hover:bg-green-700 disabled:bg-slate-700 disabled:cursor-not-allowed py-8 text-4xl font-black transition">

                        ▶ COMENZAR PARTIDO

                    </button>

                </div>

            </div>

        </div>

    @else

        {{-- ========================================================= --}}
        {{-- CENTRO DE PRODUCCIÓN                                     --}}
        {{-- ========================================================= --}}

        <div class="max-w-7xl mx-auto p-6">

            {{-- CABECERA --}}
            @include('livewire.operator.partials.header')

            {{-- CONTENIDO PRINCIPAL --}}
            <div class="grid grid-cols-4 gap-6 mt-6">

                {{-- COLUMNA IZQUIERDA --}}
                <div class="col-span-3 flex flex-col gap-6">

                    {{-- MARCADOR --}}
                    @include('livewire.operator.partials.scoreboard')

                    {{-- PANEL DE CONTROL --}}
                    @include('livewire.operator.partials.controls')

                    {{-- PIE --}}
                    @include('livewire.operator.partials.footer')

                </div>

                {{-- COLUMNA DERECHA --}}
                <div class="flex flex-col gap-6">

                    {{-- CRONOLOGÍA --}}
                    @include('livewire.operator.partials.events')

                    {{-- VISTA PREVIA --}}
                    @include('livewire.operator.partials.preview')

                </div>

            </div>

        </div>

    @endif

</div>