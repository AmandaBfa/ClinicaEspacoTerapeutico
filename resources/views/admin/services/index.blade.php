<x-app-layout>
    <div class="py-12 pt-32">
        <div class="max-w-7xl px-4 mx-auto sm:px-6 lg:px-8">
            <div class="mb-8 px-4">
                <h2 class="text-3xl font-bold text-slate-800 tracking-tight">Gerenciar Serviços</h2>
                <p class="text-slate-500 mt-2">Gerencie os serviços</p>
                <div class="flex justify-end items-end gap-6">
                    {{-- <a href="{{ route('services.indexPublic') }}"
                        class="bg-slate-900 text-white px-6 py-2 rounded-xl font-bold hover:bg-orange-500 transition">
                        Ver Serviços no Site
                    </a> --}}
                    <a href="{{ route('admin.services.create') }}"
                        class="bg-slate-900 text-white px-6 py-2 rounded-xl font-bold hover:bg-orange-500 transition">
                        + Novo Serviço
                    </a>
                </div>
            </div>

            <div
                class="bg-white/60 backdrop-blur-xl border border-white/40 rounded-[2.5rem] shadow-xl shadow-blue-900/5 overflow-hidden">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-slate-50/50 border-b border-gray-100">
                        <tr class="bg-slate-50/50 border-b border-slate-100">
                            <th class="px-8 py-5 text-sm font-bold text-slate-600 uppercase">Serviço</th>
                            <th class="px-8 py-5 text-sm font-bold text-slate-600 uppercase">Duração</th>
                            <th class="px-8 py-5 text-sm font-bold text-slate-600 uppercase">Preço</th>
                            <th class="px-8 py-5 text-sm font-bold text-slate-600 uppercase text-right">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @foreach ($services as $service)
                            <tr class="hover:bg-blue-50/30 transition-colors">
                                <td class="px-8 py-6 font-bold text-slate-800">{{ $service->name }}</td>
                                <td class="px-8 py-6 text-slate-500">{{ $service->duration_minutes }} min</td>
                                <td class="px-8 py-6 text-blue-600 font-bold">R$
                                    {{ number_format($service->price, 2, ',', '.') }}</td>
                                <td class="px-8 py-6 text-right flex justify-end gap-3">
                                    <a href="{{ route('admin.services.edit', $service->id) }}"
                                        class="p-2 text-orange-500 hover:bg-orange-50 transition-all rounded-xl">Editar</a>
                                    <form action="{{ route('admin.services.delete', $service->id) }}" method="POST"
                                        onsubmit="return confirm('Tem certeza que deseja excluir?')">
                                        @csrf @method('DELETE')
                                        <button type="submit"
                                            class="p-2 text-red-500 hover:bg-red-50 transition-all rounded-xl">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
s
