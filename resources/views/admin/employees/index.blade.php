<x-app-layout>
    <div class="py-12 pt-32" x-data="{ openPreview: false, activeEmployee: {} }">
        <div class="max-w-6xl px-4 mx-auto sm:px-6 lg:px-8">

            {{-- Cabeçalho Minimalista --}}
            <div class="mb-10 flex flex-col md:flex-row justify-between items-center gap-6">
                <div class="text-center md:text-left">
                    <h2 class="text-3xl font-black text-slate-800 tracking-tight">Equipe</h2>
                    <p class="text-slate-400 font-medium">Gestão simplificada de profissionais</p>
                </div>
                <div class="flex items-center gap-3">

                    <a href="{{ route('about') }}"
                        class="group flex items-center gap-2 bg-transparent text-slate-400 px-5 py-2.5 rounded-xl font-semibold hover:text-blue-600 transition-all border border-transparent hover:border-blue-100 hover:bg-blue-50/50">
                        <svg class="w-4 h-4 opacity-50 group-hover:opacity-100" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                        </svg>
                        <span class="text-sm">Ver no Site</span>
                    </a>

                    <a href="{{ route('admin.employees.create') }}"
                        class="bg-slate-900 text-white px-7 py-3 rounded-[1.25rem] font-bold hover:bg-blue-600 transition-all shadow-lg shadow-blue-900/10 flex items-center gap-2 active:scale-95">
                        <span class="text-lg leading-none mb-0.5">+</span>
                        <span class="text-sm tracking-tight">Novo Profissional</span>
                    </a>

                </div>

            </div>

            {{-- Tabela Clean --}}
            <div
                class="bg-white/60 backdrop-blur-xl border border-white/40 rounded-[2.5rem] shadow-xl shadow-blue-900/5 overflow-hidden">
                <table class="w-full text-left border-collapse">
                    <tbody class="divide-y divide-slate-100">
                        @forelse ($employees as $employee)
                            <tr class="hover:bg-white/80 transition-colors group">
                                {{-- Identidade e Cargo --}}
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-5">
                                        <div
                                            class="w-16 h-16 rounded-2xl overflow-hidden border-2 border-white shadow-sm">
                                            <img src="{{ $employee->image_path ? asset('storage/' . $employee->image_path) : asset('assets/images/default-user.png') }}"
                                                class="w-full h-full object-cover">
                                        </div>
                                        <div class="flex flex-col">
                                            <span
                                                class="text-base font-bold text-slate-800 mb-2">{{ $employee->name }}</span>
                                            <div class="flex items-center gap-2">
                                                <span
                                                    class="text-xs font-semibold text-blue-600 uppercase tracking-wider">{{ $employee->role }}</span>
                                                <span class="text-slate-300">•</span>
                                                <span class="text-xs text-slate-400">{{ $employee->email }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                {{-- Ações (Ícones Limpos) --}}
                                <td class="px-6 py-4 text-right whitespace-nowrap">
                                    <div class="flex justify-end items-center gap-2">
                                        {{-- Visualizar --}}
                                        <button
                                            @click="activeEmployee = { 
                                                name: '{{ $employee->name }}', 
                                                role: '{{ $employee->role }}',
                                                email: '{{ $employee->email }}',
                                                phone: '{{ $employee->phone }}',
                                                insta: '{{ $employee->instagram_url }}',
                                                bio: `{!! $employee->bio !!}`, 
                                                image: '{{ $employee->image_path ? asset('storage/' . $employee->image_path) : '' }}',
                                                specs: '{{ $employee->specialties }}'
                                            }; openPreview = true"
                                            class="p-2.5 bg-blue-50 text-blue-600 rounded-xl hover:bg-blue-600 hover:text-white transition-all shadow-sm">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </button>

                                        {{-- Editar --}}
                                        <a href="{{ route('admin.employees.edit', $employee->id) }}"
                                            class="p-2.5 bg-orange-50 text-orange-600 rounded-xl hover:bg-orange-500 hover:text-white transition-all shadow-sm">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>

                                        {{-- Excluir --}}
                                        <form action="{{ route('admin.employees.delete', $employee->id) }}"
                                            method="POST" class="inline">
                                            @csrf @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('Remover este profissional da equipe?')"
                                                class="p-2.5 bg-red-50 text-red-500 rounded-xl hover:bg-red-500 hover:text-white transition-all shadow-sm">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-4v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="px-8 py-12 text-center text-slate-300 italic text-sm">Nenhum profissional na
                                    lista.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- MODAL DE PRÉVIA CENTRALIZADO --}}
        <div x-show="openPreview" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-200"
            class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-slate-900/50 backdrop-blur-md"
            style="display: none;">

            <div @click.away="openPreview = false"
                class="bg-white rounded-[3.5rem] max-w-xl w-full max-h-[90vh] shadow-[0_30px_100px_rgba(0,0,0,0.25)] border border-white flex flex-col overflow-hidden relative">

                {{-- Botão Fechar Flutuante --}}
                <button @click="openPreview = false"
                    class="absolute top-6 right-6 z-10 p-3 bg-white/20 hover:bg-white/40 backdrop-blur-xl rounded-2xl text-slate-600 transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                {{-- Header Colorido --}}
                <div class="h-32 bg-gradient-to-tr from-blue-100 to-indigo-50 flex-shrink-0"></div>

                {{-- Conteúdo do Perfil --}}
                <div class="px-8 md:px-12 -mt-16 pb-12 overflow-y-auto custom-scrollbar">

                    {{-- Foto Centralizada --}}
                    <div class="flex flex-col items-center mb-8">
                        <template x-if="activeEmployee.image">
                            <img :src="activeEmployee.image"
                                class="w-32 h-32 rounded-[2.5rem] object-cover border-8 border-white shadow-2xl mb-4">
                        </template>
                        <h2 class="text-3xl font-black text-slate-800 tracking-tight text-center"
                            x-text="activeEmployee.name"></h2>
                        <span
                            class="px-4 py-1 bg-blue-50 text-blue-600 rounded-full text-[10px] font-black uppercase tracking-widest mt-2"
                            x-text="activeEmployee.role"></span>
                    </div>

                    {{-- Bio --}}
                    <div class="mb-10 text-center">
                        <div class="prose prose-slate prose-sm text-slate-500 leading-relaxed max-w-none italic"
                            x-html="activeEmployee.bio"></div>
                    </div>

                    {{-- Grid de Contatos e Especialidades --}}
                    <div class="space-y-6">
                        {{-- Especialidades --}}
                        <div class="flex flex-wrap justify-center gap-2">
                            <template x-if="activeEmployee.specs">
                                <template x-for="spec in activeEmployee.specs.split(',')">
                                    <span
                                        class="px-3 py-1 bg-slate-50 text-slate-400 text-[9px] font-bold rounded-lg border border-slate-100 uppercase"
                                        x-text="spec.trim()"></span>
                                </template>
                            </template>
                        </div>

                        {{-- Card de Contatos Agrupados --}}
                        <div class="bg-slate-50/50 rounded-[2.5rem] p-6 border border-slate-100 space-y-4">
                            {{-- Email --}}
                            <div class="flex items-center gap-4 group">
                                <div
                                    class="w-10 h-10 rounded-xl bg-white shadow-sm flex items-center justify-center text-slate-400 group-hover:text-blue-500 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <span class="text-xs font-bold text-slate-600" x-text="activeEmployee.email"></span>
                            </div>

                            {{-- Telefone --}}
                            <div class="flex items-center gap-4 group">
                                <div
                                    class="w-10 h-10 rounded-xl bg-white shadow-sm flex items-center justify-center text-slate-400 group-hover:text-green-500 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                </div>
                                <span class="text-xs font-bold text-slate-600" x-text="activeEmployee.phone"></span>
                            </div>

                            {{-- Instagram --}}
                            <div class="flex items-center gap-4 group">
                                <div
                                    class="w-10 h-10 rounded-xl bg-white shadow-sm flex items-center justify-center text-slate-400 group-hover:text-pink-500 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                                    </svg>
                                </div>
                                <span class="text-xs font-bold text-slate-600"
                                    x-text="activeEmployee.insta || '@espacoterapeutico'"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
