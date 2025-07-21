@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-24 px-4 py-16 text-white max-w-4xl">

        <!-- Judul Artikel -->
        <h1 class="text-4xl md:text-5xl font-bold mb-4">{{ $article->title }}</h1>

        <!-- Tanggal Publikasi -->
        <p class="text-sm text-gray-400 mb-8">
            Dipublikasikan {{ $article->created_at->format('d M Y') }}
        </p>


        @if(count($mediaItems) > 0)
            <div class="relative w-full overflow-hidden mb-10">
                <div id="sliderWrapper" class="flex w-full transition-transform duration-500 ease-in-out">
                    @foreach ($mediaItems as $media)
                        <div class="min-w-full flex-shrink-0">
                            @if ($media->media_type === 'image')
                                <img src="{{ asset('storage/' . $media->file_path) }}"
                                    class="w-full max-h-[calc(100vh-10rem)] h-auto object-contain rounded-xl mx-auto">
                            @elseif ($media->media_type === 'video')
                                <video class="w-full max-h-[calc(100vh-10rem)] h-auto rounded-xl mx-auto" controls>
                                    <source src="{{ asset('storage/' . $media->file_path) }}" type="video/mp4">
                                </video>
                            @endif
                        </div>
                    @endforeach
                </div>


                <!-- Navigasi -->
                <button id="prevSlide"
                    class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white px-3 py-1 rounded-full hover:bg-opacity-75 z-10">
                    &larr;
                </button>
                <button id="nextSlide"
                    class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white px-3 py-1 rounded-full hover:bg-opacity-75 z-10">
                    &rarr;
                </button>
            </div>
        @else
            @if ($article->image)
                <div class="w-full mb-10">
                    <img src="{{ asset('storage/' . $article->image) }}"
                        class="w-full max-h-[calc(100vh-10rem)] h-auto object-contain rounded-xl mx-auto" alt="{{ $article->title }}">
                </div>
            @endif
        @endif

        <!-- Konten Artikel -->
        <div class="prose prose-invert max-w-none leading-relaxed text-lg">
            {!! $article->content !!}
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>

@endsection