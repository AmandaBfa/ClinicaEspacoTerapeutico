<x-layout-page :page-title="$post->title . ' - Blog'">
    <article class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        {{-- Cabeçalho do Artigo --}}
        <header class="mb-8 mt-20">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4 leading-tight">
                {{ $post->title }}
            </h1>
            <p class="text-gray-500 text-lg">
                Publicado em {{ $post->published_at->format('d/m/Y') }}
            </p>
            <p class="text-gray-500 text-l mt-1">
                Escrito por: {{ $post->author }}
            </p>
            <p class="text-gray-500 text-l mt-1">
                Categoria: {{ $post->category }}
            </p>
        </header>

        {{-- Imagem Principal --}}
        <div
            class="mb-10 rounded-xl overflow-hidden bg-gray-100 h-64 md:h-96 w-full flex items-center justify-center text-gray-400 text-xl shadow-inner">
            @if ($post->image_url)
                <img src="{{ asset('storage/' . $post->image_url) }}" alt="{{ $post->title }}"
                    class="w-full h-full object-cover">
            @else
                <div class="flex flex-col items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mb-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>Imagem Principal</span>
                </div>
            @endif
        </div>

        <div class="prose prose-lg prose-orange max-w-none text-gray-700 leading-relaxed font-sans">
            {!! $post->content !!}
        </div>

        {{-- Voltar --}}
        <div class="mt-12 pt-8 border-t border-gray-200">
            <a href="{{ route('blogPublic.index') }}"
                class="text-blue-600 font-bold hover:underline inline-flex items-center gap-2">
                <span>&larr;</span> Voltar para as publicações
            </a>
        </div>
    </article>
</x-layout-page>
