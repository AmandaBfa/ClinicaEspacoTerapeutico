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
                            <input type="text" name="instagram_url" placeholder="Ex: @karlaniana.psi"
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
                        <div class="md:col-span-2" x-data="{ photoPreview: null }">
                            <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-widest">
                                Foto do Profissional
                            </label>

                            <div
                                class="mt-2 flex flex-col md:flex-row items-center gap-6 p-8 border-2 border-slate-200 border-dashed rounded-[2.5rem] bg-white/30 hover:bg-white/50 transition-all">

                                {{-- Área da Miniatura (Preview) --}}
                                <div class="flex-shrink-0">
                                    <template x-if="photoPreview">
                                        <img :src="photoPreview"
                                            class="w-24 h-24 rounded-2xl object-cover shadow-xl border-4 border-white">
                                    </template>
                                    <template x-if="!photoPreview">
                                        <div
                                            class="w-24 h-24 rounded-2xl bg-slate-100 flex items-center justify-center text-slate-300">
                                            <svg class="w-10 h-10" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.587-1.587a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                    </template>
                                </div>

                                {{-- Texto e Botão --}}
                                <div class="text-center md:text-left flex flex-col items-center md:items-start">
                                    <div class="flex flex-col items-center md:items-start gap-2 text-sm text-slate-600">


                                        <label for="image_path"
                                            class="relative cursor-pointer px-4 py-2 rounded-xl shadow-sm border font-bold transition-all"
                                            :class="photoPreview ? 'bg-blue-600 text-white border-blue-700 hover:bg-slate-900' :
                                                'bg-white text-blue-600 border-slate-200 hover:bg-slate-50'">

                                            <span x-text="photoPreview ? 'Alterar Foto' : 'Selecionar Foto'"></span>

                                            <input id="image_path" name="image_path" type="file" class="sr-only"
                                                @change="
                                                    const file = $event.target.files[0];
                                                    if (file) {
                                                        const reader = new FileReader();
                                                        reader.onload = (e) => { photoPreview = e.target.result; };
                                                        reader.readAsDataURL(file);
                                                    }
                                                ">
                                        </label>

                                        {{-- Mensagem de Seleção --}}
                                        <p x-show="!photoPreview" class="text-slate-400">Nenhum arquivo selecionado
                                        </p>

                                        <p x-show="photoPreview"
                                            class="text-green-600 font-bold flex items-center justify-center md:justify-start gap-1 w-full"
                                            x-cloak>
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <span>Foto carregada com sucesso!</span>
                                        </p>
                                    </div>

                                    {{-- Texto de Rodapé --}}
                                    <p
                                        class="text-[10px] text-slate-400 mt-2 uppercase tracking-tighter text-center md:text-left">
                                        PNG ou JPG até 2MB
                                    </p>
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
