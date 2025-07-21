<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Hypenings')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.4.2/p5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.topology.min.js"></script>
</head>

<body class="bg-[#141414] text-white">
    <header id="navbar" class="bg-[#141414] fixed w-full z-50 top-0 h-24 transition-transform duration-500 ease-in-out">
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
                    <a href="/home" class="text-white hover:text-yellow-400 text-lg font-serif">Topic</a>
                    @if (session('content_type') === 'shorts')
                        <a href="{{ route('showShortsByCategory', ['name' => 'lifestyle']) }}">Lifestyle</a>
                    @else
                        <a href="{{ route('category.show', ['name' => 'lifestyle']) }}"
                            class="text-white hover:text-yellow-400 text-lg font-serif">
                            Lifestyle
                        </a>
                    @endif
                    @if (session('content_type') === 'shorts')
                        <a href="{{ route('showShortsByCategory', ['name' => 'music']) }}">Music</a>
                    @else
                        <a href="{{ route('category.show', ['name' => 'music']) }}"
                            class="text-white hover:text-yellow-400 text-lg font-serif">
                            Music
                        </a>
                    @endif
                    @if (session('content_type') === 'shorts')
                        <a href="{{ route('showShortsByCategory', ['name' => 'sport']) }}">Sport</a>
                    @else
                        <a href="{{ route('category.show', ['name' => 'sport']) }}"
                            class="text-white hover:text-yellow-400 text-lg font-serif">
                            Sport
                        </a>
                    @endif
                    @if (session('content_type') === 'shorts')
                        <a href="{{ route('showShortsByCategory', ['name' => 'knowledge']) }}">Knowledge</a>
                    @else
                        <a href="{{ route('category.show', ['name' => 'knowledge']) }}"
                            class="text-white hover:text-yellow-400 text-lg font-serif">
                            Knowledge
                        </a>
                    @endif
                    @if (session('content_type') === 'shorts')
                        <a href="{{ route('showShortsByCategory', ['name' => 'other']) }}">Other</a>
                    @else
                        <a href="{{ route('category.show', ['name' => 'other']) }}"
                            class="text-white hover:text-yellow-400 text-lg font-serif">
                            Other
                        </a>
                    @endif

                    @php
                        $currentCategory = Request::segment(2);
                    @endphp
                    
                    <div class="relative">
                        <button id="dropdownButton"
                            class="flex items-center gap-1 text-white hover:text-yellow-400 text-lg font-serif focus:outline-none">
                            Content Type
                            <svg id="dropdownArrow" class="w-4 h-4 transition-transform duration-300 transform"
                                fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div id="dropdownMenu"
                            class="absolute hidden flex-col mt-2 bg-black border border-gray-700 rounded-lg py-4 w-30 z-50">
                            <a href="{{ route('showTopic') }}"
                                class="px-6 py-2 text-white hover:text-yellow-400 text-sm font-serif">
                                Article
                            </a>
                            <a href="{{ route('showShorts') }}"
                                class="px-6 py-2 text-white hover:text-yellow-400 text-sm font-serif">
                                Shorts
                            </a>
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
                <a href="/home" class="text-white hover:text-yellow-400 text-lg font-serif">Topic</a>
                @if (session('content_type') === 'shorts')
                    <a href=" {{ route('showShortsByCategory', ['name' => 'lifestyle']) }}">Lifestyle</a>
                @else
                    <a href="{{ route('category.show', ['name' => 'lifestyle']) }}"
                        class="text-white hover:text-yellow-400 text-lg font-serif">
                        Lifestyle
                    </a>
                @endif
                @if (session('content_type') === 'shorts')
                    <a href=" {{ route('showShortsByCategory', ['name' => 'music']) }}">Music</a>
                @else
                    <a href="{{ route('category.show', ['name' => 'music']) }}"
                        class="text-white hover:text-yellow-400 text-lg font-serif">
                        Music
                    </a>
                @endif
                @if (session('content_type') === 'shorts')
                    <a href=" {{ route('showShortsByCategory', ['name' => 'sport']) }}">Sport</a>
                @else
                    <a href="{{ route('category.show', ['name' => 'sport']) }}"
                        class="text-white hover:text-yellow-400 text-lg font-serif">
                        Sport
                    </a>
                @endif
                @if (session('content_type') === 'shorts')
                    <a href=" {{ route('showShortsByCategory', ['name' => 'knowledge']) }}">Knowledge</a>
                @else
                    <a href="{{ route('category.show', ['name' => 'knowledge']) }}"
                        class="text-white hover:text-yellow-400 text-lg font-serif">
                        Knowledge
                    </a>
                @endif
                @if (session('content_type') === 'shorts')
                    <a href=" {{ route('showShortsByCategory', ['name' => 'other']) }}">Other</a>
                @else
                    <a href="{{ route('category.show', ['name' => 'other']) }}"
                        class="text-white hover:text-yellow-400 text-lg font-serif">
                        Other
                    </a>
                @endif
            </div>
    </header>

    <main class="min-h-screen">
        @yield('content')
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
                <a href="https://www.instagram.com/hypenings/?hl=en" target="_blank" class="hover:text-pink-500 transition">
                    <!-- Instagram icon -->
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M7 4h10a3 3 0 013 3v10a3 3 0 01-3 3H7a3 3 0 01-3-3V7a3 3 0 013-3z" />
                        <circle cx="12" cy="12" r="3" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.5 6.5h.01" />
                    </svg>
                </a>
                <a href="https://www.tiktok.com/@hypenings" target="_blank" class="hover:text-gray-300 transition">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M14 3a5 5 0 005 5h1v3h-1a8 8 0 01-8-8V3h3zm-3 6v9a3 3 0 11-3-3h1a2 2 0 102 2V9h2z" />
                    </svg>
                </a>
                <a href="mailto:senidalamhidupSDH@gmail.com" class="hover:text-red-400 transition">
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
    @stack('scripts')

</body>

</html>