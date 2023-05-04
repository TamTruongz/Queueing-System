<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AccountController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



// ==== (Login - Forget - Reset) Router ====
Route::get('/login', [AccountController::class, 'login'])->name('login');
Route::post('/login', [AccountController::class, 'login']);

Route::get('/forget', [AccountController::class, 'forget']);
Route::get('reset_passwordn', [AccountController::class, 'reset_password']);
Route::post('/logout', [AccountController::class, 'logout'])->name('logout');

// Đăng nhập vào trang
Route::middleware(['auth'])->group(function () {
    // ==== Infomation Account Router ====
    Route::get('/user_info', [AccountController::class, 'user_info'])->name('user_info');

    // ==== Dashboard Router ====
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    // ==== Device Router ====
    Route::get('/device', [HomeController::class, 'device']);
    Route::get('/add_device', [HomeController::class, 'add_device']);
    Route::get('/update_device', [HomeController::class, 'update_device']);
    Route::get('/info_device', [HomeController::class, 'info_device']);
    // ==== Service Router ====
    Route::get('/service', [HomeController::class, 'service']);
    Route::get('/add_service', [HomeController::class, 'add_service']);
    Route::get('/update_service', [HomeController::class, 'update_service']);
    Route::get('/info_service', [HomeController::class, 'info_service']);
    // ==== Cấp số Router ====
    Route::get('/codes', [HomeController::class, 'codes']);
    Route::get('/codes_new', [HomeController::class, 'codes_new']);
    Route::get('/info_codes', [HomeController::class, 'info_codes']);
    // ==== Cấp số Router ====
    Route::get('/report', [HomeController::class, 'report']);
    // ==== Vai trò Router ====
    Route::get('/role', [HomeController::class, 'role']);
    Route::get('/add_role', [HomeController::class, 'add_role']);
    Route::get('/update_role', [HomeController::class, 'update_role']);
    // ==== Tài khoản Router ====
    Route::get('/account', [HomeController::class, 'account']);
    Route::get('/add_account', [HomeController::class, 'add_account']);
    Route::get('/update_account', [HomeController::class, 'update_account']);

    // ==== Nhật ký tài khoản Router ====
    Route::get('/logs_user', [HomeController::class, 'logs_user']);
});
