<div class="absolute inset-0 flex items-center justify-center pointer-events-none">

    @if($visible)

        <div class="bg-slate-900/90 border border-cyan-400 rounded-2xl px-10 py-6 shadow-2xl">

            <div class="text-center">

                <h1 class="text-5xl font-black text-cyan-400">
                    {{ $title }}
                </h1>

                <p class="mt-2 text-xl text-slate-300">
                    {{ $subtitle }}
                </p>

            </div>

        </div>

    @endif

</div>