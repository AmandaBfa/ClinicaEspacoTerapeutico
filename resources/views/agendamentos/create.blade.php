<x-layout-page title="Agendar Consulta">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12" x-data="{ tipo: 'dependente' }">
        {{-- Teste ainda --}}
        {{-- Cabeçalho --}}
        <div class="text-center mb-8 mt-20">
            <h1 class="text-3xl font-black text-slate-800 tracking-tight">Solicitar Agendamento</h1>
            <p class="text-slate-500 mt-2">Preencha os dados abaixo e aguarde nossa confirmação por e-mail.</p>
        </div>

        <form action="{{ route('agendar.store') }}" method="POST" class="space-y-6">
            @csrf

            {{-- Card 1: Quem será atendido? --}}
            <div class="bg-white p-8 rounded-[2rem] shadow-sm border border-slate-100">
                <label class="block text-xs font-black uppercase tracking-widest text-slate-400 mb-4">O atendimento
                    é para:</label>

                <div class="flex gap-4">
                    <button type="button" @click="tipo = 'proprio'"
                        :class="tipo === 'proprio' ? 'bg-orange-500 text-white shadow-orange-200' :
                            'bg-slate-100 text-slate-500'"
                        class="flex-1 py-4 rounded-2xl font-bold transition-all shadow-md">
                        Para Mim
                    </button>
                    <button type="button" @click="tipo = 'dependente'"
                        :class="tipo === 'dependente' ? 'bg-orange-500 text-white shadow-orange-200' :
                            'bg-slate-100 text-slate-500'"
                        class="flex-1 py-4 rounded-2xl font-bold transition-all shadow-md">
                        Para Dependente
                    </button>
                </div>
                <input type="hidden" name="paciente_tipo" :value="tipo">

                {{-- Campos Dinâmicos --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
                    <div>
                        <label class="block text-xs font-black uppercase text-slate-400 mb-2">Nome do
                            Paciente</label>
                        <input type="text" name="paciente_nome"
                            :value="tipo === 'proprio' ? '{{ Auth::user()->name }}' : ''"
                            class="w-full rounded-xl border-slate-200 focus:ring-orange-500 focus:border-orange-500"
                            required>
                    </div>
                    <div>
                        <label class="block text-xs font-black uppercase text-slate-400 mb-2">Data de
                            Nascimento</label>
                        <input type="date" name="paciente_nascimento"
                            class="w-full rounded-xl border-slate-200 focus:ring-orange-500 focus:border-orange-500"
                            required>
                    </div>
                </div>
            </div>

            {{-- Card 2: Profissional e Serviço --}}
            <div
                class="bg-white p-8 rounded-[2rem] shadow-sm border border-slate-100 grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-black uppercase text-slate-400 mb-2">Especialidade/Serviço</label>
                    <select name="servico_id" class="w-full rounded-xl border-slate-200 focus:ring-blue-500" required>
                        <option value="">Selecione...</option>
                        @foreach ($servicos as $servico)
                            <option value="{{ $servico->id }}">{{ $servico->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-black uppercase text-slate-400 mb-2">Profissional
                        Desejado</label>
                    <select name="profissional_id" class="w-full rounded-xl border-slate-200 focus:ring-blue-500"
                        required>
                        <option value="">Selecione...</option>
                        @foreach ($profissionais as $pro)
                            <option value="{{ $pro->id }}">{{ $pro->nome }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- Card 3: Data e Hora --}}
            <div
                class="bg-white p-8 rounded-[2rem] shadow-sm border border-slate-100 grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-black uppercase text-slate-400 mb-2">Data Pretendida</label>
                    <input type="date" name="data_agendamento" min="{{ date('Y-m-d') }}"
                        class="w-full rounded-xl border-slate-200 focus:ring-blue-500" required>
                </div>
                <div>
                    <label class="block text-xs font-black uppercase text-slate-400 mb-2">Horário</label>
                    <input type="time" name="horario_agendamento"
                        class="w-full rounded-xl border-slate-200 focus:ring-blue-500" required>
                </div>
            </div>

            {{-- Contato e Obs --}}
            <div class="bg-white p-8 rounded-[2rem] shadow-sm border border-slate-100 space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-black uppercase text-slate-400 mb-2">WhatsApp para
                            Contato</label>
                        <input type="text" name="telefone_contato" placeholder="(62) 9...."
                            class="w-full rounded-xl border-slate-200" required>
                    </div>
                    <div>
                        <label class="block text-xs font-black uppercase text-slate-400 mb-2">E-mail</label>
                        <input type="email" name="email_contato" value="{{ Auth::user()->email }}"
                            class="w-full rounded-xl border-slate-200" required>
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-black uppercase text-slate-400 mb-2">Observações
                        (Opcional)</label>
                    <textarea name="observacoes" rows="3" class="w-full rounded-xl border-slate-200"></textarea>
                </div>
            </div>

            <button type="submit"
                class="w-full bg-slate-900 text-white py-5 rounded-[1.5rem] font-bold text-lg hover:bg-orange-500 transition-all shadow-xl active:scale-95">
                Enviar Solicitação de Agendamento
            </button>
        </form>
    </div>
</x-layout-page>
