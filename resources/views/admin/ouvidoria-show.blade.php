<x-app-layout>
    <div class="py-12 pt-32">
        <div class="max-w-7xl px-4 mx-auto sm:px-6 lg:px-8">

            <div class="mb-8">
                <a href="{{ route('admin.ouvidoria') }}"
                    class="text-slate-400 hover:text-blue-600 font-bold text-sm uppercase tracking-widest transition-colors">&larr;
                    Voltar para a lista</a>
                {{-- <h2 class="text-4xl font-black text-slate-800 tracking-tighter mt-4">Vizualize o Feedback</h2>
                <p class="text-slate-500">Confira todos os detalhes do feedback.</p> --}}
            </div>
            {{-- Botão Voltar --}}
            {{-- <a href="{{ route('admin.ouvidoria') }}"
                class="flex items-center gap-2 text-slate-500 hover:text-orange-500 transition mb-6 font-bold text-sm">
                ← Voltar para a lista
            </a> --}}

            <div
                class="bg-white/60 backdrop-blur-xl border border-white/40 rounded-[2.5rem] shadow-xl shadow-blue-900/5 p-10">

                {{-- Cabeçalho da Mensagem --}}
                <div
                    class="flex flex-col md:flex-row justify-between items-start mb-8 border-b border-slate-100 pb-6 gap-6">
                    <div>
                        <span class="text-xs font-bold uppercase tracking-widest text-orange-500">
                            Mensagem de {{ $feedback->assunto }}
                        </span>
                        <h2 class="text-3xl font-bold text-slate-800 mt-1">{{ $feedback->nome ?? 'Anônimo' }}</h2>
                        <p class="text-slate-400 text-sm">
                            {{ $feedback->email ?? 'Sem e-mail informado' }} •
                            {{ $feedback->created_at->format('d/m/Y H:i') }}
                        </p>
                        @if ($feedback->nascimento)
                            <div class="flex items-center gap-2 mt-1">
                                <span
                                    class="text-[10px] font-black bg-blue-50 text-blue-600 px-2 py-0.5 rounded-md uppercase tracking-tighter">
                                    Paciente: {{ \Carbon\Carbon::parse($feedback->nascimento)->age }} anos
                                </span>
                                <span class="text-slate-300 text-xs">•</span>
                                <span class="text-slate-400 text-xs font-medium">Nasc:
                                    {{ \Carbon\Carbon::parse($feedback->nascimento)->format('d/m/Y') }}</span>
                            </div>
                        @endif
                    </div>

                    {{-- Barra de Controles Rápidos --}}
                    <div class="flex flex-wrap gap-3">
                        {{-- Formulário de Prioridade --}}
                        <form action="{{ route('admin.ouvidoria.status', $feedback) }}" method="POST">
                            @csrf @method('PATCH')
                            <select name="prioridade" onchange="this.form.submit()"
                                class="rounded-2xl text-sm font-bold uppercase px-6 py-3 border-none shadow-sm
                                    {{ $feedback->prioridade == 'Alta' ? 'bg-red-100 text-red-600' : ($feedback->prioridade == 'Média' ? 'bg-yellow-100 text-yellow-600' : 'bg-blue-100 text-blue-600') }}">
                                <option value="Baixa" {{ $feedback->prioridade == 'Baixa' ? 'selected' : '' }}>Baixa
                                </option>
                                <option value="Média" {{ $feedback->prioridade == 'Média' ? 'selected' : '' }}>Média
                                </option>
                                <option value="Alta" {{ $feedback->prioridade == 'Alta' ? 'selected' : '' }}>Alta
                                </option>
                            </select>
                        </form>

                        {{-- Formulário de Status --}}
                        <form action="{{ route('admin.ouvidoria.updateStatus', $feedback->id) }}" method="POST">
                            @csrf @method('PUT')
                            <select name="status" onchange="this.form.submit()"
                                class="text-sm font-bold uppercase rounded-2xl border-none py-3 px-6 shadow-sm
                                    {{ $feedback->status == 'pendente' ? 'text-amber-600 bg-amber-100' : '' }}
                                    {{ $feedback->status == 'em_andamento' ? 'text-blue-600 bg-blue-100' : '' }}
                                    {{ $feedback->status == 'finalizado' ? 'text-emerald-600 bg-emerald-100' : '' }}">
                                <option value="pendente" {{ $feedback->status == 'pendente' ? 'selected' : '' }}>
                                    Pendente</option>
                                <option value="em_andamento"
                                    {{ $feedback->status == 'em_andamento' ? 'selected' : '' }}>Em Andamento</option>
                                <option value="finalizado" {{ $feedback->status == 'finalizado' ? 'selected' : '' }}>
                                    Finalizado</option>
                            </select>
                        </form>
                    </div>
                </div>


                {{-- Conteúdo da Mensagem --}}
                <div class="mb-10">
                    <h3 class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-4 px-1">Relato do
                        Paciente:</h3>
                    <div
                        class="bg-slate-50/50 p-8 rounded-3xl text-slate-700 leading-relaxed italic border border-slate-100 text-lg">
                        "{{ $feedback->mensagem }}"
                    </div>
                </div>

                {{-- Área de Resposta/Anotação Interna --}}
                <div class="mt-8 pt-8 border-t border-slate-100">
                    <h3 class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-4 px-1">Ação Tomada /
                        Resposta Interna:</h3>
                    <form action="{{ route('admin.ouvidoria.responder', $feedback) }}" method="POST">
                        @csrf
                        <textarea name="resposta_interna" rows="4"
                            class="w-full rounded-3xl border-slate-100 bg-white shadow-inner p-6 text-sm focus:ring-2 focus:ring-orange-500 transition-all"
                            placeholder="Descreva aqui o que foi feito ou a resposta dada ao paciente...">{{ old('resposta_interna', $feedback->resposta_interna) }}</textarea>

                        <div class="flex justify-end mt-6">
                            <button type="submit"
                                class="bg-slate-900 text-white px-10 py-4 rounded-2xl font-bold hover:bg-orange-500 transition shadow-xl shadow-orange-900/10 active:scale-95">
                                Salvar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
