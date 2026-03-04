    <nav class="bg-white/80 backdrop-blur-md fixed w-full z-50 border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex items-center">
                    <a href="/" class="flex items-center gap-3 group">
                        <img src="{{ asset('assets/images/logo2.png') }}" class="w-15 h-15 mix-blend-multiply"
                            alt="Logo">
                        <span class="font-bold text-2xl text-orange-500">Espaço Terapêutico</span>
                    </a>
                </div>

                <div class="hidden md:flex space-x-8 items-center">
                    <a href="/" class="text-gray-600 hover:text-blue-500 transition">Início</a>
                    <a href="/about" class="text-gray-600 hover:text-blue-500 transition">Sobre</a>
                    <a href="/services" class="text-gray-600 hover:text-blue-500 transition">Serviços</a>
                    <a href="/blog/index" class="text-gray-600 hover:text-blue-500 transition">Blog</a>
                    <a href="/contact" class="text-gray-600 hover:text-blue-500 transition">Contato</a>
                </div>

                <div class="flex items-center space-x-4">
                    @auth
                        <div class="flex items-center">
                            <a href="/agendar"
                                class="mr-4 px-5 py-2.5 bg-orange-500 text-white rounded-full font-bold shadow-lg hover:bg-orange-600 transition transform hover:scale-105 hidden sm:inline-block">
                                Agendar Consulta
                            </a>
                            <div class="flex items-center text-gray-700 font-medium">
                                <span class="mr-2">Olá, {{ explode(' ', Auth::user()->name)[0] }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    @else
                        <a href="/login" class="text-gray-600 hover:text-blue-500 font-medium">Entrar</a>
                        <a href="/agendar"
                            class="px-5 py-2.5 bg-orange-500 text-white rounded-full font-bold shadow-lg hover:bg-orange-600 transition transform hover:scale-105">
                            Agendar Consulta
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
