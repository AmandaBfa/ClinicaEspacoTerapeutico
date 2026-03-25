<nav class="bg-orange-50/80 backdrop-blur-md fixed top-0 w-full z-50 border-b border-orange-100" x-data="{ open: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-24">

            {{-- Logo e Identificação --}}
            <div class="flex items-center">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2">
                    <img src="{{ asset('assets/images/logo2.png') }}" class="w-12 h-12 md:w-14 md:h-14 mix-blend-multiply"
                        alt="Logo">
                    <span class="hidden sm:block font-black text-lg text-slate-800 tracking-tighter uppercase">
                        Admin <span class="text-orange-500">Painel</span>
                    </span>
                </a>
            </div>

            {{-- Menu de Gestão Unificado --}}
            <div class="relative group">
                <button
                    class="flex items-center gap-2 px-3 py-2 rounded-xl text-slate-700 font-bold hover:bg-white/50 transition-all">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                    <span class="hidden md:block">Gestão do Sistema</span>
                    <svg class="w-4 h-4 hidden md:block transition-transform duration-300 group-hover:rotate-180"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>

                <div
                    class="absolute left-1/2 -translate-x-1/2 w-64 mt-2 py-3 bg-white/95 backdrop-blur-2xl border border-white/50 rounded-[2rem] shadow-2xl opacity-0 invisible group-hover:opacity-100 group-hover:visible group-hover:translate-y-1 transition-all duration-300 z-50">

                    {{-- Seção ADMIN --}}
                    <div class="px-4 py-2 mb-1 border-b border-slate-100">
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Conteúdo</p>
                    </div>
                    <a href="{{ route('admin.blog.index') }}"
                        class="block px-4 py-2 text-sm font-bold text-slate-700 hover:bg-blue-50">Blog Informativo</a>
                    <a href="{{ route('admin.services.index') }}"
                        class="block px-4 py-2 text-sm font-bold text-slate-700 hover:bg-purple-50">Nossos Serviços</a>
                    <a href="{{ route('admin.ouvidoria') }}"
                        class="block px-4 py-2 text-sm font-bold text-slate-700 hover:bg-orange-50">Ouvidoria</a>
                    <a href="{{ route('admin.agendamentos.index') }}"
                        class="block px-4 py-2 text-sm font-bold text-slate-700 hover:bg-orange-50">Agendamentos</a>
                    <a href="{{ route('admin.employees.index') }}"
                        class="block px-4 py-2 text-sm font-bold text-slate-700 hover:bg-orange-50">Profissionais</a>

                    <div class="px-4 py-2 mt-2 mb-1 border-b border-slate-100 md:hidden">
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Atalhos</p>
                    </div>
                    <a href="{{ route('home') }}"
                        class="block md:hidden px-4 py-2 text-sm font-bold text-blue-600 hover:bg-blue-50">Ver Site
                        Público</a>
                </div>
            </div>

            {{-- Perfil do Usuário --}}
            <div class="flex items-center gap-2">
                <a href="{{ route('home') }}"
                    class="hidden lg:inline-block px-5 py-2.5 bg-blue-500 text-white rounded-full font-bold shadow-lg hover:bg-blue-600 transition transform hover:scale-105">
                    Ver site público
                </a>

                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center p-2 rounded-xl hover:bg-white/50 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-slate-400" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span
                                class="hidden sm:inline-block ml-2 font-bold text-slate-700">{{ explode(' ', Auth::user()->name)[0] }}</span>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="block px-4 py-2 text-xs text-gray-400 sm:hidden">Logado como:
                            {{ Auth::user()->name }}</div>
                        <x-dropdown-link :href="route('profile.edit')">Meu Perfil</x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                                class="text-red-500">Sair</x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

        </div>
    </div>
</nav>
