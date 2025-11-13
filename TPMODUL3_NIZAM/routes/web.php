<?php

use Illuminate\Support\Facades\Route;
# 1. Import controller agar bisa digunakan

# 2. Buatlah Route untuk menampilkan daftar kucing
# 3. Buatlah Route untuk menampilkan detail satu kucing
use App\Http\Controllers\KucingController;

Route::get('/', function () {
    return redirect('/kucing');
});

Route::get('/kucing', [KucingController::class, 'index'])->name('daftar.kucing');
Route::get('/kucing/{id}', [KucingController::class, 'show'])->name('detail.kucing');