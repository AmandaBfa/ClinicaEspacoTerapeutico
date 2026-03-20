<x-layout-page title="Agendar Consulta">
    <div class="min-h-screen bg-slate-50 py-12" x-data="{
        tipoPaciente: 'dependente',
        etapa: 1,
        servicoId: null,
        servicoNome: '',
        profissionalId: null,
        profissionalNome: '',
        dataSel: null,
        horaSel: null,
        nomePaciente: '{{ Auth::user()->name }}',
        primeiraVez: true
    }">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="text-center mb-8 mt-20">
                <h1 class="text-3xl font-black text-slate-800 tracking-tight">Agende sua consulta</h1>
                <p class="text-slate-500 mt-2 text-sm">Escolha o tipo de atendimento, selecione uma data e horário
                    disponíveis.</p>
            </div>
            {{-- <div class="bg-black text-green-400 p-4 mb-4 font-mono text-xs">
                Total de Serviços: {{ count($servicos) }} <br>
                Total de Profissionais: {{ count($profissionais) }}
            </div> --}}

            {{-- BARRA DE PROGRESSO --}}
            <div class="flex items-center justify-center gap-4 mb-12 max-w-lg mx-auto">
                <div class="flex items-center gap-2">
                    <div :class="etapa >= 1 ? 'bg-orange-500 text-white' : 'bg-slate-100 text-slate-400'"
                        class="w-10 h-10 rounded-full flex items-center justify-center transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <span :class="etapa >= 1 ? 'text-orange-500' : 'text-slate-400'"
                        class="text-xs font-bold uppercase tracking-wider">Serviço</span>
                </div>
                <div class="h-0.5 flex-grow bg-slate-100 rounded"></div>

                <div class="flex items-center gap-2">
                    <div :class="etapa >= 2 ? 'bg-orange-500 text-white' : 'bg-slate-100 text-slate-400'"
                        class="w-10 h-10 rounded-full flex items-center justify-center transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <span :class="etapa >= 2 ? 'text-orange-500' : 'text-slate-400'"
                        class="text-xs font-bold uppercase tracking-wider">Profissional</span>
                </div>
                <div class="h-0.5 flex-grow bg-slate-100 rounded"></div>
                <div class="flex items-center gap-2">
                    <div :class="etapa >= 3 ? 'bg-orange-500 text-white' : 'bg-slate-100 text-slate-400'"
                        class="w-10 h-10 rounded-full flex items-center justify-center transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <span :class="etapa >= 3 ? 'text-orange-500' : 'text-slate-400'"
                        class="text-xs font-bold uppercase tracking-wider">Data</span>
                </div>
                <div class="h-0.5 flex-grow bg-slate-100 rounded"></div>

                <div class="flex items-center gap-2">
                    <div :class="etapa >= 4 ? 'bg-orange-500 text-white' : 'bg-slate-100 text-slate-400'"
                        class="w-10 h-10 rounded-full flex items-center justify-center transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <span :class="etapa >= 4 ? 'text-orange-500' : 'text-slate-400'"
                        class="text-xs font-bold uppercase tracking-wider">Horário</span>
                </div>
                <div class="h-0.5 flex-grow bg-slate-100 rounded"></div>

                <div class="flex items-center gap-2">
                    <div :class="etapa >= 5 ? 'bg-orange-500 text-white' : 'bg-slate-100 text-slate-400'"
                        class="w-10 h-10 rounded-full flex items-center justify-center transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <span :class="etapa >= 5 ? 'text-orange-500' : 'text-slate-400'"
                        class="text-xs font-bold uppercase tracking-wider">Confirmação</span>
                </div>
            </div>

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-2xl mb-6">
                    <ul class="list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- FORMULÁRIO --}}
            <form action="{{ route('agendar.store') }}" method="POST" class="space-y-10">
                @csrf
                <input type="hidden" name="paciente_tipo" :value="tipoPaciente">
                <input type="hidden" name="servico_id" :value="servicoId">
                <input type="hidden" name="profissional_id" :value="profissionalId">
                <input type="hidden" name="data_agendamento" :value="dataSel">
                <input type="hidden" name="horario_agendamento" :value="horaSel">

                {{-- PARTE CADASTRAL --}}
                <div class="bg-white p-8 sm:p-12 rounded-[2.5rem] shadow-sm border border-slate-100 space-y-8">
                    {{-- Quem será atendido? --}}
                    <div>
                        <label class="block text-xs font-black uppercase tracking-widest text-slate-400 mb-4">O
                            atendimento é para:</label>
                        <div class="flex flex-col sm:flex-row gap-4">
                            <button type="button" @click="tipoPaciente = 'proprio'"
                                :class="tipoPaciente === 'proprio' ? 'bg-orange-500 text-white shadow-orange-200' :
                                    'bg-slate-100 text-slate-500'"
                                class="flex-1 py-4 px-6 rounded-2xl font-bold transition-all shadow-md text-sm">
                                Para Mim (Responsável)
                            </button>
                            <button type="button" @click="tipoPaciente = 'dependente'"
                                :class="tipoPaciente === 'dependente' ? 'bg-orange-500 text-white shadow-orange-200' :
                                    'bg-slate-100 text-slate-500'"
                                class="flex-1 py-4 px-6 rounded-2xl font-bold transition-all shadow-md text-sm">
                                Para Dependente (Criança)
                            </button>
                        </div>
                    </div>

                    {{-- Dados do Paciente --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-black uppercase text-slate-400 mb-2">Nome do
                                Paciente</label>
                            <input type="text" name="paciente_nome" x-model="nomePaciente"
                                class="w-full rounded-2xl border-slate-200 focus:ring-orange-500" required>
                        </div>
                        <div>
                            <label class="block text-xs font-black uppercase text-slate-400 mb-2">Data de Nascimento do
                                Paciente</label>
                            <input type="date" name="paciente_nascimento"
                                class="w-full rounded-2xl border-slate-200 focus:ring-orange-500" required>
                        </div>
                        <div class="col-span-full pt-4">
                            <label class="block text-xs font-black uppercase tracking-widest text-slate-400 mb-4">Já
                                realizou atendimento conosco antes?</label>
                            <div class="flex gap-4">
                                <button type="button" @click="primeiraVez = true"
                                    :class="primeiraVez ? 'bg-orange-500 text-white shadow-orange-200' :
                                        'bg-slate-100 text-slate-500'"
                                    class="flex-1 py-3 rounded-xl font-bold transition-all shadow-md text-xs">
                                    Sim, é a primeira vez
                                </button>
                                <button type="button" @click="primeiraVez = false"
                                    :class="!primeiraVez ? 'bg-orange-500 text-white shadow-orange-200' :
                                        'bg-slate-100 text-slate-500'"
                                    class="flex-1 py-3 rounded-xl font-bold transition-all shadow-md text-xs">
                                    Não, já sou paciente
                                </button>
                                {{-- Input oculto que o Laravel vai ler --}}
                                <input type="hidden" name="e_primeira_vez" :value="primeiraVez ? 1 : 0">
                            </div>
                        </div>
                    </div>

                    {{-- Contato e Observações --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-6 border-t border-slate-100">
                        <div>
                            <label class="block text-xs font-black uppercase text-slate-400 mb-2">WhatsApp para
                                Contato</label>
                            <input type="text" name="telefone_contato" placeholder="(62) 9...."
                                class="w-full rounded-2xl border-slate-200" required>
                        </div>
                        <div>
                            <label class="block text-xs font-black uppercase text-slate-400 mb-2">E-mail</label>
                            <input type="email" name="email_contato" value="{{ Auth::user()->email }}"
                                class="w-full rounded-2xl border-slate-200" required>
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-black uppercase text-slate-400 mb-2">Observações
                            (Opcional)</label>
                        <textarea name="observacoes" rows="3" class="w-full rounded-2xl border-slate-200"></textarea>
                    </div>
                </div>


                {{-- TIPO DE CONSULTA --}}
                <div class="space-y-6" x-show="etapa >= 1" x-transition>
                    <div class="flex items-center gap-3">
                        <div
                            class="w-7 h-7 bg-orange-500 text-white rounded-full flex items-center justify-center font-bold text-sm">
                            1</div>
                        <h2 class="text-xl font-bold text-slate-800">Escolha o tipo de consulta</h2>
                    </div>

                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($servicos as $servico)
                            <div @click="servicoId = {{ $servico->id }}; servicoNome = '{{ $servico->name }}'; etapa = 2"
                                :class="servicoId == {{ $servico->id }} ?
                                    'bg-orange-50 border-orange-500 ring-2 ring-orange-100' :
                                    'bg-white border-slate-100 hover:border-orange-200'"
                                class="p-6 rounded-3xl border shadow-sm cursor-pointer transition-all relative group flex flex-col h-full">

                                {{-- Ícone e Título --}}
                                <div class="flex items-center gap-4 mb-4">
                                    <div :class="servicoId == {{ $servico->id }} ? 'bg-orange-100 text-orange-600' :
                                        'bg-slate-100 text-slate-500'"
                                        class="w-12 h-12 rounded-full flex items-center justify-center transition-colors">
                                        {{-- Ícone padrão --}}
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </div>
                                    <h3 class="font-black text-slate-800 tracking-tight text-lg line-clamp-1">
                                        {{ $servico->name }} </h3>
                                </div>

                                <p class="text-slate-500 text-sm flex-grow mb-4">
                                    {{ Str::limit(strip_tags($servico->description), 100) }}</p>

                                {{-- Duração e Check (Canto superior) --}}
                                <div class="flex justify-between items-center mt-auto">
                                    <span
                                        class="bg-slate-100 text-slate-500 text-xs font-bold px-3 py-1.5 rounded-full">50min</span>
                                </div>
                                <div x-show="servicoId == {{ $servico->id }}"
                                    class="absolute -top-3 -right-3 bg-white p-1 rounded-full shadow-md">
                                    <div
                                        class="w-6 h-6 bg-orange-500 text-white rounded-full flex items-center justify-center">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- PROFISSIONAL --}}
                <div class="space-y-6 mt-12 transition-all duration-500" x-show="servicoId !== null"
                    :class="etapa > 2 ? 'opacity-50' : ''" x-transition>

                    <div class="flex items-center gap-3">
                        <div
                            class="w-7 h-7 bg-orange-500 text-white rounded-full flex items-center justify-center font-bold text-sm">
                            2</div>
                        <h2 class="text-xl font-bold text-slate-800">Com quem deseja agendar?</h2>
                        <template x-if="etapa > 2">
                            <button type="button" @click="etapa = 2"
                                class="text-xs font-bold text-orange-500 underline">(Alterar)</button>
                        </template>
                    </div>

                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        @foreach ($profissionais as $pro)
                            <div @click="if(servicoId){ profissionalId = {{ $pro->id }}; profissionalNome = '{{ $pro->name }}'; etapa = 3 }"
                                :class="profissionalId == {{ $pro->id }} ?
                                    'border-orange-500 ring-2 ring-orange-100 bg-orange-50' :
                                    'bg-white border-slate-100 hover:border-orange-200'"
                                class="p-4 rounded-2xl border shadow-sm cursor-pointer transition-all relative flex flex-col items-center text-center group">

                                {{-- Avatar Simples --}}
                                <div
                                    class="w-16 h-16 bg-slate-100 rounded-full mb-3 flex items-center justify-center text-slate-400 group-hover:bg-orange-100 group-hover:text-orange-500 transition-colors">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>

                                <h3 class="font-bold text-slate-800 text-sm leading-tight">
                                    {{ $pro->name }}
                                </h3>
                                {{-- <p class="text-[10px] text-slate-500 uppercase font-black tracking-widest mt-1">
                                    {{ $pro->especialidade ?? 'Terapeuta' }}</p> --}}

                                {{-- Checkmark Orange --}}
                                <div x-show="profissionalId == {{ $pro->id }}" class="absolute top-2 right-2">
                                    <div
                                        class="w-5 h-5 bg-orange-500 text-white rounded-full flex items-center justify-center shadow-sm">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- DATA --}}
                <div class="space-y-6" x-show="etapa >= 3" x-transition>
                    <div class="flex items-center gap-3">
                        <div
                            class="w-7 h-7 bg-orange-500 text-white rounded-full flex items-center justify-center font-bold text-sm">
                            2</div>
                        <h2 class="text-xl font-bold text-slate-800">Selecione a data</h2>
                    </div>

                    <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-100 flex items-center gap-4">
                        {{-- Botão Voltar Semana --}}
                        <button type="button" class="p-2 text-slate-400 hover:text-orange-500 transition">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>

                        <div class="flex flex-grow justify-between gap-2 overflow-x-auto pb-2 sm:pb-0">
                            @for ($i = 0; $i < 7; $i++)
                                @php
                                    $dataObj = now()->addDays($i);
                                    $valorData = $dataObj->format('Y-m-d');
                                    $diaSemana = $dataObj->isoFormat('ddd');
                                    $diaMes = $dataObj->day;
                                    $fimDeSemana = $dataObj->isWeekend();
                                @endphp

                                <div @click="!{{ $fimDeSemana ? 'true' : 'false' }} && (dataSel = '{{ $valorData }}', etapa = 4)"
                                    :class="{
                                        'bg-orange-500 text-white shadow-lg scale-105': dataSel === '{{ $valorData }}',
                                        'bg-slate-50 text-slate-700 hover:bg-orange-50': dataSel !== '{{ $valorData }}',
                                        'opacity-30 cursor-not-allowed pointer-events-none': {{ $fimDeSemana ? 'true' : 'false' }}
                                    }"
                                    class="flex-1 min-w-[80px] text-center p-4 rounded-3xl transition-all h-28 flex flex-col justify-center items-center cursor-pointer border border-transparent">

                                    <span class="text-[9px] font-black uppercase tracking-widest opacity-70">
                                        {{ $dataObj->isoFormat('MMMM') }}
                                    </span>
                                    <span class="text-3xl font-black my-1">{{ $diaMes }}</span>
                                    <span class="text-[10px] font-bold uppercase tracking-wider">
                                        {{ $fimDeSemana ? 'FECHADO' : $diaSemana }}
                                    </span>
                                </div>
                            @endfor
                        </div>

                        {{-- Botão Próxima Semana --}}
                        <button type="button" class="p-2 text-slate-400 hover:text-orange-500 transition">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- HORÁRIO --}}
                <div class="space-y-8 bg-white p-8 sm:p-12 rounded-[2.5rem] shadow-sm border border-slate-100"
                    x-show="etapa >= 4" x-transition>
                    <div class="flex items-center gap-3">
                        <div
                            class="w-7 h-7 bg-orange-500 text-white rounded-full flex items-center justify-center font-bold text-sm">
                            3</div>
                        <h2 class="text-xl font-bold text-slate-800">Escolha o horário</h2>
                    </div>

                    {{-- Turno: Manhã --}}
                    <div class="space-y-4 pt-8 border-t border-slate-100">
                        <span class="block text-xs font-black uppercase tracking-widest text-slate-400">Manhã</span>
                        <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-5 lg:grid-cols-6 gap-3">
                            @php
                                $horariosManha = [
                                    '08:00',
                                    // '08:30',
                                    '09:00',
                                    // '09:30',
                                    '10:00',
                                    // '10:30',
                                    '11:00',
                                    // '11:30',
                                ];
                            @endphp
                            @foreach ($horariosManha as $hora)
                                <button type="button" @click="horaSel = '{{ $hora }}'; etapa = 5"
                                    :class="horaSel == '{{ $hora }}' ? 'bg-orange-500 text-white shadow-lg' :
                                        'bg-slate-50 text-slate-700 hover:bg-orange-100'"
                                    class="py-3.5 px-3 rounded-xl font-bold text-sm text-center transition-all flex items-center justify-center">
                                    {{ $hora }}
                                </button>
                            @endforeach

                        </div>
                        @error('horario_agendamento')
                            <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6 rounded-r-xl">
                                <p class="text-red-700 text-sm font-bold">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>

                    {{-- Turno: Tarde --}}
                    <div class="space-y-4 pt-8 border-t border-slate-100">
                        <span class="block text-xs font-black uppercase tracking-widest text-slate-400">Tarde</span>
                        <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-5 lg:grid-cols-6 gap-3">
                            @php
                                $horariosTarde = [
                                    '12:00',
                                    // '12:30',
                                    '13:00',
                                    // '13:30',
                                    '14:00',
                                    // '14:30',
                                    '15:00',
                                    // '15:30',
                                    '16:00',
                                    // '16:30',
                                    '17:00',
                                    // '17:30',
                                ];
                            @endphp
                            @foreach ($horariosTarde as $hora)
                                <button type="button" @click="horaSel = '{{ $hora }}'; etapa = 5"
                                    :class="horaSel == '{{ $hora }}' ? 'bg-orange-500 text-white shadow-lg' :
                                        'bg-slate-50 text-slate-700 hover:bg-orange-100'"
                                    class="py-3.5 px-3 rounded-xl font-bold text-sm text-center transition-all flex items-center justify-center">
                                    {{ $hora }}
                                </button>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- RESUMO E ENVIO --}}
                <div x-show="etapa == 5" x-transition
                    class="bg-orange-50 p-8 sm:p-12 rounded-[2.5rem] shadow-orange-100 shadow-xl border border-orange-100 flex flex-col items-center text-center">

                    <div class="w-16 h-16 bg-white p-1 rounded-full shadow-lg mb-6 border-4 border-orange-200">
                        <div
                            class="w-full h-full bg-orange-500 text-white rounded-full flex items-center justify-center">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                    </div>

                    <h2 class="text-3xl font-black text-slate-800 tracking-tight mb-2">Quase lá,
                        {{ Auth::user()->name }}!</h2>
                    <p class="text-slate-600 mb-8 max-w-lg">Sua solicitação está preenchida. Clique abaixo para
                        enviar
                        e nós entraremos em contato para confirmar sua consulta.</p>

                    <div
                        class="bg-white p-6 rounded-3xl shadow-sm border border-orange-200 w-full max-w-md text-left space-y-3 mb-8">
                        <div class="flex justify-between border-b border-slate-50 pb-2">
                            <span class="text-slate-400 text-xs font-bold uppercase">Paciente</span>
                            <span class="font-bold text-slate-700" x-text="nomePaciente"></span>
                        </div>
                        <div class="flex justify-between border-b border-slate-50 pb-2">
                            <span class="text-slate-400 text-xs font-bold uppercase">Data</span>
                            <span class="font-bold text-slate-700"
                                x-text="dataSel ? new Date(dataSel).toLocaleDateString('pt-BR') : ''"></span>
                        </div>
                        <div class="flex justify-between border-b border-slate-50 pb-2">
                            <span class="text-slate-400 text-xs font-bold uppercase">Horário</span>
                            <span class="font-bold text-slate-700" x-text="horaSel"></span>
                        </div>
                        <div class="flex justify-between border-b border-slate-50 pb-2">
                            <span class="text-slate-400 text-xs font-bold uppercase">Serviço</span>
                            <span class="font-bold text-slate-700" x-text="servicoNome"></span>
                        </div>

                        <div class="flex justify-between border-b border-slate-50 pb-2">
                            <span class="text-slate-400 text-xs font-bold uppercase">Profissional</span>
                            <span class="font-bold text-slate-700" x-text="profissionalNome"></span>
                        </div>
                        <div class="text-center pt-2">
                            <span
                                class="text-[10px] bg-orange-100 text-orange-600 px-2 py-1 rounded-full font-black uppercase"
                                x-text="primeiraVez == 1 ? 'Primeira Consulta' : 'Retorno'"></span>
                        </div>
                    </div>

                    <button type="submit"
                        class="px-10 py-5 bg-slate-900 text-white text-lg rounded-[1.5rem] font-bold shadow-2xl hover:bg-orange-500 transition-all flex items-center gap-2 active:scale-95">
                        <span>Enviar Solicitação de Agendamento</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </button>

                    <button type="button" @click="etapa = 4"
                        class="mt-6 text-sm text-slate-500 hover:text-orange-500 font-medium transition">
                        &larr; Revisar data/horário
                    </button>
                </div>

            </form>
        </div>
        <div class="mt-10 pt-8 flex flex-col items-center text-sm text-gray-500">
            <p>&copy; {{ date('Y') }} Espaço Terapêutico. Todos os direitos reservados.</p>
        </div>
    </div>
</x-layout-page>
