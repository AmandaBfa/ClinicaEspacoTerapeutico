<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AgendamentoController;
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

    Route::get('/agendar', [AgendamentoController::class, 'create'])->name('agendar.create');
    Route::post('/agendar', [AgendamentoController::class, 'store'])->name('agendar.store');
});

// admin routes
Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/ouvidoria', [FeedbackController::class, 'index'])->name('admin.ouvidoria');
    Route::get('/admin/ouvidoria/{feedback}', [FeedbackController::class, 'show'])->name('admin.ouvidoria.show');
    Route::patch('/admin/ouvidoria/{feedback}/status', [FeedbackController::class, 'updateStatus'])->name('admin.ouvidoria.status');
    Route::post('/admin/ouvidoria/{feedback}/responder', [FeedbackController::class, 'responder'])->name('admin.ouvidoria.responder');
    Route::put('/admin/ouvidoria/{feedback}/status', [FeedbackController::class, 'updateStatus'])->name('admin.ouvidoria.updateStatus');

    // Rotas do Blog
    Route::get('/admin/blog', [PostController::class, 'index'])->name('admin.blog.index');
    Route::get('/admin/blog/create', [PostController::class, 'create'])->name('admin.blog.create');
    Route::post('/admin/blog', [PostController::class, 'store'])->name('admin.blog.store');
    Route::get('/admin/blog/{id}/edit', [PostController::class, 'edit'])->name('admin.blog.edit');
    Route::put('/admin/blog/{id}', [PostController::class, 'update'])->name('admin.blog.update');
    Route::delete('/admin/blog/{id}', [PostController::class, 'delete'])->name('admin.blog.delete');

    // Rotas dos Serviços
    Route::get('/admin/services', [ServiceController::class, 'index'])->name('admin.services.index');
    Route::get('/admin/services/create', [ServiceController::class, 'create'])->name('admin.services.create');
    Route::post('/admin/services', [ServiceController::class, 'store'])->name('admin.services.store');
    Route::get('/admin/services/{id}/edit', [ServiceController::class, 'edit'])->name('admin.services.edit');
    Route::put('/admin/services/{id}', [ServiceController::class, 'update'])->name('admin.services.update');
    Route::delete('/admin/services/{id}', [ServiceController::class, 'delete'])->name('admin.services.delete');

    // Rotas dos Profissionais
    Route::get('/admin/employees', [EmployeeController::class, 'index'])->name('admin.employees.index');
    Route::get('/admin/employees/create', [EmployeeController::class, 'create'])->name('admin.employees.create');
    Route::post('/admin/employees', [EmployeeController::class, 'store'])->name('admin.employees.store');
    Route::get('/admin/employees/{id}/edit', [EmployeeController::class, 'edit'])->name('admin.employees.edit');
    Route::put('/admin/employees/{id}', [EmployeeController::class, 'update'])->name('admin.employees.update');
    Route::delete('/admin/employees/{id}', [EmployeeController::class, 'delete'])->name('admin.employees.delete');
});

Route::post('/contact/feedback', [FeedbackController::class, 'store'])->name('feedback.store');

// Páginas Estáticas
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [EmployeeController::class, 'indexPublic'])->name('about');
Route::get('/contact', function () { return view('contact'); })->name('contact');


// Serviços 
Route::get('/services', [ServiceController::class, 'indexPublic'])->name('services');
Route::get('/services/{id}', [ServiceController::class, 'show'])->name('services.show');

// Blog
Route::get('/blogPublic/index', [PostController::class, 'indexPublic'])->name('blogPublic.index');
Route::get('/blogPublic/{slug}', [PostController::class, 'show'])->name('blogPublic.show');

require __DIR__.'/auth.php';
