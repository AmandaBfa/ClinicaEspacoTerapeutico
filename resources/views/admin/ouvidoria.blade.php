<x-app-layout>
    <div class="py-12 pt-32">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-8 px-4">
                <h2 class="text-3xl font-bold text-slate-800 tracking-tight">Ouvidoria Digital</h2>
                <p class="text-slate-500 mt-2">Gerencie os elogios, sugestões e reclamações dos pacientes.</p>
            </div>

            <div
                class="bg-white/60 backdrop-blur-xl border border-white/40 rounded-[2.5rem] shadow-xl shadow-blue-900/5 overflow-hidden">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50/50 border-b border-slate-100">
                            <th class="px-8 py-5 text-xs font-bold uppercase tracking-widest text-slate-400">Data</th>
                            <th class="px-8 py-5 text-xs font-bold uppercase tracking-widest text-slate-400">Paciente
                            </th>
                            <th class="px-8 py-5 text-xs font-bold uppercase tracking-widest text-slate-400">Assunto
                            </th>
                            <th class="px-8 py-5 text-xs font-bold uppercase tracking-widest text-slate-400">Mensagem
                            </th>
                            <th class="px-8 py-5 text-xs font-bold uppercase tracking-widest text-slate-400">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @forelse($feedbacks as $item)
                            <tr class="hover:bg-blue-50/30 transition-colors">
                                <td class="px-8 py-6 text-sm text-slate-500">{{ $item->created_at->format('d/m/Y') }}
                                </td>
                                <td class="px-8 py-6">
                                    <a href="{{ route('admin.ouvidoria.show', $item) }}" class="group">
                                        <div class="font-bold text-slate-700 group-hover:text-orange-500 transition">
                                            {{ $item->nome ?? 'Anônimo' }}</div>
                                        <div class="text-xs text-slate-400 underline decoration-slate-200">Clique para
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
                                <td class="px-8 py-6 text-sm text-slate-600 max-w-xs truncate">
                                    {{ $item->mensagem }}
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
</x-app-layout>
