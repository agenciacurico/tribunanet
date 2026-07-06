<section class="border-b border-slate-800 bg-gradient-to-r from-slate-950 via-slate-900 to-slate-950">

    <div class="max-w-7xl mx-auto px-6 py-6">

        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

            <div>

                <h1 class="text-3xl md:text-4xl font-black">
                    El vóleibol en vivo
                </h1>

                <p class="mt-2 text-slate-400 max-w-2xl">
                    Sigue partidos en tiempo real, consulta estadísticas y accede a las transmisiones desde una sola plataforma.
                </p>

            </div>

            <div class="flex flex-wrap gap-3">

                <a href="#live"
                   class="rounded-lg bg-emerald-500 px-6 py-3 font-bold text-slate-950 hover:bg-emerald-400 transition">
                    Ver partido
                </a>

                @guest
                    <a href="{{ route('login') }}"
                       class="rounded-lg border border-slate-700 px-6 py-3 hover:bg-slate-800 transition">
                        Iniciar sesión
                    </a>
                @endguest

            </div>

        </div>

    </div>

</section>