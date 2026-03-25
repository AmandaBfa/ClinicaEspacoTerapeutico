<x-app-layout>
    <div class="py-12 pt-32">
        <div class="max-w-7xl px-4 mx-auto sm:px-6 lg:px-8">

            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8 px-4">
                <div>
                    <h2 class="text-3xl font-bold text-slate-800 tracking-tight">Ouvidoria Digital</h2>
                    <p class="text-slate-500 mt-1">Gerencie os elogios, sugestões e reclamações dos pacientes.</p>
                </div>

                <div class="flex items-center gap-3 w-full md:w-auto">
                    <a href="{{ route('admin.dashboard') }}"
                        class="group flex items-center gap-2 bg-blue-100 text-slate-600 px-7 py-3 rounded-[1.25rem] font-semibold hover:text-blue-600 transition-all border border-transparent hover:border-blue-100 hover:bg-blue-200">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        <span class="text-sm">Dashboard</span>
                    </a>
                </div>
            </div>

            <div class="flex flex-wrap gap-3 mb-8 justify-center">
                {{-- Todos --}}
                <a href="{{ route('admin.ouvidoria') }}"
                    class="px-6 py-2 rounded-full text-xs font-black uppercase tracking-widest transition-all {{ !request('status') ? 'bg-slate-900 text-white shadow-lg' : 'bg-white text-slate-400 border border-slate-100 hover:bg-slate-50' }}">
                    Todos
                </a>

                {{-- Pendentes --}}
                <a href="{{ route('admin.ouvidoria', ['status' => 'pendente']) }}"
                    class="px-6 py-2 rounded-full text-xs font-black uppercase tracking-widest transition-all {{ request('status') == 'pendente' ? 'bg-amber-500 text-white shadow-lg' : 'bg-white text-amber-400 border border-amber-100 hover:bg-amber-50' }}">
                    Pendentes ({{ $pendentesCount }})
                </a>

                {{-- Em Andamento --}}
                <a href="{{ route('admin.ouvidoria', ['status' => 'em_andamento']) }}"
                    class="px-6 py-2 rounded-full text-xs font-black uppercase tracking-widest transition-all {{ request('status') == 'em_andamento' ? 'bg-blue-500 text-white shadow-lg' : 'bg-white text-blue-400 border border-blue-100 hover:bg-blue-50' }}">
                    Em Andamento ({{ $emAndamentoCount }})
                </a>

                {{-- Finalizados --}}
                <a href="{{ route('admin.ouvidoria', ['status' => 'finalizado']) }}"
                    class="px-6 py-2 rounded-full text-xs font-black uppercase tracking-widest transition-all {{ request('status') == 'finalizado' ? 'bg-emerald-500 text-white shadow-lg' : 'bg-white text-emerald-400 border border-emerald-100 hover:bg-emerald-50' }}">
                    Finalizados ({{ $finalizadosCount }})
                </a>
            </div>

            <div
                class="bg-white/60 backdrop-blur-xl border border-white/40 rounded-[2.5rem] shadow-xl shadow-blue-900/5 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50/50 border-b border-slate-100">
                                <th class="px-8 py-5 text-xs font-bold uppercase tracking-widest text-slate-400">Data
                                </th>
                                <th class="px-8 py-5 text-xs font-bold uppercase tracking-widest text-slate-400">
                                    Paciente
                                </th>
                                <th class="px-8 py-5 text-xs font-bold uppercase tracking-widest text-slate-400">Assunto
                                </th>
                                <th class="px-8 py-5 text-xs font-bold uppercase tracking-widest text-slate-400">
                                    Mensagem
                                </th>
                                <th class="px-8 py-5 text-xs font-bold uppercase tracking-widest text-slate-400">Status
                                </th>
                                <th class="px-8 py-5 text-xs font-bold uppercase tracking-widest text-slate-400">
                                    Visualizado
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            @forelse($feedbacks as $item)
                                <tr class="hover:bg-blue-50/30 transition-colors">
                                    <td class="px-8 py-6 text-sm text-slate-500">
                                        {{ $item->created_at->format('d/m/Y') }}
                                    </td>
                                    <td class="px-8 py-6">
                                        <a href="{{ route('admin.ouvidoria.show', $item) }}" class="group">
                                            <div
                                                class="font-bold text-slate-700 group-hover:text-orange-500 transition">
                                                {{ $item->nome ?? 'Anônimo' }}</div>
                                            <div class="text-xs text-slate-400 underline decoration-slate-200">Clique
                                                para
                                                ver detalhes</div>
                                        </a>
                                    </td>
                                    <td class="px-8 py-6">
                                        <span
                                            class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wide 
                                            {{ $item->assunto == 'Elogio'
                                                ? 'bg-green-100 text-green-600'
                                                : ($item->assunto == 'Reclamação'
                                                    ? 'bg-red-100 text-red-600'
                                                    : 'bg-blue-100 text-blue-600') }}">
                                            {{ $item->assunto }}
                                        </span>
                                    </td>
                                    <td class="px-8 py-6" x-data="{ open: false }">
                                        {{-- Botão para Abrir --}}
                                        <button @click="open = true"
                                            class="group flex items-center gap-2 text-slate-400 hover:text-blue-600 transition-colors">
                                            <svg class="w-5 h-5 opacity-50 group-hover:opacity-100" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                            <span class="text-xs font-bold uppercase tracking-widest">Ler
                                                Relato</span>
                                        </button>

                                        {{-- O Modal --}}
                                        <template x-teleport="body">
                                            <div x-show="open"
                                                class="fixed inset-0 z-[99] flex items-center justify-center overflow-hidden"
                                                x-cloak>

                                                {{-- Overlay Escuro --}}
                                                <div x-show="open" x-transition:enter="ease-out duration-300"
                                                    x-transition:enter-start="opacity-0"
                                                    x-transition:enter-end="opacity-100" @click="open = false"
                                                    class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm"></div>

                                                {{-- Conteúdo do Modal --}}
                                                <div x-show="open" x-transition:enter="ease-out duration-300"
                                                    x-transition:enter-start="opacity-0 scale-95"
                                                    x-transition:enter-end="opacity-100 scale-100"
                                                    class="relative w-full max-w-lg bg-white p-10 rounded-[3rem] shadow-2xl mx-4">

                                                    <div class="mb-6 flex justify-between items-start">
                                                        <div>
                                                            <span
                                                                class="text-[10px] font-black uppercase text-orange-500 tracking-widest">Relato
                                                                Completo</span>
                                                            <h3 class="text-2xl font-black text-slate-800">
                                                                {{ $item->nome ?? 'Anônimo' }}</h3>
                                                        </div>
                                                        <button @click="open = false"
                                                            class="text-slate-300 hover:text-slate-800 transition">
                                                            <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                                viewBox="0 0 24 24">
                                                                <path d="M6 18L18 6M6 6l12 12" stroke-width="3"
                                                                    stroke-linecap="round" />
                                                            </svg>
                                                        </button>
                                                    </div>

                                                    <div
                                                        class="bg-slate-50 p-6 rounded-3xl border border-slate-100 italic text-slate-600 leading-relaxed mb-8">
                                                        "{{ $item->mensagem }}"
                                                    </div>

                                                    <div class="flex gap-3">
                                                        <a href="{{ route('admin.ouvidoria.show', $item) }}"
                                                            class="flex-1 bg-slate-900 text-white text-center py-4 rounded-2xl font-bold hover:bg-blue-600 transition shadow-xl shadow-blue-900/10">
                                                            Gerenciar Mensagem
                                                        </a>
                                                        <button @click="open = false"
                                                            class="px-6 py-4 bg-slate-100 text-slate-500 rounded-2xl font-bold hover:bg-slate-200 transition">
                                                            Fechar
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </template>
                                    </td>
                                    <td class="px-8 py-6">
                                        <div class="flex items-center gap-2">
                                            @php
                                                $currentStatus = $item->status ?: 'pendente';
                                            @endphp
                                            {{-- Badge Dinâmico --}}
                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-wider border
                                                    {{ $item->status == 'pendente' ? 'bg-amber-50 text-amber-600 border-amber-100' : '' }}
                                                    {{ $item->status == 'em_andamento' ? 'text-blue-600 bg-blue-50 border-blue-100' : '' }}
                                                    {{ $item->status == 'finalizado' ? 'text-emerald-600 bg-emerald-50 border-emerald-100' : '' }}">

                                                {{-- Ícone Indicador (Bolinha) --}}
                                                <span
                                                    class="w-1.5 h-1.5 rounded-full mr-2 
                                                        {{ $item->status == 'pendente' ? 'bg-amber-500 animate-pulse' : '' }}
                                                        {{ $item->status == 'em_andamento' ? 'bg-blue-500' : '' }}
                                                        {{ $item->status == 'finalizado' ? 'bg-emerald-500' : '' }}">
                                                </span>

                                                {{ str_replace('_', ' ', $item->status) }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="px-8 py-6">
                                        @if ($item->lido)
                                            <span class="text-green-500 flex items-center gap-1 text-xs font-bold">
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                    <path
                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z">
                                                    </path>
                                                </svg>
                                                Lido
                                            </span>
                                        @else
                                            <span
                                                class="text-orange-400 flex items-center gap-1 text-xs font-bold animate-pulse">
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                    <path
                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z">
                                                    </path>
                                                </svg>
                                                Pendente
                                            </span>
                                        @endif
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-8 py-20 text-center text-slate-400 italic">
                                        Nenhuma mensagem recebida ainda.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
