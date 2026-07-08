<div>

    <input
        type="text"
        wire:model.live.debounce.300ms="search"
        placeholder="🔍 Buscar equipo..."
        class="w-full rounded-xl bg-slate-800 border border-slate-700 p-4 mb-5">

    <div class="space-y-3 max-h-96 overflow-y-auto">

        @forelse($teams as $team)

            <button
                type="button"
                wire:click="select({{ $team->id }})"
                class="w-full rounded-2xl p-4 text-left transition
                {{ $selected == $team->id
                    ? 'bg-cyan-600'
                    : 'bg-slate-800 hover:bg-slate-700' }}">

                <div class="flex items-center gap-4">

                    <div
                        class="w-14 h-14 rounded-full bg-slate-700 flex items-center justify-center text-2xl">

                        🏐

                    </div>

                    <div>

                        <div class="text-xl font-bold">

                            {{ $team->club?->name }}

                        </div>

                        <div class="text-slate-400">

                            {{ $team->name }}

                        </div>

                        <div class="text-sm text-slate-500">

                            {{ $team->category?->name }}

                            •

                            {{ ucfirst($team->gender) }}

                        </div>

                    </div>

                </div>

            </button>

        @empty

            <div class="text-center py-10 text-slate-500">

                No se encontraron equipos.

            </div>

        @endforelse

    </div>

</div>