<x-app-layout>
    <div class="py-12 pt-32">
        <div class="max-w-4xl mx-auto px-4">

            <div class="mb-8">
                <a href="{{ route('admin.agendamentos.index') }}"
                    class="text-slate-400 hover:text-blue-600 font-bold text-sm uppercase tracking-widest transition-colors">&larr;
                    Voltar para a lista</a>
                <h2 class="text-4xl font-black text-slate-800 tracking-tighter mt-4">Revisar Solicitação</h2>
                <p class="text-slate-500">Confira todos os detalhes antes de confirmar o agendamento e notificar o
                    paciente.</p>
            </div>

            <div class="bg-white rounded-[3rem] shadow-2xl overflow-hidden border border-slate-100">
                <div class="p-10 md:p-16">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-12">

                        {{-- Informações do Paciente --}}
                        <div class="space-y-6">
                            <h3 class="text-xs font-black text-blue-500 uppercase tracking-[0.2em] border-b pb-2">
                                Dados do Paciente</h3>

                            <div class="space-y-4">
                                <div>
                                    <p class="text-2xl font-black text-slate-800">{{ $agendamento->paciente_nome }}</p>
                                    <span
                                        class="inline-block bg-blue-50 text-blue-600 text-[10px] font-black uppercase px-3 py-1 rounded-full mt-1">
                                        {{ $agendamento->paciente_tipo }}
                                    </span>
                                </div>

                                <div class="text-sm space-y-2 text-slate-600">
                                    <p><span class="font-bold text-slate-400 uppercase text-sm">Nascimento:</span>
                                        {{ date('d/m/Y', strtotime($agendamento->paciente_nascimento)) }}</p>
                                    <p><span class="font-bold text-slate-400 uppercase text-sm">E-mail:</span>
                                        {{ $agendamento->email_contato }}</p>
                                    <p>
                                        <span class="font-bold text-slate-400 uppercase text-sm">WhatsApp:</span>
                                        <a href="https://wa.me/{{ preg_replace('/\D/', '', $agendamento->telefone_contato) }}"
                                            target="_blank" class="text-green-600 font-bold hover:underline">
                                            {{ $agendamento->telefone_contato }}
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>

                        {{-- Detalhes da Consulta --}}
                        <div class="space-y-6">
                            <h3 class="text-xs font-black text-orange-500 uppercase tracking-[0.2em] border-b pb-2">
                                Detalhes da Consulta</h3>

                            <div class="space-y-4">
                                <div>
                                    <p class="text-[10px] font-black text-slate-400 uppercase">Serviço</p>
                                    <p class="text-xl font-bold text-slate-700">{{ $agendamento->servico->name ?? 'Serviço Excluído' }}</p>
                                </div>

                                <div>
                                    <p class="text-[10px] font-black text-slate-400 uppercase">Profissional Responsável
                                    </p>
                                    <p class="text-xl font-bold text-blue-600">
                                        {{ $agendamento->profissional->name ?? 'Não informado' }}</p>
                                </div>

                                <div class="bg-blue-50/50 p-4 rounded-2xl border border-blue-100">
                                    <p class="text-[10px] font-black text-blue-400 uppercase">Data e Horário</p>
                                    <p class="text-xl text-blue-900 font-black">
                                        {{ date('d/m/Y', strtotime($agendamento->data_agendamento)) }} às
                                        {{ $agendamento->horario_agendamento }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Bloco de Observações --}}
                    <div class="bg-slate-50/50 p-8 rounded-[2.5rem] mb-12 border border-slate-100">
                        <div class="flex items-center gap-2 mb-4">
                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                            </svg>
                            <h4 class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Observações do
                                Paciente</h4>
                        </div>
                        <p class="text-slate-600 italic leading-relaxed text-lg">
                            "{{ $agendamento->observacoes ?? 'Nenhuma observação enviada.' }}"
                        </p>
                    </div>

                    {{-- Ação de Confirmação --}}
                    {{-- <div class="flex flex-col gap-4 items-center">
                        <form action="{{ route('admin.agendamentos.confirmarFinal', $agendamento) }}" method="POST"
                            class="w-full">
                            @csrf
                            <button type="submit"
                                class="w-full bg-slate-900 text-white py-6 rounded-[1.5rem] font-bold text-lg hover:bg-blue-600 transition-all shadow-xl shadow-blue-900/10 active:scale-[0.98] flex items-center justify-center gap-3">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Confirmar Agendamento e Notificar por E-mail
                            </button>
                        </form>

                        <p class="text-xs text-slate-400">Ao clicar, o status mudará para <span
                                class="font-bold">confirmado</span> e um e-mail será enviado para
                            {{ $agendamento->email_contato }}.</p>
                    </div> --}}

                    {{-- Área de Ações Blindada --}}
                    <div class="mt-12">

                        @if ($agendamento->status == 'solicitado')
                            <div x-data="{ recusando: false }">
                                <div class="flex flex-col md:flex-row gap-4 justify-center" x-show="!recusando">
                                    <form action="{{ route('admin.agendamentos.confirmarFinal', $agendamento) }}"
                                        method="POST" class="flex-1">
                                        @csrf
                                        <button type="submit"
                                            class="w-full bg-slate-900 text-white py-6 rounded-[1.5rem] font-bold text-lg hover:bg-blue-600 transition-all shadow-xl">
                                            Confirmar Agendamento
                                        </button>
                                    </form>

                                    <button type="button" @click="recusando = true"
                                        class="flex-1 bg-white border-2 border-red-100 text-red-500 py-6 rounded-[1.5rem] font-bold text-lg hover:bg-red-50 transition-all">
                                        Recusar Solicitação
                                    </button>
                                </div>

                                {{-- Campo de Justificativa --}}
                                <div x-show="recusando" x-transition
                                    class="bg-red-50 p-8 rounded-[2.5rem] border border-red-100 shadow-inner">
                                    <div class="flex items-center gap-3 mb-6">
                                        <div class="bg-red-500 text-white p-2 rounded-lg">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                            </svg>
                                        </div>
                                        <h4 class="text-red-800 font-black uppercase text-xs tracking-widest">Motivo da
                                            Recusa</h4>
                                    </div>

                                    <form action="{{ route('admin.agendamentos.recusar', $agendamento) }}"
                                        method="POST">
                                        @csrf
                                        <textarea name="justificativa" rows="4" required
                                            placeholder="Explique ao paciente por que o horário não está disponível ou sugira uma alternativa..."
                                            class="w-full rounded-2xl border-red-100 focus:border-red-500 focus:ring-red-500 text-slate-600 p-5"></textarea>

                                        <div class="flex flex-col md:flex-row gap-4 mt-6">
                                            <button type="submit"
                                                class="flex-1 bg-red-600 text-white py-4 rounded-xl font-bold hover:bg-red-700 transition-all shadow-lg shadow-red-900/10">
                                                Confirmar Recusa e Enviar E-mail
                                            </button>
                                            <button type="button" @click="recusando = false"
                                                class="text-slate-400 font-bold hover:text-slate-600 transition-colors">
                                                Cancelar
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @else
                            <div
                                class="p-8 rounded-[2.5rem] border flex flex-col items-center text-center {{ $agendamento->status == 'confirmado' ? 'bg-green-50 border-green-100' : 'bg-slate-50 border-slate-200' }}">
                                <div
                                    class="w-16 h-16 rounded-full flex items-center justify-center mb-4 {{ $agendamento->status == 'confirmado' ? 'bg-green-100 text-green-600' : 'bg-slate-200 text-slate-500' }}">
                                    @if ($agendamento->status == 'confirmado')
                                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                d="M5 13l4 4L19 7" />
                                        </svg>
                                    @else
                                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    @endif
                                </div>

                                @php
                                    $canceladoPeloPaciente = str_starts_with($agendamento->justificativa_cancelamento ?? '', '[PACIENTE] ');
                                    $justificativaLimpa = $canceladoPeloPaciente ? str_replace('[PACIENTE] ', '', $agendamento->justificativa_cancelamento) : $agendamento->justificativa_cancelamento;
                                @endphp

                                <h4 class="text-xl font-black text-slate-800 uppercase tracking-tighter">
                                    @if($agendamento->status == 'confirmado')
                                        Solicitação Confirmada
                                    @elseif($canceladoPeloPaciente)
                                        Cancelado Pelo Paciente
                                    @else
                                        Solicitação Recusada
                                    @endif
                                </h4>
                                <p class="text-slate-500 mt-2 italic">Este agendamento já foi processado e não permite novas alterações.</p>

                                @if ($agendamento->status == 'cancelado' && $justificativaLimpa)
                                    <div class="mt-6 p-6 bg-white rounded-2xl border {{ $canceladoPeloPaciente ? 'border-orange-50' : 'border-red-50' }} w-full max-w-md">
                                        <span class="text-[10px] font-black {{ $canceladoPeloPaciente ? 'text-orange-500' : 'text-red-400' }} uppercase tracking-widest block mb-2">
                                            {{ $canceladoPeloPaciente ? 'Motivo informado pelo paciente:' : 'Motivo da recusa (Enviado por E-mail):' }}
                                        </span>
                                        <p class="text-slate-600 text-sm">"{{ $justificativaLimpa }}"</p>
                                    </div>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>
</x-app-layout>
