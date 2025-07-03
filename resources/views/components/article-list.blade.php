<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
    <div class="flex flex-col items-center gap-8">
        @foreach ($posts as $post)
            <article class="flex flex-col md:flex-row gap-6 w-full md:w-[60%] overflow-hidden shadow-lg bg-white dark:bg-black border border-gray-700 hover:scale-[1.02] transition-transform duration-300">
                <img src="{{ asset('image/article5.jpeg') }}" class="w-full md:w-64 h-48 md:h-64 object-cover" alt="">
                <div class="p-4">
                    <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-2">{{ $post->title }}</h2>
                    <p class="text-sm text-gray-600 dark:text-gray-300 mb-3">{{ Str::limit($post->content, 120) }}</p>
                    <a href="#" class="text-blue-600 hover:underline text-sm">Baca Selengkapnya →</a>
                </div>
            </article>
        @endforeach
    </div>
    
    <!-- Tailwind Pagination -->
    <div class="flex justify-center mt-8 space-x-2">
        @foreach ($posts->links()->elements[0] as $page => $url)
            <a href="{{ $url }}" 
                class="pagination-link px-3 py-1 border rounded 
                    {{ $posts->currentPage() == $page ? 'bg-blue-600 text-white' : 'bg-white text-gray-700 hover:bg-blue-100' }}">
                {{ $page }}
            </a>
            </div>
        @endforeach
    
</body>
</html>