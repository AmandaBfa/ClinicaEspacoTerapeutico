<x-layout-page>
    <div class="py-12 pt-32">
        <div class="max-w-5xl mx-auto px-4">

            <div class="mb-10 text-center md:text-left">
                <h2 class="text-3xl font-black text-slate-800 tracking-tight">Meus Agendamentos</h2>
                <p class="text-slate-500 mt-2 text-lg">Acompanhe o status das suas solicitações e histórico de consultas.
                </p>
            </div>

            <div class="grid grid-cols-1 gap-6">
                @forelse($agendamentos as $agendamento)
                    <div
                        class="bg-white border border-slate-100 rounded-[2.5rem] p-8 shadow-xl shadow-blue-900/5 hover:border-blue-100 transition-all group">
                        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">

                            {{-- Info Principal --}}
                            <div class="flex-grow">
                                <div class="flex items-center gap-3 mb-3">
                                    {{-- Badge de Status dinâmico --}}
                                    <span
                                        class="px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-widest
                                        {{ $agendamento->status == 'solicitado' ? 'bg-orange-100 text-orange-600' : '' }}
                                        {{ $agendamento->status == 'confirmado' ? 'bg-green-100 text-green-600' : '' }}
                                        {{ $agendamento->status == 'cancelado' ? 'bg-red-100 text-red-600' : '' }}">
                                        {{ $agendamento->status }}
                                    </span>
                                    <span class="text-slate-300">|</span>
                                    <span class="text-xs font-bold text-slate-400 uppercase tracking-widest">Protocolo
                                        #{{ str_pad($agendamento->id, 5, '0', STR_PAD_LEFT) }}</span>
                                </div>

                                <h3 class="text-2xl font-black text-slate-800 mb-1">{{ $agendamento->servico->title }}
                                </h3>
                                <p class="text-blue-600 font-bold mb-4">Com
                                    {{ $agendamento->profissional->nome ?? 'Equipe Especializada' }}</p>

                                <div class="flex flex-wrap gap-4 text-sm font-medium text-slate-500">
                                    <div class="flex items-center gap-2 bg-slate-50 px-4 py-2 rounded-xl">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        {{ date('d/m/Y', strtotime($agendamento->data_agendamento)) }}
                                    </div>
                                    <div class="flex items-center gap-2 bg-slate-50 px-4 py-2 rounded-xl">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        {{ $agendamento->horario_agendamento }}
                                    </div>
                                </div>
                            </div>

                            {{-- Detalhes Extras (Justificativa se houver) --}}
                            <div class="w-full md:w-auto flex flex-col items-end gap-3">
                                @if ($agendamento->status == 'cancelado' && $agendamento->justificativa_cancelamento)
                                    <div
                                        class="bg-red-50 p-4 rounded-2xl border border-red-100 text-red-600 text-xs italic max-w-xs">
                                        <strong>Motivo:</strong> "{{ $agendamento->justificativa_cancelamento }}"
                                    </div>
                                @endif

                                @if ($agendamento->status == 'confirmado')
                                    <p class="text-[10px] text-green-500 font-black uppercase">Consulta Garantida ✓</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-20">
                        <div
                            class="bg-slate-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6 text-slate-400">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-700">Nenhum agendamento ainda</h3>
                        <p class="text-slate-500 mt-2 mb-8">Você ainda não solicitou nenhuma consulta.</p>
                        <a href="{{ route('agendar.create') }}"
                            class="bg-slate-900 text-white px-8 py-3 rounded-2xl font-bold hover:bg-blue-600 transition shadow-lg">Solicitar
                            Primeiro Agendamento</a>
                    </div>
                @endforelse

                <div class="mt-8">
                    {{ $agendamentos->links() }}
                </div>
            </div>
        </div>
    </div>
</x-layout-page>
