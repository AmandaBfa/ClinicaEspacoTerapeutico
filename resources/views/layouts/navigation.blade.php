<nav class="bg-white/80 backdrop-blur-md fixed top-0 w-full z-50 border-b border-gray-100" x-data="{ open: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Mudamos para flex e justify-between para dar o respiro correto --}}
        <div class="flex justify-between items-center h-24">

            {{-- 1. Lado Esquerdo: Logo (Aumentamos a largura do contêiner) --}}
            <div class="flex-shrink-0 flex items-center min-w-[250px]">
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    <img src="{{ asset('assets/images/logo2.png') }}" class="w-14 h-14 mix-blend-multiply" alt="Logo">
                    <span class="font-bold text-xl text-orange-500 whitespace-nowrap">Espaço Terapêutico</span>
                </a>
            </div>

            {{-- 2. Centro: Links (Escondidos no mobile) --}}
            <div class="hidden md:flex flex-grow justify-center space-x-6 lg:space-x-10 items-center">
                <a href="{{ route('home') }}"
                    class="text-xs font-bold uppercase tracking-widest text-slate-500 hover:text-blue-500 transition">Início</a>
                <a href="{{ route('about') }}"
                    class="text-xs font-bold uppercase tracking-widest text-slate-500 hover:text-blue-500 transition">Sobre</a>
                <a href="{{ route('services') }}"
                    class="text-xs font-bold uppercase tracking-widest text-slate-500 hover:text-blue-500 transition">Serviços</a>
                <a href="{{ route('contact') }}"
                    class="text-xs font-bold uppercase tracking-widest text-slate-500 hover:text-blue-500 transition">Contato</a>
            </div>

            {{-- 3. Lado Direito: Ações/Usuário --}}
            <div class="flex items-center space-x-4">
                @auth
                    {{-- Botão Agendar (Logado) --}}
                    <a href="/agendar"
                        class="mr-4 px-5 py-2.5 bg-orange-500 text-white rounded-full font-bold shadow-lg hover:bg-orange-600 transition transform hover:scale-105 hidden sm:inline-block">
                        Agendar Consulta
                    </a>

                    {{-- Dropdown Funcional do Breeze --}}
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="flex items-center text-gray-700 font-medium hover:text-orange-500 transition focus:outline-none">
                                {{-- Pega apenas o primeiro nome da Amanda --}}
                                <span class="mr-2">Olá, {{ explode(' ', Auth::user()->name)[0] }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            {{-- Links que aparecem ao clicar --}}
                            <x-dropdown-link :href="route('dashboard')">Painel Administrativo</x-dropdown-link>
                            <x-dropdown-link :href="route('profile.edit')">Meu Perfil</x-dropdown-link>

                            <hr class="border-gray-100 my-1">

                            {{-- O formulário de Logout que você perguntou --}}
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();" class="text-red-500">
                                    Sair do Sistema
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    {{-- Para quem não está logado --}}
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-blue-500 font-medium">Entrar</a>
                    <a href="/agendar"
                        class="px-5 py-2.5 bg-orange-500 text-white rounded-full font-bold shadow-lg hover:bg-orange-600 transition transform hover:scale-105">
                        Agendar Consulta
                    </a>
                @endauth
            </div>
        </div>
    </div>

    {{-- Menu Mobile --}}
    <div :class="{ 'block': open, 'hidden': !open }"
        class="hidden md:hidden bg-white/95 backdrop-blur-lg border-t border-slate-100">
        <div class="pt-2 pb-3 space-y-1 px-4">
            <a href="{{ route('home') }}" class="block py-3 text-xs font-bold text-slate-600">Início</a>
            <a href="{{ route('about') }}" class="block py-3 text-xs font-bold text-slate-600">Sobre</a>
            <a href="{{ route('contact') }}"
                class="block py-3 text-xs font-bold text-slate-600 border-b border-slate-50">Contato</a>
            @auth
                <a href="{{ route('dashboard') }}" class="block py-3 text-xs font-bold text-orange-500 italic">Painel
                    Admin</a>
            @endauth
        </div>
    </div>
</nav>
