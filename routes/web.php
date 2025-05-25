<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\admin\AuthAdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GordenController;
use App\Http\Controllers\Auth\RegisteredUserController;








// Halaman awal: login customer
Route::get('/', function () {
    return view('customer.auth.login');
})->name('customer.auth.login');


// Route untuk register - tampilkan halaman register
Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware('guest') // pastikan hanya tamu yang bisa akses
    ->name('register');

    // Route untuk register - proses penyimpanan user baru
    Route::post('/register', [RegisteredUserController::class, 'store'])
        ->middleware('guest');


// Dashboard untuk user login

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Route untuk dashboard pengguna
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');


// Route untuk user terautentikasi

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route admin
Route::get('admin/login', [AuthAdminController::class,'Index'])->name('admin.login');
Route::post('admin/login', [AuthAdminController::class,'AuthAdmin'])->name('admin.loginSubmit');
Route::get('/admin/dashboard', [AuthAdminController::class,"Dashboard"])->name('admin.dashboard')->middleware('admin');
Route::get('/admin/add-gorden', [GordenController::class,"create"])->name('admin.addgorden')->middleware('admin');
Route::get('/admin/gorden-index', [GordenController::class,"index"])->name('admin.indexgorden')->middleware('admin');
Route::get('/admin/edit-gorden/{gorden}', [GordenController::class,"edit"])->name('admin.editgorden')->middleware('admin');
Route::put ('/admin/edit/{gorden}', [GordenController::class,"update"])->name('admin.edit')->middleware('admin');
Route::post ('/admin/add-post', [GordenController::class,"store"])->name('admin.addgorden.post')->middleware('admin');
Route::delete ('/admin/delete-gorden/{gorden}', [GordenController::class,"destroy"])->name('admin.deletegorden')->middleware('admin');

Route::get('/produk-gorden', [ProductController::class, 'index']);

// Route admin
// Route::get('admin/login', [AuthAdminController::class, 'Index'])->name('admin.login');
// Route::post('admin/login', [AuthAdminController::class, 'AuthAdmin'])->name('admin.loginSubmit');
// Route::get('/admin/dashboard', [AuthAdminController::class, "Dashboard"])->middleware('admin')->name('admin.dashboard');


// Produk gorden pengguna
Route::get('/produk-gorden', [ProductController::class, 'index'])->name('produk.gorden');

// Produk untuk admin
Route::get('/produk', [ProductController::class, 'AdminProduk'])->name('produk.admin');
Route::get('/admin/produk/create', [ProductController::class, 'create'])->name('produk.CreateProduk');
Route::post('/admin/produk/store', [ProductController::class, 'store'])->name('produk.store');


Route::get('admin/dashboardLTE', [DashboardController::class,'dashboardadmin']);



require __DIR__.'/auth.php';
