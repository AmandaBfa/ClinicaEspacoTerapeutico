<x-app-layout>
    <div class="py-12 pt-32">
        <div class="max-w-4xl px-4 mx-auto sm:px-6 lg:px-8">

            <div class="bg-white/60 backdrop-blur-xl border border-white/40 rounded-[2.5rem] shadow-xl p-10">
                <h2 class="text-2xl font-bold text-slate-800 mb-8">Editar Artigo</h2>

                <form action="{{ route('admin.blog.update', $post->id) }}" method="POST" enctype="multipart/form-data"
                    class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Título --}}
                        <div class="flex flex-col">
                            <label class="text-xs font-bold uppercase text-slate-400 mb-2 ml-2">Título do Post</label>
                            <input type="text" name="title" value="{{ $post->title }}" required
                                class="rounded-2xl border-none bg-slate-50 p-4 focus:ring-2 focus:ring-orange-500">
                        </div>

                        {{-- Categoria --}}
                        <div class="flex flex-col">
                            <label class="text-xs font-bold uppercase text-slate-400 mb-2 ml-2">Categoria</label>
                            <select name="category"
                                class="rounded-2xl border-none bg-slate-50 p-4 focus:ring-2 focus:ring-orange-500">
                                <option value="Saúde Mental" {{ $post->category == 'Saúde Mental' ? 'selected' : '' }}>
                                    Saúde Mental</option>
                                <option value="Dicas" {{ $post->category == 'Dicas' ? 'selected' : '' }}>Dicas</option>
                                <option value="Bem-estar" {{ $post->category == 'Bem-estar' ? 'selected' : '' }}>
                                    Bem-estar</option>
                            </select>
                        </div>
                    </div>

                    {{-- Imagem de Capa --}}
                    <div class="flex flex-col">
                        <label class="text-xs font-bold uppercase text-slate-400 mb-2 ml-2">Imagem de Capa</label>
                        <input type="file" name="image"
                            class="bg-white p-4 rounded-2xl text-sm border-2 border-dashed border-slate-200">
                        @if ($post->image_url)
                            <p class="text-xs text-slate-500 mt-2">Imagem atual: {{ basename($post->image_url) }}</p>
                        @endif
                    </div>

                    {{-- Conteúdo --}}
                    <div class="flex flex-col">
                        <label class="text-xs font-bold uppercase text-slate-400 mb-2 ml-2">Conteúdo do Artigo</label>
                        <textarea name="content" rows="10" required
                            class="rounded-2xl border-none bg-slate-50 p-4 focus:ring-2 focus:ring-orange-500">{{ $post->content }}</textarea>
                    </div>

                    <div class="flex justify-end gap-4 pt-4">
                        <a href="{{ route('admin.blog.index') }}"
                            class="px-8 py-3 rounded-xl font-bold text-slate-500 hover:bg-slate-100 transition">Cancelar</a>
                        <button type="submit"
                            class="bg-slate-900 text-white px-10 py-3 rounded-xl font-bold hover:bg-orange-500 shadow-lg transition transform hover:-translate-y-1">
                            Atualizar Post
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
