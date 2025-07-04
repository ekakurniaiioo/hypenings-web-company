<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('hypenings');
});

Route::get('/home', function () {
    return view('hypenings');
});

Route::get('/lifestyle', [PostController::class, 'lifestyle'])->name('lifestyle');

Route::get('/music', [PostController::class, 'music'])->name('music');

Route::get('/sport', [PostController::class, 'sport'])->name('sport');

Route::get('/knowledge', [PostController::class, 'knowledge'])->name('knowledge');

Route::get('/other', [PostController::class, 'other'])->name('other');

