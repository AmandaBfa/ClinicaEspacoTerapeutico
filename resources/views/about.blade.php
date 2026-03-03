<x-navbar />

<x-layout-page page-title="Sobre Karla Niano - Espaço Terapêutico">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        {{-- Flexbox: Coluna no celular, Linha no PC (md:flex-row) --}}
        <div class="flex flex-col md:flex-row gap-12 items-center mt-20">

            {{-- Lado da Foto (1/3 da largura no PC) --}}
            <div class="w-full md:w-1/3">
                {{-- aspect-square mantém a foto sempre quadradinha --}}
                <div class="aspect-square bg-gray-200 rounded-2xl overflow-hidden shadow-xl border-4 border-white">
                    {{-- Quando tiver a foto, é só colocar a tag <img> aqui --}}
                    <div class="w-full h-full flex items-center justify-center bg-blue-50 text-blue-300">
                        <img src="{{ asset('assets/images/KarlaNiano.png') }}" alt="Karla Niano"
                            class="w-full h-full object-cover">
                    </div>
                </div>
            </div>

            {{-- Lado do Texto (2/3 da largura no PC) --}}
            <div class="w-full md:w-2/3">
                <h1 class="text-4xl font-bold text-gray-900 mb-2">Karla Niano</h1>
                <h2 class="text-xl text-blue-600 font-semibold mb-6">Psicóloga | CRP 00/00000</h2>

                {{-- space-y-4 cria o espaçamento automático entre os parágrafos --}}
                <div class="text-gray-600 space-y-4 leading-relaxed text-lg">
                    <p>
                        Olá! Sou Karla Niano, psicóloga apaixonada pelo universo infantil e pelo desenvolvimento humano.
                        Minha trajetória é dedicada a compreender e acolher as singularidades de cada criança.
                    </p>
                    <p>
                        Com especialização em <strong>Terapia Cognitivo-Comportamental (TCC)</strong> e <strong>Análise
                            do Comportamento Aplicada (ABA)</strong>,
                        foco meu trabalho no atendimento de crianças com TDAH, Autismo e outros transtornos do
                        neurodesenvolvimento.
                    </p>
                    <p>
                        Acredito que a terapia deve ser um espaço de descoberta, brincadeira e crescimento. No
                        <strong>Espaço Terapêutico</strong>,
                        cada detalhe é pensado para que seu filho se sinta seguro.
                    </p>
                </div>

                <div class="mt-8 flex gap-4">
                    <a href="/servicos"
                        class="px-6 py-3 bg-orange-500 text-white rounded-lg font-bold hover:bg-orange-600 transition shadow-lg hover:shadow-orange-200">
                        Conheça meus serviços
                    </a>
                </div>
            </div>

        </div>

        <div class="flex flex-col md:flex-row gap-12 items-center mt-20">

            {{-- Lado do Texto (2/3 da largura no PC) --}}
            <div class="w-full md:w-2/3">
                <h1 class="text-4xl font-bold text-gray-900 mb-2">Ana Julia</h1>
                <h2 class="text-xl text-blue-600 font-semibold mb-6">Estudante de Psicóloga</h2>

                {{-- space-y-4 cria o espaçamento automático entre os parágrafos --}}
                <div class="text-gray-600 space-y-4 leading-relaxed text-lg">
                    <p>
                        Olá! Sou estudante de Psicologia e, atualmente, tenho a alegria de ser estagiária aqui no
                        <strong>Espaço Terapêutico</strong>.
                        Sempre fui apaixonada pelo universo das crianças e acredito que cada sorriso e cada pequena
                        conquista delas é um mundo de possibilidades que se abre.
                    </p>
                    <p>
                        No dia a dia da clínica, busco aprender o máximo sobre o acolhimento infantil e o suporte às
                        famílias. Tenho um carinho especial pelas abordagens da
                        <strong>Terapia Cognitivo-Comportamental (TCC)</strong> e pela <strong>Análise do Comportamento
                            Aplicada (ABA)</strong>, observando como essas ferramentas
                        podem transformar a vida de crianças com TDAH e Autismo.
                    </p>
                    <p>
                        Para mim, estar aqui é mais do que um estágio; é a oportunidade de participar de um ambiente que
                        une ciência e muito afeto. Adoro ver como o brincar
                        se torna uma ferramenta de crescimento, garantindo que cada criança se sinta segura e muito
                        amada durante todo o processo.
                    </p>
                </div>

                <div class="mt-8 flex gap-4">
                    <a href="/servicos"
                        class="px-6 py-3 bg-orange-500 text-white rounded-lg font-bold hover:bg-orange-600 transition shadow-lg hover:shadow-orange-200">
                        Conheça meus serviços
                    </a>
                </div>
            </div>

            {{-- Lado da Foto (1/3 da largura no PC) --}}
            <div class="w-full md:w-1/3">
                {{-- aspect-square mantém a foto sempre quadradinha --}}
                <div class="aspect-square bg-gray-200 rounded-2xl overflow-hidden shadow-xl border-4 border-white">
                    {{-- Quando tiver a foto, é só colocar a tag <img> aqui --}}
                    <div class="w-full h-full flex items-center justify-center bg-blue-50 text-blue-300">
                        <img src="{{ asset('assets/images/AnaJulia.png') }}" alt="Ana Julia"
                            class="w-full h-full object-cover">
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-layout-page>
