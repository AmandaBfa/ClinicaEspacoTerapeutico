<x-app-layout>
    {{-- Mantendo o mesmo x-data para controle de visualização do modal --}}
    <div class="py-12 pt-32" x-data="{ openPreview: false, activeAgendamento: {} }">
        <div class="max-w-7xl px-4 mx-auto sm:px-6 lg:px-8">

            {{-- Cabeçalho Responsivo (Idêntico ao de Especialidades) --}}
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8 px-4">
                <div>
                    <h2 class="text-3xl font-bold text-slate-800 tracking-tight">Solicitações de Agendamento</h2>
                    <p class="text-slate-500 mt-1">Gerencie a fila de espera e confirme as consultas.</p>
                </div>

                <div class="flex items-center gap-3 w-full md:w-auto">
                    {{-- Link para voltar ao site ou dashboard --}}
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

            {{-- Tabela com Efeito Vidro --}}
            <div
                class="bg-white/60 backdrop-blur-xl border border-white/40 rounded-[2.5rem] shadow-xl shadow-blue-900/5 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-slate-50/50 border-b border-gray-100">
                            <tr>
                                <th class="px-8 py-5 text-sm font-bold text-slate-600 uppercase">Paciente</th>
                                <th class="px-8 py-5 text-sm font-bold text-slate-600 uppercase">Serviço/Data</th>
                                <th class="px-8 py-5 text-sm font-bold text-slate-600 uppercase">Status</th>
                                <th class="px-8 py-5 text-sm font-bold text-slate-600 uppercase text-right">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @foreach ($agendamentos as $item)
                                <tr class="hover:bg-blue-50/30 transition-colors group">
                                    <td class="px-8 py-6">
                                        <div class="flex items-center gap-3">
                                            {{-- Botão de Visualizar (Olhinho) --}}
                                            <button
                                                @click="activeAgendamento = { 
                                                    nome: '{{ $item->paciente_nome }}', 
                                                    tipo: '{{ $item->paciente_tipo }}',
                                                    nascimento: '{{ date('d/m/Y', strtotime($item->paciente_nascimento)) }}',
                                                    email: '{{ $item->email_contato }}',
                                                    whatsapp: '{{ $item->telefone_contato }}',
                                                    servicoNome: '{{ $item->servico->name ?? 'N/D' }}',
                                                    profissionalNome: '{{ $item->profissional->name ?? 'N/D' }}',
                                                    data: '{{ date('d/m/Y', strtotime($item->data_agendamento)) }}',
                                                    hora: '{{ $item->horario_agendamento }}',
                                                    primeiraVez: '{{ $item->e_primeira_vez ? 'Sim' : 'Não' }}',
                                                    obs: `{{ $item->observacoes ?? 'Nenhuma observação informada.' }}`,
                                                    status: '{{ $item->status }}'
                                                }; openPreview = true"
                                                class="p-2 bg-white rounded-lg border border-slate-200 text-slate-400 hover:text-blue-600 hover:border-blue-200 transition shadow-sm">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </button>
                                            <div>
                                                <div class="font-bold text-slate-800">{{ $item->paciente_nome }}</div>
                                                <div class="text-[10px] uppercase font-black text-slate-400">
                                                    {{ $item->paciente_tipo }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-8 py-6 text-slate-600">
                                        <div class="text-sm font-bold text-slate-700">
                                            {{ $item->servico->name ?? 'Serviço N/D' }}</div>
                                        <div class="text-xs text-blue-500 font-medium">
                                            {{ date('d/m/Y', strtotime($item->data_agendamento)) }} às
                                            {{ $item->horario_agendamento }}</div>
                                    </td>
                                    <td class="px-8 py-6 text-blue-600 font-bold">
                                        <span
                                            class="px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-wider
                                            {{ $item->status == 'solicitado' ? 'bg-orange-100 text-orange-600' : '' }}
                                            {{ $item->status == 'confirmado' ? 'bg-green-100 text-green-600' : '' }}
                                            {{ $item->status == 'cancelado' ? 'bg-red-100 text-red-600' : '' }}">
                                            {{ $item->status }}
                                        </span>
                                    </td>
                                    <td class="px-7 py-5 text-right space-x-2">
                                        <a href="{{ route('admin.agendamentos.show', $item->id) }}"
                                            class="text-blue-500 hover:underline font-bold text-sm">Visualizar</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Paginação --}}
            <div class="mt-8 px-4">
                {{ $agendamentos->links() }}
            </div>
        </div>

        {{-- Modal de Visualização --}}
        <div x-show="openPreview" x-transition.opacity
            class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-slate-900/40 backdrop-blur-sm"
            style="display: none;">

            <div @click.away="openPreview = false"
                class="bg-white rounded-[2.5rem] max-w-3xl w-full shadow-2xl overflow-hidden max-h-[90vh] overflow-y-auto custom-scrollbar">

                <div class="p-8 md:p-12">
                    {{-- Header do Modal --}}
                    <div class="flex justify-between items-start mb-8">
                        <div>
                            <span
                                class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest"
                                x-text="activeAgendamento.status"></span>
                            <h2 class="text-3xl font-black text-slate-800 tracking-tighter mt-2"
                                x-text="activeAgendamento.nome"></h2>
                            <p class="text-slate-400 font-bold text-xs uppercase tracking-widest"
                                x-text="'Tipo: ' + activeAgendamento.tipo"></p>
                        </div>
                        <button @click="openPreview = false"
                            class="text-slate-300 hover:text-red-500 transition text-2xl">&times;</button>
                    </div>

                    {{-- Grid de Informações --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                        {{-- Bloco: Atendimento --}}
                        <div class="bg-slate-50 p-5 rounded-3xl border border-slate-100">
                            <span
                                class="block text-[10px] font-black text-slate-400 uppercase mb-3 tracking-widest">Informações
                                da Consulta</span>
                            <div class="space-y-2">
                                <p class="text-sm"><span class="text-slate-400 font-medium">Serviço:</span> <span
                                        class="font-bold text-slate-700" x-text="activeAgendamento.servicoNome"></span>
                                </p>
                                <p class="text-sm"><span class="text-slate-400 font-medium">Profissional:</span> <span
                                        class="font-bold text-blue-600"
                                        x-text="activeAgendamento.profissionalNome"></span>
                                </p>
                                <p class="text-sm"><span class="text-slate-400 font-medium">Data/Hora:</span> <span
                                        class="font-bold text-slate-700"
                                        x-text="activeAgendamento.data + ' às ' + activeAgendamento.hora"></span></p>
                            </div>
                        </div>

                        {{-- Bloco: Paciente --}}
                        <div class="bg-slate-50 p-5 rounded-3xl border border-slate-100">
                            <span
                                class="block text-[10px] font-black text-slate-400 uppercase mb-3 tracking-widest">Detalhes
                                do Paciente</span>
                            <div class="space-y-2">
                                <p class="text-sm"><span class="text-slate-400 font-medium">Nascimento:</span> <span
                                        class="font-bold text-slate-700" x-text="activeAgendamento.nascimento"></span>
                                </p>
                                <p class="text-sm"><span class="text-slate-400 font-medium">Primeira vez?</span> <span
                                        class="font-bold text-slate-700" x-text="activeAgendamento.primeiraVez"></span>
                                </p>
                                <p class="text-sm"><span class="text-slate-400 font-medium">WhatsApp:</span> <span
                                        class="font-bold text-green-600" x-text="activeAgendamento.whatsapp"></span>
                                </p>
                            </div>
                        </div>

                        {{-- Bloco: Contato (Ocupa 2 colunas no desktop) --}}
                        <div class="md:col-span-2 bg-slate-50 p-5 rounded-3xl border border-slate-100">
                            <span
                                class="block text-[10px] font-black text-slate-400 uppercase mb-1 tracking-widest">E-mail
                                de Contato</span>
                            <p class="text-sm font-bold text-slate-700" x-text="activeAgendamento.email"></p>
                        </div>
                    </div>

                    {{-- Observações --}}
                    <div class="mb-8">
                        <span
                            class="block text-[10px] font-black text-slate-400 uppercase mb-3 tracking-widest">Observações
                            ou Queixas</span>
                        <div class="bg-orange-50/50 p-6 rounded-[2rem] border border-orange-100 text-slate-600 text-sm leading-relaxed"
                            x-text="activeAgendamento.obs"></div>
                    </div>

                    {{-- Rodapé do Modal --}}
                    <div class="pt-6 border-t border-slate-100 flex justify-end">
                        <button @click="openPreview = false"
                            class="bg-slate-900 text-white px-10 py-4 rounded-2xl font-bold hover:bg-blue-600 transition shadow-lg active:scale-95 text-sm uppercase tracking-widest">
                            Fechar Detalhes
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
