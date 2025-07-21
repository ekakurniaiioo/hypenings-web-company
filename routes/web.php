<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::get('/', [ArticleController::class, 'index'])->name('articles.index');

Route::get('/home', [ArticleController::class, 'index'])->name('articles.index');

Route::get('/category/{name}', [ArticleController::class, 'showCategory'])->name('category.show');

Route::get('/shorts/category/{name}', function ($name) {
    session(['content_type' => 'shorts']);
    return redirect()->route('category.show', ['name' => $name]);
})->name('showShortsByCategory');

Route::get('/topic/category/{name}', function ($name) {
    session(['content_type' => 'article']);
    return redirect()->route('category.show', ['name' => $name]);
})->name('showTopicByCategory');

Route::get('/artikel', [ArticleController::class, 'index'])->name('artikel.index');

Route::get('/articles/{slug}', [ArticleController::class, 'show'])->name('articles.show');

Route::get('/shorts/{slug}', [ArticleController::class, 'shortShow'])->name('articles.shortshow');

Route::get('/article', [ArticleController::class, 'showTopic'])->name('showTopic');

Route::get('/shorts', [ArticleController::class, 'showShorts'])->name('showShorts');




