<x-app-layout page-title="Contato - Espaço Terapêutico">
    {{-- Ajustado para max-w-5xl para alinhar com o padrão das suas outras telas --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <div class="text-center mb-8 mt-20">
            <h1 class="text-4xl font-bold text-slate-900">Entre em Contato</h1>
            <p class="mt-4 text-xl text-slate-600 max-w-2xl mx-auto">
                Estamos prontos para acolher você e sua família.
            </p>
            <div class="w-20 h-1 bg-blue-500 mx-auto mt-6 rounded-full"></div>
        </div>

        {{-- Cabeçalho
        <div class="text-center mb-16 mt-12">
            <h1 class="text-4xl md:text-5xl font-bold text-slate-900 tracking-tight">Entre em Contato</h1>
            <p class="mt-4 text-lg text-slate-500">Estamos prontos para acolher você e sua família.</p>
            <div class="w-20 h-1 bg-blue-500 mx-auto mt-6 rounded-full shadow-sm shadow-blue-200"></div>
        </div> --}}

        <div class="space-y-8">

            {{-- Linha 1: Telefone e Email --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                {{-- Card Telefone --}}
                <div
                    class="bg-white/60 backdrop-blur-md p-8 rounded-[2.5rem] shadow-xl shadow-blue-900/5 flex items-start space-x-6 border border-white transition-all duration-500 hover:shadow-blue-900/10 hover:border-orange-200 group cursor-pointer block">
                    <div
                        class="p-4 bg-orange-50 text-orange-500 rounded-2xl shadow-sm group-hover:bg-orange-500 group-hover:text-white transition-all duration-500">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-slate-800 mb-1">Telefone & WhatsApp</h3>
                        <p
                            class="text-gray-600 font-semibold hover:text-orange-600 transition-all duration-500 hover:scale-110 origin-left cursor-pointer">
                            {{ env('CLINICA_TELEFONE', '(62) 98255-3592') }}
                        </p>
                        <p class="text-sm text-gray-400 mt-1">Atendimento de Seg a Sex, 09h às 18h</p>
                    </div>
                </div>

                {{-- Card Email --}}
                <div
                    class="bg-white/60 backdrop-blur-md p-8 rounded-[2.5rem] shadow-xl shadow-blue-900/5 flex items-start space-x-6 border border-white transition-all duration-500 hover:shadow-blue-900/10 hover:border-blue-200 group cursor-pointer block">
                    <div
                        class="p-4 bg-blue-50 text-blue-500 rounded-2xl shadow-sm group-hover:bg-blue-500 group-hover:text-white transition-all duration-500">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-slate-800 mb-1">E-mail</h3>
                        <p
                            class="text-gray-600 font-semibold hover:text-blue-600 transition-all duration-500 hover:scale-110 origin-left cursor-pointer truncate md:overflow-visible">
                            {{ env('CLINICA_EMAIL', 'contato@karlaniano.com.br') }}
                        </p>
                    </div>
                </div>
            </div>

            {{-- Linha 2: Redes Sociais e Localização --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                {{-- Card Redes Sociais --}}
                <div
                    class="bg-white/60 backdrop-blur-md p-8 rounded-[2.5rem] shadow-xl shadow-blue-900/5 flex items-start space-x-6 border border-white transition-all duration-500 hover:shadow-blue-900/10 hover:border-pink-200 group cursor-pointer block">

                    <div
                        class="p-4 bg-pink-50 text-pink-500 rounded-2xl shadow-sm group-hover:bg-pink-500 group-hover:text-white transition-all duration-500">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                        </svg>
                    </div>
                    <div class="flex-grow">
                        <h3 class="text-xl font-bold text-slate-800 mb-4 tracking-tight">Redes Sociais</h3>
                        <div class="flex flex-wrap gap-4 items-center">
                            {{-- Instagram --}}
                            <a href="https://www.instagram.com/karlaniana.espacoterapeutico/" target="_blank"
                                class="flex items-center gap-2 px-4 py-2 bg-pink-50 text-pink-600 text-xs font-bold rounded-xl hover:bg-pink-600 hover:text-white transition-all duration-300 hover:scale-105 uppercase tracking-wider group">
                                <svg class="w-4 h-4 transition-transform group-hover:rotate-12" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                                </svg>
                                <span>Instagram</span>
                            </a>
                            {{-- Facebook --}}
                            <a href="#" target="_blank"
                                class="flex items-center gap-2 px-4 py-2 bg-blue-50 text-blue-600 text-xs font-bold rounded-xl hover:bg-blue-600 hover:text-white transition-all duration-300 hover:scale-105 uppercase tracking-wider group">
                                <svg class="w-4 h-4 transition-transform group-hover:rotate-12" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M9 8H6v4h3v12h5V12h3.642L18 8h-4V6.333C14 5.378 14.192 5 15.115 5H18V0h-3.808C10.596 0 9 1.583 9 4.615V8z" />
                                </svg>
                                <span>Facebook</span>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Card Localização --}}
                <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode('Espaço Terapêutico Karla Niano Jardim América Goiânia') }}"
                    target="_blank"
                    class="bg-white/60 backdrop-blur-md p-8 rounded-[2.5rem] shadow-xl shadow-blue-900/5 flex items-start space-x-6 border border-white transition-all duration-500 hover:shadow-blue-900/10 hover:border-green-200 group cursor-pointer block">
                    <div
                        class="p-4 bg-green-100 text-green-600 rounded-2xl shadow-sm group-hover:bg-green-500 group-hover:text-white transition-colors duration-500">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-slate-800 mb-1">Onde Estamos</h3>
                        <p
                            class="text-gray-600 font-semibold hover:text-green-600 transition-all duration-500 hover:scale-110 origin-left cursor-pointer mb-2">
                            {{ env('CLINICA_ENDERECO') }}
                        </p>
                        <span
                            class="text-sm text-green-600 font-bold uppercase tracking-tighter opacity-0 group-hover:opacity-100 transition-opacity">
                            {{-- Clique para abrir no Maps → --}}
                        </span>
                    </div>
                </a>
            </div>

            {{-- Ouvidoria Digital --}}
            <div
                class="bg-white/60 backdrop-blur-md p-10 md:p-12 rounded-[3rem] border border-white shadow-xl shadow-blue-900/5">
                <div class="flex items-center gap-4 mb-12">
                    <div class="p-3 bg-blue-50 text-blue-600 rounded-2xl">
                        <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-3xl font-bold text-slate-800">Ouvidoria Digital</h3>
                        <p class="text-xs text-slate-400 font-semibold uppercase tracking-[0.2em] mt-1">Envie seu
                            Feedback</p>
                    </div>
                </div>

                @if (session('success'))
                    <div
                        class="mb-6 p-4 bg-green-50 border border-green-200 text-green-600 rounded-2xl text-sm font-medium animate-bounce">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('feedback.store') }}" method="POST" class="space-y-8">
                    @csrf
                    {{-- Grid adaptativo: 1 coluna no mobile, 3 no desktop --}}
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div class="space-y-2">
                            <label class="text-xs font-bold uppercase tracking-widest ml-1">Seu
                                Nome</label>
                            <input type="text" name="nome" placeholder="Opcional"
                                class="block w-full rounded-2xl border-none bg-white/80 px-6 py-4 text-sm shadow-sm focus:ring-2 focus:ring-blue-500" />
                        </div>
                        <div class="space-y-2">
                            <label class="text-xs font-bold uppercase tracking-widest ml-1">Assunto</label>
                            <select name="tipo"
                                class="block w-full rounded-2xl border-none bg-white/80 px-6 py-4 text-sm shadow-sm focus:ring-2 focus:ring-blue-500 appearance-none">
                                <option>Elogio</option>
                                <option>Sugestão</option>
                                <option>Reclamação</option>
                            </select>
                        </div>
                        <div class="space-y-2">
                            <label class="text-xs font-bold uppercase tracking-widest ml-1">E-mail</label>
                            <input type="email" name="email" placeholder="Para retorno"
                                class="block w-full rounded-2xl border-none bg-white/80 px-6 py-4 text-sm shadow-sm focus:ring-2 focus:ring-blue-500" />
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="text-xs font-bold uppercase tracking-widest ml-1">Mensagem</label>
                        <textarea name="mensagem" rows="4" placeholder="No que podemos melhorar?"
                            class="block w-full rounded-2xl border-none bg-white/80 px-6 py-4 text-sm shadow-sm focus:ring-2 focus:ring-blue-500"></textarea>
                    </div>

                    <div class="flex justify-center">
                        <button type="submit"
                            class="w-full md:w-1/3 bg-slate-900 text-white py-5 rounded-2xl font-bold shadow-xl shadow-slate-200 hover:bg-blue-600 transition-all duration-300 transform hover:-translate-y-1">
                            Enviar Mensagem
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="mt-16 text-center">
            <a href="/"
                class="text-slate-500 hover:text-blue-600 font-medium transition-colors flex items-center justify-center gap-2 group text-sm">
                <span class="group-hover:-translate-x-1 transition-transform">←</span> Voltar para Home
            </a>
        </div>
    </div>
</x-app-layout>
