@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-4 py-12 mt-32">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">{{ $short->title }}</h1>
        <p class="text-sm text-gray-400 mb-8">
            Dipublikasikan {{ $short->created_at->format('d M Y') }}
        </p>
        <video src="{{ asset('storage/' . $short->video_path) }}" class="w-full rounded-lg aspect-video mb-16" autoplay
            muted controls></video>
        <p class="mt-4 text-gray-600">{{ $short->content }}</p>
    </div>

    <div class="w-full flex justify-center mt-8">
        <div class="h-[3px] w-full max-w-7xl bg-gradient-to-r from-transparent via-yellow-400 to-transparent"></div>
    </div>

    <h2 class="text-4xl md:text-5xl text-center mb-16 mt-32 tracking-wide font-bebas text-white">
        <span class="inline-block border-b-4 border-violet-200 pb-2">More Shorts</span>
    </h2>

    <div class="flex flex-col gap-2">
        <div class="mt-16 flex flex-col lg:flex-row gap-16 px-4">
            <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
                @foreach ($moreShorts as $item)
                    <a href="{{ route('articles.shortshow', $item->slug) }}"
                        class="group block transform transition-all duration-300 hover:scale-[1.03] hover:-translate-y-1 hover:shadow-xl bg-[#141414] border border-gray-800 rounded-xl overflow-hidden">

                        <div class="aspect-[4/3] overflow-hidden">
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}"
                                class="w-full h-full object-cover object-[center_60%] transition-transform duration-300 group-hover:scale-105">
                        </div>

                        <div class="p-4">
                            <p class="text-sm text-gray-300">
                                {{ \Str::words(strip_tags($item->content), 14, '...') }}
                            </p>
                            <p class="text-xs text-gray-500 mt-3">
                                {{ \Carbon\Carbon::parse($item->published_at)->format('F j, Y') }}
                            </p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection