<x-layout-page page-title='Espaço Terapêutico'>

    <section class="relative pt-32 pb-20 overflow-hidden">
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
                        Um refúgio de acolhimento em Goiânia para crianças e adultos, unindo a precisão da ciência
                        ao
                        calor do afeto humano.
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                        {{-- <a href="{{ route('agendar.create') }}"
                            class="bg-orange-500 text-white px-8 py-4 rounded-2xl font-bold hover:bg-slate-900 transition shadow-xl">
                            Agendar Consulta
                        </a> --}}
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

    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-blue-900/40 font-bold uppercase tracking-[0.2em] text-sm mb-2">Por que o Espaço
                Terapêutico?
            </h2>
            <h3 class="text-3xl md:text-4xl font-semibold text-slate-900 mb-12">Equilíbrio entre <span
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
                    <p class="text-slate-500 text-sm leading-relaxed">Metodologias validadas (ABA e TCC) para
                        garantir
                        resultados reais e mensuráveis.</p>
                </div>
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
                    <p class="text-slate-500 text-sm leading-relaxed">Marque consultas de forma prática e rápida
                        através
                        do nosso sistema online integrado.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="servicos" class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 gap-4">
                <div>
                    <h2 class="text-blue-900/40 font-bold uppercase tracking-[0.2em] text-xs mb-2">Nossas
                        Especialidades
                    </h2>
                    <h3 class="text-3xl md:text-4xl font-bold text-slate-900">Serviços <span
                            class="text-blue-600">Disponíveis</span></h3>
                </div>
                <a href="/services"
                    class="text-blue-600 font-bold hover:text-blue-700 transition-colors flex items-center gap-2 group text-sm">
                    Explorar todos os serviços <span
                        class="group-hover:translate-x-1 transition-transform">&rarr;</span>
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
    </section>

    <section id="blog" class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 gap-4">
                <div>
                    <h2 class="text-blue-900/40 font-bold uppercase tracking-[0.2em] text-xs mb-2">Conteúdo e
                        Informação
                    </h2>
                    <h3 class="text-3xl md:text-4xl font-bold text-slate-900">Explore o <span
                            class="text-blue-600">Universo</span>
                    </h3>
                </div>
                <a href="/blogPublic/index"
                    class="text-blue-600 font-bold hover:text-blue-700 transition-colors flex items-center gap-2 group text-sm">
                    Explorar todos os artigos <span class="group-hover:translate-x-1 transition-transform">&rarr;</span>
                </a>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch">
                {{-- Post Principal --}}
                @if (isset($posts[0]))
                    <div class="lg:col-span-7 group">
                        <a href="/blog/{{ $posts[0]->slug }}"
                            class="block relative h-[400px] overflow-hidden rounded-[2.5rem] shadow-lg border border-white transition-all duration-500">

                            {{-- Imagem de Fundo --}}
                            <img src="{{ asset('storage/' . $posts[0]->image_url) }}"
                                class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                                alt="{{ $posts[0]->title }}">

                            {{-- Overlay Gradiente --}}
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-slate-900/90 via-slate-900/20 to-transparent">
                            </div>

                            {{-- Conteúdo --}}
                            <div class="absolute bottom-0 p-10 w-full">
                                <span
                                    class="px-3 py-1 bg-orange-500 text-white text-[10px] font-bold rounded-full mb-4 inline-block italic uppercase tracking-wider">Destaque</span>

                                <h4
                                    class="text-3xl font-bold text-white mb-4 leading-tight line-clamp-2 group-hover:text-blue-100 transition-colors">
                                    {{ $posts[0]->title }}
                                </h4>

                                <p class="text-slate-200 line-clamp-2 mb-6 max-w-lg text-sm opacity-90">
                                    {{ Str::limit(strip_tags($posts[0]->content), 150) }}
                                </p>

                                <div class="text-white text-sm font-bold flex items-center gap-2">
                                    Continuar lendo <span
                                        class="text-orange-400 group-hover:translate-x-1 transition-transform">&plus;</span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif

                {{-- Posts Secundários Empilhados --}}
                <div class="lg:col-span-5 flex flex-col gap-8">
                    @foreach ($posts->skip(1)->take(2) as $post)
                        <a href="/blogPublic/{{ $post->slug }}"
                            class="group relative flex items-center gap-6 p-4 h-[184px] bg-white border border-blue-50 rounded-[2rem] hover:border-blue-100 hover:shadow-xl hover:shadow-blue-900/10 transition-all duration-500">

                            <div class="relative w-32 h-32 flex-shrink-0 rounded-2xl overflow-hidden shadow-sm">
                                <img src="{{ asset('storage/' . $post->image_url) }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                                    alt="{{ $post->title }}">
                            </div>

                            <div class="flex flex-col justify-center overflow-hidden flex-grow">
                                {{-- Badge: Aumentado de text-[10px] para text-xs (12px) --}}
                                <div class="flex items-center gap-2 mb-3">
                                    <span class="w-2 h-2 rounded-full bg-blue-500 shadow-sm shadow-blue-100"></span>
                                    <h1
                                        class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.15em] truncate">
                                        {{-- {{ $post->category }} --}} artigo
                                    </h1>
                                </div>

                                <h4
                                    class="text-lg md:text-xl font-semibold text-slate-800 leading-snug group-hover:text-blue-600 transition-colors duration-300 line-clamp-2 mb-3">
                                    {{ $post->title }}
                                </h4>

                                <div
                                    class="flex items-center gap-1.5 text-sm font-bold text-orange-500 group-hover:text-orange-600 transition-all">
                                    <span>Ler artigo completo</span>
                                    <span
                                        class="translate-x-0 group-hover:translate-x-2 transition-transform duration-300">
                                        &rarr;
                                    </span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section id="contato" class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div
                class="bg-white/60 backdrop-blur-xl rounded-[3rem] p-4 md:p-16 shadow-2xl shadow-blue-900/10 border border-white/50 relative overflow-hidden">

                <div class="absolute -bottom-20 -right-20 w-64 h-64 bg-blue-100/30 rounded-full blur-3xl"></div>

                <div class="relative z-10 text-center">
                    <h2 class="text-blue-900/40 font-bold uppercase tracking-[0.2em] text-xs mb-2">Canais de
                        Atendimento
                    </h2>
                    <h3 class="text-3xl md:text-4xl font-bold text-slate-900 mb-1">Vamos nos <span
                            class="text-blue-600">conectar?</span></h3>
                    <p class="text-slate-500 mb-10 max-w-xl mx-auto leading-relaxed">
                        Estamos prontos para acolher você. Escolha a forma mais confortável para iniciarmos essa
                        jornada
                        de cuidado.
                    </p>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">

                        {{-- WhatsApp --}}
                        <a href="https://wa.me/5562982553592" target="_blank"
                            class="flex flex-col items-center p-8 bg-white/60 backdrop-blur-xl rounded-[2.5rem] border border-white/50 group hover:bg-white hover:shadow-2xl hover:shadow-emerald-900/10 transition-all duration-500 transform hover:-translate-y-1">

                            <div class="relative mb-4">
                                {{-- Fundo do Ícone --}}
                                <div
                                    class="w-16 h-16 bg-gradient-to-tr from-emerald-50 to-teal-50 text-emerald-600 rounded-2xl flex items-center justify-center group-hover:from-[#25D366] group-hover:to-[#128C7E] group-hover:text-white transition-all duration-500 shadow-sm group-hover:shadow-lg group-hover:-rotate-6">
                                    <svg class="w-8 h-8 transition-transform duration-500 group-hover:scale-110"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                </div>
                                {{-- Ping Ativo --}}
                                <span class="absolute -top-1 -right-1 flex h-3 w-3">
                                    <span
                                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-3 w-3 bg-emerald-500"></span>
                                </span>
                            </div>

                            <span
                                class="text-slate-800 font-black tracking-tight group-hover:text-emerald-600 transition-colors">WhatsApp</span>
                            <div
                                class="flex items-center gap-1 mt-1 opacity-60 group-hover:opacity-100 transition-opacity">
                                <span class="w-4 h-[1px] bg-slate-400 group-hover:bg-emerald-400"></span>
                                <span
                                    class="text-[10px] text-slate-500 font-bold uppercase tracking-widest">Agendamento
                                    rápido</span>
                            </div>
                        </a>

                        {{-- Instagram --}}
                        <a href="https://www.instagram.com/karlaniana.espacoterapeutico/" target="_blank"
                            class="flex flex-col items-center p-8 bg-white/60 backdrop-blur-xl rounded-[2.5rem] border border-white/50 group hover:bg-white hover:shadow-2xl hover:shadow-orange-900/10 transition-all duration-500 transform hover:-translate-y-1">

                            <div class="relative mb-4">
                                <div
                                    class="w-16 h-16 bg-gradient-to-tr from-orange-50 to-blue-50 text-slate-400 rounded-2xl flex items-center justify-center group-hover:from-[#f09433] group-hover:via-[#dc2743] group-hover:to-[#bc1888] group-hover:text-white transition-all duration-500 shadow-sm group-hover:shadow-lg group-hover:rotate-6">
                                    <svg class="w-8 h-8 transition-transform duration-500 group-hover:scale-110"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                                    </svg>
                                </div>
                                <span class="absolute -top-1 -right-1 flex h-3 w-3">
                                    <span
                                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-orange-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-3 w-3 bg-orange-500"></span>
                                </span>
                            </div>

                            <span
                                class="text-slate-800 font-black tracking-tight group-hover:text-orange-600 transition-colors">Instagram</span>
                            <div
                                class="flex items-center gap-1 mt-1 opacity-60 group-hover:opacity-100 transition-opacity">
                                <span class="w-4 h-[1px] bg-slate-400 group-hover:bg-orange-400"></span>
                                <span class="text-[10px] text-slate-500 font-bold uppercase tracking-widest">Dicas e
                                    rotina</span>
                            </div>
                        </a>

                        {{-- Localização --}}
                        <a href="https://www.google.com/maps/search/?api=1&query=Karla+Niano+Espaço+Terapêutico+Jardim+América+Goiânia"
                            target="_blank"
                            class="flex flex-col items-center p-8 bg-white/60 backdrop-blur-xl rounded-[2.5rem] border border-white/50 group hover:bg-white hover:shadow-2xl hover:shadow-slate-900/10 transition-all duration-500 transform hover:-translate-y-1">

                            <div class="relative mb-4">
                                <div
                                    class="w-16 h-16 bg-gradient-to-tr from-slate-100 to-blue-50 text-slate-400 rounded-2xl flex items-center justify-center group-hover:from-slate-700 group-hover:to-slate-900 group-hover:text-white transition-all duration-500 shadow-sm group-hover:shadow-lg group-hover:-rotate-3">
                                    <svg class="w-8 h-8 transition-transform duration-500 group-hover:scale-110"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                            </div>

                            <span
                                class="text-slate-800 font-black tracking-tight group-hover:text-slate-900 transition-colors">Goiânia,
                                GO</span>
                            <div
                                class="flex items-center gap-1 mt-1 opacity-60 group-hover:opacity-100 transition-opacity">
                                <span class="w-4 h-[1px] bg-slate-400 group-hover:bg-slate-900"></span>
                                <span class="text-[10px] text-slate-500 font-bold uppercase tracking-widest">Jardim
                                    América</span>
                            </div>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </section>

</x-layout-page>

<x-footer />
