<nav class="bg-white/80 backdrop-blur-md fixed top-0 w-full z-50 border-b border-gray-100" x-data="{ open: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-24">

            {{-- 1. Logo --}}
            <div class="flex-shrink-0 flex items-center min-w-[200px] lg:min-w-[250px]">
                <a href="{{ route('home') }}" class="flex items-center gap-2 sm:gap-3 group">
                    <img src="{{ asset('assets/images/logo2.png') }}" class="w-10 h-10 sm:w-14 sm:h-14 mix-blend-multiply"
                        alt="Logo">
                    <span class="font-bold text-lg sm:text-xl text-orange-500 whitespace-nowrap">Espaço
                        Terapêutico</span>
                </a>
            </div>

            {{-- 2. Links Centralizados (Desktop) --}}
            <div class="hidden md:flex flex-grow justify-center space-x-6 lg:space-x-10 items-center">
                <a href="{{ route('home') }}"
                    class="text-xs font-bold uppercase tracking-widest text-slate-500 hover:text-blue-500 transition">Início</a>
                <a href="{{ route('about') }}"
                    class="text-xs font-bold uppercase tracking-widest text-slate-500 hover:text-blue-500 transition">Sobre</a>
                <a href="{{ route('services') }}"
                    class="text-xs font-bold uppercase tracking-widest text-slate-500 hover:text-blue-500 transition">Serviços</a>
                <a href="{{ route('blogPublic.index') }}"
                    class="text-xs font-bold uppercase tracking-widest text-slate-500 hover:text-blue-500 transition">Blog</a>
                <a href="{{ route('contact') }}"
                    class="text-xs font-bold uppercase tracking-widest text-slate-500 hover:text-blue-500 transition">Contato</a>
            </div>

            {{-- 3. Lado Direito: Ações + Botão Mobile --}}
            <div class="flex items-center gap-4">
                {{-- Botão Agendar (Desktop) --}}
                <div class="hidden lg:block">
                    <a href="/agendar"
                        class="px-5 py-2.5 bg-orange-500 text-white rounded-full font-bold shadow-lg hover:bg-orange-600 transition transform hover:scale-105">
                        Agendar Consulta
                    </a>
                </div>

                @auth
                    {{-- Dropdown Breeze --}}
                    <div class="hidden sm:block">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="flex items-center text-gray-700 font-medium hover:text-orange-500 transition focus:outline-none">
                                    <span class="mr-2 text-sm">Olá, {{ explode(' ', Auth::user()->name)[0] }}</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                @if(Auth::user()->usertype === 'admin')
                                    <x-dropdown-link :href="route('admin.dashboard')">Painel Administrativo</x-dropdown-link>
                                @endif
                                <x-dropdown-link :href="route('agendamentos.historico')">Meus Agendamentos</x-dropdown-link>
                                <x-dropdown-link :href="route('profile.edit')">Meu Perfil</x-dropdown-link>
                                <hr class="border-gray-100 my-1">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault(); this.closest('form').submit();"
                                        class="text-red-500">
                                        Sair
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @else
                    <div class="hidden sm:flex items-center gap-4">
                        <a href="{{ route('login') }}"
                            class="text-gray-600 hover:text-blue-500 font-medium text-sm">Entrar</a>
                    </div>
                @endauth

                {{-- BOTÃO HAMBÚRGUER (Aparece no Mobile) --}}
                <div class="flex items-center md:hidden">
                    <button @click="open = !open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-orange-500 hover:bg-gray-100 focus:outline-none transition">
                        <svg class="h-8 w-8" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Menu Mobile --}}
    <div x-show="open" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
        @click.away="open = false"
        class="md:hidden bg-white/95 backdrop-blur-lg border-t border-slate-100 overflow-hidden" x-cloak>
        <div class="pt-4 pb-6 space-y-2 px-6">
            <a href="{{ route('home') }}"
                class="block py-3 text-sm font-bold text-slate-600 hover:text-orange-500">Início</a>
            <a href="{{ route('about') }}"
                class="block py-3 text-sm font-bold text-slate-600 hover:text-orange-500">Sobre</a>
            <a href="{{ route('services') }}"
                class="block py-3 text-sm font-bold text-slate-600 hover:text-orange-500">Serviços</a>
            <a href="{{ route('blogPublic.index') }}"
                class="block py-3 text-sm font-bold text-slate-600 hover:text-orange-500">Blog</a>
            <a href="{{ route('contact') }}"
                class="block py-3 text-sm font-bold text-slate-600 hover:text-orange-500">Contato</a>

            <hr class="border-slate-100 my-4">

            <a href="/agendar"
                class="block w-full py-4 bg-orange-500 text-white text-center rounded-2xl font-bold shadow-lg">
                Agendar Consulta
            </a>

            @auth
                @if(Auth::user()->usertype === 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="block py-3 text-sm font-bold text-blue-600">Painel
                        Administrativo</a>
                @endif
                <a href="{{ route('agendamentos.historico') }}" class="block py-3 text-sm font-bold text-blue-600">Meus
                    Agendamentos</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full text-left py-3 text-sm font-bold text-red-500">Sair</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="block py-3 text-sm font-bold text-slate-600">Entrar na Conta</a>
            @endauth
        </div>
    </div>
</nav>
