<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\ProductController;


// ---------- GUEST (NOT LOGGED IN ADMIN) ----------
Route::middleware('guest:admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
});

// ---------- LOGGED IN ADMIN ONLY ----------
Route::middleware('auth:admin')->group(function () {

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    Route::get('/orders', [AdminOrderController::class, 'index'])->name('admin.orders');

    // ---------- PRODUCTS ----------
    Route::prefix('products')->name('admin.products.')->group(function () {

        Route::get('/', [ProductController::class, 'index'])->name('index');

        Route::get('/create', [ProductController::class, 'create'])->name('create');

        Route::post('/store', [ProductController::class, 'store'])->name('store');

        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');

        Route::post('/update/{id}', [ProductController::class, 'update'])->name('update');

        Route::delete('/delete/{id}', [ProductController::class, 'destroy'])->name('delete');
    });

});
