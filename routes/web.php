<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| CONTROLLERS
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
use App\Http\Controllers\Admin\SalesReportController;

// Karyawan
use App\Http\Controllers\Karyawan\ProductController as KaryawanProductController;


/*
|--------------------------------------------------------------------------
| PUBLIC / CUSTOMER
|--------------------------------------------------------------------------
*/

Route::get('/', [ProductController::class, 'index'])
    ->name('home');

Route::get('/dashboard', [ProductController::class, 'index'])
    ->name('dashboard');


/*
|--------------------------------------------------------------------------
| AUTHENTICATION
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.process');


/*
|--------------------------------------------------------------------------
| PROFILE
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/profil/edit', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::put('/profil', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::get('/reset-password', [AuthController::class, 'showResetPassword'])
        ->name('password.reset.form');

    Route::put('/reset-password', [AuthController::class, 'resetPassword'])
        ->name('password.reset.update');

});


/*
|--------------------------------------------------------------------------
| LOGOUT
|--------------------------------------------------------------------------
*/

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


/*
|--------------------------------------------------------------------------
| PRODUK CUSTOMER
|--------------------------------------------------------------------------
*/

Route::get('/produk', [ProductController::class, 'index'])
    ->name('products.index');

Route::get('/produk/{product}', [ProductController::class, 'show'])
    ->name('products.show');


/*
|--------------------------------------------------------------------------
| CART / KERANJANG CUSTOMER
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:pelanggan'])->group(function () {

    Route::get('/cart', [CartController::class, 'index'])
        ->name('cart.index');

    Route::post('/cart/add', [CartController::class, 'add'])
        ->name('cart.add');

    Route::put('/cart/{key}', [CartController::class, 'update'])
        ->name('cart.update');

    Route::delete('/cart/{key}', [CartController::class, 'remove'])
        ->name('cart.remove');

    Route::delete('/cart', [CartController::class, 'clear'])
        ->name('cart.clear');

});


/*
|--------------------------------------------------------------------------
| PESANAN CUSTOMER
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:pelanggan'])->group(function () {

    Route::get('/pesanan/{id}', [CustomerOrderController::class, 'show'])
        ->name('customer.orders.show');

});


/*
|--------------------------------------------------------------------------
| CHECKOUT CUSTOMER
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:pelanggan'])->group(function () {

    Route::get('/checkout', [CheckoutController::class, 'index'])
        ->name('checkout.index');

    Route::post('/checkout', [CheckoutController::class, 'store'])
        ->name('checkout.store');

});


/*
|--------------------------------------------------------------------------
| PAYMENT CUSTOMER
|--------------------------------------------------------------------------
*/

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

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard Admin
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');


        // Data Karyawan
        Route::resource('/employees', EmployeeController::class)
            ->names('employees');


        // Data Pelanggan
        Route::resource('/customers', CustomerController::class)
            ->names('customers');


        // Data Produk
        Route::resource('/products', AdminProductController::class)
            ->names('products');


        // Kelola Pesanan Admin
        Route::get('/orders', [AdminOrderController::class, 'index'])
            ->name('orders.index');

        Route::get('/orders/{order}', [AdminOrderController::class, 'show'])
            ->name('orders.show');

        Route::put('/orders/{order}/status', [AdminOrderController::class, 'updateStatus'])
            ->name('orders.updateStatus');


        // Laporan Penjualan
        Route::get('/laporan-penjualan', [SalesReportController::class, 'index'])
            ->name('sales-report.index');

        // Refresh Laporan Penjualan
        Route::get('/laporan-penjualan/refresh', [SalesReportController::class, 'refresh'])
            ->name('sales-report.refresh');

    });


/*
|--------------------------------------------------------------------------
| KARYAWAN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:karyawan'])
    ->prefix('karyawan')
    ->name('karyawan.')
    ->group(function () {

        // Dashboard Karyawan
        Route::get('/dashboard', function () {
            return view('karyawan.dashboard');
        })->name('dashboard');


        // Data Produk Karyawan
        Route::get('/products', [KaryawanProductController::class, 'index'])
            ->name('products.index');


        // Kelola Pesanan Karyawan
        Route::get('/orders', [AdminOrderController::class, 'index'])
            ->name('orders.index');

        Route::get('/orders/{order}', [AdminOrderController::class, 'show'])
            ->name('orders.show');

        Route::put('/orders/{order}/status', [AdminOrderController::class, 'updateStatus'])
            ->name('orders.updateStatus');

    });