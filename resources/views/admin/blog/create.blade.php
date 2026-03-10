<x-app-layout>
    <div class="py-12 pt-32">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white/60 backdrop-blur-xl border border-white/40 rounded-[2.5rem] shadow-xl p-10">
                @if ($errors->any())
                    <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded-r-xl shadow-sm">
                        <p class="font-bold mb-1">Ops! Verifique os campos abaixo:</p>
                        <ul class="list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h2 class="text-2xl font-bold text-slate-800 mb-8">Novo Artigo para o Blog</h2>

                {{-- Importante: multipart/form-data para enviar a imagem! --}}
                <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Título --}}
                        <div class="flex flex-col">
                            <label class="text-xs font-bold uppercase text-slate-400 mb-2 ml-2">Título do Post</label>
                            <input type="text" name="title" required
                                class="rounded-2xl border-none bg-slate-50 p-4 focus:ring-2 focus:ring-orange-500">
                        </div>

                        {{-- Categoria --}}
                        <div class="flex flex-col">
                            <label class="text-xs font-bold uppercase text-slate-400 mb-2 ml-2">Categoria</label>
                            <select name="category"
                                class="rounded-2xl border-none bg-slate-50 p-4 focus:ring-2 focus:ring-orange-500">
                                <option value="Saúde Mental">Saúde Mental</option>
                                <option value="Dicas">Dicas</option>
                                <option value="Bem-estar">Bem-estar</option>
                            </select>
                        </div>
                    </div>

                    {{-- Imagem de Capa --}}
                    <div class="flex flex-col">
                        <label class="text-xs font-bold uppercase text-slate-400 mb-2 ml-2">Imagem de Capa</label>
                        <input type="file" name="image"
                            class="bg-white p-4 rounded-2xl text-sm border-2 border-dashed border-slate-200">
                    </div>

                    {{-- Conteúdo --}}
                    <div class="flex flex-col">
                        <label class="text-xs font-bold uppercase text-slate-400 mb-2 ml-2">Conteúdo do Artigo</label>
                        <textarea name="content" id="content" rows="10" required
                            class="rounded-2xl border-none bg-slate-50 p-4 focus:ring-2 focus:ring-orange-500"
                            placeholder="Escreva aqui seu conhecimento..."></textarea>
                    </div>

                    <div class="flex justify-end gap-4 pt-4">
                        <a href="{{ route('admin.blog.index') }}"
                            class="px-8 py-3 rounded-xl font-bold text-slate-500 hover:bg-slate-100 transition">Cancelar</a>
                        <button type="submit"
                            class="bg-slate-900 text-white px-10 py-3 rounded-xl font-bold hover:bg-orange-500 shadow-lg transition transform hover:-translate-y-1">
                            Publicar Post
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#content'), {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
                language: 'pt-br'
            })
            .catch(error => {
                console.error(error);
            });
    </script> --}}
    <script>
        let blogEditor;

        ClassicEditor
            .create(document.querySelector('#content'), {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
                language: 'pt-br'
            })
            .then(editor => {
                blogEditor = editor;
            })
            .catch(error => {
                console.error(error);
            });

        document.querySelector('form').addEventListener('submit', function(e) {
            const contentData = blogEditor.getData();
            if (contentData.trim() === '') {
                alert('Por favor, escreva algo no conteúdo do artigo!');
                e.preventDefault();
            } else {
                document.querySelector('#content').value = contentData;
            }
        });
    </script>

    <style>
        .ck-editor__editable_inline {
            min-height: 300px;
            background-color: #f8fafc !important;
            border-radius: 0 0 1rem 1rem !important;
        }

        .ck-toolbar {
            border-radius: 1rem 1rem 0 0 !important;
            background-color: #ffffff !important;
        }
    </style>
</x-app-layout>
