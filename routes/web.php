<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\admin\AuthAdminController;
use App\Http\Controllers\ProductController;

// Halaman awal: login customer
Route::get('/', function () {
    return view('customer.auth.login');
});

// Dashboard untuk user login
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Route untuk produk
Route::get('/produk', function () {
    return view('admin_produk');
});

// Route untuk user terautentikasi
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route admin
Route::get('admin/login', [AuthAdminController::class, 'Index'])->name('admin.login');
Route::post('admin/login', [AuthAdminController::class, 'AuthAdmin'])->name('admin.loginSubmit');
Route::get('/admin/dashboard', [AuthAdminController::class, "Dashboard"])->name('admin.dashboard')->middleware('admin');

// Route produk gorden
Route::get('/produk-gorden', [ProductController::class, 'index'])->name('produk-gorden.index');

// Route untuk admin produk
Route::get('/coba', function () {
    return view('produk.AdminProduk');
});
Route::get('/admin/produk/create', [ProductController::class, 'create'])->name('produk.create');

// Auth routes
require __DIR__.'/auth.php';
