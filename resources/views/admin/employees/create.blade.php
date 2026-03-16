<x-app-layout>
    <div class="py-12 pt-32 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <div
                class="bg-white/60 backdrop-blur-xl border border-white/40 rounded-[2.5rem] p-10 shadow-xl shadow-blue-900/5">

                <h2 class="text-3xl font-bold text-slate-800 mb-2">Adicionar Profissional</h2>
                <p class="text-slate-500 mb-10">Cadastre um novo membro para a equipe do Espaço Terapêutico.</p>

                @if ($errors->any())
                    <div class="bg-red-100 text-red-600 p-4 rounded-2xl mb-6">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.employees.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                        {{-- Nome Completo --}}
                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-widest">Nome do
                                Profissional</label>
                            <input type="text" name="name" required placeholder="Ex: Dra. Ana Souza"
                                class="w-full rounded-2xl border-slate-200 focus:border-blue-500 transition-all p-4 bg-white/50">
                        </div>

                        {{-- Cargo / Função --}}
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-widest">Cargo /
                                Função</label>
                            <input type="text" name="role" required placeholder="Ex: Psicopedagoga"
                                class="w-full rounded-2xl border-slate-200 focus:border-blue-500 transition-all p-4 bg-white/50">
                        </div>

                        {{-- Instagram --}}
                        <div>
                            <label
                                class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-widest">Instagram
                                (Opcional)</label>
                            <input type="text" name="instagram_handle" placeholder="Ex: @karlaniana.psi"
                                class="w-full rounded-2xl border-slate-200 focus:border-blue-500 transition-all p-4 bg-white/50">
                        </div>

                        {{-- E-mail do Profissional --}}
                        <div>
                            <label
                                class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-widest">E-mail</label>
                            <input type="email" name="email" required placeholder="ana.karla@exemplo.com"
                                class="w-full rounded-2xl border-slate-200 focus:border-blue-500 transition-all p-4 bg-white/50">
                        </div>

                        {{-- Telefone do Profissional --}}
                        <div>
                            <label
                                class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-widest">Telefone /
                                WhatsApp</label>
                            <input type="text" name="phone" required placeholder="(62) 99999-9999"
                                class="w-full rounded-2xl border-slate-200 focus:border-blue-500 transition-all p-4 bg-white/50">
                        </div>

                        {{-- Especialidades --}}
                        <div class="md:col-span-2">
                            <label
                                class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-widest">Especialidades
                                (separe por vírgula)</label>
                            <input type="text" name="specialties"
                                placeholder="Ex: ABA, TDAH, Autismo, Seletividade Alimentar"
                                class="w-full rounded-2xl border-slate-200 focus:border-blue-500 transition-all p-4 bg-white/50">
                        </div>

                        {{-- Upload da Foto --}}
                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-widest">Foto do
                                Profissional</label>
                            <div
                                class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-slate-200 border-dashed rounded-[2rem] bg-white/30 hover:bg-white/50 transition-colors">
                                <div class="space-y-1 text-center">
                                    <svg class="mx-auto h-12 w-12 text-slate-400" stroke="currentColor" fill="none"
                                        viewBox="0 0 48 48">
                                        <path
                                            d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex text-sm text-slate-600">
                                        <label for="image_path"
                                            class="relative cursor-pointer bg-white rounded-md font-bold text-blue-600 hover:text-blue-500 focus-within:outline-none">
                                            <span>Carregar foto</span>
                                            <input id="image_path" name="image_path" type="file" class="sr-only">
                                        </label>
                                        <p class="pl-1">ou arraste e solte</p>
                                    </div>
                                    <p class="text-xs text-slate-500">PNG, JPG, GIF até 2MB</p>
                                </div>
                            </div>
                        </div>

                        {{-- Bio / Currículo com CKEditor --}}
                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-widest">Bio /
                                Resumo sobre o Profissional</label>
                            <textarea name="bio" id="employee-editor" rows="4"></textarea>
                        </div>
                    </div>

                    <div class="mt-12 flex items-center gap-4">
                        <button type="submit"
                            class="bg-slate-900 text-white px-10 py-4 rounded-2xl font-bold hover:bg-blue-600 transition shadow-lg shadow-blue-200">
                            Salvar Profissional
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
                .create(document.querySelector('#employee-editor'))
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
</x-app-layout>
