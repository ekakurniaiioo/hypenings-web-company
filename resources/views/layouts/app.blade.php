<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Hypenings')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&display=swap"
        rel="stylesheet">
</head>

<body
    class="transition-all duration-500 ease-in-out bg-gradient-to-b from-[#141414] via-gray-900 to-[#141414] text-white">
    <header id="navbar"
        class="border-gray-200 bg-[#2A2A2A] bg-opacity-80 fixed w-full z-50 top-0 h-20 transition-transform duration-500 ease-in-out">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-full items-center">

                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center h-full">
                    <a href="/home">
                        <img class="h-20 w-auto" src="{{ asset('image/hype.png') }}" alt="Logo">
                    </a>
                </div>

                <!-- Desktop Links -->
                <div class="hidden md:flex gap-x-6 items-center h-full">
                    <a href="/home" class="text-white hover:text-yellow-400 text-lg font-poppins">Topic</a>
                    @foreach (['lifestyle', 'music', 'sport', 'knowledge', 'other'] as $cat)
                        @php
                            $label = ucfirst($cat);
                            $route = session('content_type') === 'shorts'
                                ? route('showShortsByCategory', ['name' => $cat])
                                : route('category.show', ['name' => $cat]);
                        @endphp
                        <a href="{{ $route }}"
                            class="text-white hover:text-yellow-400 text-lg font-poppins">{{ $label }}</a>
                    @endforeach

                    <!-- Dropdown -->
                    @unless (in_array(Route::currentRouteName(), ['articles.show', 'articles.shortshow']))
                        <div class="relative">
                            <button id="desktopContentTypeButton"
                                class="flex items-center gap-1 text-white hover:text-yellow-400 text-lg font-poppins focus:outline-none">
                                Content Type
                                <svg id="desktopContentTypeArrow"
                                    class="w-4 h-4 transition-transform duration-300 transform" fill="none"
                                    stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div id="desktopContentTypeMenu"
                                class="absolute hidden flex-col mt-2 bg-black border border-gray-700 rounded-lg py-4 w-30 z-50">
                                <a href="{{ route('setContentType', ['type' => 'article']) }}"
                                    class="block px-4 py-2 text-sm font-poppins text-white hover:text-yellow-400">
                                    Article
                                </a>
                                <a href="{{ route('setContentType', ['type' => 'shorts']) }}"
                                    class="block px-4 py-2 text-sm font-poppins text-white hover:text-yellow-400">
                                    Shorts
                                </a>
                            </div>
                        </div>
                    @endunless
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
                class="fixed top-[86px] left-0 right-0 w-screen transition-all duration-500 ease-in-out hidden max-h-0 overflow-hidden opacity-0 scale-95 h-auto transform origin-top p-8 rounded shadow bg-[#141414] z-50 flex flex-col space-y-2">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-2xl font-grotesk text-white">Category</h2>
                    <div class="relative">
                        <button id="mobileContentTypeButton"
                            class="flex items-center gap-1 text-white hover:text-yellow-400 text-lg mt-1 font-poppins focus:outline-none">
                            Content Type
                            <svg id="mobileContentTypeArrow" class="w-4 h-4 transition-transform duration-300 transform"
                                fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div id="mobileContentTypeMenu"
                            class="absolute right-0 hidden flex-col mt-2 bg-black border border-gray-700 rounded-lg py-4 w-30 z-50">
                            <a href="{{ route('setContentType', ['type' => 'article']) }}"
                                class="block px-4 py-2 text-sm font-poppins text-white hover:text-yellow-400">
                                Article
                            </a>
                            <a href="{{ route('setContentType', ['type' => 'shorts']) }}"
                                class="block px-4 py-2 text-sm font-poppins text-white hover:text-yellow-400">
                                Shorts
                            </a>
                        </div>
                    </div>
                </div>

                <a href="/home" class="text-white hover:text-yellow-400 ml-6 text-sm pt-4 pb-2 font-poppins">Topic</a>
                @foreach (['lifestyle', 'music', 'sport', 'knowledge', 'other'] as $cat)
                    @php
                        $label = ucfirst($cat);
                        $route = session('content_type') === 'shorts'
                            ? route('showShortsByCategory', ['name' => $cat])
                            : route('showTopicByCategory', ['name' => $cat]); 
                    @endphp
                    <a href="{{ $route }}" class="block px-6 py-2 text-white hover:text-yellow-400 text-sm font-poppins">
                        {{ $label }}
                    </a>
                @endforeach
            </div>
        </div>

        <!-- Garis kuning -->
        <div class="h-[6px] bg-yellow-400 mt-0 w-full"></div>
    </header>

    <main class="min-h-screen">
        @yield('content')
    </main>

    <footer class="bg-[#111] text-white pt-14 pb-8 mt-20">
        <div class="max-w-7xl mx-auto px-4 md:px-8 grid md:grid-cols-2 gap-12">
            <div class="flex items-center gap-4 mb-4">
                <img src="{{ asset('image/hype.png') }}" class="h-20 w-20" alt="Logo Hypenings">
                <span class="text-xl font-grotesk font-bold">Hypenings</span>
            </div>

            <div class="grid grid-cols-2 gap-6 text-sm">
                <div>
                    <h3 class="font-grotesk mb-3">Categories</h3>
                    <ul class="space-y-2 text-gray-400">
                        @foreach (['lifestyle', 'music', 'sport', 'knowledge', 'other'] as $cat)
                            @php
                                $label = ucfirst($cat);
                                $route = session('content_type') === 'shorts'
                                    ? route('showTopicByCategory', ['name' => $cat])
                                    : route('category.show', ['name' => $cat]);
                            @endphp
                            <li><a href="{{ $route }}" class="px-6 py-2 hover:text-yellow-400 text-sm font-poppins">
                                    {{ $label }}
                            </li></a>
                        @endforeach
                    </ul>
                </div>

                <div>
                    <h3 class="font-grotesk mb-3">Company</h3>
                    <ul class="space-y-2 font-poppins text-gray-400">
                        <li><a href="#" class="hover:text-white">About</a></li>
                        <li><a href="#" class="hover:text-white">Privacy Policy</a></li>
                        <li><a href="#" class="hover:text-white">Terms of Use</a></li>
                    </ul>

                    <div class="flex gap-4 mt-4">
                        <a href="https://www.instagram.com/hypenings/?hl=en" class="text-2xl hover:text-pink-500"><i
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
    @stack('scripts')

</body>

</html>