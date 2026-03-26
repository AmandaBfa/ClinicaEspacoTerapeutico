<x-layout-page page-title="Detalhes do Agendamento">
    <div class="py-12 pt-32">
        <div class="max-w-3xl mx-auto px-4">
            
            <a href="{{ route('agendamentos.historico') }}" class="inline-flex items-center text-sm font-bold text-slate-500 hover:text-blue-600 mb-8 transition">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Voltar para Histórico
            </a>

            <div class="bg-white border text-center md:text-left border-slate-100/50 rounded-[3rem] p-10 md:p-12 shadow-2xl shadow-blue-900/5 relative overflow-hidden">
                
                {{-- Decorative bg --}}
                <div class="absolute -top-24 -right-24 w-64 h-64 bg-slate-50 rounded-full blur-3xl -z-10"></div>

                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-8 border-b border-slate-100 pb-8">
                    <div>
                        <span class="px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-widest
                            {{ $agendamento->status == 'solicitado' ? 'bg-orange-100 text-orange-600' : '' }}
                            {{ $agendamento->status == 'confirmado' ? 'bg-green-100 text-green-600' : '' }}
                            {{ $agendamento->status == 'cancelado' ? 'bg-red-100 text-red-600' : '' }}">
                            {{ $agendamento->status }}
                        </span>
                        <h2 class="text-3xl font-black text-slate-800 mt-4">{{ $agendamento->servico->name ?? 'Serviço Excluído' }}</h2>
                        <p class="text-slate-500 font-medium">Protocolo: #{{ str_pad($agendamento->id, 5, '0', STR_PAD_LEFT) }}</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-sm">
                    <div>
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Paciente</p>
                        <p class="font-bold text-slate-700 text-lg">{{ $agendamento->paciente_nome }}</p>
                        <p class="text-slate-500 mt-1">Contato: {{ $agendamento->telefone_contato }}</p>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Profissional</p>
                        <p class="font-bold text-blue-600 text-lg">{{ $agendamento->profissional->name ?? 'Equipe' }}</p>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Data</p>
                        <p class="font-medium text-slate-700">{{ date('d/m/Y', strtotime($agendamento->data_agendamento)) }}</p>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Horário</p>
                        <p class="font-medium text-slate-700">{{ $agendamento->horario_agendamento }}</p>
                    </div>
                </div>

                @if($agendamento->observacoes)
                <div class="mt-8 bg-slate-50 p-6 rounded-2xl">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2">Suas Observações</p>
                    <p class="text-slate-600 text-sm whitespace-pre-wrap">{{ $agendamento->observacoes }}</p>
                </div>
                @endif

                @if($agendamento->status === 'solicitado')
                <div class="mt-12 pt-8 border-t border-red-50" x-data="{ confirming: false }">
                    
                    <div x-show="!confirming" class="flex flex-col sm:flex-row items-center justify-between gap-6 bg-red-50/50 p-6 rounded-3xl border border-red-100">
                        <div>
                            <h4 class="text-red-800 font-bold mb-1">Deseja cancelar a consulta?</h4>
                            <p class="text-xs text-red-600">Esta ação não pode ser desfeita. Nossa clínica não será mais notificada.</p>
                        </div>
                        <button type="button" @click="confirming = true" 
                            class="whitespace-nowrap bg-white text-red-600 border-2 border-red-200 hover:border-red-600 px-6 py-3 rounded-xl font-bold uppercase tracking-widest text-xs transition-colors shadow-sm">
                            Cancelar Consulta
                        </button>
                    </div>

                    <div x-show="confirming" x-transition class="bg-white sm:border sm:border-red-100 sm:shadow-2xl sm:shadow-red-900/5 p-6 rounded-3xl" style="display: none;">
                        <h4 class="text-red-600 font-black text-lg mb-2">Tem certeza?</h4>
                        <p class="text-sm text-slate-500 mb-6">Por favor, informe-nos o motivo do cancelamento. Seus dados nos ajudam a melhorar.</p>
                        
                        <form method="POST" action="{{ route('agendamentos.cancelar', $agendamento) }}">
                            @csrf
                            @method('PATCH')
                            <div class="mb-4">
                                <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest block mb-2 ml-1">Motivo do Cancelamento</label>
                                <textarea name="justificativa" required rows="3" placeholder="Escreva o motivo aqui..."
                                    class="w-full rounded-2xl border-slate-200/50 bg-slate-50 px-5 py-4 text-sm focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all resize-none"></textarea>
                            </div>
                            <div class="flex flex-col sm:flex-row items-center gap-3">
                                <button type="submit" class="w-full sm:w-auto bg-red-600 text-white px-8 py-4 rounded-xl font-bold hover:bg-red-700 transition-all shadow-lg shadow-red-600/30">
                                    Sim, Quero Cancelar
                                </button>
                                <button type="button" @click="confirming = false" class="w-full sm:w-auto text-slate-500 px-6 py-4 font-bold hover:text-slate-800 transition-colors">
                                    Não, Manter Agendamento
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
                @endif

            </div>
        </div>
    </div>
</x-layout-page>
