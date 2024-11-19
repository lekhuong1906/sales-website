<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('home', function () {
    $products = \App\Models\Product::all();
    return view('home')->with('products', $products);
});
