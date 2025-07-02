<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hypenings</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
</head>

<body class="dark:bg-black">
    <nav class="dark:bg-black border-b border-gray-200 fixed w-full z-50 top-0 h-24">
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
                    <a href="/admin/dashboard" class="text-white hover:text-blue-600 text-lg font-serif">Trending</a>
                    <a href="#topik" class="text-white hover:text-blue-600 text-lg font-serif">Topik</a>
                    <a href="#shortsSection" class="text-white hover:text-blue-600 text-lg font-serif">Shorts</a>

                    <!-- Dekstop Dropdown -->
                    <div class="relative">
                        <button id="dropdownButton" class="flex items-center gap-1 text-white hover:text-blue-600 text-lg font-serif focus:outline-none">
                            Category
                            <svg id="dropdownArrow" class="w-4 h-4 transition-transform duration-300 transform" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <div id="dropdownMenu" class="absolute hidden flex-col mt-2 bg-black border border-gray-700 rounded-lg py-2 w-44 z-50">
                            <a href="/admin/categories/lifestyle" class="px-4 py-2 hover:bg-gray-800 text-white text-sm">Lifestyle</a>
                            <a href="/admin/categories/music" class="px-4 py-2 hover:bg-gray-800 text-white text-sm">Music</a>
                            <a href="/admin/categories/sport" class="px-4 py-2 hover:bg-gray-800 text-white text-sm">Sport</a>
                            <a href="/admin/categories/knowledge" class="px-4 py-2 hover:bg-gray-800 text-white text-sm">Knowledge</a>
                            <a href="/admin/categories/knowledge" class="px-4 py-2 hover:bg-gray-800 text-white text-sm">Other</a>
                        </div>
                    </div>
                </div>

                <!-- Mobile hamburger -->
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="md:hidden flex flex-col justify-between w-6 h-6 relative z-50">
                        <span class="hamburger-line absolute top-0 left-0 w-full h-0.5 bg-white transition-all duration-500"></span>
                        <span class="hamburger-line absolute top-1/2 left-0 w-full h-0.5 bg-white transition-all duration-500 translate-y-[-50%]"></span>
                        <span class="hamburger-line absolute bottom-0 left-0 w-full h-0.5 bg-white transition-all duration-500"></span>
                    </button>
                </div>
            </div>

            <!-- Mobile Dropdown -->
            <div id="mobile-menu" class="transition-all duration-700 ease-in-out hidden max-h-0 overflow-hidden opacity-0 scale-95 transform origin-top p-4 rounded shadow px-4 mt-8 bg-black">
                <h2 class="text-3xl text-white my-8">Category</h2>
                <a href="/admin/dashboard" class="block py-2 text-white hover:text-blue-600">Lifestyle</a>
                <a href="/admin/posts" class="block py-2 text-white hover:text-blue-600">Music</a>
                <a href="/admin/categories" class="block py-2 text-white hover:text-blue-600">Sport</a>
                <a href="/admin/categories" class="block py-2 text-white hover:text-blue-600">Knowledge</a>
                <a href="/admin/categories" class="block py-2 text-white hover:text-blue-600">Other</a>
            </div>
    </nav>

    <section class="mt-40 max-w-6xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-white text-center mb-10">Berita Trending</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Card 1 -->
            <article class="rounded-2xl overflow-hidden shadow-lg bg-white dark:bg-black border border-gray-200 dark:border-gray-700 transition-all hover:scale-[1.02] duration-300">
                <img class="w-full h-60 object-cover object-[center_22%]" src="{{ asset('image/article1.jpeg') }}" alt="Article 1">
                <div class="p-5">
                    <h2 class="text-xl font-semibold mb-2 text-gray-900 dark:text-white">Judul Artikel 1</h2>
                    <p class="text-sm text-gray-600 dark:text-gray-300 mb-4">
                        Ini deskripsi singkat dari artikel pertama.
                    </p>
                    <a href="#" class="text-blue-600 hover:underline text-sm font-medium">Baca Selengkapnya →</a>
                </div>
            </article>

            <!-- Card 2 -->
            <article class="rounded-2xl overflow-hidden shadow-lg bg-white dark:bg-black border border-gray-200 dark:border-gray-700 transition-all hover:scale-[1.02] duration-300">
                <img class="w-full h-60 object-cover object-[center_22%]" src="{{ asset('image/article2.jpeg') }}" alt="Article 2">
                <div class="p-5">
                    <h2 class="text-xl font-semibold mb-2 text-gray-900 dark:text-white">Judul Artikel 2</h2>
                    <p class="text-sm text-gray-600 dark:text-gray-300 mb-4">
                        Ini deskripsi singkat dari artikel kedua.
                    </p>
                    <a href="#" class="text-blue-600 hover:underline text-sm font-medium">Baca Selengkapnya →</a>
                </div>
            </article>

            <!-- Card 3 -->
            <article class="rounded-2xl overflow-hidden shadow-lg bg-white dark:bg-black border border-gray-200 dark:border-gray-700 transition-all hover:scale-[1.02] duration-300">
                <img class="w-full h-60 object-cover object-[center_70%]" src="{{ asset('image/article8.jpeg') }}" alt="Article 2">
                <div class="p-5">
                    <h2 class="text-xl font-semibold mb-2 text-gray-900 dark:text-white">Judul Artikel 3</h2>
                    <p class="text-sm text-gray-600 dark:text-gray-300 mb-4">
                        Ini deskripsi singkat dari artikel kedua.
                    </p>
                    <a href="#" class="text-blue-600 hover:underline text-sm font-medium">Baca Selengkapnya →</a>
                </div>
            </article>

            <!-- Card 4 -->
            <article class="rounded-2xl overflow-hidden shadow-lg bg-white dark:bg-black border border-gray-200 dark:border-gray-700 transition-all hover:scale-[1.02] duration-300">
                <img class="w-full h-60 object-cover object-[center_22%]" src="{{ asset('image/article4.jpeg') }}" alt="Article 2">
                <div class="p-5">
                    <h2 class="text-xl font-semibold mb-2 text-gray-900 dark:text-white">Judul Artikel 4</h2>
                    <p class="text-sm text-gray-600 dark:text-gray-300 mb-4">
                        Ini deskripsi singkat dari artikel kedua.
                    </p>
                    <a href="#" class="text-blue-600 hover:underline text-sm font-medium">Baca Selengkapnya →</a>
                </div>
            </article>
        </div>
    </section>

    <div id="slider" class="relative max-w-6xl mx-auto mt-12 h-60 md:h-[30vh] overflow-hidden">
        <!-- Slide 1 -->
        <article class="slide absolute inset-0 bg-cover bg-[center_30%] transition-opacity duration-1000 opacity-100"
            style="background-image: url('{{ asset('image/article10.jpeg') }}')">
            <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                <div class="text-center text-white max-w-3xl px-4 mx-auto">
                    <p class="bg-black inline-block px-4 py-1 text-sm mb-4">Other</p>
                    <h2 class="text-2xl md:text-4xl font-bold mb-2">
                        Uang Membuat Orang Gak Berempati dan Bermoral?
                    </h2>
                    <p class="text-sm">August 25, 2023</p>
                </div>
            </div>
        </article>

        <!-- Slide 2 -->
        <article class="slide absolute inset-0 bg-cover bg-[center_40%] transition-opacity duration-1000 opacity-0"
            style="background-image: url('{{ asset('image/article9.jpeg') }}')">
            <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                <div class="text-center text-white max-w-3xl px-4 mx-auto">
                    <p class="bg-black inline-block px-4 py-1 text-sm mb-4">Other</p>
                    <h2 class="text-2xl md:text-4xl font-bold mb-2">
                        Kenapa Kita Cepat Nyerah Waktu Capek?
                    </h2>
                    <p class="text-sm">July 1, 2025</p>
                </div>
            </div>
        </article>

        <!-- Slide 3 -->
        <article class="slide absolute inset-0 bg-cover bg-[center_30%] transition-opacity duration-1000 opacity-0"
            style="background-image: url('{{ asset('image/article3.jpeg') }}')">
            <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                <div class="text-center text-white max-w-3xl px-4 mx-auto">
                    <p class="bg-black inline-block px-4 py-1 text-sm mb-4">Other</p>
                    <h2 class="text-2xl md:text-4xl font-bold mb-2">
                        Kenapa Kita Cepat Nyerah Waktu Capek?
                    </h2>
                    <p class="text-sm">July 1, 2025</p>
                </div>
            </div>
        </article>

        <!-- Slide 4 -->
        <article class="slide absolute inset-0 bg-cover bg-[center_40%] transition-opacity duration-1000 opacity-0"
            style="background-image: url('{{ asset('image/article7.jpeg') }}')">
            <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                <div class="text-center text-white max-w-3xl px-4 mx-auto">
                    <p class="bg-black inline-block px-4 py-1 text-sm mb-4">Other</p>
                    <h2 class="text-2xl md:text-4xl font-bold mb-2">
                        Kenapa Kita Cepat Nyerah Waktu Capek?
                    </h2>
                    <p class="text-sm">July 1, 2025</p>
                </div>
            </div>
        </article>
    </div>

    <section id="topik" class="mt-16 max-w-3xl mr-40 md:ml-52 px-16">
        <h2 class="text-3xl font-bold text-white mb-10">Topik</h2>

        <!-- Card Wrapper -->
        <div class="flex flex-col gap-8">

            <!-- Card 1 -->
            <article class="flex flex-col md:flex-row gap-6 overflow-hidden shadow-lg bg-white dark:bg-black border border-gray-200 dark:border-gray-700 hover:scale-[1.02] transition-transform duration-300">
                <img class="w-full md:w-64 h-48 object-cover" src="{{ asset('image/article5.jpeg') }}" alt="Article Image">
                <div class="p-5 flex flex-col justify-between">
                    <div>
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Judul Artikel 1</h2>
                        <p class="text-sm text-gray-600 dark:text-gray-300 mb-4">
                            Ini adalah deskripsi singkat dari artikel pertama. Ringkas dan menarik untuk dibaca.
                        </p>
                        <h4 class="font-semibold text-yellow-400 dark:text-yellow mb-2">Music</h4>
                    </div>
                    <a href="#" class="text-blue-600 hover:underline text-sm font-medium">Baca Selengkapnya →</a>
                </div>
            </article>

            <!-- Card 2 -->
            <article class="flex flex-col md:flex-row gap-6 overflow-hidden shadow-lg bg-white dark:bg-black border border-gray-200 dark:border-gray-700 hover:scale-[1.02] transition-transform duration-300">
                <img class="w-full md:w-64 h-48 object-cover" src="{{ asset('image/article6.jpeg') }}" alt="Article Image">
                <div class="p-5 flex flex-col justify-between">
                    <div>
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Judul Artikel 2</h2>
                        <p class="text-sm text-gray-600 dark:text-gray-300 mb-4">
                            Ini adalah deskripsi singkat dari artikel kedua. Mengundang pembaca untuk lanjut klik.
                        </p>
                        <h4 class="font-semibold text-yellow-400 dark:text-yellow mb-2">Music</h4>
                    </div>
                    <a href="#" class="text-blue-600 hover:underline text-sm font-medium">Baca Selengkapnya →</a>
                </div>
            </article>

            <!-- Card 3 -->
            <article class="flex flex-col md:flex-row gap-6 overflow-hidden shadow-lg bg-white dark:bg-black border border-gray-200 dark:border-gray-700 hover:scale-[1.02] transition-transform duration-300">
                <img class="w-full md:w-64 h-48 object-cover" src="{{ asset('image/article10.jpeg') }}" alt="Article Image">
                <div class="p-5 flex flex-col justify-between">
                    <div>
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Judul Artikel 3</h2>
                        <p class="text-sm text-gray-600 dark:text-gray-300 mb-4">
                            Ini adalah deskripsi singkat dari artikel kedua. Mengundang pembaca untuk lanjut klik.
                        </p>
                        <h4 class="font-semibold text-yellow-400 dark:text-yellow mb-2">Music</h4>
                    </div>
                    <a href="#" class="text-blue-600 hover:underline text-sm font-medium">Baca Selengkapnya →</a>
                </div>
            </article>

            <!-- Card 4 -->
            <article class="flex flex-col md:flex-row gap-6 overflow-hidden shadow-lg bg-white dark:bg-black border border-gray-200 dark:border-gray-700 hover:scale-[1.02] transition-transform duration-300">
                <img class="w-full md:w-64 h-48 object-cover" src="{{ asset('image/article8.jpeg') }}" alt="Article Image">
                <div class="p-5 flex flex-col justify-between">
                    <div>
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Judul Artikel 4</h2>
                        <p class="text-sm text-gray-600 dark:text-gray-300 mb-4">
                            Ini adalah deskripsi singkat dari artikel kedua. Mengundang pembaca untuk lanjut klik.
                        </p>
                        <h4 class="font-semibold text-yellow-400 dark:text-yellow mb-2">Music</h4>
                    </div>
                    <a href="#" class="text-blue-600 hover:underline text-sm font-medium">Baca Selengkapnya →</a>
                </div>
            </article>
        </div>
    </section>

    <section id="shortsSection" class="mt-32 max-w-6xl mx-auto px-4 opacity-0 translate-x-10 transition-all duration-700">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-3xl font-bold text-white">Shorts</h2>
            <div class="flex gap-2">
                <button id="prevBtn" class="text-white bg-gray-700 px-3 py-1 rounded hover:bg-gray-600">❮</button>
                <button id="nextBtn" class="text-white bg-gray-700 px-3 py-1 rounded hover:bg-gray-600">❯</button>
            </div>
        </div>

        <div id="sliderContainer" class="flex gap-6 overflow-x-scroll scrollbar-hide scroll-smooth snap-x">
            <!-- card 1 -->
            <div class="min-w-[200px] max-w-sm snap-start flex-shrink-0 bg-white dark:bg-black rounded-xl shadow border dark:border-gray-700">
                <img src="{{ asset('image/article2.jpeg') }}" class="w-full h-48 object-cover rounded-t-xl" alt="">
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Judul Artikel 1</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Deskripsi artikel singkat.</p>
                </div>
            </div>

            <!-- card 2 -->
            <div class="min-w-[200px] max-w-sm snap-start flex-shrink-0 bg-white dark:bg-black rounded-xl shadow border dark:border-gray-700">
                <img src="{{ asset('image/article2.jpeg') }}" class="w-full h-48 object-cover rounded-t-xl" alt="">
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Judul Artikel 2</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Deskripsi artikel singkat.</p>
                </div>
            </div>

            <!-- card 3 -->
            <div class="min-w-[200px] max-w-sm snap-start flex-shrink-0 bg-white dark:bg-black rounded-xl shadow border dark:border-gray-700">
                <img src="{{ asset('image/article2.jpeg') }}" class="w-full h-48 object-cover rounded-t-xl" alt="">
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Judul Artikel 3</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Deskripsi artikel singkat.</p>
                </div>
            </div>

            <!-- card 4 -->
            <div class="min-w-[200px] max-w-sm snap-start flex-shrink-0 bg-white dark:bg-black rounded-xl shadow border dark:border-gray-700">
                <img src="{{ asset('image/article2.jpeg') }}" class="w-full h-48 object-cover rounded-t-xl" alt="">
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Judul Artikel 4</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Deskripsi artikel singkat.</p>
                </div>
            </div>

            <!-- card 5 -->
            <div class="min-w-[200px] max-w-sm snap-start flex-shrink-0 bg-white dark:bg-black rounded-xl shadow border dark:border-gray-700">
                <img src="{{ asset('image/article2.jpeg') }}" class="w-full h-48 object-cover rounded-t-xl" alt="">
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Judul Artikel 5</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Deskripsi artikel singkat.</p>
                </div>
            </div>

            <!-- card 6 -->
            <div class="min-w-[200px] max-w-sm snap-start flex-shrink-0 bg-white dark:bg-black rounded-xl shadow border dark:border-gray-700">
                <img src="{{ asset('image/article2.jpeg') }}" class="w-full h-48 object-cover rounded-t-xl" alt="">
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Judul Artikel 6</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Deskripsi artikel singkat.</p>
                </div>
            </div>

            <!-- card 7 -->
            <div class="min-w-[200px] max-w-sm snap-start flex-shrink-0 bg-white dark:bg-black rounded-xl shadow border dark:border-gray-700">
                <img src="{{ asset('image/article2.jpeg') }}" class="w-full h-48 object-cover rounded-t-xl" alt="">
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Judul Artikel 7</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Deskripsi artikel singkat.</p>
                </div>
            </div>

            <!-- card 8 -->
            <div class="min-w-[200px] max-w-sm snap-start flex-shrink-0 bg-white dark:bg-black rounded-xl shadow border dark:border-gray-700">
                <img src="{{ asset('image/article2.jpeg') }}" class="w-full h-48 object-cover rounded-t-xl" alt="">
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Judul Artikel 8</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Deskripsi artikel singkat.</p>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('js/app.js') }}"></script>

</body>

</html>