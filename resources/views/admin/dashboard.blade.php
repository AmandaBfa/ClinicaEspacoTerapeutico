<x-app-layout>
    <div class="py-12 pt-32">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-10 px-4">
                <h2 class="text-3xl font-bold text-slate-800 tracking-tight">
                    Olá, {{ explode(' ', Auth::user()->name)[0] }}!
                </h2>
                <p class="text-slate-500 mt-2">Bem-vinda ao painel de gestão do Espaço Terapêutico.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                {{-- Ouvidoria --}}
                <a href="{{ route('admin.ouvidoria') }}"
                    class="group bg-white/60 backdrop-blur-xl border border-white/40 p-8 rounded-[2.5rem] shadow-xl shadow-blue-900/5 hover:scale-105 transition-all duration-300">
                    <div class="flex justify-between items-start mb-6">
                        <div
                            class="p-4 bg-orange-100 text-orange-600 rounded-2xl group-hover:bg-orange-500 group-hover:text-white transition">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                                </path>
                            </svg>
                        </div>
                        @if ($mensagensPendentes > 0)
                            <span
                                class="bg-red-500 text-white text-[10px] font-bold px-3 py-1 rounded-full animate-pulse">
                                {{ $mensagensPendentes }} NOVA(S)
                            </span>
                        @endif
                    </div>
                    <h3 class="text-xl font-bold text-slate-800">Ouvidoria Digital</h3>
                    <p class="text-slate-500 mt-2 text-sm">Gerencie sugestões e feedbacks dos pacientes da clínica.</p>
                </a>

                {{-- Blog --}}
                <a href="{{ route('admin.blog.index') }}"
                    class="group bg-white/60 backdrop-blur-xl border border-white/40 p-8 rounded-[2.5rem] shadow-xl shadow-blue-900/5 hover:scale-105 transition-all duration-300">
                    <div class="flex justify-between items-start mb-6">
                        <div
                            class="p-4 bg-blue-100 text-blue-600 rounded-2xl group-hover:bg-blue-500 group-hover:text-white transition">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                        </div>
                        {{-- <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Próxima
                            Etapa</span> --}}
                    </div>
                    <h3 class="text-xl font-bold text-slate-800">Gerenciar Blog</h3>
                    <p class="text-slate-500 mt-2 text-sm">Crie e edite artigos informativos para a Home do site.</p>
                </a>

                {{-- Serviços --}}
                <a href="{{ route('admin.services.index') }}"
                    class="group bg-white/60 backdrop-blur-xl border border-white/40 p-8 rounded-[2.5rem] shadow-xl shadow-blue-900/5 hover:scale-105 transition-all duration-300">
                    <div class="flex justify-between items-start mb-6">
                        <div
                            class="p-4 bg-purple-100 text-purple-600 rounded-2xl group-hover:bg-purple-500 group-hover:text-white transition">
                            {{-- Ícone de Peça de Quebra-cabeça (remetendo ao TEA/Saúde) --}}
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800">Nossos Serviços</h3>
                    <p class="text-slate-500 mt-2 text-sm">Gerencie os tipos de atendimentos, preços e durações das
                        sessões.</p>
                </a>

                {{-- Agenda (Em breve) --}}
                {{-- <div
                    class="group bg-white/60 backdrop-blur-xl border border-white/40 p-8 rounded-[2.5rem] shadow-xl shadow-blue-900/5 opacity-80">
                    <div class="flex justify-between items-start mb-6">
                        <div
                            class="p-4 bg-purple-100 text-purple-600 rounded-2xl group-hover:bg-purple-500 group-hover:text-white transition">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Em
                            Planejamento</span>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800">Agenda Geral</h3>
                    <p class="text-slate-500 mt-2 text-sm">Acompanhe e aprove os agendamentos solicitados pelos
                        pacientes.</p>
                </div> --}}

            </div>
        </div>
    </div>
</x-app-layout>
