@extends('layouts.app')

@section('content')
    <section class="mt-44">
        <h2 class="text-3xl font-bold text-center text-white mb-16">Categories</h2>
        <h2 class="text-3xl font-bold text-center text-white mb-12">Lifestyle</h2>

        @if (!($isShortsOnly ?? false))
            @include('components.article-list', ['posts' => $articles])
        @else
            @include('components.shorts-list', ['shorts' => $shorts])
        @endif
    </section>
@endsection