<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\PaymentVerify;
use App\Http\Middleware\User;
use App\Http\Middleware\Admin;
use App\Http\Middleware\AdminGuest;
use App\Http\Middleware\EnsureCartFilled;
use App\Http\Middleware\EnsurePaymentStatusNotPending;

Route::get('/', HomeController::class)->name('home');

Route::post('/verify-payment', PaymentVerify::class);

Route::middleware(User::class)->group(function () {
    Route::middleware('auth')->group(function () {
        Route::post('/cart', [CartController::class, 'store']);
        Route::delete('/cart/{id}', [CartController::class, 'destroy']);
        Route::put('/cart/{id}/decrease', [CartController::class, 'decrease']);
        Route::put('/cart/{id}/increase', [CartController::class, 'increase']);

        Route::get('/checkout', [TransactionController::class, 'create'])->middleware(EnsureCartFilled::class);
        Route::post('/checkout', [TransactionController::class, 'store'])->middleware(EnsureCartFilled::class);
        Route::get('/order/{order}', [TransactionController::class, 'show']);
    });
});

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
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

Route::middleware(AdminGuest::class)->group(function () {
    Route::get('/admin/register', [AdminController::class, 'showRegistrationFormAdmin'])->name('showRegistrationFormAdmin');
    Route::post('/admin/register', [AdminController::class, 'register'])->name('admin.register');
    Route::get('/admin/login', [AdminController::class, 'showLoginFormAdmin'])->name('showLoginFormAdmin');
    Route::post('/admin/login', [AdminController::class, 'login'])->name('loginAdmin');
});


Route::middleware(Admin::class)->group(function () {
    Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/menu', [AdminController::class, 'ManajemenMenu'])->name('admin.menu');
    Route::delete('/admin/menu', [AdminController::class, 'HapusMenu']);
    Route::get('/admin/pesanan', [AdminController::class, 'AdminDashboard'])->name('admin.pesanan');
    Route::get('/admin/addMenu', [AdminController::class, 'TambahMenu'])->name('admin.addMenu');
    Route::get('/admin/editMenu', [AdminController::class, 'EditMenu'])->name('admin.editMenu');
});








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
