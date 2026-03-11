<x-app-layout>
    <div class="py-12 pt-32">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-8 px-4">
                <h2 class="text-3xl font-bold text-slate-800 tracking-tight">Gerenciar Blogs</h2>
                <p class="text-slate-500 mt-2">Gerencie os blogs</p>
                <div class="flex justify-end items-end gap-6">
                    <a href="{{ route('blog.index') }}"
                        class="bg-slate-900 text-white px-6 py-2 rounded-xl font-bold hover:bg-orange-500 transition">
                        Ver Blogs no Site
                    </a>
                    <a href="{{ route('admin.blog.create') }}"
                        class="bg-slate-900 text-white px-6 py-2 rounded-xl font-bold hover:bg-orange-500 transition">
                        + Novo Artigo
                    </a>
                </div>
            </div>

            <div
                class="bg-white/60 backdrop-blur-xl border border-white/40 rounded-[2.5rem] shadow-xl shadow-blue-900/5 overflow-hidden">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50/50 border-b border-slate-100">
                            <th class="px-8 py-5 text-xs font-bold uppercase tracking-widest text-slate-400">Título</th>
                            <th class="px-8 py-5 text-xs font-bold uppercase tracking-widest text-slate-400">Categoria
                            </th>
                            <th class="px-8 py-5 text-xs font-bold uppercase tracking-widest text-slate-400">Data</th>
                            <th class="px-6 py-4 text-xs font-bold uppercase text-slate-400 text-right">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @foreach ($posts as $post)
                            <tr class="hover:bg-blue-50/30 transition-colors">
                                <td class="px-8 py-6 text-sm text-slate-500">{{ $post->title }}</td>
                                <td class="px-8 py-6">
                                    <span
                                        class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wide 
                                        {{ $post->category == 'Saúde Mental'
                                            ? 'bg-purple-100 text-purple-600'
                                            : ($post->category == 'Dicas'
                                                ? 'bg-green-100 text-green-600'
                                                : 'bg-blue-100 text-blue-600') }}">
                                        {{ $post->category ?? 'Geral' }}
                                    </span>
                                </td>
                                <td class="px-7 py-5 text-sm text-slate-500">{{ $post->created_at->format('d/m/Y') }}
                                </td>
                                <td class="px-7 py-5 text-right space-x-2">
                                    <a href="{{ route('admin.blog.edit', $post->id) }}"
                                        class="text-blue-500 hover:underline font-bold text-sm">Editar</a>
                                    <form action="{{ route('admin.blog.delete', $post->id) }}" method="POST"
                                        class="inline">
                                        @csrf @method('DELETE')
                                        <button class="text-red-500 hover:underline font-bold text-sm"
                                            onclick="return confirm('Excluir este post?')">Excluir</button>
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
