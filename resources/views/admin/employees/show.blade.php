<x-layout-page page-title="Nossa Equipe">
    {{-- Container do Alpine --}}
    <div class="min-h-screen bg-gray-50/50" x-data="{ openModal: false, activeEmployee: {} }">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            {{-- Cabeçalho --}}
            <div class="text-center mb-16 mt-20">
                <h2 class="text-blue-900/40 font-bold uppercase tracking-[0.2em] text-xs mb-2">Quem cuida com afeto</h2>
                <h1 class="text-4xl md:text-5xl font-black text-slate-900 tracking-tighter">Nossa Equipe <span
                        class="text-blue-600">Especializada</span></h1>
                <div class="w-20 h-1.5 bg-orange-500 mx-auto mt-6 rounded-full"></div>
            </div>

            {{-- Grid de Funcionários --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach ($employees as $employee)
                    <div @click="activeEmployee = { 
                            name: '{{ $employee->name }}', 
                            role: '{{ $employee->role }}',
                            bio: `{!! $employee->bio !!}`, 
                            image: '{{ $employee->image_path ? asset('storage/' . $employee->image_path) : asset('assets/images/default-user.png') }}',
                            instagram: '{{ $employee->instagram_handle }}',
                            specs: '{{ $employee->specialties }}'
                         }; openModal = true"
                        class="cursor-pointer group relative bg-white rounded-[2.5rem] p-6 border border-slate-100 shadow-xl shadow-slate-200/50 hover:shadow-blue-900/10 hover:-translate-y-2 transition-all duration-500 overflow-hidden">

                        {{-- Foto com Círculo Decorativo --}}
                        <div
                            class="relative w-full aspect-square mb-6 rounded-[2rem] overflow-hidden border-4 border-slate-50 shadow-inner">
                            <img src="{{ $employee->image_path ? asset('storage/' . $employee->image_path) : asset('assets/images/default-user.png') }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">

                            {{-- Badge de Especialidade Flutuante --}}
                            @php $firstSpec = explode(',', $employee->specialties)[0]; @endphp
                            <div class="absolute bottom-4 left-4 right-4">
                                <span
                                    class="bg-white/90 backdrop-blur-md text-blue-600 text-[10px] font-black uppercase tracking-widest px-4 py-2 rounded-xl shadow-sm block text-center">
                                    {{ $firstSpec }}
                                </span>
                            </div>
                        </div>

                        {{-- Infos Rápidas --}}
                        <div class="text-center">
                            <h3
                                class="text-xl font-bold text-slate-800 mb-1 group-hover:text-blue-600 transition-colors">
                                {{ $employee->name }}</h3>
                            <p class="text-sm text-slate-400 font-medium mb-4">{{ $employee->role }}</p>

                            <span
                                class="text-xs font-bold text-orange-500 border-b-2 border-orange-100 group-hover:border-orange-500 transition-all pb-1">Ver
                                perfil completo +</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- MODAL DE EXPANSÃO (O "SHOW" PROFISSIONAL) --}}
        <div x-show="openModal" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
            class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-md"
            style="display: none;">

            <div @click.away="openModal = false"
                class="bg-white rounded-[3rem] max-w-3xl w-full shadow-2xl relative overflow-hidden">
                {{-- Botão Fechar --}}
                <button @click="openModal = false"
                    class="absolute top-6 right-6 z-20 text-slate-300 hover:text-red-500 transition-colors text-3xl font-light">&times;</button>

                <div class="flex flex-col md:flex-row h-full">
                    {{-- Lado da Imagem --}}
                    <div class="md:w-1/3 bg-slate-50 relative">
                        <img :src="activeEmployee.image" class="w-full h-full object-cover">
                        {{-- Link Instagram --}}
                        <template x-if="activeEmployee.instagram">
                            <a :href="'https://instagram.com/' + activeEmployee.instagram.replace('@', '')"
                                target="_blank"
                                class="absolute bottom-6 left-1/2 -translate-x-1/2 bg-white px-4 py-2 rounded-full shadow-lg flex items-center gap-2 text-xs font-bold text-pink-600 hover:scale-105 transition">
                                <i data-lucide="instagram" class="w-4 h-4"></i> Instagram
                            </a>
                        </template>
                    </div>

                    {{-- Lado do Conteúdo --}}
                    <div class="md:w-2/3 p-10 md:p-14">
                        <h2 class="text-3xl font-black text-slate-800 tracking-tighter mb-2"
                            x-text="activeEmployee.name"></h2>
                        <p class="text-blue-600 font-bold mb-6 text-lg" x-text="activeEmployee.role"></p>

                        <div class="space-y-6">
                            <div>
                                <h4 class="text-[10px] font-black text-slate-300 uppercase tracking-[0.2em] mb-3">Sobre
                                    a Profissional</h4>
                                <div class="prose prose-slate prose-sm max-h-48 overflow-y-auto pr-4 custom-scrollbar text-slate-500 leading-relaxed"
                                    x-html="activeEmployee.bio"></div>
                            </div>

                            <div>
                                <h4 class="text-[10px] font-black text-slate-300 uppercase tracking-[0.2em] mb-3">
                                    Especialidades</h4>
                                <div class="flex flex-wrap gap-2">
                                    <template x-if="activeEmployee.specs">
                                        <template x-for="spec in activeEmployee.specs.split(',')">
                                            <span
                                                class="bg-blue-50 text-blue-600 px-3 py-1 rounded-lg text-[10px] font-bold"
                                                x-text="spec.trim()"></span>
                                        </template>
                                    </template>
                                </div>
                            </div>
                        </div>

                        <div class="mt-10">
                            <a href="https://wa.me/5562982553592"
                                class="inline-block bg-orange-500 text-white font-bold py-4 px-8 rounded-2xl shadow-lg shadow-orange-100 hover:bg-slate-900 transition-all">
                                Agendar com esta profissional
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout-page>
