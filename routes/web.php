<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\DashboardController;

// -------------------------
// HALAMAN PUBLIK
// -------------------------
Route::get('/', [App\Http\Controllers\PageController::class, 'home'])->name('home');
Route::get('/project', [App\Http\Controllers\PageController::class, 'project'])->name('project');
Route::get('/about', [App\Http\Controllers\PageController::class, 'about'])->name('about');
Route::get('/services', [App\Http\Controllers\PageController::class, 'services'])->name('services');
Route::get('/blog', [App\Http\Controllers\PageController::class, 'blog'])->name('blog');
Route::get('/contact', [App\Http\Controllers\PageController::class, 'contact'])->name('contact');

// -------------------------
// LOGIN / REGISTER ADMIN (Hanya guest)
// -------------------------
Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('admin.login');
    Route::post('/admin/login', [AuthController::class, 'login']);

    Route::get('/admin/register', [AuthController::class, 'showRegister'])->name('admin.register');
    Route::post('/admin/register', [AuthController::class, 'register']);
});

// -------------------------
// ADMIN DASHBOARD & CRUD (Hanya auth + admin)
// -------------------------
Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('projects', ProjectController::class);
        Route::get('/about/edit', [AboutController::class, 'edit'])->name('about.edit');
        Route::put('/about/update', [AboutController::class, 'update'])->name('about.update');
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });
