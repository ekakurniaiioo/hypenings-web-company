@extends('layouts.app')

@section('content')
<div class="max-w-3xl md:max-w-4xl mt-24 mx-auto px-4 pt-16 pb-24 text-white">

    <!-- Judul Artikel -->
    <h1 class="text-2xl sm:text-3xl md:text-5xl font-extrabold leading-tight mb-3 text-white tracking-tight">
        {{ $article->title }}
    </h1>

    <!-- Tanggal Publikasi -->
    <p class="text-xs sm:text-sm text-gray-400 mb-8">
        Dipublikasikan pada {{ $article->created_at->format('d M Y') }}
    </p>

    @if(count($mediaItems) > 0)
        <div class="relative w-full mb-10 rounded-xl overflow-hidden ring-1 ring-white/10 shadow-xl">
            <div id="sliderWrapper" class="flex w-full transition-transform duration-500 ease-in-out">
                @foreach ($mediaItems as $media)
                    <div class="min-w-full flex-shrink-0">
                        @if (\Illuminate\Support\Str::startsWith($media->media_type, 'image'))
                            <img src="{{ asset('storage/' . $media->file_path) }}"
                                class="w-full h-auto max-h-[50vh] sm:max-h-[90vh] object-cover rounded-xl">
                        @elseif (\Illuminate\Support\Str::startsWith($media->media_type, 'video'))
                            <video class="w-full h-auto max-h-[50vh] sm:max-h-[90vh] rounded-xl" controls>
                                <source src="{{ asset('storage/' . $media->file_path) }}" type="{{ $media->media_type }}">
                            </video>
                        @endif
                    </div>
                @endforeach
            </div>

            <!-- Tombol Navigasi -->
            <button id="prevSlide"
                class="absolute left-2 top-1/2 -translate-y-1/2 bg-yellow-400/20 hover:bg-yellow-400/40 text-black px-2 py-1 sm:px-3 sm:py-2 rounded-full shadow-md backdrop-blur-sm z-10">
                &larr;
            </button>
            <button id="nextSlide"
                class="absolute right-2 top-1/2 -translate-y-1/2 bg-yellow-400/20 hover:bg-yellow-400/40 text-black px-2 py-1 sm:px-3 sm:py-2 rounded-full shadow-md backdrop-blur-sm z-10">
                &rarr;
            </button>
        </div>
    @elseif ($article->image)
        <div class="w-full mb-10 rounded-xl overflow-hidden shadow-xl ring-1 ring-white/10">
            <img src="{{ asset('storage/' . $article->image) }}"
                class="w-full h-auto max-h-[50vh] sm:max-h-[90vh] object-cover rounded-xl" alt="{{ $article->title }}">
        </div>
    @endif

    <!-- Konten Artikel -->
    <article
        class="prose prose-invert max-w-none text-base sm:text-lg md:text-xl leading-relaxed tracking-wide space-y-5">
        {!! $article->content !!}
    </article>
</div>


<div class="w-full flex justify-center mt-8">
    <div class="h-[3px] w-full max-w-7xl bg-gradient-to-r from-transparent via-yellow-400 to-transparent"></div>
</div>

<h2 class="text-4xl md:text-5xl text-center mb-16 mt-52 tracking-wide font-bebas text-white">
    <span class="inline-block border-b-4 border-violet-200 pb-2">More Articles</span>
</h2>

<div class="flex flex-col gap-2">
    <div class="mt-16 flex flex-col lg:flex-row gap-16 px-4">
        <!-- More -->
        <div class="max-w-3xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12">
            @foreach ($articles as $article)
                <a href="{{ route('articles.show', $article->slug) }}"
                    class="group block transform transition-all duration-300 hover:scale-[1.03] hover:-translate-y-1 hover:shadow-xl bg-[#141414] border border-gray-800 rounded-xl overflow-hidden">

                    <div class="aspect-[4/3] overflow-hidden">
                        <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}"
                            class="w-full h-full object-cover object-[center_60%] transition-transform duration-300 group-hover:scale-105">
                    </div>

                    <div class="p-4">
                        <p class="text-sm text-gray-300">
                            {{ \Str::words(strip_tags($article->content), 14, '...') }}
                        </p>
                        <p class="text-xs text-gray-500 mt-3">
                            {{ \Carbon\Carbon::parse($article->published_at)->format('F j, Y') }}
                        </p>
                    </div>
                </a>
            @endforeach
        </div>

        <!-- Topik -->
        <div class="hidden lg:block lg:w-1/3 mr-24">
            <div class="flex flex-col gap-10 backdrop-blur-md bg-white/5 rounded-xl border border-white/10 p-6">
                @foreach ($topicArticles as $a)
                    <div
                        class="flex items-start gap-4 border-b border-white/10 py-2 group hover:bg-white/5 rounded-lg transition-all duration-300">
                        <div
                            class="w-10 h-10 flex items-center justify-center font-bold rounded-full
                                        bg-gray-800 text-white transition-all duration-300
                                        group-hover:bg-gradient-to-r group-hover:from-yellow-300 group-hover:via-yellow-400 group-hover:to-amber-500 group-hover:text-black">
                            {{ $loop->iteration }}
                        </div>

                        <a href="{{ route('articles.show', $a->slug) }}" class="flex-1">
                            <p
                                class="text-sm text-white font-medium leading-snug mb-6 transition-all duration-300 group-hover:text-yellow-300 group-hover:translate-x-1">
                                {{ \Str::limit($a->content, 60) }}
                            </p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>