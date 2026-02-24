<x-navbar />

<x-layout-page page-title="Serviços disponíveis">

    <div class="min-h-screen bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

            {{-- Cabeçalho da Página --}}
            <div class="text-center mb-12 mt-20">
                <h1 class="text-4xl font-bold text-gray-900">Nossos Serviços</h1>
                <p class="mt-4 text-xl text-gray-600">Acompanhamento especializado para o desenvolvimento do seu filho.
                </p>
            </div>

            {{-- Grid de Serviços --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($services as $service)
                    <div
                        class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        <div class="p-6">
                            {{-- Nome do Serviço --}}
                            <h3 class="text-2xl font-bold text-orange-500 mb-2">{{ $service->name }}</h3>

                            {{-- Descrição --}}
                            <p class="text-gray-600 mb-4 h-20 overflow-hidden">
                                {{ $service->description }}
                            </p>

                            {{-- Info de Tempo e Preço --}}
                            <div class="flex justify-between items-center text-sm text-gray-500 mb-6">
                                <span class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    {{ $service->duration_minutes }} min
                                </span>
                                <span class="font-bold text-lg text-blue-600">
                                    R$ {{ number_format($service->price, 2, ',', '.') }}
                                </span>
                            </div>

                            {{-- Botão de Agendamento --}}
                            <a href="/agendar"
                                class="block w-full text-center bg-orange-500 text-white font-bold py-3 px-4 rounded hover:bg-orange-600 transition shadow-md hover:shadow-orange-200">
                                Agendar Agora
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Botão Voltar --}}
            <div class="mt-12 text-center">
                <a href="/" class="text-blue-600 hover:underline flex items-center justify-center gap-2">
                    <span>&larr;</span> Voltar para Home
                </a>
            </div>
        </div>
    </div>

</x-layout-page>
