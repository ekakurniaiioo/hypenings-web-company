<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Hypenings')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
    <body class="bg-black text-white">
    <header class="dark:bg-black border-b border-gray-200 fixed w-full z-50 top-0 h-24">
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
                    <a href="/lifestyle" class="text-white hover:text-yellow-400 text-lg font-serif">Lifestyle</a>
                    <a href="/music" class="text-white hover:text-yellow-400 text-lg font-serif">Music</a>
                    <a href="/sport" class="text-white hover:text-yellow-400 text-lg font-serif">Sports</a>
                    <a href="/knowledge" class="text-white hover:text-yellow-400 text-lg font-serif">Knowledge</a>
                    <a href="/other" class="text-white hover:text-yellow-400 text-lg font-serif">Other</a>
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
                <a href="/lifestyle" class="block py-2 text-white hover:text-yellow-400">Lifestyle</a>
                <a href="/music" class="block py-2 text-white hover:text-yellow-400">Music</a>
                <a href="/sport" class="block py-2 text-white hover:text-yellow-400">Sport</a>
                <a href="/knowledge" class="block py-2 text-white hover:text-yellow-400">Knowledge</a>
                <a href="/other" class="block py-2 text-white hover:text-yellow-400">Other</a>
            </div>
        </header>

        <div class="h-24"></div>

            <!-- Lingkaran Glow 1 -->
<div class="absolute bottom-44 left-0 w-72 h-72 bg-yellow-400 opacity-20 rounded-full blur-3xl z-0 animate-float"></div>

    <!-- Lingkaran Glow 2 -->
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-yellow-300 opacity-20 rounded-full blur-3xl z-0"></div>


        <main class="min-h-screen">
            @yield('content')
        </main>

        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
