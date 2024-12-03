<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthenticateController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('products', [ProductController::class, 'index'])->name('products');
Route::get('product/{id}', [ProductController::class, 'show'])->name('product-detail');
Route::get('checkout',[HomeController::class, 'checkout'])->name('checkout');

Route::get('login',[AuthenticateController::class, 'loginForm'])->name('login');
Route::post('handle-login', [AuthenticateController::class, 'login'])->name('handle-login');

Route::prefix('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('products', [ProductController::class, 'adminProductList'])->name('admin.products');
    Route::get('product-add', [ProductController::class, 'create'])->name('admin.product-add');
    Route::get('product-edit/{id}', [ProductController::class, 'edit'])->name('admin.product-edit');
    Route::post('product-store', [ProductController::class, 'store'])->name('admin.product-store');
    Route::put('product-update/{id}', [ProductController::class, 'update'])->name('admin.product-update');
    Route::delete('product-destroy/{id}', [ProductController::class, 'destroy'])->name('admin.product-destroy');

    Route::get('tags', [TagController::class, 'index'])->name('admin.tags');
    Route::get('tag-add', [TagController::class, 'create'])->name('admin.tag-add');
    Route::get('tag-edit/{id}', [TagController::class, 'edit'])->name('admin.tag-edit');
    Route::put('tag-update/{id}', [TagController::class, 'update'])->name('admin.tag-update');
    Route::post('tag-store', [TagController::class, 'store'])->name('admin.tag-store');
    Route::post('tag-active', [TagController::class, 'activeTag'])->name('admin.tag-active');
    Route::post('tag-inactive', [TagController::class, 'inactiveTag'])->name('admin.tag-inactive');
    Route::post('tag-destroy', [TagController::class, 'destroy'])->name('admin.tag-destroy');
    Route::post('tag-force-delete', [TagController::class, 'forceDelete'])->name('admin.tag-force-delete');
    Route::post('tag-restore', [TagController::class, 'restore'])->name('admin.tag-restore');

});
