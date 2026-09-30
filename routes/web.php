<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', [ProductController::class, 'index'])
    ->name('dashboard');

Route::get('/produk/{id}', [ProductController::class, 'show'])
    ->name('product.detail');

Route::get(
    '/produk/{id}',
    [ProductDetailController::class, 'show']
)->name('product.detail');

Route::get('/keranjang', [CartController::class, 'index'])
    ->name('cart.index');

Route::post('/keranjang/tambah', [CartController::class, 'add'])
    ->name('cart.add');

Route::put('/keranjang/{key}', [CartController::class, 'update'])
    ->name('cart.update');

Route::delete('/keranjang/{key}', [CartController::class, 'remove'])
    ->name('cart.remove');

Route::delete('/keranjang', [CartController::class, 'clear'])
    ->name('cart.clear');

// AUTH
Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');


Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.process');


Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


// CHECKOUT
Route::get('/checkout', [CheckoutController::class, 'index'])
    ->middleware('auth')
    ->name('checkout.index');