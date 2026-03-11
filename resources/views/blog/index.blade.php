<x-app-layout page-title="Blog">
    <div class="min-h-screen bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            {{-- header --}}
            <div class="text-center mb-8 mt-20">
                <h1 class="text-4xl font-bold text-gray-900">Blog</h1>
                <p class="mt-4 text-xl text-gray-600">Conteúdos educativos sobre desenvolvimento infantil.</p>
                <div class="w-20 h-1 bg-blue-500 mx-auto mt-6 rounded-full"></div>
            </div>

            {{-- Grid de Artigos --}}
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($posts as $post)
                    <article
                        class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 flex flex-col">
                        {{-- Placeholder de Imagem --}}
                        <div
                            class="h-48 bg-gray-200 w-full flex items-center justify-center text-gray-400 group relative">
                            @if ($post->image_url)
                                <img src="{{ asset('storage/' . $post->image_url) }}" alt="{{ $post->title }}"
                                    class="w-full h-full object-cover">
                            @else
                                <div class="flex flex-col items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mb-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <span>Imagem do Artigo</span>
                                </div>
                            @endif
                        </div>

                        <div class="p-6 flex-grow flex flex-col">
                            {{-- Título --}}
                            <h3 class="text-xl font-bold text-gray-900 mb-2 line-clamp-2">
                                <a href="{{ route('blog.show', $post->slug) }}"
                                    class="hover:text-orange-500 transition">
                                    {{ $post->title }}
                                </a>
                            </h3>

                            {{-- Data --}}
                            <p class="text-sm text-gray-500 mb-4">
                                {{ $post->published_at->format('d/m/Y') }}
                            </p>

                            {{-- Prévia do Conteúdo --}}
                            <p class="text-gray-600 mb-4 line-clamp-3 text-sm">
                                {{ Str::limit($post->content, 150) }}
                            </p>

                            {{-- Link de Leitura --}}
                            <div class="mt-auto">
                                <a href="{{ route('blog.show', $post->slug) }}"
                                    class="text-blue-600 font-bold hover:underline inline-flex items-center gap-1">
                                    Ler mais <span>&rarr;</span>
                                </a>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="col-span-full text-center py-20">
                        <p class="text-gray-500 text-lg">Nenhum artigo publicado no momento.</p>
                    </div>
                @endforelse
            </div>

            {{-- pagination --}}
            <div class="mt-12 flex justify-center items-center">
                <nav role="navigation" aria-label="Pagination Navigation"
                    class="flex items-center justify-center mt-4 space-x-2">
                    @if ($posts->onFirstPage())
                        <span class="px-3 py-2 text-gray-300 cursor-not-allowed">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7" />
                            </svg>
                        </span>
                    @else
                        <a href="{{ $posts->previousPageUrl() }}"
                            class="px-3 py-2 text-gray-500 hover:text-orange-500 transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7" />
                            </svg>
                        </a>
                    @endif

                    {{-- number of pages --}}
                    <div class="flex itens-center bg-white shadow-sm boder border-gray-100 rounded-full px py-1">
                        @foreach ($posts->getUrlRange(1, $posts->lastPage()) as $page => $url)
                            @if ($page == $posts->currentPage())
                                <span
                                    class="w-10 h-10 flex items-center justify-center rounded-full bg-orange-500 text-white font-bold shadow-md shadow-orange-200 transition-all">
                                    {{ $page }}
                                </span>
                            @else
                                <a href="{{ $url }}"
                                    class="w-10 h-10 flex items-center justify-center rounded-full text-gray-500 hover:bg-orange-50 hover:text-orange-500 transition-all duration-300">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach
                    </div>

                    {{-- next page --}}
                    @if ($posts->hasMorePages())
                        <a href="{{ $posts->nextPageUrl() }}"
                            class="px-3 py-2 text-gray-500 hover:text-orange-500 transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    @else
                        <span class="px-3 py-2 text-gray-300 cursor-not-allowed">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </span>
                    @endif

                </nav>
            </div>
            {{-- Botão Voltar --}}
            <div class="mt-14 text-center">
                <a href="/"
                    class="text-slate-500 hover:text-blue-600 font-medium transition-colors flex items-center justify-center gap-2 group">
                    <span class="group-hover:-translate-x-1 transition-transform">&larr;</span> Voltar para Home
                </a>
            </div>
        </div>
    </div>
    </x-layout-page>
