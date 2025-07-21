<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hypenings</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.4.2/p5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.topology.min.js"></script>
</head>

<body class="relative bg-[#141414] text-white overflow-x-hidden">
    <!-- Navbar -->
    <nav id="navbar"
        class="border-gray-200 bg-zinc-950 bg-opacity-90 fixed w-full z-50 top-0 h-24 transition-transform duration-500 ease-in-out">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
            <div class="flex justify-between h-16 items-center">

                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="/admin">
                        <img class="h-24 w-auto" src="{{ asset('image/hype.png') }}" alt="Logo">
                    </a>
                </div>

                <!-- Desktop Links -->
                <div class="hidden md:flex gap-6 items-center">
                    <a href="#tren" class="text-white hover:text-yellow-400 text-lg font-serif">Trending</a>
                    <a href="#topik" class="text-white hover:text-yellow-400 text-lg font-serif">Topic</a>
                    <a href="#shortsSection" class="text-white hover:text-yellow-400 text-lg font-serif">Shorts</a>

                    <!-- Dekstop Dropdown -->
                    <div class="relative">
                        <button id="dropdownButton"
                            class="flex items-center gap-1 text-white hover:text-yellow-400 text-lg font-serif focus:outline-none">
                            Category
                            <svg id="dropdownArrow" class="w-4 h-4 transition-transform duration-300 transform"
                                fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div id="dropdownMenu"
                            class="absolute hidden flex-col mt-2 bg-black border border-gray-700 rounded-lg py-4 w-30 z-50">
                            @foreach (['lifestyle', 'music', 'sport', 'knowledge', 'other'] as $cat)
                                @php
                                    $label = ucfirst($cat);
                                    $route = session('content_type') === 'shorts'
                                        ? route('showTopicByCategory', ['name' => $cat])
                                        : route('category.show', ['name' => $cat]);
                                @endphp
                                <a href="{{ $route }}"
                                    class="px-6 py-2 text-white hover:text-yellow-400 text-sm font-serif">
                                    {{ $label }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Mobile hamburger -->
                <div class="md:hidden">
                    <button id="mobile-menu-button"
                        class="md:hidden flex flex-col justify-between w-6 h-6 relative z-50">
                        <span
                            class="hamburger-line absolute top-0 left-0 w-full h-0.5 bg-white transition-all duration-500"></span>
                        <span
                            class="hamburger-line absolute top-1/2 left-0 w-full h-0.5 bg-white transition-all duration-500 translate-y-[-50%]"></span>
                        <span
                            class="hamburger-line absolute bottom-0 left-0 w-full h-0.5 bg-white transition-all duration-500"></span>
                    </button>
                </div>
            </div>

            <!-- Mobile Dropdown -->
            <div id="mobile-menu"
                class="transition-all duration-700 ease-in-out hidden max-h-0 overflow-hidden opacity-0 scale-95 transform origin-top p-4 rounded shadow px-4 mt-8 bg-black">
                <h2 class="text-3xl text-white my-8">Category</h2>
                @foreach (['lifestyle', 'music', 'sport', 'knowledge', 'other'] as $cat)
                    @php
                        $label = ucfirst($cat);
                        $route = session('content_type') === 'shorts'
                            ? route('showTopicByCategory', ['name' => $cat])
                            : route('category.show', ['name' => $cat]);
                    @endphp
                    <a href="{{ $route }}" class="px-6 py-2 text-white hover:text-yellow-400 text-sm font-serif">
                        {{ $label }}
                    </a>
                @endforeach
            </div>
    </nav>

    <main class="pt-28">
        <!-- Trending -->
        <section id="tren" class="pt-12 pb-16">
            <h2 class="text-3xl font-bold text-center mb-24">Berita Trending</h2>
            <div
                class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-6 backdrop-blur-md bg-white/5 rounded-xl border border-white/10 p-6">
                @foreach($trendingArticles as $a)
                    <article
                        class="group bg-white dark:bg-black rounded-2xl shadow-lg overflow-hidden hover:scale-[1.02] transition border dark:border-gray-700">
                        <div class="relative">
                            <img src="{{ asset('storage/' . $a->image) }}" alt="{{ $a->title }}"
                                class="w-full h-78 md:h-60 object-cover object-[center_23%]">
                            <p
                                class="absolute top-2 right-2 bg-black/80 text-white text-xs px-2 py-1 rounded transition-all duration-300 
                                                                                                  opacity-100 translate-y-0
                                                                                                  md:opacity-0 md:translate-y-1 
                                                                                                  group-hover:md:opacity-100 group-hover:md:translate-y-0">
                                {{ $a->category->name ?? '-' }}
                            </p>

                        </div>
                        <div class="p-4 flex flex-col justify-between h-48">
                            <div>
                                <h3 class="text-xl font-semibold mb-2 text-gray-900 dark:text-white">{{ $a->title }}
                                </h3>
                                <p class="text-sm text-gray-600 dark:text-gray-300 mb-4">
                                    {{ \Str::words(strip_tags($a->content), 22, '...') }}
                                </p>
                            </div>
                            <div class="flex justify-between items-end">
                                <p class="text-sm text-gray-500">{{ $a->published_at->format('F j, Y') }}</p>
                                <a href="{{ route('articles.show', $a->slug) }}"
                                    class="text-blue-600 hover:underline text-sm">Baca Selengkapnya →</a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>

        <!-- Slideshow -->
        <section class="hidden md:block">
            <div id="slider" class="relative max-w-7xl mx-auto h-60 md:h-[30vh] overflow-hidden">
                @foreach($sliderArticles as $a)
                    <article
                        class="slide absolute inset-0 bg-cover bg-center transition-opacity duration-1000 opacity-0 pointer-events-none"
                        style="background-image:url('{{ asset('storage/' . $a->image) }}')">
                        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                            <div class="text-center max-w-3xl text-white p-4">
                                <p class="inline-block bg-black px-2 py-1 text-sm mb-2">{{ $a->category->name ?? '-' }}</p>
                                <a href="{{ route('articles.show', $a->slug) }}">
                                    <h3 class="text-2xl md:text-4xl font-bold mb-2">
                                        {{ \Str::words(strip_tags($a->content), 5, '...') }}
                                    </h3>
                                </a>
                                <p class="text-sm">{{ $a->published_at->format('F j, Y') }}</p>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>

        <!-- Topik & Shorts -->
        <section id="topik" class="pb-16">
            <h2 class="text-3xl font-bold text-center my-20">Topic</h2>

            @php
                $topicNames = [
                    'tech' => 'Teknologi & AI',
                    'social' => 'Kota & Sosial',
                    'sport' => 'Olahraga & Hiburan',
                    'other' => 'Berita Lainnya'
                ];
            @endphp

            <div class="max-w-7xl mx-auto flex flex-col lg:flex-row gap-16 px-4">
                <div class="w-full lg:w-2/3 flex flex-col gap-12">
                    @foreach ($groupedArticles as $key => $articles)
                        @if($articles->count())
                            <div>
                                <div class="flex flex-col gap-8">
                                    @foreach ($articles as $a)
                                        <article
                                            class="flex gap-4 dark:bg-black shadow border dark:border-gray-700 overflow-hidden hover:scale-[1.02] transition h-52 md:h-48">
                                            <img src="{{ asset('storage/' . $a->image) }}" alt="{{ $a->title }}"
                                                class="w-1/3 object-cover h-auto">
                                            <div class="p-4 flex flex-col justify-between flex-1">
                                                <h4 class="font-semibold text-gray-900 dark:text-white">{{ $a->title }}</h4>
                                                <p class="text-sm text-gray-600 dark:text-gray-300">
                                                    {{ \Str::words(strip_tags($a->content), 12, '...') }}
                                                </p>
                                                <p class="text-sm text-white">
                                                    {{ $topicNames[$key] ?? ucfirst($key) }}
                                                </p>
                                                <div class="flex justify-between items-center text-sm">
                                                    <p class="text-gray-500">{{ $a->published_at->format('F j, Y') }}</p>
                                                    <a href="{{ route('articles.show', $a->slug) }}"
                                                        class="text-blue-600 hover:underline">Baca Selengkapnya →</a>
                                                </div>
                                            </div>
                                        </article>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>

                <!-- Ranking / Topik di kanan -->
                <div class="hidden lg:block lg:w-1/3">
                    <div class="flex flex-col gap-10 backdrop-blur-md bg-white/5 rounded-xl border border-white/10 p-6">
                        @foreach ($topicArticles as $a)
                            <div class="flex items-start gap-4 border-b">
                                <div
                                    class="w-10 h-10 text-white flex items-center justify-center font-bold rounded-full bg-gray-800">
                                    {{ $loop->iteration }}
                                </div>
                                <a href="{{ route('articles.show', $a->slug) }}">
                                    <p class="text-sm text-white font-medium leading-snug mb-6">
                                        {{ \Str::limit($a->content, 60) }}
                                    </p>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Shorts Carousel -->
    <section id="shortsSection" class="pb-16 px-8 md:px-40 lg:px-[20vw]">
        <h2 class="text-3xl font-bold text-center my-16">Shorts</h2>

        <!-- Shorts -->
        <div class="flex gap-2 mb-4">
            <button id="prevBtn" class="text-white bg-gray-700 px-3 py-1 rounded hover:bg-gray-600">❮</button>
            <button id="nextBtn" class="text-white bg-gray-700 px-3 py-1 rounded hover:bg-gray-600">❯</button>
        </div>
        </div>

        <div id="sliderContainer" class="flex gap-6 overflow-x-scroll scrollbar-hide scroll-smooth snap-x">
            @foreach ($shorts as $short)
                <div
                    class="min-w-[200px] max-w-sm snap-start flex-shrink-0 bg-white dark:bg-black rounded-xl shadow border dark:border-gray-700">
                    <a href="{{ route('articles.shortshow', $short->slug) }}">
                        <img src="{{ asset('storage/' . $short->image) }}" class="w-full h-48 object-cover rounded-t-xl"
                            alt="{{ $short->title }}">
                    </a>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $short->title }}</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            {{ \Str::words(strip_tags($short->content), 12, '...') }}
                        </p>
                    </div>
                </div>
            @endforeach

        </div>
    </section>

    </main>

    <footer class="bg-black text-white py-10 mt-24 border-t border-gray-700">
        <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row justify-between items-center gap-6">
            <!-- Logo -->
            <div class="flex items-center gap-2">
                <img src="{{ asset('image/hype.png') }}" alt="Logo" class="h-12 w-auto">
                <span class="text-xl font-semibold">Hypenings</span>
            </div>

            <!-- Sosial Media -->
            <div class="flex gap-6 text-white">
                <a href="https://www.instagram.com/hypenings/?hl=en" target="_blank"
                    class="hover:text-pink-500 transition">
                    <!-- Instagram icon -->
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M7 4h10a3 3 0 013 3v10a3 3 0 01-3 3H7a3 3 0 01-3-3V7a3 3 0 013-3z" />
                        <circle cx="12" cy="12" r="3" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.5 6.5h.01" />
                    </svg>
                </a>
                <a href="https://www.tiktok.com/@hypenings" target="_blank" class="hover:text-gray-300 transition">
                    <!-- TikTok icon (pakai logo sederhana) -->
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M14 3a5 5 0 005 5h1v3h-1a8 8 0 01-8-8V3h3zm-3 6v9a3 3 0 11-3-3h1a2 2 0 102 2V9h2z" />
                    </svg>
                </a>
                <a href="mailto:senidalamhidupSDH@gmail.com" class="hover:text-red-400 transition">
                    <!-- Email icon -->
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 12l-4-4-4 4m0 0l4 4 4-4m-4-4v8" />
                    </svg>
                </a>
            </div>
        </div>

        <!-- Copyright -->
        <div class="text-center text-gray-500 text-sm mt-6">
            &copy; 2025 Hypenings. All rights reserved.
        </div>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>