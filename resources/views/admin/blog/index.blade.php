<x-app-layout>
    {{-- Container com Alpine.js --}}
    <div class="py-12 pt-32" x-data="{ openPreview: false, activePost: {} }">
        <div class="max-w-7xl px-4 mx-auto sm:px-6 lg:px-8">
            <div class="mb-8 px-4 flex justify-between items-end">
                <div>
                    <h2 class="text-3xl font-bold text-slate-800 tracking-tight">Gerenciar Blogs</h2>
                    <p class="text-slate-500 mt-2">Visualize e organize os artigos do Espaço Terapêutico.</p>
                </div>
                <div class="flex gap-4">
                    <a href="{{ route('blog.index') }}"
                        class="bg-white border border-slate-200 text-slate-700 px-6 py-2 rounded-xl font-bold hover:bg-slate-50 transition">
                        Ver no Site
                    </a>
                    <a href="{{ route('admin.blog.create') }}"
                        class="bg-slate-900 text-white px-6 py-2 rounded-xl font-bold hover:bg-orange-500 transition shadow-lg shadow-slate-200">
                        + Novo Artigo
                    </a>
                </div>
            </div>

            <div
                class="bg-white/60 backdrop-blur-xl border border-white/40 rounded-[2.5rem] shadow-xl shadow-blue-900/5 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50/50 border-b border-slate-100">
                                <th class="px-8 py-5 text-xs font-bold uppercase tracking-widest text-slate-400">Título
                                </th>
                                <th class="px-8 py-5 text-xs font-bold uppercase tracking-widest text-slate-400">
                                    Categoria</th>
                                <th class="px-8 py-5 text-xs font-bold uppercase tracking-widest text-slate-400">Data
                                </th>
                                <th class="px-6 py-4 text-xs font-bold uppercase text-slate-400 text-right">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            @foreach ($posts as $post)
                                <tr class="hover:bg-blue-50/30 transition-colors group">
                                    <td class="px-8 py-6">
                                        <div class="flex items-center gap-3">
                                            {{-- Botão de Visualização Rápida --}}
                                            <button
                                                @click="activePost = { 
                                                title: '{{ $post->title }}', 
                                                content: `{!! $post->content !!}`, 
                                                image: '{{ $post->image_url ? asset('storage/' . $post->image_url) : '' }}',
                                                category: '{{ $post->category ?? 'Geral' }}',
                                                date: '{{ $post->created_at->format('d/m/Y') }}'
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
                                            <span class="text-sm font-bold text-slate-700">{{ $post->title }}</span>
                                        </div>
                                    </td>
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
                                    <td class="px-8 py-6 text-sm text-slate-500">
                                        {{ $post->created_at->format('d/m/Y') }}</td>
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

        {{-- MODAL DE PRÉVIA DO BLOG --}}
        <div x-show="openPreview" x-transition.opacity
            class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-slate-900/40 backdrop-blur-sm"
            style="display: none;">

            <div @click.away="openPreview = false"
                class="bg-white rounded-[2.5rem] max-w-3xl w-full shadow-2xl overflow-hidden max-h-[90vh] flex flex-col">

                {{-- Header do Modal --}}
                <div class="p-6 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
                    <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest"
                        x-text="activePost.category + ' • ' + activePost.date"></span>
                    <button @click="openPreview = false"
                        class="text-slate-400 hover:text-red-500 transition text-2xl">&times;</button>
                </div>

                {{-- Conteúdo do Modal (Scrollable) --}}
                <div class="p-8 md:p-12 overflow-y-auto custom-scrollbar">
                    <template x-if="activePost.image">
                        <img :src="activePost.image" class="w-full h-64 object-cover rounded-3xl mb-8 shadow-lg">
                    </template>

                    <h2 class="text-3xl font-black text-slate-800 tracking-tighter mb-6" x-text="activePost.title"></h2>

                    <div class="prose prose-blue max-w-none text-slate-600" x-html="activePost.content"></div>
                </div>

                {{-- Footer do Modal --}}
                <div class="p-6 border-t border-slate-100 flex justify-end bg-slate-50/50">
                    <button @click="openPreview = false"
                        class="bg-slate-900 text-white px-8 py-3 rounded-xl font-bold hover:bg-blue-600 transition">
                        Fechar Prévia
                    </button>
                </div>
            </div>
        </div>
    </div>

    <style>
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1l1f1;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }
    </style>
</x-app-layout>
