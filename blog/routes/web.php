<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// COSME
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::resource('categories', CategoriesController::class);

// COSME
Route::get('', [ProductController::class, 'display_products']);
Route::get('{id}', [ProductController::class, 'show']);
