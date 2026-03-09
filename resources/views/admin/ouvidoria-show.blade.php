<x-app-layout>
    <div class="py-12 pt-32">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Botão Voltar --}}
            <a href="{{ route('admin.ouvidoria') }}"
                class="flex items-center gap-2 text-slate-500 hover:text-orange-500 transition mb-6 font-bold text-sm">
                ← Voltar para a lista
            </a>

            <div
                class="bg-white/60 backdrop-blur-xl border border-white/40 rounded-[2.5rem] shadow-xl shadow-blue-900/5 p-10">

                {{-- Cabeçalho da Mensagem --}}
                <div class="flex justify-between items-start mb-8 border-b border-slate-100 pb-6">
                    <div>
                        <span class="text-xs font-bold uppercase tracking-widest text-orange-500">Mensagem de
                            {{ $feedback->assunto }}</span>
                        <h2 class="text-3xl font-bold text-slate-800 mt-1">{{ $feedback->nome ?? 'Anônimo' }}</h2>
                        <p class="text-slate-400 text-sm">{{ $feedback->email }} •
                            {{ $feedback->created_at->format('d/m/Y H:i') }}</p>
                    </div>

                    {{-- Badge de Prioridade Dinâmico --}}
                    <form action="{{ route('admin.ouvidoria.status', $feedback) }}" method="POST">
                        @csrf @method('PATCH')
                        <select name="prioridade" onchange="this.form.submit()"
                            class="rounded-full text-[10px] font-bold uppercase px-4 border-none shadow-sm 
                            {{ $feedback->prioridade == 'Alta' ? 'bg-red-100 text-red-600' : ($feedback->prioridade == 'Média' ? 'bg-yellow-100 text-yellow-600' : 'bg-blue-100 text-blue-600') }}">
                            <option value="Baixa" {{ $feedback->prioridade == 'Baixa' ? 'selected' : '' }}>Prioridade
                                Baixa</option>
                            <option value="Média" {{ $feedback->prioridade == 'Média' ? 'selected' : '' }}>Prioridade
                                Média</option>
                            <option value="Alta" {{ $feedback->prioridade == 'Alta' ? 'selected' : '' }}>Prioridade
                                Alta</option>
                        </select>
                    </form>
                </div>

                {{-- Conteúdo da Mensagem --}}
                <div class="mb-10">
                    <h3 class="text-xs font-bold uppercase tracking-widest text-slate-400 mb-4">Relato do Paciente:</h3>
                    <div
                        class="bg-slate-50/50 p-6 rounded-2xl text-slate-700 leading-relaxed italic border border-slate-100">
                        "{{ $feedback->mensagem }}"
                    </div>
                </div>

                {{-- Área de Resposta/Anotação Interna --}}
                <div class="mt-8 pt-8 border-t border-slate-100">
                    <h3 class="text-xs font-bold uppercase tracking-widest text-slate-400 mb-4">Ação Tomada / Resposta
                        Interna:</h3>
                    <form action="{{ route('admin.ouvidoria.responder', $feedback) }}" method="POST">
                        @csrf
                        <textarea name="resposta_interna" rows="4"
                            class="w-full rounded-2xl border-none bg-white shadow-inner p-4 text-sm focus:ring-2 focus:ring-orange-500"
                            placeholder="Descreva aqui o que foi feito ou a resposta dada ao paciente...">{{ old('resposta_interna', $feedback->resposta_interna) }}</textarea>

                        <div class="flex justify-end mt-4">
                            <button type="submit"
                                class="bg-slate-900 text-white px-8 py-3 rounded-xl font-bold hover:bg-orange-500 transition shadow-lg">
                                Salvar Resposta
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
