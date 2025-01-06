<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TransactionController;
use App\Http\Middleware\EnsureCartFilled;
use App\Http\Middleware\EnsurePaymentStatusNotPending;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::post('/cart', [CartController::class, 'store']);
    Route::delete('/cart/{id}', [CartController::class, 'destroy']);
    Route::put('/cart/{id}/decrease', [CartController::class, 'decrease']);
    Route::put('/cart/{id}/increase', [CartController::class, 'increase']);

    Route::get('/checkout', [TransactionController::class, 'create'])->middleware(EnsureCartFilled::class);
    Route::post('/checkout', [TransactionController::class, 'store'])->middleware(EnsureCartFilled::class);
    Route::get('/payment/{order:snap_token}', [TransactionController::class, 'payment'])->middleware(EnsurePaymentStatusNotPending::class);
    Route::put('/order/{order}/approve', [TransactionController::class, 'approve']);
    Route::put('/order/{order}/failed', [TransactionController::class, 'failed']);
    Route::get('/order/{order}/detail', [TransactionController::class, 'show']);
});

// Admin
// Route::controller(AuthController::class)->group(function () {
//     Route::middleware('auth:admin')->group(function () {
//         Route::get('/admin/login', 'showLoginFormAdmin');
//         Route::post('/admin/login', 'login');
//         Route::get('/admin/register', 'showRegistrationFormAdmin');
//         Route::post('/admin/register', 'register');
//     });
//     Route::middleware('auth')->group(function () {
//         Route::post('/logout', 'logout');
//     });
// });

Route::get('/admin/login', [AdminController::class, 'showLoginFormAdmin'])->name('loginAdmin');
Route::post('/admin/login', [AdminController::class, 'login'])->name('loginAdmin');
Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
Route::get('/admin/menu', [AdminController::class, 'ManajemenMenu'])->name('admin.menu');
Route::get('/admin/pesanan', [AdminController::class, 'ManajemenPesanan'])->name('admin.pesanan');
Route::get('/admin/pengguna', [AdminController::class, 'ManajemenPengguna'])->name('admin.pengguna');
Route::get('/admin/info', [AdminController::class, 'Informasi'])->name('admin.info');
Route::get('/admin/register', [AdminController::class, 'showRegistrationFormAdmin'])->name('registerAdmin');
Route::post('/admin/register', [AdminController::class, 'showRegistrationFormAdmin'])->name('registerAdmin');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('login');










// Route::get('/index', function () {
//     return view('user.home.index'); // Sesuaikan dengan tampilan yang diinginkan
// })->name('index');


// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';
