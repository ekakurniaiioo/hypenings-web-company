@extends('layouts.app')

@section('content')
    <section class="mt-44">
        <h2 class="text-3xl font-bold text-center text-white mb-16">Categories</h2>
        <h2 class="text-3xl font-bold text-center text-white mb-12">Music</h2>

        @if (!($isShortsOnly ?? false))
            @include('components.article-list', ['posts' => $articles])
        @else
            <div class="flex flex-col items-center gap-10 px-4 md:px-6 lg:px-0 mt-24">
                @foreach ($shorts as $short)
                    <article
                        class="group w-full max-w-5xl flex flex-col md:flex-row items-stretch overflow-hidden rounded-2xl border border-gray-200 dark:border-gray-700 shadow-lg bg-white dark:bg-neutral-900 transition hover:scale-[1.015] hover:shadow-xl duration-300">

                        {{-- Gambar --}}
                        <img src="{{ asset('storage/' . $short->image) }}" alt="{{ $short->title }}"
                            class="w-full md:w-auto h-56 md:h-80 object-cover transition duration-300 group-hover:brightness-95">

                        {{-- Konten --}}
                        <div class="p-6 flex flex-col justify-between">
                            <div>
                                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white group-hover:underline transition">
                                    {{ $short->title }}
                                </h2>
                                <p class="text-sm text-gray-600 dark:text-gray-300 mt-3 leading-relaxed">
                                    {{ \Str::words(strip_tags($short->content), 40, '...') }}
                                </p>
                            </div>

                            <div class="mt-6 flex items-center justify-between text-sm text-gray-500 dark:text-gray-400">
                                <span>{{ \Carbon\Carbon::parse($short->published_at)->format('F j, Y') }}</span>
                                <a href="{{ route('articles.shortshow', $short->slug) }}"
                                    class="text-blue-600 dark:text-yellow-400 hover:underline font-medium">
                                    Baca Selengkapnya →
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        @endif
    </section>

    {{-- === Pagination === --}}
    <div class="flex justify-center mt-10 items-center gap-2 text-sm">
        @if (!$shorts->onFirstPage())
            <a href="{{ $shorts->previousPageUrl() }}"
                class="px-3 py-1.5 rounded-md border border-gray-300 bg-white dark:bg-neutral-800 text-gray-700 dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-neutral-700 transition">
                ←
            </a>
        @endif

        @foreach ($shorts->links()->elements[0] as $page => $url)
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
@endsection