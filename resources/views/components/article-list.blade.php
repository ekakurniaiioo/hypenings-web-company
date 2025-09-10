<div id="article-container" class="transition-opacity duration-300 opacity-100">
    @if($posts->isEmpty())
        <p class="text-red-500 text-center">Tidak ada artikel ditemukan.</p>
    @else
        <div class="flex flex-col items-center gap-10 px-4 md:px-6 lg:px-0">
            @foreach ($posts as $post)
                <article class="group w-full max-w-5xl flex flex-col md:flex-row items-stretch overflow-hidden 
                           border border-gray-200 dark:border-gray-700 shadow-lg 
                           bg-white dark:bg-neutral-900 
                           transition hover:scale-[1.015] hover:shadow-xl duration-300 rounded-xl">

                    {{-- Thumbnail --}}
                    <a href="{{ route('articles.show', $post->slug) }}" class="w-full md:w-64 flex-shrink-0">
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                            class="w-full h-56 md:h-80 object-cover transition duration-300 group-hover:brightness-95">
                    </a>

                    {{-- Content --}}
                    <div class="p-6 flex flex-col justify-between flex-1">
                        <div>
                            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white 
                                       group-hover:underline transition">
                                {{ $post->title }}
                            </h2>
                            <p class="text-sm text-gray-600 dark:text-gray-300 mt-3 leading-relaxed">
                                {{ \Str::words(strip_tags($post->content), 40, '...') }}
                            </p>
                        </div>

                        <div class="mt-6 flex items-center justify-between text-sm text-gray-500 dark:text-gray-400">
                            <span>{{ \Carbon\Carbon::parse($post->published_at)->format('F j, Y') }}</span>
                            <a href="{{ route('articles.show', $post->slug) }}"
                                class="text-blue-600 dark:text-yellow-400 hover:underline font-medium">
                                Baca Selengkapnya →
                            </a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        {{-- === Pagination === --}}
        <div class="flex justify-center mt-10 items-center gap-2 text-sm">
            @if (method_exists($posts, 'onFirstPage') && !$posts->onFirstPage())
                <a href="{{ $posts->previousPageUrl() }}"
                    class="px-3 py-1.5 rounded-md border border-gray-300 bg-white dark:bg-neutral-800 text-gray-700 dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-neutral-700 transition">
                    ←
                </a>
            @endif

            @php
                $paginationElements = method_exists($posts, 'links') ? $posts->links()->elements[0] ?? [] : [];
            @endphp

            @foreach ($paginationElements as $page => $url)
                <a href="{{ $url }}"
                    class="px-3 py-1.5 rounded-md border text-sm font-semibold transition-all duration-300
                                                        {{ $posts->currentPage() == $page
                    ? 'bg-blue-600 text-white border-blue-600 hover:bg-blue-700'
                    : 'bg-white dark:bg-neutral-800 text-gray-700 dark:text-gray-100 border-gray-300 hover:bg-gray-100 dark:hover:bg-neutral-700' }}">
                    {{ $page }}
                </a>
            @endforeach

            @if ($posts->hasMorePages())
                <a href="{{ $posts->nextPageUrl() }}"
                    class="px-3 py-1.5 rounded-md border border-gray-300 bg-white dark:bg-neutral-800 text-gray-700 dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-neutral-700 transition">
                    →
                </a>
            @endif
        </div>
    @endif
</div>