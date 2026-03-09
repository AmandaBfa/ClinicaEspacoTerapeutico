<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// auth routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// admin routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/ouvidoria', [FeedbackController::class, 'index'])->name('admin.ouvidoria');
    Route::get('/admin/ouvidoria/{feedback}', [FeedbackController::class, 'show'])->name('admin.ouvidoria.show');
    Route::patch('/admin/ouvidoria/{feedback}/status', [FeedbackController::class, 'updateStatus'])->name('admin.ouvidoria.status');
    Route::post('/admin/ouvidoria/{feedback}/responder', [FeedbackController::class, 'responder'])->name('admin.ouvidoria.responder');
});

Route::post('/contact/feedback', [FeedbackController::class, 'store'])->name('feedback.store');

// Páginas Estáticas
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', function () { return view('about'); })->name('about');
Route::get('/contact', function () { return view('contact'); })->name('contact');

// Serviços 
Route::get('/services', [ServiceController::class, 'index'])->name('services');

// Blog
Route::get('/blog/index', [PostController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [PostController::class, 'show'])->name('blog.show');

require __DIR__.'/auth.php';
