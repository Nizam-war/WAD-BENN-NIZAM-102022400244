<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

/**
 * - Middleware: `auth`
 * - Rute terkait ulasan (reviews)
*/
Route::middleware(['auth', 'role:admin,mahasiswa'])->group(function () {

    // 1. Tambahkan route untuk menyimpan review baru
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');

    // 2. Tambahkan route untuk menghapus review
    Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
});

/**
 * Middleware: `auth` dan `role:admin`
 * Prefix URL: `/admin`
 * CRUD Produk
*/
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {

    // 1. Tambahkan route untuk menampilkan daftar produk
    Route::get('/products', [ProductController::class, 'index'])->name('admin.index');

    // 2. Tambahkan route untuk menampilkan form tambah produk
    Route::get('/products/create', [ProductController::class, 'create'])->name('admin.create');

    // 3. Tambahkan route untuk menyimpan produk baru
    Route::post('/products', [ProductController::class, 'store'])->name('admin.store');

    // 4. Tambahkan route untuk menampilkan form edit produk
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('admin.edit');

    // 5. Tambahkan route untuk menyimpan perubahan produk
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('admin.update');

    // 6. Tambahkan route untuk menghapus produk
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('admin.destroy');
});
