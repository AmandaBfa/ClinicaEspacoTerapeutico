<x-app-layout>
    <div class="py-12 pt-32 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <div
                class="bg-white/60 backdrop-blur-xl border border-white/40 rounded-[2.5rem] p-10 shadow-xl shadow-blue-900/5">

                <h2 class="text-3xl font-bold text-slate-800 mb-2">Editar Profissional</h2>
                <p class="text-slate-500 mb-10">Atualizando o perfil de: <span
                        class="text-blue-600 font-bold">{{ $employee->name }}</span></p>

                <form action="{{ route('admin.employees.update', $employee->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT') {{-- Essencial para o Laravel entender o Update --}}

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                        {{-- Nome --}}
                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-widest">Nome
                                Completo</label>
                            <input type="text" name="name" value="{{ $employee->name }}" required
                                class="w-full rounded-2xl border-slate-200 focus:border-blue-500 transition-all p-4 bg-white/50">
                        </div>

                        {{-- Cargo e Instagram --}}
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-widest">Cargo /
                                Função</label>
                            <input type="text" name="role" value="{{ $employee->role }}" required
                                class="w-full rounded-2xl border-slate-200 focus:border-blue-500 transition-all p-4 bg-white/50">
                        </div>

                        <div>
                            <label
                                class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-widest">Instagram</label>
                            <input type="text" name="instagram_handle" value="{{ $employee->instagram_handle }}"
                                class="w-full rounded-2xl border-slate-200 focus:border-blue-500 transition-all p-4 bg-white/50">
                        </div>

                        {{-- Especialidades --}}
                        <div class="md:col-span-2">
                            <label
                                class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-widest">Especialidades
                                (separadas por vírgula)</label>
                            <input type="text" name="specialties" value="{{ $employee->specialties }}"
                                class="w-full rounded-2xl border-slate-200 focus:border-blue-500 transition-all p-4 bg-white/50">
                        </div>

                        {{-- Upload da Foto com Preview da Atual --}}
                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-widest">Foto do
                                Profissional</label>
                            <div class="flex items-center gap-6 mt-2">
                                @if ($employee->image_path)
                                    <div class="flex-shrink-0">
                                        <p class="text-[10px] text-slate-400 uppercase font-bold mb-2">Foto Atual:</p>
                                        <img src="{{ asset('storage/' . $employee->image_path) }}"
                                            class="w-24 h-24 rounded-2xl object-cover border-2 border-blue-100 shadow-sm">
                                    </div>
                                @endif

                                <div class="flex-1">
                                    <div
                                        class="flex justify-center px-6 pt-5 pb-6 border-2 border-slate-200 border-dashed rounded-[2rem] bg-white/30 hover:bg-white/50 transition-colors">
                                        <div class="space-y-1 text-center">
                                            <div class="flex text-sm text-slate-600">
                                                <label for="image"
                                                    class="relative cursor-pointer bg-white rounded-md font-bold text-blue-600 hover:text-blue-500">
                                                    <span>Alterar imagem</span>
                                                    <input id="image" name="image" type="file" class="sr-only">
                                                </label>
                                                <p class="pl-1">ou arraste outra</p>
                                            </div>
                                            <p class="text-xs text-slate-500 italic">Deixe vazio para manter a foto
                                                atual</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Bio com CKEditor --}}
                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-widest">Bio /
                                Currículo Resumido</label>
                            <textarea name="bio" id="employee-editor-edit">{{ $employee->bio }}</textarea>
                        </div>
                    </div>

                    <div class="mt-12 flex items-center gap-4">
                        <button type="submit"
                            class="bg-blue-600 text-white px-10 py-4 rounded-2xl font-bold hover:bg-slate-900 transition shadow-lg shadow-blue-200">
                            Atualizar Profissional
                        </button>
                        <a href="{{ route('admin.employees.index') }}"
                            class="text-slate-400 font-bold px-6">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            ClassicEditor
                .create(document.querySelector('#employee-editor-edit'))
                .then(editor => {
                    // Garante que o conteúdo seja sincronizado antes do submit
                    editor.model.document.on('change:data', () => {
                        document.querySelector('#employee-editor-edit').value = editor.getData();
                    });
                })
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
</x-app-layout>
