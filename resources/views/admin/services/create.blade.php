<x-app-layout>
    <div class="py-12 pt-32 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <div
                class="bg-white/60 backdrop-blur-xl border border-white/40 rounded-[2.5rem] p-10 shadow-xl shadow-blue-900/5">

                <h2 class="text-3xl font-bold text-slate-800 mb-2">Cadastrar Novo Serviço</h2>
                <p class="text-slate-500 mb-10">Adicione um novo tipo de atendimento ao Espaço Terapêutico.</p>

                <form action="{{ route('admin.services.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                        {{-- Nome do Serviço --}}
                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-widest">Nome do
                                Serviço</label>
                            <input type="text" name="name" required placeholder="Ex: Terapia ABA"
                                class="w-full rounded-2xl border-slate-200 focus:border-blue-500 focus:ring-blue-500 transition-all p-4 bg-white/50">
                        </div>

                        {{-- Duração --}}
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-widest">Duração
                                (Minutos)</label>
                            <input type="number" name="duration_minutes" required placeholder="60"
                                class="w-full rounded-2xl border-slate-200 focus:border-blue-500 focus:ring-blue-500 transition-all p-4 bg-white/50">
                        </div>

                        {{-- Preço --}}
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-widest">Preço
                                (R$)</label>
                            <input type="number" step="0.01" name="price" required placeholder="150.00"
                                class="w-full rounded-2xl border-slate-200 focus:border-blue-500 focus:ring-blue-500 transition-all p-4 bg-white/50">
                        </div>

                        {{-- Seleção de Ícone --}}
                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-widest">Ícone
                                Representativo</label>
                            <select name="icon_class"
                                class="w-full rounded-2xl border-slate-200 focus:border-blue-500 focus:ring-blue-500 transition-all p-4 bg-white/50">
                                <option value="brain">🧠 Mente / TDAH / Psicologia</option>
                                <option value="puzzle-piece">🧩 Autismo / TEA</option>
                                <option value="heart">❤️ Acolhimento / Terapia</option>
                                <option value="users">👥 Grupo / Habilidades Sociais</option>
                                <option value="book-open">📚 Psicopedagogia / Aprendizado</option>
                            </select>
                        </div>

                        {{-- Descrição --}}
                        <div class="md:col-span-2">
                            <label
                                class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-widest">Descrição
                                do Serviço</label>
                            <textarea name="description" id="service-editor" rows="4"
                                class="w-full rounded-2xl border-slate-200 focus:border-blue-500 focus:ring-blue-500 transition-all bg-white/50"></textarea>
                        </div>
                    </div>

                    <div class="mt-12 flex items-center gap-4">
                        <button type="submit"
                            class="bg-slate-900 text-white px-10 py-4 rounded-2xl font-bold hover:bg-blue-600 transition shadow-lg shadow-blue-200">
                            Salvar Serviço
                        </button>
                        <a href="{{ route('admin.services.index') }}"
                            class="text-slate-400 hover:text-slate-600 font-bold px-6">
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Script para o CKEditor nos Serviços também! --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#service-editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
</x-app-layout>
