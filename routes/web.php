<?php

// Kumpulkan semua 'use' statement di bagian atas
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProjectController; // <-- TAMBAHKAN INI

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// == HALAMAN PUBLIK ==
// Route-route ini bisa diakses oleh siapa saja.
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/project', [PageController::class, 'project'])->name('project');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/blog', [PageController::class, 'blog'])->name('blog');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');


// == HALAMAN UNTUK PENGGUNA YANG SUDAH LOGIN ==
Route::middleware('auth')->group(function () {
    // Dashboard standar untuk pengguna biasa
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Halaman profil pengguna
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // == HALAMAN KHUSUS ADMIN ==
    // Grup ini memiliki prefix URL '/admin' dan nama route 'admin.'
    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // === TAMBAHKAN ROUTE INI UNTUK PROYEK ===
        // Ini akan secara otomatis membuat route seperti:
        // admin.projects.index, admin.projects.create, admin.projects.store, dll.
        Route::resource('projects', ProjectController::class);
    });
});


// Ini akan secara otomatis menyertakan semua route untuk login, register, logout, dll.
require __DIR__.'/auth.php';