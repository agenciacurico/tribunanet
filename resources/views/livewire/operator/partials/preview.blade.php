<div class="rounded-2xl bg-slate-900 shadow-lg overflow-hidden">

    <div class="bg-slate-800 px-6 py-4 flex justify-between items-center">

        <h2 class="text-2xl font-bold">
            📺 Vista Previa
        </h2>

        <span class="text-green-400 font-bold animate-pulse">
            🔴 EN VIVO
        </span>

    </div>

    <div class="bg-black p-3">

        <iframe
            wire:key="overlay-{{ $game->updated_at?->timestamp }}"

            src="{{ route('overlay.game', $game) }}"

            class="w-full aspect-video rounded-xl bg-black"

            frameborder="0">

        </iframe>

    </div>

    <div class="bg-slate-800 px-5 py-3 text-sm text-slate-400">

        Vista previa de la transmisión

    </div>

</div>