<x-app-layout>
    <div class="py-12 pt-32 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">

            <div class="mb-8">
                <a href="{{ route('admin.employees.index') }}"
                    class="text-slate-400 hover:text-blue-600 font-bold text-sm uppercase tracking-widest transition-colors">&larr;
                    Voltar para a lista</a>
                <h2 class="text-4xl font-black text-slate-800 tracking-tighter mt-4">Editar Profissional</h2>
                <p class="text-slate-500 mb-10">Atualizando o perfil de: <span
                        class="text-blue-600 font-bold">{{ $employee->name }}</span></p>
            </div>

            {{-- Botão Voltar --}}
            {{-- <a href="{{ route('admin.employees.index') }}"
                class="flex items-center gap-2 text-slate-500 hover:text-orange-500 transition mb-6 font-bold text-sm">
                ← Voltar para a lista
            </a> --}}

            <div
                class="bg-white/60 backdrop-blur-xl border border-white/40 rounded-[2.5rem] p-10 shadow-xl shadow-blue-900/5">

                @if ($errors->any())
                    <div class="mb-8 p-6 bg-red-50 border-l-4 border-red-500 rounded-2xl">
                        <div class="flex items-center mb-3">
                            <svg class="w-5 h-5 text-red-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-red-800 font-bold">Ops! Verifique os campos abaixo:</span>
                        </div>
                        <ul class="list-disc list-inside text-sm text-red-700 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.employees.update', $employee->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                        {{-- Nome --}}
                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-widest">Nome
                                Completo</label>
                            <input type="text" name="name" value="{{ $employee->name }}" required
                                class="w-full rounded-2xl border-slate-200 focus:border-blue-500 transition-all p-4 bg-white/50">
                        </div>

                        {{-- E-mail e Telefone (OS NOVOS CAMPOS) --}}
                        <div>
                            <label
                                class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-widest">E-mail</label>
                            <input type="email" name="email" value="{{ $employee->email }}" required
                                class="w-full rounded-2xl border-slate-200 focus:border-blue-500 transition-all p-4 bg-white/50">
                        </div>

                        <div>
                            <label
                                class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-widest">Telefone /
                                WhatsApp</label>
                            <input type="text" name="phone" value="{{ $employee->phone }}" required
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
                            <input type="text" name="instagram_url" value="{{ $employee->instagram_url }}"
                                class="w-full rounded-2xl border-slate-200 focus:border-blue-500 transition-all p-4 bg-white/50">
                        </div>

                        {{-- Especialidades --}}
                        <div class="md:col-span-2">
                            <label
                                class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-widest">Especialidades</label>
                            <input type="text" name="specialties" value="{{ $employee->specialties }}"
                                class="w-full rounded-2xl border-slate-200 focus:border-blue-500 transition-all p-4 bg-white/50">
                        </div>

                        {{-- Foto do Profissional (Preview) --}}
                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-widest">Foto do
                                Profissional</label>
                            <div class="flex items-center gap-6 mt-2">
                                @if ($employee->image_path)
                                    <div class="flex-shrink-0 text-center">
                                        <p class="text-[10px] text-slate-400 uppercase font-bold mb-2">Atual:</p>
                                        <img src="{{ asset('storage/' . $employee->image_path) }}"
                                            class="w-24 h-24 rounded-2xl object-cover border-2 border-blue-100 shadow-sm">
                                    </div>
                                @endif

                                <div class="flex-1">
                                    <div
                                        class="flex justify-center px-4 pt-5 pb-4 border-2 border-slate-200 border-dashed rounded-[2rem] bg-white/30 hover:bg-white/50 transition-colors">
                                        <div class="space-y-1 text-center">
                                            <div class="flex text-sm text-slate-600 justify-center">
                                                <label for="image"
                                                    class="relative cursor-pointer bg-white rounded-md font-bold text-blue-600 hover:text-blue-500">
                                                    <span>Alterar imagem</span>
                                                    <input id="image" name="image_path" type="file"
                                                        class="sr-only">
                                                </label>
                                            </div>
                                            <p class="text-xs text-slate-500 italic">PNG, JPG até 2MB</p>
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

    {{-- Script do CKEditor --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            ClassicEditor
                .create(document.querySelector('#employee-editor-edit'))
                .then(editor => {
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
