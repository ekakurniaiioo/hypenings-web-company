@extends('layouts.app')

@section('content')

<section class="mt-16 mr-0 md:mr-32 md:ml-48 px-4 md:px-16">
    <h2 class="text-4xl font-bold text-center text-white my-12">Category</h2>
    <h2 class="text-3xl font-bold text-center text-white mb-24">lifestyle</h2>

    <div class="flex flex-col items-center justify-center">
        <article class="flex flex-col md:flex-row gap-6 w-full md:w-[60%] h-auto md:h-64 overflow-hidden mb-8 shadow-lg bg-white dark:bg-black border border-gray-200 dark:border-gray-700 hover:scale-[1.02] transition-transform duration-300">
            <img class="w-full md:w-64 h-48 md:h-full object-cover" src="{{ asset('image/article5.jpeg') }}" alt="Article Image">
            <div class="p-4 pt-10">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Judul Artikel 1</h2>
                <p class="text-sm text-gray-600 dark:text-gray-300 mb-5">Deskripsi singkat dari artikel pertama. Ringkas dan menarik. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita, ducimus alias corrupti maiores vero ipsum voluptatem rem iste excepturi dolorum temporibus quis dolore rerum voluptas tempore laboriosam vitae optio laudantium.</p>
                <h2 class="font-sans text-gray-200 dark:text-white mb-2">3 juli 2025</h2>
                <a href="#" class="text-blue-600 hover:underline text-sm font-medium">Baca Selengkapnya →</a>
            </div>
        </article>

        <article class="flex flex-col md:flex-row gap-6 w-full md:w-[60%] h-auto md:h-64 overflow-hidden mb-8 shadow-lg bg-white dark:bg-black border border-gray-200 dark:border-gray-700 hover:scale-[1.02] transition-transform duration-300">
            <img class="w-full md:w-64 h-48 md:h-full object-cover" src="{{ asset('image/article7.jpeg') }}" alt="Article Image">
            <div class="p-4 pt-10">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Judul Artikel 2</h2>
                <p class="text-sm text-gray-600 dark:text-gray-300 mb-5">Deskripsi singkat dari artikel pertama. Ringkas dan menarik. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita, ducimus alias corrupti maiores vero ipsum voluptatem rem iste excepturi dolorum temporibus quis dolore rerum voluptas tempore laboriosam vitae optio laudantium.</p>
                <h2 class="font-sans text-gray-200 dark:text-white mb-2">3 juli 2025</h2>
                <a href="#" class="text-blue-600 hover:underline text-sm font-medium">Baca Selengkapnya →</a>
            </div>
        </article>

        <article class="flex flex-col md:flex-row gap-6 w-full md:w-[60%] h-auto md:h-64 overflow-hidden mb-8 shadow-lg bg-white dark:bg-black border border-gray-200 dark:border-gray-700 hover:scale-[1.02] transition-transform duration-300">
            <img class="w-full md:w-64 h-48 md:h-full object-cover" src="{{ asset('image/article10.jpeg') }}" alt="Article Image">
            <div class="p-4 pt-10">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Judul Artikel 3</h2>
                <p class="text-sm text-gray-600 dark:text-gray-300 mb-5">Deskripsi singkat dari artikel pertama. Ringkas dan menarik. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita, ducimus alias corrupti maiores vero ipsum voluptatem rem iste excepturi dolorum temporibus quis dolore rerum voluptas tempore laboriosam vitae optio laudantium.</p>
                <h2 class="font-sans text-gray-200 dark:text-white mb-2">3 juli 2025</h2>
                <a href="#" class="text-blue-600 hover:underline text-sm font-medium">Baca Selengkapnya →</a>
            </div>
        </article>

        <article class="flex flex-col md:flex-row gap-6 w-full md:w-[60%] h-auto md:h-64 overflow-hidden mb-8 shadow-lg bg-white dark:bg-black border border-gray-200 dark:border-gray-700 hover:scale-[1.02] transition-transform duration-300">
            <img class="w-full md:w-64 h-48 md:h-full object-cover" src="{{ asset('image/article4.jpeg') }}" alt="Article Image">
            <div class="p-4 pt-10">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Judul Artikel 4</h2>
                <p class="text-sm text-gray-600 dark:text-gray-300 mb-5">Deskripsi singkat dari artikel pertama. Ringkas dan menarik. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita, ducimus alias corrupti maiores vero ipsum voluptatem rem iste excepturi dolorum temporibus quis dolore rerum voluptas tempore laboriosam vitae optio laudantium.</p>
                <h2 class="font-sans text-gray-200 dark:text-white mb-2">3 juli 2025</h2>
                <a href="#" class="text-blue-600 hover:underline text-sm font-medium">Baca Selengkapnya →</a>
            </div>
        </article>

        <article class="flex flex-col md:flex-row gap-6 w-full md:w-[60%] h-auto md:h-64 overflow-hidden mb-8 shadow-lg bg-white dark:bg-black border border-gray-200 dark:border-gray-700 hover:scale-[1.02] transition-transform duration-300">
            <img class="w-full md:w-64 h-48 md:h-full object-cover" src="{{ asset('image/article8.jpeg') }}" alt="Article Image">
            <div class="p-4 pt-10">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Judul Artikel 5</h2>
                <p class="text-sm text-gray-600 dark:text-gray-300 mb-5">Deskripsi singkat dari artikel pertama. Ringkas dan menarik. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita, ducimus alias corrupti maiores vero ipsum voluptatem rem iste excepturi dolorum temporibus quis dolore rerum voluptas tempore laboriosam vitae optio laudantium.</p>
                <h2 class="font-sans text-gray-200 dark:text-white mb-2">3 juli 2025</h2>
                <a href="#" class="text-blue-600 hover:underline text-sm font-medium">Baca Selengkapnya →</a>
            </div>
        </article>
    </div>
</section>


@endsection