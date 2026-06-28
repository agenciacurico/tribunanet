<div class="rounded-2xl bg-slate-900 border border-slate-800 shadow-xl h-[620px] flex flex-col">

    {{-- Cabecera --}}
    <div class="rounded-t-2xl bg-slate-800 px-6 py-5 flex-shrink-0">

        <h2 class="text-2xl font-bold tracking-wide">
            Cronología del Partido
        </h2>

    </div>

    {{-- Eventos --}}
    <div class="flex-1 overflow-y-auto p-5 space-y-3">

        @forelse($events as $event)

            {{-- Compatibilidad Livewire --}}
            @if(is_array($event))
                @php
                    $event = (object) $event;
                @endphp
            @endif

            <div class="rounded-xl bg-slate-800 hover:bg-slate-700 transition p-4">

                <div class="flex justify-between items-center">

                    <div class="flex items-center gap-3">

                        @switch($event->event_type)

                            @case('point')

                                @if($event->team_id == $game->home_team_id)

                                    <span class="text-2xl">🏐</span>

                                    <div>
                                        <div class="font-bold text-cyan-400">
                                            Punto {{ strtoupper($game->homeTeam->name) }}
                                        </div>

                                        <div class="text-sm text-slate-400">
                                            Equipo Local
                                        </div>
                                    </div>

                                @else

                                    <span class="text-2xl">🏐</span>

                                    <div>
                                        <div class="font-bold text-red-400">
                                            Punto {{ strtoupper($game->awayTeam->name) }}
                                        </div>

                                        <div class="text-sm text-slate-400">
                                            Equipo Visita
                                        </div>
                                    </div>

                                @endif

                            @break

                            @case('timeout')

                                @if($event->team_id == $game->home_team_id)

                                    <span class="text-2xl">⏱</span>

                                    <div>
                                        <div class="font-bold text-yellow-400">
                                            Tiempo solicitado
                                        </div>

                                        <div class="text-sm text-slate-400">
                                            {{ strtoupper($game->homeTeam->name) }}
                                        </div>
                                    </div>

                                @else

                                    <span class="text-2xl">⏱</span>

                                    <div>
                                        <div class="font-bold text-yellow-400">
                                            Tiempo solicitado
                                        </div>

                                        <div class="text-sm text-slate-400">
                                            {{ strtoupper($game->awayTeam->name) }}
                                        </div>
                                    </div>

                                @endif

                            @break

                            @case('substitution')

                                <span class="text-2xl">🔄</span>

                                <div>
                                    <div class="font-bold text-green-400">
                                        Sustitución
                                    </div>

                                    <div class="text-sm text-slate-400">
                                        {{ strtoupper($event->team->name ?? '') }}
                                    </div>
                                </div>

                            @break

                            @case('card')

                                <span class="text-2xl">🟨</span>

                                <div>
                                    <div class="font-bold text-orange-400">
                                        Tarjeta
                                    </div>

                                    <div class="text-sm text-slate-400">
                                        {{ strtoupper($event->team->name ?? '') }}
                                    </div>
                                </div>

                            @break

                            @default

                                <div class="font-bold">
                                    {{ strtoupper($event->event_type) }}
                                </div>

                        @endswitch

                    </div>

                    <div class="text-right">

                        <div class="text-slate-500 text-sm">
                            {{ \Carbon\Carbon::parse($event->created_at)->format('H:i:s') }}
                        </div>

                        <div class="text-slate-600 text-xs">
                            Set {{ $event->gameSet->set_number ?? '-' }}
                        </div>

                    </div>

                </div>

            </div>

        @empty

            <div class="flex-1 flex items-center justify-center text-slate-500">

                Aún no existen eventos del partido.

            </div>

        @endforelse

    </div>

</div>