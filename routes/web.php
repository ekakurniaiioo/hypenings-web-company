<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('hypenings');
});
Route::get('/home', function () {
    return view('hypenings');
});
Route::get('/lifestyle', function () {
    return view('lifestyle');
});
Route::get('/music', function () {
    return view('music');
});
Route::get('/sport', function () {
    return view('sport');
});
Route::get('/knowledge', function () {
    return view('knowledge');
});
Route::get('/other', function () {
    return view('other');
});

