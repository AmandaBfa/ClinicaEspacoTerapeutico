<x-layout-page page-title="Serviços disponíveis">
    <div class="min-h-screen bg-gray-50" x-data="{ openModal: false, activeService: {} }">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="text-center mb-16 mt-20">
                <h1 class="text-4xl font-bold text-slate-900">Nossos Serviços</h1>
                <p class="mt-4 text-xl text-slate-600 max-w-2xl mx-auto">
                    Acompanhamento especializado para o desenvolvimento integral de crianças e adultos.
                </p>
                <div class="w-20 h-1 bg-blue-500 mx-auto mt-6 rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @foreach ($services as $service)
                    <div @click="activeService = { 
                            name: '{{ $service->name }}', 
                            description: `{!! $service->description !!}`, 
                            price: '{{ number_format($service->price, 2, ',', '.') }}',
                            duration: '{{ $service->duration_minutes }}'
                         }; openModal = true"
                        class="cursor-pointer group bg-white/80 backdrop-blur-md rounded-[2.5rem] p-8 border border-blue-100/80 hover:border-blue-400 hover:shadow-2xl hover:shadow-blue-900/10 transition-all duration-500 flex flex-col relative overflow-hidden">

                        <div
                            class="absolute -top-10 -right-10 w-32 h-32 bg-blue-50 rounded-full opacity-50 group-hover:scale-150 transition-transform duration-700">
                        </div>

                        <div class="relative z-10 flex flex-col h-full">
                            <div class="mb-4 text-blue-500">
                                <i data-lucide="{{ $service->icon_class ?? 'activity' }}"></i>
                            </div>

                            <h3
                                class="text-2xl font-bold text-slate-800 mb-4 group-hover:text-blue-600 transition-colors">
                                {{ $service->name }}
                            </h3>

                            <p class="text-slate-500 text-sm leading-relaxed mb-8 flex-grow line-clamp-3">
                                {{ Str::limit(strip_tags($service->description), 120) }}
                            </p>

                            <div
                                class="flex justify-between items-center p-5 bg-white border border-blue-50 rounded-2xl mb-8 shadow-sm">
                                <span class="text-slate-500 text-sm font-semibold flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    {{ $service->duration_minutes }} min
                                </span>
                                <span class="font-bold text-lg text-slate-800">
                                    <span
                                        class="text-xs text-blue-600 mr-1">R$</span>{{ number_format($service->price, 2, ',', '.') }}
                                </span>
                            </div>

                            <button
                                class="w-full bg-orange-500 text-center text-white font-bold py-3 rounded-2xl group-hover:bg-blue-600 group-hover:text-white transition-all">
                                Ver Detalhes
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div x-show="openModal" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-[100] overflow-y-auto flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-md"
            style="display: none;">

            <div @click.away="openModal = false"
                class="bg-white rounded-[3rem] max-w-2xl w-full shadow-2xl relative overflow-hidden transform transition-all">

                <button @click="openModal = false"
                    class="absolute top-6 right-6 z-20 text-slate-400 hover:text-red-500 transition">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>

                <div class="p-10 md:p-14">
                    <h2 class="text-4xl font-black text-slate-800 mb-6 tracking-tighter" x-text="activeService.name">
                    </h2>

                    <div class="flex gap-4 mb-8">
                        <span class="bg-blue-50 text-blue-600 px-4 py-1 rounded-full font-bold text-sm"
                            x-text="activeService.duration + ' min'"></span>
                        <span class="bg-orange-50 text-orange-600 px-4 py-1 rounded-full font-bold text-sm"
                            x-text="'R$ ' + activeService.price"></span>
                    </div>

                    <div class="prose prose-slate prose-lg max-w-none text-slate-600"
                        x-html="activeService.description"></div>

                    <div class="mt-12 flex flex-col sm:flex-row gap-4">
                        <a href="https://wa.me/5562982553592"
                            class="flex-1 bg-orange-500 text-white text-center font-bold py-4 rounded-2xl hover:bg-blue-600 transition shadow-lg shadow-orange-200">
                            Agendar via WhatsApp
                        </a>
                        <button @click="openModal = false"
                            class="flex-1 bg-slate-100 text-slate-500 font-bold py-4 rounded-2xl hover:bg-slate-200 transition">
                            Voltar
                        </button>
                    </div>
                </div>
            </div>
        </div>
        {{-- Botão Voltar --}}
        <div class="mt-20">
            <a href="/"
                class="text-slate-400 hover:text-blue-600 font-bold text-sm transition-colors flex items-center justify-center gap-2 group">
                <span class="group-hover:-translate-x-2 transition-transform duration-300">&larr;</span> Voltar para o
                Início
            </a>
        </div>
    </div>
</x-layout-page>
