@extends('layouts.app')

@section('content')
<section class="mt-24">
    <h2 class="text-3xl font-bold text-center text-white mb-16">Categories</h2>
    <h2 class="text-3xl font-bold text-center text-white mb-12">Other</h2>

<div id="article-container" class="transition-opacity duration-300 opacity-100">
    @include('components.article-list', ['posts' => $posts])
</div>

    </div>
</section>
@endsection

@push('scripts')
<script>
    document.addEventListener('click', function (e) {
        if (e.target.matches('.pagination-link')) {
            e.preventDefault();
            const url = e.target.getAttribute('href');
            const container = document.querySelector('#article-container');

            container.classList.add('opacity-0', 'transition-opacity', 'duration-300');

            fetch(url, {
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(response => response.text())
            .then(html => {
                setTimeout(() => {
                    container.innerHTML = html;

                    container.classList.remove('opacity-0');
                    container.classList.add('opacity-100');
                }, 300);

                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        }
    });
</script>
@endpush



