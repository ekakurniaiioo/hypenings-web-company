@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 text-white">
  <h1 class="text-3xl font-bold mb-6">Daftar Artikel</h1>

  <div class="space-y-6">
    @foreach ($articles as $article)
      <div class="flex gap-4 bg-black/60 p-4 rounded-lg">
        <img src="{{ asset('storage/' . $article->image) }}" class="w-40 h-24 object-cover rounded" alt="{{ $article->title }}">
        <div>
          <h2 class="text-xl font-bold">{{ $article->title }}</h2>
          <p class="text-sm text-gray-300">{{ $article->content }}</p>
          <a href="{{ route('artikel.show', $article->slug) }}" class="text-blue-400 hover:underline">
            Baca Selengkapnya →
          </a>
        </div>
      </div>
    @endforeach
  </div>

  <div class="mt-8">
    {{ $articles->links() }}
  </div>
</div>
@endsection
