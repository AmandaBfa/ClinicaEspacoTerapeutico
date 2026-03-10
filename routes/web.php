<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminDashboardController;
use Illuminate\Support\Facades\Auth;

Route::get('/dashboard', function () {
    $user = Auth::user();

    if ($user && $user->usertype === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('home');
})->middleware(['auth', 'verified'])->name('dashboard');


// auth routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// // admin routes
// Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

//     Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

//     Route::get('/ouvidoria', [FeedbackController::class, 'index'])->name('ouvidoria');
//     Route::get('/ouvidoria/{feedback}', [FeedbackController::class, 'show'])->name('ouvidoria.show');
//     Route::patch('/ouvidoria/{feedback}/status', [FeedbackController::class, 'updateStatus'])->name('ouvidoria.status');
//     Route::post('/ouvidoria/{feedback}/responder', [FeedbackController::class, 'responder'])->name('ouvidoria.responder');

//     // Rotas do Blog
//     Route::prefix('blog')->name('blog.')->group(function () {
//         Route::get('/', [PostController::class, 'index'])->name('index');
//         Route::get('/create', [PostController::class, 'create'])->name('create');
//         Route::post('/', [PostController::class, 'store'])->name('store');
//         Route::get('/{id}/edit', [PostController::class, 'edit'])->name('edit');
//         Route::put('/{id}', [PostController::class, 'update'])->name('update');
//         Route::delete('/{id}', [PostController::class, 'delete'])->name('delete');
//     });
// });

// admin routes
Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/ouvidoria', [FeedbackController::class, 'index'])->name('admin.ouvidoria');
    Route::get('/admin/ouvidoria/{feedback}', [FeedbackController::class, 'show'])->name('admin.ouvidoria.show');
    Route::patch('/admin/ouvidoria/{feedback}/status', [FeedbackController::class, 'updateStatus'])->name('admin.ouvidoria.status');
    Route::post('/admin/ouvidoria/{feedback}/responder', [FeedbackController::class, 'responder'])->name('admin.ouvidoria.responder');

    // Rotas do Blog
    Route::get('/admin/blog', [PostController::class, 'index'])->name('admin.blog.index');
    Route::get('/admin/blog/create', [PostController::class, 'create'])->name('admin.blog.create');
    Route::post('/admin/blog', [PostController::class, 'store'])->name('admin.blog.store');
    Route::get('/admin/blog/{id}/edit', [PostController::class, 'edit'])->name('admin.blog.edit');
    Route::put('/admin/blog/{id}', [PostController::class, 'update'])->name('admin.blog.update');
    Route::delete('/admin/blog/{id}', [PostController::class, 'delete'])->name('admin.blog.delete');
});

Route::post('/contact/feedback', [FeedbackController::class, 'store'])->name('feedback.store');

// Páginas Estáticas
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', function () { return view('about'); })->name('about');
Route::get('/contact', function () { return view('contact'); })->name('contact');

// Serviços 
Route::get('/services', [ServiceController::class, 'index'])->name('services');

// Blog
Route::get('/blog/index', [PostController::class, 'indexPublic'])->name('blog.index');
Route::get('/blog/{slug}', [PostController::class, 'show'])->name('blog.show');

require __DIR__.'/auth.php';
