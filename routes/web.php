<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\admin\AuthAdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('customer.auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('admin/login', [AuthAdminController::class,'Index'])->name('admin.login');
Route::post('admin/login', [AuthAdminController::class,'AuthAdmin'])->name('admin.loginSubmit');
Route::get('/admin/dashboard', [AuthAdminController::class,"Dashboard"])->name('admin.dashboard')->middleware('admin');

require __DIR__.'/auth.php';
