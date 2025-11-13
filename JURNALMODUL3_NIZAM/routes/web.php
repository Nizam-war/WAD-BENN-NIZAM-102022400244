<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\DashboardController;
use App\Http\controllers\ProfileController;

Route::get('/', [DashboardController::class, 'index']);
Route::get('/profile', [ProfileController::class, 'index']);