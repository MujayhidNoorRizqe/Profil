<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ServiceController;

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
// LOGIN / REGISTER ADMIN
// -------------------------
Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('admin.login');
    Route::post('/admin/login', [AuthController::class, 'login']);
    Route::get('/admin/register', [AuthController::class, 'showRegister'])->name('admin.register');
    Route::post('/admin/register', [AuthController::class, 'register']);
});

Route::get('/login', fn() => redirect()->route('admin.login'))->name('login');

// -------------------------
// ADMIN AREA
// -------------------------
Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('projects', ProjectController::class);
        Route::get('/about/edit', [AboutController::class, 'edit'])->name('about.edit');
        Route::put('/about/update', [AboutController::class, 'update'])->name('about.update');
        Route::resource('services', ServiceController::class)->except(['show']);
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });

// -------------------------
// HOME SECTION
// -------------------------
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'index'])->name('admin.home');
    Route::post('/admin/home', [HomeController::class, 'update'])->name('admin.home.update');
    Route::delete('/admin/home/slide/{id}', [HomeController::class, 'deleteSlide'])->name('admin.home.deleteSlide');
});
