@extends('layouts.app')

@section('content')
    <section class="mt-44">
        <h2 class="text-3xl font-bold text-center text-white mb-16">Categories</h2>
        <h2 class="text-3xl font-bold text-center text-white mb-20">Sport</h2>

        @if (!($isShortsOnly ?? false))
            @include('components.article-list', ['posts' => $articles])
        @else
            <div class="grid md:grid-cols-2">
                @foreach ($shorts as $short)
                    <article
                        class="flex flex-col md:flex-row gap-6 w-full md:w-[60%] mx-auto overflow-hidden shadow-lg bg-white dark:bg-black border border-gray-700 hover:scale-[1.02] transition duration-300">

                        <img src="{{ asset('storage/' . $short->image) }}" alt="{{ $short->title }}"
                            class="w-full md:w-64 h-48 md:h-64 object-cover">
                        <div class="p-4 flex flex-col justify-between h-full">
                            <div>
                                <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-2">{{ $short->title }}</h2>
                                <p class="text-sm text-gray-600 dark:text-gray-300 mb-3">
                                    {{ \Str::words(strip_tags($short->content), 40, '...') }}
                                </p>
                            </div>
                            <div class="mt-auto flex justify-between items-center">
                                <p class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($short->published_at)->format('F j, Y') }}
                                </p>
                                <a href="{{ route('articles.shortshow', $short->slug) }}"
                                    class="text-blue-600 hover:underline text-sm">Baca Selengkapnya →</a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        @endif
    </section>
@endsection