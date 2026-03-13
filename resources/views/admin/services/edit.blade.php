<x-app-layout>
    <div class="py-12 pt-32 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <div
                class="bg-white/60 backdrop-blur-xl border border-white/40 rounded-[2.5rem] p-10 shadow-xl shadow-blue-900/5">

                <h2 class="text-3xl font-bold text-slate-800 mb-2">Editar Serviço</h2>
                <p class="text-slate-500 mb-10">Alterando informações de: <span
                        class="text-blue-600 font-bold">{{ $service->name }}</span></p>

                <form action="{{ route('admin.services.update', $service->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                        {{-- Nome --}}
                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-widest">Nome do
                                Serviço</label>
                            <input type="text" name="name" value="{{ $service->name }}" required
                                class="w-full rounded-2xl border-slate-200 focus:border-blue-500 transition-all p-4 bg-white/50">
                        </div>

                        {{-- Duração e Preço --}}
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-widest">Duração
                                (Min)</label>
                            <input type="number" name="duration_minutes" value="{{ $service->duration_minutes }}"
                                required class="w-full rounded-2xl border-slate-200 p-4 bg-white/50">
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-widest">Preço
                                (R$)</label>
                            <input type="number" step="0.01" name="price" value="{{ $service->price }}" required
                                class="w-full rounded-2xl border-slate-200 p-4 bg-white/50">
                        </div>

                        {{-- Ícone --}}
                        <div class="md:col-span-2">
                            <label
                                class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-widest">Ícone</label>
                            <select name="icon_class" class="w-full rounded-2xl border-slate-200 p-4 bg-white/50">
                                <option value="brain" {{ $service->icon_class == 'brain' ? 'selected' : '' }}>🧠 Mente
                                    / Psicologia</option>
                                <option value="puzzle-piece"
                                    {{ $service->icon_class == 'puzzle-piece' ? 'selected' : '' }}>🧩 Autismo / TEA
                                </option>
                                <option value="heart" {{ $service->icon_class == 'heart' ? 'selected' : '' }}>❤️
                                    Acolhimento</option>
                                <option value="book-open" {{ $service->icon_class == 'book-open' ? 'selected' : '' }}>📚
                                    Psicopedagogia</option>
                            </select>
                        </div>

                        {{-- Descrição com CKEditor --}}
                        {{-- Descrição --}}
                        <div class="md:col-span-2">
                            <label
                                class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-widest">Descrição
                                do Serviço</label>
                            <textarea name="description" id="service-editor" rows="4"
                                class="w-full rounded-2xl border-slate-200 focus:border-blue-500 focus:ring-blue-500 transition-all bg-white/50">{{ $service->description }}</textarea>
                        </div>
                        {{-- <div class="md:col-span-2">
                            <label
                                class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-widest">Descrição
                                do Serviço</label>
                            <textarea name="description" id="service-editor">{{ $service->description }}</textarea>
                        </div> --}}
                    </div>

                    <div class="mt-12 flex items-center gap-4">
                        <button type="submit"
                            class="bg-blue-600 text-white px-10 py-4 rounded-2xl font-bold hover:bg-slate-900 transition shadow-lg shadow-blue-200">
                            Atualizar Serviço
                        </button>
                        <a href="{{ route('admin.services.index') }}"
                            class="text-slate-400 font-bold px-6">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#service-editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
</x-app-layout>
