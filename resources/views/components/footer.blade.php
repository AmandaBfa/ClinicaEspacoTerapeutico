<footer class="bg-gray-900 text-gray-300 py-14 border-t border-gray-800">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Grid Principal: 4 Colunas no Desktop --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 pt-5">

            {{-- Coluna 1: Brand & Bio --}}
            <div class="flex flex-col items-center md:items-start space-y-4 text-center md:text-left">
                <div class="bg-white p-1.5 rounded-lg inline-block shadow-sm">
                    <img src="{{ asset('assets/images/logo2.png') }}" alt="Logo" class="w-10 h-10 object-contain">
                </div>
                <div>
                    <h4 class="text-2xl font-bold text-white tracking-tight mb-2">Espaço Terapêutico</h4>
                    <p class="text-orange-500 font-medium text-sm uppercase tracking-widest">Karla Niana</p>
                </div>
                <p class="text-gray-400 text-sm leading-relaxed max-w-xs mx-auto md:mx-0">
                    Unindo ciência e afeto para transformar o desenvolvimento humano e a saúde mental em Goiânia.
                </p>
            </div>

            {{-- Coluna 2: Menu de Navegação --}}
            <div class="flex flex-col items-center md:items-start w-full">
                <h4
                    class="text-white font-bold mb-6 uppercase tracking-widest text-xs border-b border-orange-500/30 pb-1">
                    Menu
                </h4>
                <ul class="space-y-4 w-full flex flex-col items-center md:items-start">
                    @foreach (['Sobre' => '/about', 'Serviços' => '/services', 'Blog' => '/blog', 'Contato' => '/contact'] as $label => $link)
                        <li>
                            <a href="{{ $link }}"
                                class="text-slate-400 hover:text-orange-500 transition-all duration-300 flex items-center justify-center md:justify-start group text-sm">
                                <span
                                    class="w-0 group-hover:w-4 overflow-hidden transition-all duration-300 opacity-0 group-hover:opacity-100 text-orange-500">→</span>
                                <span class="group-hover:translate-x-1 transition-transform">{{ $label }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Coluna 3: Atendimento --}}
            <div class="flex flex-col items-center md:items-start w-full">
                <h4
                    class="text-white font-bold mb-6 uppercase tracking-widest text-xs border-b border-orange-500/30 pb-1">
                    Atendimento
                </h4>
                <div class="space-y-6 text-sm text-slate-400 text-center md:text-left w-full">
                    <div class="group flex flex-col md:flex-row items-center gap-2 md:gap-3">
                        <span
                            class="group-hover:text-white transition-colors">{{ env('CLINICA_EMAIL', 'contato@karlaniano.com.br') }}</span>
                    </div>
                    <div class="group flex flex-col md:flex-row items-center gap-2 md:gap-3">
                        <span class="group-hover:text-white transition-colors">{{ env('CLINICA_TELEFONE') }}</span>
                    </div>
                    <div class="group flex flex-col md:flex-row items-center gap-2 md:gap-3">
                        <span
                            class="group-hover:text-white transition-colors leading-relaxed px-4 md:px-0">{{ env('CLINICA_ENDERECO', 'Goiânia - GO') }}</span>
                    </div>
                </div>
            </div>

            {{-- Coluna 4: Redes Sociais --}}
            <div class="flex flex-col items-center md:items-end w-full">
                <h4
                    class="text-white font-bold mb-6 uppercase tracking-widest text-xs border-b border-orange-500/30 pb-1">
                    Redes Sociais
                </h4>
                <div class="flex gap-4 justify-center md:justify-end">
                    <a href="https://www.instagram.com/karlaniana.espacoterapeutico/"
                        class="w-12 h-12 bg-white/5 border border-white/10 rounded-xl flex items-center justify-center hover:bg-orange-500 hover:border-orange-500 transition-all duration-300 group shadow-lg">
                        <svg class="w-6 h-6 text-slate-400 group-hover:text-white" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                        </svg>
                    </a>
                    <a href="#"
                        class="w-12 h-12 bg-white/5 border border-white/10 rounded-xl flex items-center justify-center hover:bg-orange-500 hover:border-orange-500 transition-all duration-300 group shadow-lg">
                        <svg class="w-6 h-6 text-slate-400 group-hover:text-white" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                d="M9 8H6v4h3v12h5V12h3.642L18 8h-4V6.333C14 5.378 14.192 5 15.115 5H18V0h-3.808C10.596 0 9 1.583 9 4.615V8z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        {{-- Barra Inferior --}}
        <div class="border-t border-gray-800 mt-10 pt-8 flex flex-col items-center text-sm text-gray-500">
            <p>&copy; {{ date('Y') }} Espaço Terapêutico. Todos os direitos reservados.</p>
        </div>
    </div>
</footer>
