<x-app-layout>
    <div class="py-12 pt-32" x-data="{ openPreview: false, activeEmployee: {} }">
        <div class="max-w-7xl px-4 mx-auto sm:px-6 lg:px-8">

            {{-- Cabeçalho --}}
            <div class="mb-8 px-4 flex justify-between items-end">
                <div>
                    <h2 class="text-3xl font-bold text-slate-800 tracking-tight">Equipe Clínica</h2>
                    <p class="text-slate-500 mt-2">Gerencie os profissionais que atuam no Espaço Terapêutico.</p>
                </div>
                <a href="{{ route('admin.employees.create') }}"
                    class="bg-slate-900 text-white px-6 py-2 rounded-xl font-bold hover:bg-orange-500 transition shadow-lg shadow-slate-200">
                    + Novo Profissional
                </a>
            </div>

            {{-- Container da Tabela --}}
            <div
                class="bg-white/60 backdrop-blur-xl border border-white/40 rounded-[2.5rem] shadow-xl shadow-blue-900/5 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50/50 border-b border-slate-100">
                                <th class="px-8 py-5 text-xs font-bold uppercase tracking-widest text-slate-400">
                                    Profissional</th>
                                <th class="px-8 py-5 text-xs font-bold uppercase tracking-widest text-slate-400">Cargo /
                                    Função</th>
                                <th class="px-8 py-5 text-xs font-bold uppercase tracking-widest text-slate-400">
                                    Especialidades</th>
                                <th class="px-6 py-4 text-xs font-bold uppercase text-slate-400 text-right">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            @forelse ($employees as $employee)
                                <tr class="hover:bg-blue-50/30 transition-colors group">
                                    <td class="px-8 py-6">
                                        <div class="flex items-center gap-4">
                                            {{-- Prévia da Foto --}}
                                            <div
                                                class="w-12 h-12 rounded-full overflow-hidden border-2 border-white shadow-sm flex-shrink-0">
                                                <img src="{{ $employee->image_path ? asset('storage/' . $employee->image_path) : asset('assets/images/default-user.png') }}"
                                                    class="w-full h-full object-cover" alt="{{ $employee->name }}">
                                            </div>

                                            <div class="flex flex-col">
                                                <span
                                                    class="text-sm font-bold text-slate-700">{{ $employee->name }}</span>
                                                <span
                                                    class="text-[10px] text-slate-400 italic">{{ $employee->instagram_handle ?? 'Sem Instagram' }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-8 py-6">
                                        <span class="text-sm text-slate-600 font-medium">{{ $employee->role }}</span>
                                    </td>
                                    <td class="px-8 py-6">
                                        <div class="flex flex-wrap gap-1">
                                            @foreach (explode(',', $employee->specialties) as $spec)
                                                <span
                                                    class="px-2 py-0.5 bg-blue-50 text-blue-500 text-[9px] font-bold rounded-md uppercase">
                                                    {{ trim($spec) }}
                                                </span>
                                            @endforeach
                                        </div>
                                    </td>
                                    <td class="px-8 py-6 text-right flex justify-end gap-3 items-center">
                                        {{-- Botão Olhinho (Preview) --}}
                                        <button
                                            @click="activeEmployee = { 
                                            name: '{{ $employee->name }}', 
                                            role: '{{ $employee->role }}',
                                            bio: `{!! $employee->bio !!}`, 
                                            image: '{{ $employee->image_path ? asset('storage/' . $employee->image_path) : '' }}',
                                            specs: '{{ $employee->specialties }}'
                                        }; openPreview = true"
                                            class="p-2 text-slate-400 hover:text-blue-600 transition">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </button>

                                        <a href="{{ route('admin.employees.edit', $employee->id) }}"
                                            class="text-orange-500 hover:underline font-bold text-sm">Editar</a>

                                        <form action="{{ route('admin.employees.delete', $employee->id) }}"
                                            method="POST" class="inline">
                                            @csrf @method('DELETE')
                                            <button class="text-red-500 hover:underline font-bold text-sm"
                                                onclick="return confirm('Remover este profissional da equipe?')">Excluir</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-8 py-10 text-center text-slate-400 italic">Nenhum
                                        profissional cadastrado ainda.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- MODAL DE PRÉVIA DO PROFISSIONAL --}}
        <div x-show="openPreview" x-transition.opacity
            class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-slate-900/40 backdrop-blur-sm"
            style="display: none;">
            <div @click.away="openPreview = false"
                class="bg-white rounded-[2.5rem] max-w-2xl w-full shadow-2xl overflow-hidden">
                <div class="p-8 md:p-12">
                    <div class="flex flex-col md:flex-row gap-8 items-center md:items-start">
                        <template x-if="activeEmployee.image">
                            <img :src="activeEmployee.image"
                                class="w-32 h-32 rounded-3xl object-cover shadow-lg border-4 border-slate-50">
                        </template>
                        <div class="flex-1 text-center md:text-left">
                            <h2 class="text-3xl font-black text-slate-800 tracking-tighter"
                                x-text="activeEmployee.name"></h2>
                            <p class="text-blue-600 font-bold mb-4" x-text="activeEmployee.role"></p>
                            <div class="prose prose-slate max-h-48 overflow-y-auto pr-2 custom-scrollbar text-sm"
                                x-html="activeEmployee.bio"></div>
                        </div>
                    </div>
                    <div class="mt-8 pt-6 border-t border-slate-100 flex justify-end">
                        <button @click="openPreview = false"
                            class="bg-slate-900 text-white px-8 py-3 rounded-xl font-bold">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
