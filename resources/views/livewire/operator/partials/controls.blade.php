<div class="rounded-2xl bg-slate-900 border border-slate-800 shadow-xl p-8">

    <h2 class="text-2xl font-bold mb-8">
        Panel de Control
    </h2>

    {{-- Puntos --}}
    <div class="grid grid-cols-2 gap-6">

        <button
            wire:click="pointHome"
            wire:loading.attr="disabled"
            wire:target="pointHome"
            class="rounded-2xl bg-cyan-600 hover:bg-cyan-700 disabled:opacity-50 active:scale-95 transition-all py-10 text-5xl font-black shadow-lg">

            +1 LOCAL

        </button>

        <button
            wire:click="pointAway"
            wire:loading.attr="disabled"
            wire:target="pointAway"
            class="rounded-2xl bg-red-600 hover:bg-red-700 disabled:opacity-50 active:scale-95 transition-all py-10 text-5xl font-black shadow-lg">

            +1 VISITA

        </button>

    </div>

    {{-- Acciones --}}
    <div class="grid grid-cols-2 gap-6 mt-8">

        <button
            wire:click="timeoutHome"
            class="rounded-xl bg-yellow-600 hover:bg-yellow-700 active:scale-95 transition py-6 text-2xl font-bold">

            ⏱ Tiempo Local

        </button>

        <button
            wire:click="timeoutAway"
            class="rounded-xl bg-yellow-600 hover:bg-yellow-700 active:scale-95 transition py-6 text-2xl font-bold">

            ⏱ Tiempo Visita

        </button>

        <button
            class="rounded-xl bg-slate-700 hover:bg-slate-600 active:scale-95 transition py-6 text-2xl font-bold">

            ↩ Deshacer

        </button>

        <button
            wire:click="finishGame"
            wire:confirm="¿Desea finalizar el partido?"
            class="rounded-xl bg-red-700 hover:bg-red-800 active:scale-95 transition py-6 text-2xl font-bold">

            🛑 Finalizar Partido

        </button>

    </div>

</div>