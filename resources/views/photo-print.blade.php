<x-layout>
    <div class="grid gap-10 lg:grid-cols-2">

        <livewire:photo-print-gallery/>

        <div class="flex flex-col gap-6">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Tisk fotografií</h1>
                <p class="mt-3 text-base leading-relaxed text-gray-600">
                    Nejsme žádní suchaři. Vaše fotky vyvoláme klasickou mokrou technikou.
                    To proto, aby všechny nezapomenutelné okamžiky a momentky vydržely ve
                    fotoalbu krásně zachovalé i více než 100 let. Přesně takovou životností
                    se fotky od nás pyšní.
                </p>
            </div>

            <div class="flex items-center gap-3">
                <span class="text-2xl font-bold text-red-600">Od 7 Kč / ks</span>
            </div>

            <div>
                <span
                    class="inline-flex items-center gap-1.5 rounded-full bg-green-50 px-3 py-1 text-sm font-medium text-green-700">
                    <span class="size-2 rounded-full bg-green-500"></span>
                    Dostupné na objednávku
                </span>
            </div>

            <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
                <h2 class="mb-1 text-lg font-semibold text-gray-900">Nahrejte své fotky</h2>
                <p class="mb-5 text-sm text-gray-500">Zvolte si tisk fotografií tak jak Vám vyhovuje.</p>

                <livewire:photo-print-configurator/>
            </div>
        </div>
    </div>
</x-layout>
