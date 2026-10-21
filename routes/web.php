<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Controllers
|--------------------------------------------------------------------------
*/

// Authentication
use App\Http\Controllers\AuthController;

// Customer / Public
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerOrderController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;

// Admin
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\CustomerController;

// Karyawan
// Dashboard karyawan masih menggunakan closure view.
// Kalau nanti ingin dinormalisasi juga, kita bisa buat
// Karyawan\DashboardController.


/*
|--------------------------------------------------------------------------
| PUBLIC / CUSTOMER
|--------------------------------------------------------------------------
*/


// =====================================================
// LANDING / DASHBOARD CUSTOMER
// =====================================================

Route::get('/', [ProductController::class, 'index'])->name('home');

Route::get('/dashboard', [ProductController::class, 'index'])->name('dashboard');


// =====================================================
// AUTHENTICATION
// =====================================================

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');


Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.process');

Route::middleware('auth')->group(function () {
    Route::get('/profil/edit', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::put('/profil', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::get('/reset-password', [
        \App\Http\Controllers\AuthController::class,
        'showResetPassword'
        ])->name('password.reset.form');

    Route::put('/reset-password', [
        \App\Http\Controllers\AuthController::class,
        'resetPassword'
    ])->name('password.reset.update');
});

// =====================================================
// LOGOUT
// =====================================================

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


// =====================================================
// PRODUK CUSTOMER
// =====================================================

Route::get('/produk', [ProductController::class, 'index'])
    ->name('products.index');

Route::get('/produk/{product}', [ProductController::class, 'show'])
    ->name('products.show');

/*
|--------------------------------------------------------------------------
| CART / KERANJANG
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:pelanggan'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::put('/cart/{key}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{key}', [CartController::class, 'remove'])->name('cart.remove');
    Route::delete('/cart', [CartController::class, 'clear'])->name('cart.clear');
});


// =====================================================
// PESANAN CUSTOMER
// =====================================================

Route::middleware(['auth', 'role:pelanggan'])->group(function () {

    Route::get('/pesanan/{id}', [CustomerOrderController::class, 'show'])
        ->name('customer.orders.show');

});


// =====================================================
// CHECKOUT
// =====================================================

Route::middleware(['auth', 'role:pelanggan'])->group(function () {

    Route::get('/checkout', [CheckoutController::class, 'index'])
        ->name('checkout.index');

    Route::post('/checkout', [CheckoutController::class, 'store'])
        ->name('checkout.store');

});


// =====================================================
// PAYMENT
// =====================================================

Route::middleware(['auth', 'role:pelanggan'])->group(function () {

    Route::get('/payment', [PaymentController::class, 'index'])
        ->name('payment.index');

    Route::post('/payment', [PaymentController::class, 'process'])
        ->name('payment.process');

    Route::get('/payment/success', [PaymentController::class, 'success'])
        ->name('payment.success');

});



/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/


Route::middleware(['auth', 'role:admin'])->group(function () {


    // =================================================
    // DASHBOARD ADMIN
    // =================================================

    Route::get('/admin/dashboard', [DashboardController::class, 'index'])
        ->name('admin.dashboard');


    // =================================================
    // DATA KARYAWAN
    // =================================================

    Route::resource('/admin/employees', EmployeeController::class)
        ->names('admin.employees');


    // =================================================
    // DATA PELANGGAN
    // =================================================

    Route::resource('/admin/customers', CustomerController::class)
        ->names('admin.customers');


    // =================================================
    // PESANAN
    // =================================================


});


/*
|--------------------------------------------------------------------------
| KELOLA PESANAN - ADMIN + KARYAWAN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin,karyawan'])->group(function () {

    Route::get('/admin/orders', [AdminOrderController::class, 'index'])
        ->name('admin.orders.index');

    Route::get('/admin/orders/{order}', [AdminOrderController::class, 'show'])
        ->name('admin.orders.show');

    Route::put(
        '/admin/orders/{order}/status',
        [AdminOrderController::class, 'updateStatus']
    )->name('admin.orders.updateStatus');

});


/*
|--------------------------------------------------------------------------
| ADMIN + KARYAWAN
|--------------------------------------------------------------------------
|
| Admin dan karyawan sama-sama boleh mengelola produk.
|
*/


Route::middleware(['auth', 'role:admin,karyawan'])->group(function () {

    Route::resource('/admin/products', AdminProductController::class)
        ->names('admin.products');

});



/*
|--------------------------------------------------------------------------
| KARYAWAN
|--------------------------------------------------------------------------
*/


Route::middleware(['auth', 'role:karyawan'])->group(function () {

    // =================================================
    // DASHBOARD KARYAWAN
    // =================================================

    Route::get('/karyawan/dashboard', function () {
        return view('karyawan.dashboard');
    })->name('karyawan.dashboard');

});