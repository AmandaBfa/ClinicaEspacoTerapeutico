<x-navbar />

<x-layout-page page-title="Nossas Especialistas - Espaço Terapêutico">

    <div class="min-h-screen bg-slate-50"> {{-- Azul bem clarinho no fundo --}}
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

            {{-- Título da Página (Opcional, mas ajuda no contexto) --}}
            <div class="text-center mb-6 mt-20">
                <h1 class="text-4xl font-bold text-gray-900">Conheça Nossas Especialistas</h1>
                <p class="mt-4 text-xl text-gray-600">Ciência unida ao afeto</p>
                <div class="w-20 h-1 bg-blue-500 mx-auto mt-6 rounded-full"></div>
            </div>

            {{-- Perfil Karla Niano --}}
            <div class="flex flex-col md:flex-row gap-16 items-center mb-32">
                <div class="w-full md:w-1/3 group">
                    <div class="relative">
                        {{-- Elemento decorativo atrás da foto --}}
                        <div
                            class="absolute inset-0 bg-blue-100 rounded-[2rem] rotate-6 scale-105 opacity-50 group-hover:rotate-3 transition-transform duration-500">
                        </div>
                        <div
                            class="relative aspect-[4/5] md:aspect-square bg-white rounded-3xl overflow-hidden shadow-2xl border-8 border-white">
                            <img src="{{ asset('assets/images/KarlaNiano.png') }}" alt="Karla Niano"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        </div>
                    </div>
                </div>

                <div class="w-full md:w-2/3 text-center md:text-left">
                    <span
                        class="inline-block px-4 py-1 bg-blue-50 text-blue-600 text-xs font-bold rounded-full mb-4">Fundadora</span>
                    <h1 class="text-4xl md:text-5xl font-bold text-slate-900 mb-2">Karla Niana</h1>
                    <h2 class="text-xl text-blue-500 font-medium mb-8 italic">Terapeuta</h2>

                    <div class="text-slate-600 space-y-6 leading-relaxed text-lg">
                        <p>Olá! Sou Karla Niano, psicóloga apaixonada pelo universo infantil e pelo desenvolvimento
                            humano.
                            Minha trajetória é dedicada a compreender e acolher as singularidades de cada criança.</p>
                        <p>Com especialização em <strong class="text-slate-900">Terapia Cognitivo-Comportamental
                                (TCC)</strong> e <strong class="text-slate-900">Análise do Comportamento Aplicada
                                (ABA)</strong>, foco meu trabalho no atendimento de crianças com TDAH, Autismo e outros
                            transtornos.</p>
                    </div>
                </div>
            </div>

            {{-- Perfil Ana Julia (Invertido no Desktop, Foto primeiro no Mobile) --}}
            <div class="flex flex-col-reverse md:flex-row gap-16 items-center">
                <div class="w-full md:w-2/3 text-center md:text-left">
                    <span
                        class="inline-block px-4 py-1 bg-orange-50 text-orange-600 text-xs font-bold rounded-full mb-4">Equipe</span>
                    <h1 class="text-4xl md:text-5xl font-bold text-slate-900 mb-2">Ana Julia</h1>
                    <h2 class="text-xl text-orange-500 font-medium mb-8 italic">Estudante de Psicologia</h2>

                    <div class="text-slate-600 space-y-6 leading-relaxed text-lg">
                        <p>Olá! Sou estudante de Psicologia e, atualmente, tenho a alegria de ser estagiária aqui no
                            <strong class="text-slate-900">Espaço Terapêutico</strong>.
                        </p>
                        <p>No dia a dia da clínica, busco aprender o máximo sobre o acolhimento infantil e o suporte às
                            famílias, unindo ciência e muito afeto através do brincar.</p>
                    </div>

                    <div class="mt-10">
                        <a href="/servicos"
                            class="inline-flex items-center gap-2 px-8 py-4 bg-orange-500 text-white rounded-2xl font-bold hover:bg-blue-600 transition-all shadow-lg shadow-orange-100 transform hover:-translate-y-1">
                            Conheça nossos serviços <span>&rarr;</span>
                        </a>
                    </div>
                </div>

                <div class="w-full md:w-1/3 group">
                    <div class="relative">
                        <div
                            class="absolute inset-0 bg-orange-100 rounded-[2rem] -rotate-6 scale-105 opacity-50 group-hover:-rotate-3 transition-transform duration-500">
                        </div>
                        <div
                            class="relative aspect-[4/5] md:aspect-square bg-white rounded-3xl overflow-hidden shadow-2xl border-8 border-white">
                            <img src="{{ asset('assets/images/AnaJulia.png') }}" alt="Ana Julia"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        </div>
                    </div>
                </div>
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
