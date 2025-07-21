@php
    $posts = $posts ?? collect();
@endphp

<div id="article-container" class="transition-opacity duration-300 opacity-100">
    @if($posts->isEmpty())
        <p class="text-red-500 text-center">Tidak ada artikel ditemukan.</p>
    @else
        <div class="flex flex-col items-center gap-8">
            @foreach ($posts as $post)
                <article
                    class="article-card flex flex-col md:flex-row gap-6 w-full md:w-[60%] mx-auto overflow-hidden shadow-lg bg-white dark:bg-black border border-gray-700 hover:scale-[1.02] transition duration-300">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                        class="w-full md:w-64 h-48 md:h-64 object-cover">
                    <div class="p-4">
                        <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-2">{{ $post->title }}</h2>
                        <p class="text-sm text-gray-600 dark:text-gray-300 mb-3">
                            {{ \Str::words(strip_tags($post->content), 40, '...') }}
                        </p>
                        <p class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($post->published_at)->format('F j, Y') }}</p>
                        <a href="{{ route('articles.show', $post->slug) }}" class="text-blue-600 hover:underline text-sm">Baca
                            Selengkapnya →</a>
                    </div>
                </article>
            @endforeach
        </div>

        {{-- === Pagination === --}}
        <div class="flex justify-center mt-10 items-center gap-2">
            @if ($posts->onFirstPage() === false)
                <a href="{{ $posts->previousPageUrl() }}"
                    class="pagination-link px-3 py-1 rounded border bg-white text-gray-800 hover:bg-gray-100">
                    ←
                </a>
            @endif

            @foreach ($posts->links()->elements[0] as $page => $url)
                <a href="{{ $url }}"
                    class="pagination-link px-3 py-1 rounded border text-sm font-medium transition-all duration-300 ease-in-out
                               {{ $posts->currentPage() == $page ? 'bg-blue-600 text-white' : 'bg-white text-gray-800 hover:bg-gray-100' }}">
                    {{ $page }}
                </a>
            @endforeach

            @if ($posts->hasMorePages())
                <a href="{{ $posts->nextPageUrl() }}"
                    class="pagination-link px-3 py-1 rounded border bg-white text-gray-800 hover:bg-gray-100">
                    →
                </a>
            @endif
        </div>
    @endif
</div>