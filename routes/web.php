<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuperAdmin\UserController;
use App\Http\Controllers\SuperAdmin\OutletController;
use App\Http\Controllers\SuperAdmin\ProductController;


// Super Admin Dashboard
Route::middleware(['auth', 'role:super_admin'])->group(function () {
    Route::get('dashboard', fn() => view('backend.dashboard'));

    Route::resource('users', UserController::class);

    Route::resource('outlets', OutletController::class);

    Route::resource('products', ProductController::class);
});

// Admin Dashboard
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', fn() => view('dashboards.admin'));
});

// Outlet In-Charge Dashboard
Route::middleware(['auth', 'role:outlet_in_charge'])->group(function () {
    Route::get('/outlet/dashboard', fn() => view('dashboards.outlet'));
});


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
