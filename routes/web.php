<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/services', [ServiceController::class, 'index'])->name('services');

Route::get('/blog', function () {
    return view('blog');
});

Route::get('/contact', function () {
    return view('contact');
});