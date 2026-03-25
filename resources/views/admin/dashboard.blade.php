<x-app-layout>
    <div class="py-12 pt-32">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

            <div class="mb-10 px-4 flex flex-col md:flex-row md:items-center justify-between gap-6">
                <div>
                    <h2 class="text-3xl font-black text-slate-800 tracking-tight">
                        Olá, {{ explode(' ', Auth::user()->name)[0] }}!
                    </h2>
                    <p class="text-slate-500 mt-1 font-medium italic">Bem-vinda ao seu painel de gestão.</p>
                </div>

                {{-- Stats --}}
                <div
                    class="flex items-center gap-6 bg-white/60 backdrop-blur-xl border border-white px-8 py-4 rounded-[2rem] shadow-xl shadow-blue-900/5 overflow-x-auto no-scrollbar">

                    {{-- Solicitações de Agendamento --}}
                    <div class="flex flex-col">
                        <span class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Agendamentos</span>
                        <div class="flex items-baseline gap-1">
                            <span
                                class="text-2xl font-black {{ $agendamentosPendentes > 0 ? 'text-orange-500 animate-pulse' : 'text-slate-400' }}">
                                {{ $agendamentosPendentes }}
                            </span>
                            <span class="text-[10px] font-bold text-slate-400 uppercase">Pend.</span>
                        </div>
                    </div>

                    <div class="w-px h-10 bg-slate-200/60"></div>

                    {{-- Ouvidoria --}}
                    <div class="flex flex-col">
                        <span class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Ouvidoria</span>
                        <div class="flex items-baseline gap-1">
                            <span
                                class="text-2xl font-black {{ $mensagensPendentes > 0 ? 'text-red-500 animate-pulse' : 'text-emerald-500' }}">
                                {{ $mensagensPendentes }}
                            </span>
                            <span class="text-[10px] font-bold text-slate-400 uppercase">Novas</span>
                        </div>
                    </div>

                    <div class="w-px h-10 bg-slate-200/60"></div>

                    {{-- Equipe --}}
                    <div class="flex flex-col">
                        <span class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Equipe</span>
                        <div class="flex items-baseline gap-1">
                            <span class="text-2xl font-black text-blue-600">{{ $totalEmployees }}</span>
                            <span class="text-[10px] font-bold text-slate-400 uppercase">Prof.</span>
                        </div>
                    </div>

                    <div class="w-px h-10 bg-slate-200/60"></div>

                    {{-- Serviços --}}
                    <div class="flex flex-col">
                        <span class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Serviços</span>
                        <div class="flex items-baseline gap-1">
                            <span class="text-2xl font-black text-purple-600">{{ $totalServices }}</span>
                            <span class="text-[10px] font-bold text-slate-400 uppercase">Tipos</span>
                        </div>
                    </div>

                    <div class="w-px h-10 bg-slate-200/60"></div>

                    <div class="flex flex-col">
                        <span class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Feedbacks</span>
                        <div class="flex items-baseline gap-1">
                            <span class="text-2xl font-black">{{ $totalFeedbacks }}</span>
                            <span class="text-[10px] font-bold text-slate-400 uppercase">Total</span>
                        </div>
                    </div>

                    <div class="w-px h-10 bg-slate-200/60"></div>

                </div>
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
                    <p class="text-slate-500 mt-2 text-sm">
                        @if ($mensagensPendentes > 0)
                            Existem mensagens aguardando sua revisão.
                        @else
                            Tudo em dia por aqui! Nenhuma mensagem pendente.
                        @endif
                    </p>
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

                {{-- Profissionais --}}
                <a href="{{ route('admin.employees.index') }}"
                    class="group bg-white/60 backdrop-blur-xl border border-white/40 p-8 rounded-[2.5rem] shadow-xl shadow-blue-900/5 hover:scale-105 transition-all duration-300">
                    <div class="flex justify-between items-start mb-6">
                        <div
                            class="p-4 bg-green-100 text-green-600 rounded-2xl group-hover:bg-green-500 group-hover:text-white transition">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-contact-icon lucide-contact">
                                <path d="M16 2v2" />
                                <path d="M7 22v-2a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v2" />
                                <path d="M8 2v2" />
                                <circle cx="12" cy="11" r="3" />
                                <rect x="3" y="4" width="18" height="18" rx="2" />
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800">Profissionais</h3>
                    <p class="text-slate-500 mt-2 text-sm">Gerencie os profissionais que atendem no espaço.</p>
                </a>

                {{-- Agendamentos --}}
                <a href="{{ route('admin.agendamentos.index') }}"
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
                        @if ($agendamentosPendentes > 0)
                            <span
                                class="bg-red-500 text-white text-[10px] font-bold px-3 py-1 rounded-full animate-pulse">
                                {{ $agendamentosPendentes }} NOVO(S)
                            </span>
                        @endif
                    </div>
                    <h3 class="text-xl font-bold text-slate-800">Agenda Geral</h3>
                    <p class="text-slate-500 mt-2 text-sm">
                        @if ($agendamentosPendentes > 0)
                            Existem solicitações aguardando sua revisão.
                        @else
                            Tudo em dia por aqui! Nenhuma solicitação pendente.
                        @endif
                    </p>
                </a>

            </div>

            {{-- <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-sm">
                    <span class="text-slate-400 text-xs font-black uppercase">Pendentes</span>
                    <h3 class="text-2xl font-bold text-orange-500">
                        {{ $agendamentos->where('status', 'solicitado')->count() }}</h3>
                </div>
                <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-sm">
                    <span class="text-slate-400 text-xs font-black uppercase">Confirmados</span>
                    <h3 class="text-2xl font-bold text-green-500">
                        {{ $agendamentos->where('status', 'confirmado')->count() }}</h3>
                </div>
            </div> --}}

            {{-- Calendário --}}
            <div class="mt-8 md:mt-12 px-2 md:px-4">
                <div
                    class="bg-white/60 backdrop-blur-xl border border-white p-4 md:p-8 rounded-[2rem] md:rounded-[3rem] shadow-xl shadow-blue-900/5">

                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6 md:mb-8">
                        <div>
                            <h3 class="text-xl md:text-2xl font-black text-slate-800 tracking-tight">Agenda Semanal
                            </h3>
                            <p class="text-slate-500 text-xs md:text-sm italic">Visualize a ocupação do Espaço
                                Terapêutico.</p>
                        </div>
                        <div class="flex items-start sm:items-center">
                            <span
                                class="flex items-center gap-1.5 text-[9px] md:text-[10px] font-bold text-slate-400 uppercase tracking-widest bg-slate-50 px-3 py-1 rounded-full border border-slate-100">
                                <span class="w-2 h-2 rounded-full bg-blue-500"></span> Confirmados
                            </span>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <div id="calendar" class="min-w-[300px] min-h-[500px] md:min-h-[600px]"></div>
                    </div>
                </div>
            </div>

            {{-- Scripts do FullCalendar --}}
            @push('scripts')
                <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const calendarEl = document.getElementById('calendar');

                        // Detecta se a tela é mobile (menor que 768px)
                        const isMobile = window.innerWidth < 768;

                        const calendar = new FullCalendar.Calendar(calendarEl, {
                            // Se for mobile, mostra o DIA. Se for desktop, mostra a SEMANA.
                            initialView: isMobile ? 'timeGridDay' : 'timeGridWeek',

                            locale: 'pt-br',
                            slotMinTime: '07:00:00',
                            slotMaxTime: '20:00:00',
                            allDaySlot: false,

                            // No mobile, escondemos alguns botões para não quebrar o layout
                            headerToolbar: {
                                left: isMobile ? 'prev,next' : 'prev,next today',
                                center: 'title',
                                right: isMobile ? 'timeGridDay,dayGridMonth' : 'dayGridMonth,timeGridWeek,timeGridDay'
                            },

                            buttonText: {
                                today: 'Hoje',
                                month: 'Mês',
                                week: 'Semana',
                                day: 'Dia'
                            },

                            height: 'auto', // Ajuda na responsividade
                            events: @json($eventos),

                            eventClassNames: 'rounded-lg border-none shadow-sm font-bold text-[10px] p-1',
                            dayHeaderClassNames: 'text-slate-400 uppercase text-[9px] md:text-[10px] font-black tracking-widest py-2 md:py-4 border-none',
                        });

                        calendar.render();

                        // Re-renderiza se ela virar o celular (opcional)
                        window.addEventListener('resize', function() {
                            if (window.innerWidth < 768 && calendar.view.type !== 'timeGridDay') {
                                calendar.changeView('timeGridDay');
                            } else if (window.innerWidth >= 768 && calendar.view.type === 'timeGridDay') {
                                calendar.changeView('timeGridWeek');
                            }
                        });
                    });
                </script>

                <style>
                    /* Ajustes para o calendário não brigar com seu design arredondado */
                    .fc {
                        --fc-border-color: #f1f5f9;
                        --fc-today-bg-color: #f8fafc;
                    }

                    .fc .fc-toolbar-title {
                        font-weight: 900;
                        letter-spacing: -0.05em;
                        color: #1e293b;
                        font-size: 1.25rem;
                    }

                    .fc .fc-button-primary {
                        background-color: #0f172a;
                        border: none;
                        border-radius: 12px;
                        font-weight: bold;
                        text-transform: uppercase;
                        font-size: 10px;
                        letter-spacing: 0.1em;
                        padding: 10px 20px;
                    }

                    .fc .fc-button-primary:hover {
                        background-color: #3b82f6;
                    }

                    .fc .fc-button-active {
                        background-color: #3b82f6 !important;
                    }

                    .fc-timegrid-slot {
                        height: 3em !important;
                        border-bottom: 1px solid #f8fafc !important;
                    }
                </style>
            @endpush

        </div>
    </div>
</x-app-layout>
