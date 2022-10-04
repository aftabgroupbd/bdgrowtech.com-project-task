<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
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

Route::get('/',[AuthController::class,'index'])->name('home');
Route::post('/login',[AuthController::class,'login'])->name('login');

Route::middleware(['is_loggedin'])->group(function () {
    Route::get('/currency',[DashboardController::class,'index'])->name('currency');
    Route::get('/currency/store',[DashboardController::class,'store'])->name('currency.store');
    Route::get('/currency/update',[DashboardController::class,'update'])->name('currency.update');
    Route::get('/logout',[AuthController::class,'logout'])->name('logout');
});
