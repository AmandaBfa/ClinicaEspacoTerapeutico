<x-app-layout>
    <div class="py-12 pt-32">
        <div class="max-w-4xl px-4 mx-auto sm:px-6 lg:px-8">

            <div class="mb-8">
                <a href="{{ route('admin.blog.index') }}"
                    class="text-slate-400 hover:text-blue-600 font-bold text-sm uppercase tracking-widest transition-colors">&larr;
                    Voltar para a lista</a>
                <h2 class="text-4xl font-black text-slate-800 tracking-tighter mt-4">Editar Artigo</h2>
                <p class="text-slate-500">Confira todos os detalhes antes de editar o artigo.</p>
            </div>

            {{-- Botão Voltar
            <a href="{{ route('admin.blog.index') }}"
                class="flex items-center gap-2 text-slate-500 hover:text-orange-500 transition mb-6 font-bold text-sm">
                ← Voltar para a lista
            </a> --}}

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

                        <div class="flex flex-col">
                            <label class="text-xs font-bold uppercase text-slate-400 mb-2 ml-2">Autor(a)</label>
                            <input type="text" value="{{ Auth::user()->name }}" disabled
                                class="rounded-2xl border-none bg-slate-100 p-4 text-slate-500 cursor-not-allowed">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
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
                                <option value="Autismo" {{ $post->category == 'Autismo' ? 'selected' : '' }}>Autismo
                                </option>
                                <option value="TEA" {{ $post->category == 'TEA' ? 'selected' : '' }}>TEA</option>
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
