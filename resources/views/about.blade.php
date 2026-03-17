<x-layout-page page-title="Nossas Especialistas - Espaço Terapêutico">

    <div class="min-h-screen bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

            {{-- Título da Página --}}
            <div class="text-center mb-8 mt-20">
                <h1 class="text-4xl font-bold text-gray-900">Conheça Nossas Especialistas</h1>
                <p class="mt-4 text-xl text-gray-600">Ciência unida ao afeto</p>
                <div class="w-20 h-1 bg-blue-500 mx-auto mt-6 rounded-full"></div>
            </div>

            {{-- Loop dos Profissionais --}}
            @foreach ($employees as $employee)
                <div
                    class="flex flex-col {{ $loop->even ? 'md:flex-row-reverse' : 'md:flex-row' }} gap-16 items-center mb-32">

                    {{-- Coluna da Foto --}}
                    <div class="w-full md:w-1/3 group">
                        <div class="relative">
                            {{-- Elemento decorativo: Alterna cores entre azul e laranja baseado na posição --}}
                            <div
                                class="absolute inset-0 {{ $loop->odd ? 'bg-blue-100 rotate-6' : 'bg-orange-100 -rotate-6' }} rounded-[2rem] scale-105 opacity-50 group-hover:rotate-3 transition-transform duration-500">
                            </div>

                            <div
                                class="relative aspect-[4/5] md:aspect-square bg-white rounded-3xl overflow-hidden shadow-2xl border-8 border-white">
                                <img src="{{ asset('storage/' . $employee->image_path) }}" alt="{{ $employee->name }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            </div>
                        </div>
                    </div>

                    {{-- Coluna do Texto --}}
                    <div class="w-full md:w-2/3 text-center md:text-left">
                        {{-- <span
                            class="inline-block px-4 py-1 {{ $loop->odd ? 'bg-blue-50 text-blue-600' : 'bg-orange-50 text-orange-600' }} text-xs font-bold rounded-full mb-4">
                            Equipe
                        </span> --}}

                        <h1 class="text-4xl md:text-5xl font-bold text-slate-900 mb-2">{{ $employee->name }}</h1>
                        <h2 class="text-xl {{ $loop->odd ? 'text-blue-500' : 'text-orange-500' }} font-medium mb-4">
                            {{ $employee->role }}</h2>

                        {{-- Especialidades cadastradas --}}
                        <div class="flex flex-wrap gap-2 justify-center md:justify-start mb-8">
                            @foreach (explode(',', $employee->specialties) as $spec)
                                <span
                                    class="px-3 py-1 bg-white border border-slate-200 text-slate-500 text-[10px] font-bold rounded-lg uppercase">
                                    {{ trim($spec) }}
                                </span>
                            @endforeach
                        </div>

                        {{-- Bio Dinâmica (CKEditor) --}}
                        <div class="text-slate-600 space-y-6 leading-relaxed text-lg prose prose-slate max-w-none">
                            {!! $employee->bio !!}
                        </div>

                    </div>
                </div>
            @endforeach

            <div
                class="mt-20 mb-10 p-12 bg-white rounded-[3rem] shadow-xl shadow-blue-900/5 text-center border border-white">
                <h3 class="text-2xl font-bold text-slate-800 mb-4">Pronta para começar essa jornada conosco?</h3>
                <p class="text-slate-500 mb-8 max-w-xl mx-auto">Nossa equipe está preparada para oferecer o melhor
                    suporte terapêutico baseado em evidências e afeto.</p>

                <a href="/services"
                    class="inline-flex items-center gap-3 px-10 py-5 bg-orange-500 text-white rounded-[2rem] text-lg font-bold hover:bg-blue-600 transition-all shadow-xl shadow-orange-200 transform hover:-translate-y-1">
                    Conheça nossos serviços <span>&rarr;</span>
                </a>
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
