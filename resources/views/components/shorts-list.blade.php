<div id="article-container" class="transition-opacity duration-300 opacity-100">
    @if($shorts->isEmpty())
        <p class="text-red-500 text-center">Tidak ada artikel ditemukan.</p>
    @else
<div class="grid grid-cols-2 gap-4 sm:px-4 md:grid-cols-3 lg:grid-cols-4 px-6 md:px-8 lg:px-12">
    @foreach ($shorts as $short)
        <div class="group flex flex-col overflow-hidden border border-gray-200 dark:border-gray-700 
                   shadow-md bg-white dark:bg-neutral-900 transition hover:scale-[1.02] hover:shadow-lg duration-300
                   w-full">

            {{-- Thumbnail --}}
            <a href="{{ route('articles.shortshow', $short->slug) }}"
               class="block w-full h-[460px] bg-black overflow-hidden relative">

                <img src="{{ asset('storage/' . $short->image) }}" 
                     class="w-full h-full object-cover object-center"
                     alt="{{ $short->title }}">
            </a>

            {{-- Konten ringkas --}}
            <div class="p-4 flex flex-col flex-1">
                <h2 class="text-base font-semibold text-gray-900 dark:text-white line-clamp-2">
                    {{ $short->title }}
                </h2>

                <p class="text-xs text-gray-600 dark:text-gray-300 mt-2 line-clamp-2">
                    {{ \Str::words(strip_tags($short->content), 12, '...') }}
                </p>

                <div class="mt-3 flex justify-between items-center text-xs text-gray-500 dark:text-gray-400">
                    <span>{{ \Carbon\Carbon::parse($short->published_at)->format('M j, Y') }}</span>
                    <a href="{{ route('articles.shortshow', $short->slug) }}"
                       class="text-blue-600 dark:text-yellow-400 hover:underline font-medium">
                        Read →
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>



        {{-- === Pagination === --}}
        <div class="flex justify-center mt-10 items-center gap-2 text-sm">
            @if (method_exists($shorts, 'onFirstPage') && !$shorts->onFirstPage())
                <a href="{{ $shorts->previousPageUrl() }}"
                    class="px-3 py-1.5 rounded-md border border-gray-300 bg-white dark:bg-neutral-800 text-gray-700 dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-neutral-700 transition">
                    ←
                </a>
            @endif

            @php
                $paginationElements = method_exists($shorts, 'links') ? $shorts->links()->elements[0] ?? [] : [];
            @endphp

            @foreach ($paginationElements as $page => $url)
                <a href="{{ $url }}"
                    class="px-3 py-1.5 rounded-md border text-sm font-semibold transition-all duration-300
                                                                                                                                                        {{ $shorts->currentPage() == $page
                    ? 'bg-blue-600 text-white border-blue-600 hover:bg-blue-700'
                    : 'bg-white dark:bg-neutral-800 text-gray-700 dark:text-gray-100 border-gray-300 hover:bg-gray-100 dark:hover:bg-neutral-700' }}">
                    {{ $page }}
                </a>
            @endforeach

            @if ($shorts->hasMorePages())
                <a href="{{ $shorts->nextPageUrl() }}"
                    class="px-3 py-1.5 rounded-md border border-gray-300 bg-white dark:bg-neutral-800 text-gray-700 dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-neutral-700 transition">
                    →
                </a>
            @endif
        </div>
    @endif
</div>