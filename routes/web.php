<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Middleware\EnsureCartFilled;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::post('/cart', [CartController::class, 'store']);
    Route::delete('/cart/{id}', [CartController::class, 'destroy']);
    Route::put('/cart/{id}/decrease', [CartController::class, 'decrease']);
    Route::put('/cart/{id}/increase', [CartController::class, 'increase']);

    Route::get('/checkout', [OrderController::class, 'checkout'])->middleware(EnsureCartFilled::class);
    Route::post('/checkout', [OrderController::class, 'order'])->middleware(EnsureCartFilled::class);
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
Route::get('/admin/menu', [AdminController::class, 'AdminDashboard'])->name('admin.menu');
Route::get('/admin/pesanan', [AdminController::class, 'AdminDashboard'])->name('admin.pesanan');
Route::get('/admin/pengguna', [AdminController::class, 'AdminDashboard'])->name('admin.pengguna');
Route::get('/admin/info', [AdminController::class, 'AdminDashboard'])->name('admin.info');
Route::get('/admin/register', [AdminController::class, 'showRegistrationFormAdmin'])->name('registerAdmin');
Route::post('/admin/register', [AdminController::class, 'showRegistrationFormAdmin'])->name('registerAdmin');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('login');










// Route::get('/index', function () {
//     return view('user.home.index'); // Sesuaikan dengan tampilan yang diinginkan
// })->name('index');


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__ . '/auth.php';
