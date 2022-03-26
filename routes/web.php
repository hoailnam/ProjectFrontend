<?php

use App\Http\Controllers\Front;
use App\Http\Controllers\Front\CartController;
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

Route::get('/', [Front\HomeController::class, 'index']);

Route::get('danh-nhap', [Front\UserController::class, 'showLogin'])->name('dang-nhap');
Route::post('danh-nhap', [Front\UserController::class, 'login'])->name('login');
// Route::get()

Route::get('danh-ky', [Front\UserController::class, 'showRegister'])->name('dang-ky');
Route::post('danh-ky', [Front\UserController::class, 'register'])->name('register');


Route::get('logout', [Front\UserController::class, 'logout'])->name('logout');


Route::prefix('shop')->group(function () {
    Route::get('/product/{id}', [Front\ShopController::class, 'show']);

    Route::get('/', [Front\ShopController::class, 'index']);

    Route::get('/{brandName}', [Front\ShopController::class, 'brand']);
});


Route::prefix('Cart')->group(function () {
    Route::get('/addCart/{id}', [Front\CartController::class, 'AddCart']);
    Route::get('/removeCart/{rowId}', [Front\CartController::class, 'RemoveCart']);
    Route::get('/updateCart/{rowId}/{qty}', [Front\CartController::class, 'UpdateCart']);
    Route::get('/showCart/', [Front\CartController::class, 'ShowCart']);
});
