<x-navbar />

<x-layout-page page-title='Espaço Terapêutico'>

    <section class="relative pt-32 pb-20 bg-gradient-to-b from-blue-50/50 to-white overflow-hidden">
        {{-- Detalhes decorativos sutis --}}
        <div
            class="absolute top-0 right-0 -translate-y-1/2 translate-x-1/4 w-96 h-96 bg-blue-100/40 rounded-full blur-3xl">
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="flex flex-col md:flex-row items-center gap-16 mt-12">

                {{-- Lado Esquerdo: Conteúdo --}}
                <div class="flex-1 text-center md:text-left">
                    <h1 class="text-4xl md:text-6xl font-bold text-slate-900 leading-[1.1] mb-6">
                        Cuidando da sua <span class="text-blue-600">saúde mental</span> com a leveza que você merece
                    </h1>

                    <p class="text-lg md:text-xl text-slate-500 mb-10 leading-relaxed max-w-xl">
                        Um refúgio de acolhimento em Goiânia para crianças e adultos, unindo a precisão da ciência ao
                        calor do afeto humano.
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                        <a href="/agendar"
                            class="px-8 py-4 bg-orange-500 text-white font-bold rounded-2xl shadow-lg shadow-orange-100 hover:bg-blue-600 transition-all duration-300 transform hover:-translate-y-1">
                            Agendar Consulta
                        </a>
                        <a href="#servicos"
                            class="px-8 py-4 bg-blue-500 text-white font-bold rounded-2xl shadow-lg shadow-blue-100 hover:bg-orange-600 transition-all duration-300 transform hover:-translate-y-1">
                            Conhecer Serviços
                        </a>
                    </div>
                </div>

                {{-- Lado Direito: Imagem com Moldura Orgânica --}}
                <div class="flex-1 relative group">
                    <div
                        class="absolute inset-0 bg-blue-200 rounded-[2rem] rotate-3 scale-105 opacity-40 group-hover:rotate-6 transition-transform duration-500">
                    </div>
                    <div class="relative rounded-[2rem] overflow-hidden shadow-2xl border-4 border-white">
                        <img src="{{ asset('assets/images/hero_home.jpg') }}" alt="Espaço Terapêutico"
                            class="w-full h-auto">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-15 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-blue-900/40 font-bold uppercase tracking-[0.2em] text-sm mb-2">Por que o Espaço Terapêutico?
            </h2>
            <h3 class="text-3xl md:text-4xl font-semibold text-slate-900 mb-10">Equilíbrio entre <span
                    class="text-blue-600">razão</span> e <span class="text-orange-500">emoção</span></h3>

            <div class="grid md:grid-cols-3 gap-12">
                <div class="flex flex-col items-center group">
                    <div
                        class="w-16 h-16 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-blue-600 group-hover:text-white transition-all duration-500 shadow-sm">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold text-slate-800 mb-2">Segurança Científica</h4>
                    <p class="text-slate-500 text-sm leading-relaxed">Metodologias validadas (ABA e TCC) para garantir
                        resultados reais e mensuráveis.</p>
                </div>
                {{-- Adicione mais itens aqui --}}
                <div class="flex flex-col items-center group">
                    <div
                        class="w-16 h-16 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-blue-600 group-hover:text-white transition-all duration-500 shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold text-slate-800 mb-2">Especialista em TDAH e Autismo</h4>
                    <p class="text-slate-500 text-sm leading-relaxed">Metodologias baseadas em evidências e um olhar
                        atento às necessidades
                        individuais de cada paciente, em todas as fases da vida.</p>
                </div>
                <div class="flex flex-col items-center group">
                    <div
                        class="w-16 h-16 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-blue-600 group-hover:text-white transition-all duration-500 shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold text-slate-800 mb-2">Agendamento Simplificado</h4>
                    <p class="text-slate-500 text-sm leading-relaxed">Marque consultas de forma prática e rápida através
                        do nosso sistema online integrado.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="servicos" class="py-15 bg-white">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-10">
                <div>
                    <h2 class="text-blue-900/40 font-bold uppercase tracking-[0.2em] text-xs mb-2">Nossas Especialidades
                    </h2>
                    <h3 class="text-3xl font-bold text-slate-900">Serviços <span
                            class="text-blue-600">Disponíveis</span></h3>
                </div>
                <a href="/services"
                    class="text-blue-600 font-bold hover:text-blue-700 transition-colors flex items-center gap-2 group">
                    Ver todos <span class="group-hover:translate-x-1 transition-transform">&rarr;</span>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($services as $service)
                    <div
                        class="p-5 bg-slate-50 border border-blue-50 rounded-3xl flex flex-col group hover:bg-white hover:shadow-xl hover:shadow-blue-900/5 hover:border-blue-200 transition-all duration-500">

                        <div
                            class="w-14 h-14 rounded-2xl flex items-center justify-center mb-6 shadow-sm transition-all duration-500 {{ $loop->index % 2 == 0 ? 'bg-blue-50 text-blue-500 group-hover:bg-blue-600' : 'bg-orange-50 text-orange-500 group-hover:bg-orange-500' }} group-hover:text-white">

                            <img src="{{ asset('assets/images/logo2.png') }}"
                                class="w-8 h-8 opacity-80 group-hover:brightness-0 group-hover:invert transition-all"
                                alt="Logo">
                        </div>

                        <h3 class="text-xl font-bold text-slate-800 mb-3 group-hover:text-blue-600 transition-colors">
                            {{ $service->name }}</h3>

                        <p class="text-slate-500 text-sm leading-relaxed mb-8 flex-grow">
                            {{ $service->description }}
                        </p>

                        {{-- Rodapé do Card --}}
                        <div class="pt-6 border-t border-blue-100/50 mt-auto flex items-center justify-between">
                            <a href="/agendar"
                                class="text-orange-500 font-bold text-sm hover:text-blue-600 transition-colors flex items-center gap-1">
                                Agendar <span class="group-hover:translate-x-1 transition-transform">&rarr;</span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        </div>
    </section>

</x-layout-page>

<x-footer />
