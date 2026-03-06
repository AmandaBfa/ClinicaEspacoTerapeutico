<x-app-layout page-title="Serviços disponíveis">
    <div class="min-h-screen bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

            {{-- Cabeçalho da Página --}}
            <div class="text-center mb-8 mt-20">
                <h1 class="text-4xl font-bold text-slate-900">Nossos Serviços</h1>
                <p class="mt-4 text-xl text-slate-600 max-w-2xl mx-auto">
                    Acompanhamento especializado para o desenvolvimento integral de crianças e adultos.
                </p>
                <div class="w-20 h-1 bg-blue-500 mx-auto mt-6 rounded-full"></div> {{-- Linha decorativa azul --}}
            </div>

            {{-- Grid de Serviços --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @foreach ($services as $service)
                    <div
                        class="group bg-white/80 backdrop-blur-md rounded-[2.5rem] p-8 border border-blue-100/80 hover:border-blue-400 hover:shadow-2xl hover:shadow-blue-900/10 transition-all duration-500 flex flex-col relative overflow-hidden">
                        {{-- Detalhe decorativo interno --}}
                        <div
                            class="absolute -top-10 -right-10 w-32 h-32 bg-blue-50 rounded-full opacity-50 group-hover:scale-150 transition-transform duration-700">
                        </div>

                        <div class="relative z-10 flex flex-col h-full">
                            <h3
                                class="text-2xl font-bold text-slate-800 mb-4 group-hover:text-blue-600 transition-colors">
                                {{ $service->name }}
                            </h3>

                            <p class="text-slate-500 text-sm leading-relaxed mb-8 flex-grow">
                                {{ $service->description }}
                            </p>

                            {{-- Info de Tempo e Preço --}}
                            <div
                                class="flex justify-between items-center p-5 bg-white border border-blue-50 rounded-2xl mb-8 shadow-sm">
                                <span class="flex items-center gap-2 text-slate-500 text-sm font-semibold">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    {{ $service->duration_minutes }} min
                                </span>
                                <span class="font-bold text-xl text-slate-800 tracking-tight">
                                    <span
                                        class="text-xs text-blue-600 font-bold uppercase mr-1">R$</span>{{ number_format($service->price, 2, ',', '.') }}
                                </span>
                            </div>

                            <a href="/agendar"
                                class="block w-full text-center bg-orange-500 text-white font-bold py-4 rounded-2xl hover:bg-blue-600 transition-all shadow-lg shadow-orange-100 hover:shadow-blue-100 transform hover:-translate-y-1">
                                Agendar Agora
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Botão Voltar --}}
            <div class="mt-20">
                <a href="/"
                    class="text-slate-400 hover:text-blue-600 font-bold text-sm transition-colors flex items-center justify-center gap-2 group">
                    <span class="group-hover:-translate-x-2 transition-transform duration-300">&larr;</span> Voltar para
                    o
                    Início
                </a>
            </div>
        </div>
    </div>
    </x-layout-page>
