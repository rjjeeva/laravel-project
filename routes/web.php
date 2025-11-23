<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\admin\ProductController;

use App\Models\Product;
use App\Http\Controllers\HomeController;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// ----------------------------
//  USER SETTINGS
// ----------------------------
Route::middleware(['auth'])->group(function () {

    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('user-password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');

    Volt::route('settings/two-factor', 'settings.two-factor')
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});

// ----------------------------
//  ORDER ROUTES
// ----------------------------
Route::middleware('auth')->group(function () {
    
    // Order create + submit
    Route::get('/order', [OrderController::class, 'create'])->name('order.create');
    Route::post('/order', [OrderController::class, 'store'])->name('order.store');

    // Order history page
    Route::get('/orders/history', [OrderController::class, 'history'])->name('orders.history');

    // Order view single item
    Route::get('/orders/view/{id}', [OrderController::class, 'view'])->name('orders.view');
Route::prefix('admin')->group(base_path('routes/admin.php'));
});

Route::prefix('admin')->group(base_path('routes/admin.php'));
// admin

Route::get('/products', [ProductController::class, 'index'])->name('products.list');

Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product.details');
