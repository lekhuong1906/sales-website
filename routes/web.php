<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('products', [ProductController::class,'index'])->name('products');


Route::get('dashboard', [DashboardController::class,'index'])->name('dashboard');
