<?php

use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\CategoryController;
use Illuminate\Support\Facades\Route;

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


Route::GET('/dashboard', function () {
    return view('dashboard.settings.index');
})->name('dashboard.settings.index');

Route::PUT('/setting/update/{setting}',[SettingController::class,'update'])->name('dashboard.settings.update');



//Categories

Route::GET('category/index', [CategoryController::class, 'index'])->name('dashboard.category.index');
Route::GET('category/edit/{id}', [CategoryController::class, 'edit'])->name('dashboard.category.edit');
Route::PUT('category/update/{id}', [CategoryController::class, 'update'])->name('dashboard.category.update');
Route::DELETE('category/delete', [CategoryController::class, 'delete'])->name('dashboard.category.delete');
Route::POST('category/store', [CategoryController::class, 'store'])->name('dashboard.category.store');
Route::GET('category/ajax', [CategoryController::class, 'getAll'])->name('dashboard.category.ajaxCategory');

//Products

Route::GET('product/index', [ProductController::class, 'index'])->name('dashboard.product.index');
Route::GET('product/create', [ProductController::class, 'create'])->name('dashboard.product.create');
Route::POST('product/store', [ProductController::class, 'store'])->name('dashboard.product.store');
Route::GET('product/edit/{id}', [SettingController::class, 'edit'])->name('dashboard.product.edit');
