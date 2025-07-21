@extends('layouts.app')

@section('content')
    <section class="mt-44">
        <h2 class="text-3xl font-bold text-center text-white mb-16">Categories</h2>
        <h2 class="text-3xl font-bold text-center text-white mb-12">Lifestyle</h2>
        @if (!($isShortsOnly ?? false))
            {{-- Mode Artikel --}}
            @include('components.article-list', ['posts' => $articles])
        @else
            {{-- Mode Shorts --}}
            <div class="grid md:grid-cols-3 gap-6">
                @foreach ($shorts as $short)
                    <a href="{{ route('articles.shortshow', $short->slug) }}">
                        <div class="bg-white dark:bg-black border dark:border-gray-700 p-4 rounded shadow">
                            <img src="{{ asset('storage/' . $short->image) }}" class="w-full h-48 object-cover rounded mb-2">
                            <h3 class="font-bold text-lg text-gray-900 dark:text-white">{{ $short->title }}</h3>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </section>
@endsection