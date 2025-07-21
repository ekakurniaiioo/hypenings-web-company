@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-4 py-12 mt-32">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">{{ $short->title }}</h1>
        <p class="text-sm text-gray-400 mb-8">
            Dipublikasikan {{ $short->created_at->format('d M Y') }}
        </p>
        <video src="{{ asset('storage/' . $short->video_path) }}" class="w-full rounded-lg aspect-video mb-16" autoplay mutedcontrols></video>
        <p class="mt-4 text-gray-600">{{ $short->content }}</p>
    </div>
@endsection