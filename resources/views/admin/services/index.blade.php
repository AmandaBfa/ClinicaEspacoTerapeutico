<x-app-layout>
    <div class="py-12 pt-32" x-data="{ openPreview: false, activeService: {} }">
        <div class="max-w-7xl px-4 mx-auto sm:px-6 lg:px-8">
            <div class="mb-8 px-4 flex justify-between items-end">
                <div>
                    <h2 class="text-3xl font-bold text-slate-800 tracking-tight">Gerenciar Serviços</h2>
                    <p class="text-slate-500 mt-2">Visualize e organize os atendimentos da clínica.</p>
                </div>
                <div class="flex gap-6">
                    <a href="{{ route('services') }}"
                        class="bg-slate-900 text-white px-6 py-2 rounded-xl font-bold hover:bg-orange-500 transition">
                        Ver Serviços no Site
                    </a>
                    <a href="{{ route('admin.services.create') }}"
                        class="bg-slate-900 text-white px-6 py-2 rounded-xl font-bold hover:bg-orange-500 transition shadow-lg shadow-slate-200">
                        + Novo Serviço
                    </a>
                </div>
            </div>

            <div
                class="bg-white/60 backdrop-blur-xl border border-white/40 rounded-[2.5rem] shadow-xl shadow-blue-900/5 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-slate-50/50 border-b border-gray-100">
                            <tr>
                                <th class="px-8 py-5 text-sm font-bold text-slate-600 uppercase">Serviço</th>
                                <th class="px-8 py-5 text-sm font-bold text-slate-600 uppercase">Duração</th>
                                <th class="px-8 py-5 text-sm font-bold text-slate-600 uppercase">Preço</th>
                                <th class="px-8 py-5 text-sm font-bold text-slate-600 uppercase text-right">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @foreach ($services as $service)
                                <tr class="hover:bg-blue-50/30 transition-colors group">
                                    <td class="px-8 py-6 font-bold text-slate-800">
                                        <div class="flex items-center gap-3">
                                            <button
                                                @click="activeService = { 
                                                name: '{{ $service->name }}', 
                                                description: `{!! $service->description !!}`, 
                                                price: '{{ number_format($service->price, 2, ',', '.') }}',
                                                duration: '{{ $service->duration_minutes }}'
                                            }; openPreview = true"
                                                class="p-2 bg-white rounded-lg border border-slate-200 text-slate-400 hover:text-blue-600 hover:border-blue-200 transition shadow-sm">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </button>
                                            {{ $service->name }}
                                        </div>
                                    </td>
                                    <td class="px-8 py-6 text-slate-500">{{ $service->duration_minutes }} min</td>
                                    <td class="px-8 py-6 text-blue-600 font-bold">R$
                                        {{ number_format($service->price, 2, ',', '.') }}</td>
                                    <td class="px-8 py-6 text-right flex justify-end gap-3">
                                        <a href="{{ route('admin.services.edit', $service->id) }}"
                                            class="p-2 text-orange-500 hover:bg-orange-50 transition-all rounded-xl font-bold text-sm">Editar</a>

                                        <form action="{{ route('admin.services.delete', $service->id) }}" method="POST"
                                            onsubmit="return confirm('Tem certeza que deseja excluir?')">
                                            @csrf @method('DELETE')
                                            <button type="submit"
                                                class="p-2 text-red-500 hover:bg-red-50 transition-all rounded-xl font-bold text-sm">Excluir</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div x-show="openPreview" x-transition.opacity
            class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-slate-900/40 backdrop-blur-sm"
            style="display: none;">

            <div @click.away="openPreview = false"
                class="bg-white rounded-[2.5rem] max-w-2xl w-full shadow-2xl overflow-hidden">

                <div class="p-8 md:p-12">
                    <div class="flex justify-between items-start mb-6">
                        <h2 class="text-3xl font-black text-slate-800 tracking-tighter" x-text="activeService.name">
                        </h2>
                        <button @click="openPreview = false"
                            class="text-slate-300 hover:text-red-500 transition text-2xl">&times;</button>
                    </div>

                    <div class="flex gap-4 mb-8">
                        <span class="bg-blue-50 text-blue-600 px-4 py-1 rounded-full font-bold text-xs uppercase"
                            x-text="activeService.duration + ' min'"></span>
                        <span class="bg-green-50 text-green-600 px-4 py-1 rounded-full font-bold text-xs uppercase"
                            x-text="'R$ ' + activeService.price"></span>
                    </div>

                    <div class="prose prose-slate max-w-none text-slate-600 max-h-[40vh] overflow-y-auto pr-4 custom-scrollbar"
                        x-html="activeService.description">
                    </div>

                    <div class="mt-10 pt-6 border-t border-slate-100 flex justify-end">
                        <button @click="openPreview = false"
                            class="bg-slate-900 text-white px-8 py-3 rounded-xl font-bold hover:bg-blue-600 transition">
                            Fechar Visualização
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .custom-scrollbar::-webkit-scrollbar {
            width: 4px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }
    </style>
</x-app-layout>
