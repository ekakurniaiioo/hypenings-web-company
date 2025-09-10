<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hypenings</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&display=swap"
        rel="stylesheet">
</head>

<body class="text-white bg-[#1A1A1A]">
    <!-- Navbar -->
    <nav id="navbar"
        class="border-gray-200 bg-[#141414] bg-opacity-70 fixed w-full z-50 top-0 h-20 transition-transform duration-500 ease-in-out">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-2">
            <div class="flex justify-between h-16 items-center">

                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="/">
                        <img class="h-24 w-auto" src="{{ asset('image/hype-id.png') }}" alt="Logo">
                    </a>
                </div>

                <!-- Desktop Links -->
                <div class="hidden md:flex gap-6 items-center">
                    <a href="#tren" class="text-white hover:text-yellow-400 text-lg font-poppins">Trending</a>
                    <a href="#topik" class="text-white hover:text-yellow-400 text-lg font-poppins">Topic</a>
                    <a href="#shortsSection" class="text-white hover:text-yellow-400 text-lg font-poppins">Shorts</a>

                    <!-- Dekstop Dropdown -->
                    <div class="relative">
                        <button id="dropdownButton"
                            class="flex items-center gap-1 text-white hover:text-yellow-400 text-lg font-poppins focus:outline-none">
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
                                    class="px-6 py-2 text-white hover:text-yellow-400 text-sm font-poppins">
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
                class="fixed top-[87px] left-0 right-0 w-screen transition-all duration-500 ease-in-out hidden max-h-0 overflow-hidden opacity-0 scale-95 h-auto transform origin-top p-8 rounded shadow bg-[#141414] z-50 flex flex-col space-y-2">
                <h2 class="text-2xl text-white mb-4">Category</h2>
                @foreach (['lifestyle', 'music', 'sport', 'knowledge', 'other'] as $cat)
                    @php
                        $label = ucfirst($cat);
                        $route = session('content_type') === 'shorts'
                            ? route('showTopicByCategory', ['name' => $cat])
                            : route('category.show', ['name' => $cat]);
                    @endphp
                    <a href="{{ $route }}" class="block px-6 py-2 text-white hover:text-yellow-400 text-sm font-poppins">
                        {{ $label }}
                    </a>
                @endforeach
            </div>
        </div>
        <div class="h-[6px] bg-yellow-500 mt-2 w-full"></div>
    </nav>

    <main class="pt-32">
        <!-- Trending -->
        <section id="tren" class="pt-12 pb-16 px-8 md:px-20 lg:px-[10vw]">
            <div
                class="relative z-10 rounded-2xl shadow-2xl shadow-black/10 p-6 bg-white/10 backdrop-blur-xl border border-white/10 dark:bg-zinc-800/40">
                <h2 class="text-4xl md:text-5xl text-left mb-16 mt-6 tracking-wide font-poppins text-white">
                    <span class="inline-block border-b-4 border-violet-200 pb-2">Trending News</span>
                </h2>

                <div class="flex flex-col md:grid md:grid-cols-3 gap-6">
                    <!-- Artikel besar kiri -->
                    @if(isset($trendingArticles[0]))
                        <article
                            class="order-1 md:order-none md:col-span-2 aspect-[16/11] group relative rounded-2xl overflow-hidden hover:scale-[1.01] transition-transform duration-300">
                            <a href="{{ route('articles.show', $trendingArticles[0]->slug) }}">
                                <img src="{{ asset('storage/' . $trendingArticles[0]->image) }}"
                                    class="w-full h-full object-cover object-[center_29%]" />
                                <div class="absolute inset-0 bg-black/30 group-hover:bg-black/50 transition"></div>
                                <div class="absolute bottom-6 left-6 z-10 text-white">
                                    <span class="bg-yellow-400 text-black text-xs font-bold px-3 py-1 rounded-full shadow">
                                        {{ $trendingArticles[0]->category->name ?? '-' }}
                                    </span>
                                    <h2 class="text-xl md:text-2xl font-bold mt-3 group-hover:text-yellow-300 transition">
                                        {{ $trendingArticles[0]->title }}
                                    </h2>
                                    <p class="text-sm mt-1 text-gray-300">
                                        {{ $trendingArticles[0]->published_at->format('M d, Y') }}
                                    </p>
                                </div>
                            </a>
                        </article>
                    @endif

                    <!-- Kolom kanan -->
                    <div class="flex flex-col justify-between gap-4">
                        <!-- Artikel kanan atas -->
                        @if(isset($trendingArticles[1]))
                            <article
                                class="order-2 md:order-none aspect-[16/14] group relative rounded-2xl overflow-hidden hover:scale-[1.01] transition-transform duration-300">
                                <a href="{{ route('articles.show', $trendingArticles[1]->slug) }}">
                                    <img src="{{ asset('storage/' . $trendingArticles[1]->image) }}"
                                        class="w-full h-full object-cover" />
                                    <div class="absolute inset-0 bg-black/30 group-hover:bg-black/50 transition"></div>
                                    <div class="absolute bottom-4 left-4 z-10 text-white">
                                        <span
                                            class="bg-yellow-400 text-black text-xs font-bold px-3 py-1 rounded-full shadow">
                                            {{ $trendingArticles[1]->category->name ?? '-' }}
                                        </span>
                                        <h2
                                            class="text-base md:text-lg font-bold mt-2 group-hover:text-yellow-300 transition">
                                            {{ $trendingArticles[1]->title }}
                                        </h2>
                                        <p class="text-sm mt-1 text-gray-300">
                                            {{ $trendingArticles[1]->published_at->format('M d, Y') }}
                                        </p>
                                    </div>
                                </a>
                            </article>
                        @endif

                        <!-- Artikel kanan bawah -->
                        <div class="grid grid-cols-2 gap-4">
                            @foreach([$trendingArticles[2] ?? null, $trendingArticles[3] ?? null] as $article)
                                @if($article)
                                    <article
                                        class="order-3 md:order-none aspect-[16/16] group relative rounded-2xl overflow-hidden hover:scale-[1.01] transition-transform duration-300">
                                        <a href="{{ route('articles.show', $article->slug) }}">
                                            <img src="{{ asset('storage/' . $article->image) }}"
                                                class="w-full h-full object-cover" />
                                            <div class="absolute inset-0 bg-black/30 group-hover:bg-black/50 transition"></div>
                                            <div class="absolute bottom-3 left-3 z-10 text-white">
                                                <span
                                                    class="bg-yellow-400 text-black text-xs font-bold px-3 py-1 rounded-full shadow">
                                                    {{ $article->category->name ?? '-' }}
                                                </span>
                                                <h2 class="text-sm font-semibold mt-2 group-hover:text-yellow-300 transition">
                                                    {{ $article->title }}
                                                </h2>
                                                <p class="text-sm mt-1 text-gray-300">
                                                    {{ $trendingArticles[2]->published_at->format('M d, Y') }}
                                                </p>
                                            </div>
                                        </a>
                                    </article>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class=" bg-[#facc15] py-16 relative overflow-hidden">
            <div class="absolute inset-x-0 bottom-0 h-[80px] bg-gradient-to-t from-black/65 to-transparent z-10">
            </div>
            <div class="absolute inset-x-0 top-0 h-[40px] bg-gradient-to-b from-black/65 to-transparent z-10">
            </div>

            <div id="slider" class="relative z-10 max-w-7xl mx-auto w-full aspect-[16/8] shadow-xl overflow-hidden">

                <div class="absolute top-6 left-1/2 transform -translate-x-1/2 z-30 text-center space-y-2">
                    <div class="flex justify-center gap-4">
                        <a href="https://tiktok.com" target="_blank"
                            class="w-8 h-8 bg-white/30 hover:bg-white/50 text-white flex items-center justify-center rounded-full transition">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M9.5 3v13.5a3 3 0 1 1-3-3h1.5a1.5 1.5 0 1 0 1.5 1.5V3h3a3.5 3.5 0 0 0 3.5 3.5V9a6 6 0 0 1-6-6H9.5z" />
                            </svg>
                        </a>
                        <a href="https://instagram.com" target="_blank"
                            class="w-8 h-8 bg-white/30 hover:bg-white/50 text-white flex items-center justify-center rounded-full transition">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M7 2C4.243 2 2 4.243 2 7v10c0 2.757 2.243 5 5 5h10c2.757 0 5-2.243 5-5V7c0-2.757-2.243-5-5-5H7zm0 2h10c1.654 0 3 1.346 3 3v10c0 1.654-1.346 3-3 3H7c-1.654 0-3-1.346-3-3V7c0-1.654 1.346-3 3-3zm5 3a5 5 0 1 0 .001 10.001A5 5 0 0 0 12 7zm0 2a3 3 0 1 1-.001 6.001A3 3 0 0 1 12 9zm4.5-2a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                            </svg>
                        </a>
                        <a href="mailto:your@email.com"
                            class="w-8 h-8 bg-white/30 hover:bg-white/50 text-white flex items-center justify-center rounded-full transition">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M20 4H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2zm0 2v.01L12 13 4 6.01V6h16zM4 18v-9l8 7 8-7v9H4z" />
                            </svg>
                        </a>
                    </div>
                </div>

                @foreach($sliderArticles as $a)
                    <article
                        class="slide absolute inset-0 w-full h-full transition-opacity duration-1000 opacity-0 pointer-events-none shadow-[0_20px_60px_rgba(0,0,0,0.5)]">
                        <img src="{{ asset('storage/' . $a->image) }}" alt="{{ $a->title }}"
                            class="w-full h-full object-cover object-[center_25%] absolute z-0 shadow-[0_20px_50px_rgba(0,0,0,0.4)]" />

                        <!-- Overlay Gradient -->
                        <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/30 to-transparent z-10">
                        </div>

                        <div
                            class="absolute inset-0 md:inset-y-0 md:left-0 md:flex md:items-end z-20 p-6 pt-24 md:pt-16 md:w-1/2">
                            <div class="text-white max-w-lg">
                                <p
                                    class="bg-white/20 inline-block text-xs px-2 py-1 rounded mb-3 uppercase tracking-widest">
                                    {{ $a->category->name ?? '-' }}
                                </p>

                                <a href="{{ route('articles.show', $a->slug) }}">
                                    <h2 class="text-base sm:text-xl md:text-2xl lg:text-4xl font-bold leading-snug mb-3">
                                        {{ \Str::words(strip_tags($a->content), 10, '...') }}
                                    </h2>
                                </a>

                                <p class="text-white/70 text-xs sm:text-sm">{{ $a->published_at->format('F j, Y') }}</p>
                            </div>
                        </div>

                        <div
                            class="hidden lg:block absolute inset-y-0 right-0 w-1/3 px-6 py-10 z-20 text-white/70 text-sm space-y-4">
                            @foreach (['tech', 'sport', 'social', 'other'] as $topicKey)
                                @php
                                    $topicGroup = $groupedArticles[$topicKey] ?? collect();
                                    $sliderArticles = $topicGroup->first();
                                @endphp

                                @if ($sliderArticles)
                                    <a href="{{ route('articles.show', $sliderArticles->slug) }}"
                                        class="group block transition-all duration-300 hover:text-white">
                                        <p
                                            class="border-b border-white/10 pb-2 group-hover:bg-white/5 group-hover:pl-2 group-hover:text-white transition-all duration-300">
                                            <span class="block font-semibold text-white group-hover:text-yellow-300 transition">
                                                {{ ucfirst($topicKey) }}
                                            </span>
                                            <span
                                                class="block group-hover:translate-x-1 group-hover:opacity-90 transition-all duration-300">
                                                {{ \Str::words(strip_tags($sliderArticles->content), 10, '...') }}
                                            </span>
                                        </p>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </article>
                @endforeach
            </div>
        </section>

        <!-- Topik  -->
        <section id="topik" class="pb-52">

            <h2 class="text-4xl md:text-5xl text-center mb-16 mt-6 tracking-wide font-poppins text-white">
                <span class="inline-block border-b-4 border-violet-200 mt-32 pb-4">Topic</span>
            </h2>

            <div class="max-w-7xl mx-auto flex flex-col lg:flex-row gap-16 px-4">
                <div class="w-full lg:w-2/3 flex flex-col gap-12">
                    <div class="space-y-8">
                        @foreach ($topArticles as $a)
                            <article
                                class="group relative flex flex-col md:flex-row gap-5 rounded-2xl border border-gray-200 dark:border-gray-700 shadow-md hover:shadow-lg overflow-hidden transition-transform duration-300 hover:scale-[1.015] bg-white dark:bg-neutral-900">

                                <!-- Gambar -->
                                <div class="w-full md:w-1/3 h-64 md:h-auto">
                                    <img src="{{ asset('storage/' . $a->image) }}" alt="{{ $a->title }}"
                                        class="w-full h-full object-cover object-[center_20%] group-hover:brightness-90 transition duration-300" />
                                </div>

                                <!-- Konten -->
                                <div class="flex-1 p-5 flex flex-col justify-between">
                                    <div>
                                        <span
                                            class="inline-block text-xs uppercase text-yellow-500 font-semibold mb-2 tracking-wide">
                                            {{ $a->topic }}
                                        </span>
                                        <h4
                                            class="text-base sm:text-lg font-bold text-gray-800 dark:text-white leading-snug mb-2">
                                            {{ $a->title }}
                                        </h4>
                                        <p class="text-sm text-gray-600 dark:text-gray-300 line-clamp-5">
                                            {{ \Str::words(strip_tags($a->content), 40, '...') }}
                                        </p>
                                    </div>

                                    <div class="flex justify-between items-center mt-4 text-sm">
                                        <span class="text-gray-500">{{ $a->published_at->format('M j, Y') }}</span>
                                        <a href="{{ route('articles.show', $a->slug) }}"
                                            class="inline-block px-3 py-1 rounded-full text-sm font-medium text-white bg-yellow-400 hover:bg-yellow-600 transition">
                                            Read More →
                                        </a>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>


                <!-- Ranking / Topik di kanan -->
                <div class="hidden lg:block lg:w-1/3">
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
        </section>

        <!-- Shorts Carousel -->
        <section id="shortsSection" class="relative pb-16 px-8 md:px-40 lg:px-[20vw] bg-[#facc15]">
            <div class="absolute inset-x-0 top-0 h-[40px] bg-gradient-to-b from-black/50 to-transparent z-10">
            </div>
            <div class="absolute inset-x-0 bottom-0 h-[80px] bg-gradient-to-t from-black/50 to-transparent z-10">
            </div>

            <div class="relative z-20 rounded-2xl shadow-2xl shadow-black/20 p-10">
                <h2 class="text-center text-4xl font-bebas text-black mb-10">Shorts</h2>

                <div class="absolute top-16 right-10 flex gap-2 z-30">
                    <button id="prevBtn"
                        class="text-white bg-gray-800/90 px-3 py-1 rounded-full hover:bg-gray-700 shadow">
                        ❮
                    </button>
                    <button id="nextBtn"
                        class="text-white bg-gray-800/90 px-3 py-1 rounded-full hover:bg-gray-700 shadow">
                        ❯
                    </button>
                </div>

                <div id="sliderContainer" class="flex gap-6 overflow-x-scroll scrollbar-hide scroll-smooth snap-x">
                    @foreach ($shorts as $short)
                        <a href="{{ route('articles.shortshow', $short->slug) }}"
                            class="group block min-w-[250px] max-w-[250px] h-[460px] snap-start flex-shrink-0 bg-black rounded-xl shadow border border-gray-700 overflow-hidden relative">
                            <img src="{{ asset('storage/' . $short->image) }}"
                                class="w-full h-full object-cover object-center" alt="{{ $short->title }}">
                            <div
                                class="absolute inset-0 flex items-center justify-center bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z" />
                                </svg>
                            </div>
                            <div
                                class="absolute bottom-0 w-full p-4 bg-gradient-to-t from-black via-black/50 to-transparent">
                                <h3 class="text-base font-semibold text-white mb-1 line-clamp-2">{{ $short->title }}
                                </h3>
                                <p class="text-sm text-gray-300 line-clamp-2">
                                    {{ \Str::words(strip_tags($short->content), 10, '...') }}
                                </p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- More from Topic -->
        <section id="moreTopicSection" class="pb-16 px-4">
            <h2 class="text-4xl md:text-4xl text-center mb-16 mt-16 tracking-wide font-poppins text-white">
                <span class="inline-block border-b-4 border-violet-200 pb-4">More Article</span>
            </h2>
            <div id="moreArticlesWrapper" class="space-y-8"></div>

            <div class="text-center mt-16">
                <button id="loadMoreArticlesButton" data-url="{{ route('topic.loadMore') }}"
                    class="px-6 py-3 bg-yellow-400 text-white font-semibold rounded-full hover:bg-yellow-300 transition">
                    Load More
                </button>
            </div>
        </section>

    </main>


    <footer class="bg-[#111] text-white pt-14 pb-8 mt-24">
        <div class="max-w-7xl mx-auto px-4 md:px-8 grid md:grid-cols-2 gap-12">
            <div class="flex items-center gap-4 mb-4">
                <img src="{{ asset('image/hype-id.png') }}" class="h-40 w-40" alt="Logo Hypenings">
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 gap-12 text-sm w-full max-w-6xl mx-auto">
                <div>
                    <h3 class="font-poppins mb-3">Categories</h3>
                    <ul class="space-y-2 text-gray-400">
                        @foreach (['lifestyle', 'music', 'sport', 'knowledge', 'other'] as $cat)
                            @php
                                $label = ucfirst($cat);
                                $route = session('content_type') === 'shorts'
                                    ? route('showTopicByCategory', ['name' => $cat])
                                    : route('category.show', ['name' => $cat]);
                            @endphp
                            <li>
                                <a href="{{ $route }}" class="px-6 py-2 hover:text-yellow-400 text-sm font-poppins">
                                    {{ $label }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div>
                    <h3 class="mb-3 font-poppins">Company</h3>
                    <ul class="space-y-2 text-gray-400 font-poppins">
                        <li><a href="#" class="hover:text-yellow-400">About</a></li>
                        <li><a href="#" class="hover:text-yellow-400">Privacy Policy</a></li>
                        <li><a href="#" class="hover:text-yellow-400">Terms of Use</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="mb-3 font-poppins">Contact</h3>
                    <div class="flex gap-4 mt-4">
                        <a href="https://www.instagram.com/hypenings.id/?hl=en" class="text-2xl hover:text-pink-500"><i
                                class="fab fa-instagram"></i></a>
                        <a href="https://www.tiktok.com/@hypenings" class="text-2xl hover:text-gray-300"><i
                                class="fab fa-tiktok"></i></a>
                        <a href="mailto:contact@hypenings.com" class="text-2xl hover:text-blue-400"><i
                                class="fas fa-envelope"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="text-center text-sm text-gray-500 mt-12">
            &copy; {{ date('Y') }} Hypenings – PT. CV SENI DALAM HIDUP
        </div>

        <div class="h-[6px] bg-yellow-400 mt-6 w-full"></div>
    </footer>



    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>