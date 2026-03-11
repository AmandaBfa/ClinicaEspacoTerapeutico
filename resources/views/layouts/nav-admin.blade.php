<nav class="bg-orange-50/80 backdrop-blur-md fixed top-0 w-full z-50 border-b border-orange-100" x-data="{ open: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-24">

            {{-- Logo e Identificação Admin --}}
            {{-- <div class="flex-shrink-0 flex items-center min-w-[250px]">
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    <img src="{{ asset('assets/images/logo2.png') }}" class="w-14 h-14 mix-blend-multiply" alt="Logo">
                    <span class="font-bold text-xl text-orange-500 whitespace-nowrap">Espaço Terapêutico</span>
                </a>
            </div> --}}

            {{-- Dropdown de Gestão --}}
            {{-- <div class="relative group">
                <button class="flex items-center gap-1 hover:text-blue-600 transition font-bold">
                    Gestão 
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"></path></svg>
                </button>
                
                <div class="absolute hidden group-hover:block w-48 bg-white shadow-xl rounded-2xl py-2 mt-2 border border-gray-100">
                    <a href="{{ route('admin.blog.index') }}" class="block px-4 py-2 hover:bg-blue-50 text-sm">Blog</a>
                    <a href="{{ route('admin.services.index') }}" class="block px-4 py-2 hover:bg-blue-50 text-sm">Serviços</a>
                    <a href="{{ route('admin.ouvidoria') }}" class="block px-4 py-2 hover:bg-blue-50 text-sm">Ouvidoria</a>
                </div>
            </div> --}}

            <div class="flex items-center gap-4">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2">
                    <img src="{{ asset('assets/images/logo2.png') }}" class="w-14 h-14 mix-blend-multiply" alt="Logo">
                    <span class="font-black text-lg text-slate-800 tracking-tighter">ADMIN <span
                            class="text-orange-500">PAINEL</span></span>
                </a>
            </div>

            {{-- Links de Gestão --}}
            <div class="hidden md:flex flex-grow justify-center space-x-6 lg:space-x-10 items-center">
                <a href="{{ route('admin.dashboard') }}"
                    class="text-xs font-bold uppercase tracking-widest {{ request()->routeIs('admin.dashboard') ? 'text-orange-500' : 'text-slate-500' }} hover:text-orange-500 transition">Início</a>
                <a href="{{ route('admin.ouvidoria') }}"
                    class="text-xs font-bold uppercase tracking-widest {{ request()->routeIs('admin.ouvidoria*') ? 'text-orange-500' : 'text-slate-500' }} hover:text-orange-500 transition">Ouvidoria</a>
                <a href="{{ route('admin.blog.index') }}"
                    class="text-xs font-bold uppercase tracking-widest {{ request()->routeIs('admin.blog*') ? 'text-orange-500' : 'text-slate-500' }} hover:text-orange-500 transition">Blog</a>
                <a href="#"
                    class="text-xs font-bold uppercase tracking-widest text-slate-400 cursor-not-allowed">Agenda</a>
            </div>

            {{-- Lado Direito: Voltar ao Site e Perfil --}}
            <div class="flex items-center gap-6">
                <a href="{{ route('home') }}"
                    class="mr-4 px-5 py-2.5 bg-blue-500 text-white rounded-full font-bold shadow-lg hover:bg-blue-600 transition transform hover:scale-105 hidden sm:inline-block">ver
                    site
                    público</a>

                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="flex items-center text-slate-700 font-bold text-lg hover:text-orange-500 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400 mr-1"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                    clip-rule="evenodd" />
                            </svg>
                            {{ Auth::user()->name }}

                        </button>
                    </x-slot>
                    <x-slot name="content">
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
