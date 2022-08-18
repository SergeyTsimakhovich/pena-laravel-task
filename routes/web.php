<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'products', 'middleware' => 'auth'], function () {
    Route::get('/', [ProductController::class, 'index'])->name('products.list');
    Route::post('/store', [ProductController::class, 'store'])->name('products.store');
    Route::put('/update/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::get('/create', [ProductController::class, 'create'])->name('products.create');
    Route::get('/show/{id}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
    Route::delete('/destroy', [ProductController::class, 'destroy'])->name('products.destroy');
});


