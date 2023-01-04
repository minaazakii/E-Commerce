<?php

use App\Http\Controllers\Dashboard\SettingController;
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
