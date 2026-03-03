<x-navbar />

<x-layout-page page-title="Serviços disponíveis">

    <div class="min-h-screen bg-slate-50"> {{-- Azul bem clarinho no fundo --}}
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
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($services as $service)
                    <div
                        class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden hover:shadow-xl hover:border-blue-100 transition-all duration-300 flex flex-col">
                        <div class="p-8 flex flex-col h-full">
                            {{-- Badge de Categoria ou Ícone sutil --}}
                            {{-- <div class="mb-4">
                                <span
                                    class="bg-blue-50 text-blue-600 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">
                                    Especialidade
                                </span>
                            </div> --}}

                            {{-- Nome do Serviço - Agora em Azul Marinho --}}
                            <h3
                                class="text-2xl font-bold text-slate-800 mb-3 group-hover:text-blue-600 transition-colors">
                                {{ $service->name }}
                            </h3>

                            {{-- Descrição --}}
                            <p class="text-slate-500 mb-6 leading-relaxed flex-grow">
                                {{ $service->description }}
                            </p>

                            {{-- Info de Tempo e Preço --}}
                            <div class="flex justify-between items-center p-4 bg-slate-50 rounded-xl mb-6">
                                <span class="flex items-center gap-2 text-slate-600 font-medium">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    {{ $service->duration_minutes }} min
                                </span>
                                <span class="font-bold text-xl text-slate-800">
                                    <span
                                        class="text-sm text-blue-600 mr-1">R$</span>{{ number_format($service->price, 2, ',', '.') }}
                                </span>
                            </div>

                            {{-- Botão de Agendamento - Laranja com Hover Azul --}}
                            <a href="/agendar"
                                class="block w-full text-center bg-orange-500 text-white font-bold py-4 px-4 rounded-xl hover:bg-blue-600 transition-all shadow-md shadow-orange-100 hover:shadow-blue-100 transform hover:-translate-y-1">
                                Agendar Agora
                            </a>

                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Botão Voltar --}}
            <div class="mt-16 text-center">
                <a href="/"
                    class="text-slate-500 hover:text-blue-600 font-medium transition-colors flex items-center justify-center gap-2 group">
                    <span class="group-hover:-translate-x-1 transition-transform">&larr;</span> Voltar para Home
                </a>
            </div>
        </div>
    </div>

</x-layout-page>
