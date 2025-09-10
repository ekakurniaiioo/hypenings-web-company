<div class="max-w-7xl mx-auto flex flex-col lg:flex-row gap-16 px-4">
    <div class="w-full lg:w-2/3 flex flex-col gap-12">
        <div class="space-y-8">
            @if(count($articles))
                @foreach ($articles as $a)
                    <article
                        class="group relative flex flex-col md:flex-row gap-5 rounded-2xl border border-gray-200 dark:border-gray-700 shadow-md hover:shadow-lg overflow-hidden transition-transform duration-300 hover:scale-[1.015] bg-white dark:bg-neutral-900">
                        <div class="w-full md:w-1/3 h-64 md:h-auto">
                            <img src="{{ asset('storage/' . $a->image) }}" alt="{{ $a->title }}"
                                class="w-full h-full object-cover object-[center_20%] group-hover:brightness-90 transition duration-300" />
                        </div>
                        <div class="flex-1 p-5 flex flex-col justify-between">
                            <div>
                                <span class="inline-block text-xs uppercase text-yellow-500 font-semibold mb-2 tracking-wide">
                                    {{ $a->topic }}
                                </span>
                                <h4 class="text-base sm:text-lg font-bold text-gray-800 dark:text-white leading-snug mb-2">
                                    {{ $a->title }}
                                </h4>
                                <p class="text-sm text-gray-600 dark:text-gray-300 line-clamp-5">
                                    {{ \Str::words(strip_tags($a->content), 40, '...') }}
                                </p>
                            </div>
                            <div class="flex justify-between items-center mt-4 text-sm">
                                <span class="text-gray-500">{{ $a->published_at->format('M j, Y') }}</span>
                                <a href="{{ route('articles.show', $a->slug) }}"
                                    class="inline-block px-3 py-1 rounded-full text-sm font-medium text-white bg-yellow-400 hover:bg-yellow-600 transition">
                                    Read More →
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            @endif
        </div>
    </div>
</div>