<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\PageController;

// ======================================================
// 🔹 HALAMAN PUBLIK (FRONTEND)
// ======================================================
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/project', [PageController::class, 'project'])->name('project');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/services', [PageController::class, 'services'])->name('services');

// Blog utama & detail
Route::get('/blog', [PageController::class, 'blog'])->name('blog');
Route::get('/blog/{slug}', [PageController::class, 'blogDetail'])->name('blog.detail');

Route::get('/contact', [PageController::class, 'contact'])->name('contact');

// ======================================================
// 🔹 LOGIN / REGISTER ADMIN
// ======================================================
Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('admin.login');
    Route::post('/admin/login', [AuthController::class, 'login']);
    Route::get('/admin/register', [AuthController::class, 'showRegister'])->name('admin.register');
    Route::post('/admin/register', [AuthController::class, 'register']);
});

// Redirect default Laravel login ke admin login
Route::get('/login', fn() => redirect()->route('admin.login'))->name('login');

// ======================================================
// 🔹 ADMIN AREA (DASHBOARD, CRUD, LOGOUT)
// ======================================================
Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->name('admin.')
    ->group(function () {

        // Dashboard utama
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Project
        Route::resource('projects', ProjectController::class);

        // About
        Route::get('/about/edit', [AboutController::class, 'edit'])->name('about.edit');
        Route::put('/about/update', [AboutController::class, 'update'])->name('about.update');

        // Services
        Route::resource('services', ServiceController::class)->except(['show']);

        // News CRUD (tanpa show)
        Route::resource('news', NewsController::class)->except(['show']);

        // 🔸 Home Section Management (Admin Only)
        Route::get('/home', [HomeController::class, 'index'])->name('home');
        Route::post('/home', [HomeController::class, 'update'])->name('home.update');
        Route::delete('/home/slide/{id}', [HomeController::class, 'deleteSlide'])->name('home.deleteSlide');

        // Logout
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });
