<x-navbar />

<x-layout-page page-title='Espaço Terapêutico'>

    <section class="pt-32 pb-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-blue-50">
        <div class="max-w-7xl mx-auto flex flex-col-reverse md:flex-row items-center gap-12">
            <div class="w-full md:w-1/2 text-center md:text-left">
                <span class="inline-block py-1 px-3 rounded-full bg-blue-100 text-blue-600 font-semibold text-sm mb-6">
                    Psicologia Infantil Especializada
                </span>
                <h1 class="text-4xl md:text-6xl font-bold text-gray-900 leading-tight mb-6">
                    Acolhimento e cuidado para o <span class="text-orange-500">desenvolvimento</span> do seu filho
                </h1>
                <p class="text-xl text-gray-600 mb-8 leading-relaxed">
                    Atendimento especializado em TDAH, Autismo e desenvolvimento infantil.
                    Um espaço seguro e lúdico para promover bem-estar e autonomia.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                    <a href="/agendar"
                        class="px-8 py-4 bg-blue-600 text-white rounded-lg font-bold text-lg shadow-xl hover:bg-blue-700 transition text-center">
                        Agendar Avaliação
                    </a>
                    <a href="/sobre"
                        class="px-8 py-4 border-2 border-gray-200 text-gray-700 rounded-lg font-bold text-lg hover:border-orange-500 hover:text-orange-500 transition text-center">
                        Conheça a Profissional
                    </a>
                </div>
            </div>
            <div class="w-full md:w-1/2">
                <div class="bg-orange-100 rounded-3xl p-8 transform rotate-3 hover:rotate-0 transition duration-500">
                    <div
                        class="bg-white rounded-2xl shadow-2xl p-4 overflow-hidden h-96 flex items-center justify-center">
                        <img src="{{ asset('assets/images/KarlaNiano.png') }}" alt="Logo" class="w-130 h-90">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-gradient-to-br">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900">Por que escolher o Espaço Terapêutico?</h2>
            </div>
            <div class="grid md:grid-cols-3 gap-10">
                <div class="p-8 bg-gray-50 rounded-xl hover:shadow-lg transition">
                    <div
                        class="w-14 h-14 bg-orange-100 rounded-lg flex items-center justify-center text-orange-500 mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Abordagem Acolhedora</h3>
                    <p class="text-gray-600">Ambiente preparado para que a criança se sinta segura e compreendida desde
                        o primeiro momento.</p>
                </div>
                <div class="p-8 bg-gray-50 rounded-xl hover:shadow-lg transition">
                    <div class="w-14 h-14 bg-blue-100 rounded-lg flex items-center justify-center text-blue-600 mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Especialista em TDAH e Autismo</h3>
                    <p class="text-gray-600">Metodologias baseadas em evidências (ABA) e foco nas necessidades
                        individuais de cada criança.</p>
                </div>
                <div class="p-8 bg-gray-50 rounded-xl hover:shadow-lg transition">
                    <div class="w-14 h-14 bg-green-100 rounded-lg flex items-center justify-center text-green-600 mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Agendamento Simplificado</h3>
                    <p class="text-gray-600">Marque consultas de forma prática e rápida através do nosso sistema online
                        integrado.</p>
                </div>
            </div>
        </div>
    </section>

</x-layout-page>

<x-footer />
