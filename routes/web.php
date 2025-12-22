<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Test dữ liệu bảng categories
Route::resource('categories', CategoryController::class);