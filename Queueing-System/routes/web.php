<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RolesController;

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



// ==== Login Router ====
Route::get('/login', [AccountController::class, 'login'])->name('login');
Route::post('/login', [AccountController::class, 'login']);

// ==== Forget - Reset ====
Route::get('/forget_password', [AccountController::class, 'forget_password'])->name('forget_password');
Route::get('/reset_password', [AccountController::class, 'reset_password']);
Route::post('/logout', [AccountController::class, 'logout'])->name('logout');

// ==== Register Router ====
Route::get('/register', [AccountController::class, 'register'])->name('register');
Route::post('/register', [AccountController::class, 'store'])->name('register.store');


// Đăng nhập vào trang
Route::middleware(['auth'])->group(function () {
    // ==== Infomation Account Router ====
    Route::get('/user_info', [AccountController::class, 'user_info'])->name('user_info');

    // ==== Dashboard Router ====
    // ===== Default routes =====
    Route::get('/', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    // ==== Device Router ====
    Route::get('/device', [DeviceController::class, 'device'])->name('device'); // == Quản lý
    Route::get('/device/create', [DeviceController::class, 'create'])->name('device.create'); // == Thêm
    Route::post('/device/create', [DeviceController::class, 'store']);

    Route::get('/device/edit/{id}', [DeviceController::class, 'edit'])->name('device.edit'); // == Sửa
    Route::post('/device/update/{id}', [DeviceController::class, 'update'])->name('device.update'); // Xử lý cập nhật

    Route::get('/device/info/{id}', [DeviceController::class, 'info'])->name('device.info');

    // ==== Service Router ====
    Route::get('/service', [ServiceController::class, 'service'])->name('service');

    Route::get('/service/create', [ServiceController::class, 'create'])->name('service.create');
    Route::post('/service/create', [ServiceController::class, 'store'])->name('service.store');

    Route::get('/service/edit/{id}', [ServiceController::class, 'edit'])->name('service.edit');
    Route::post('/service/update/{id}', [ServiceController::class, 'update'])->name('service.update');

    Route::get('/service/info/{id}', [ServiceController::class, 'info'])->name('service.info');

    // ==== Cấp số Router ====
    Route::get('/codes', [TicketController::class, 'ticket'])->name('ticket');

    Route::get('/codes/create', [TicketController::class, 'create'])->name('ticket.create');
    Route::post('/codes/create', [TicketController::class, 'store'])->name('ticket.store');
    Route::get('/codes/info/{id}', [TicketController::class, 'info'])->name('ticket.info');

    // ==== Báo cáo Router ====
    Route::get('/report', [ReportController::class, 'report'])->name('report');

    // ==== Vai trò Router ====
    Route::get('/role', [RolesController::class, 'role'])->name('role');

    Route::get('/role/create', [RolesController::class, 'create'])->name('role.create');
    Route::post('/role/create', [RolesController::class, 'store'])->name('role.store');

    Route::get('/role/edit/{id}', [RolesController::class, 'edit'])->name('role.edit');
    Route::post('/role/update/{id}', [RolesController::class, 'update'])->name('role.update');
    
    // ==== Tài khoản Router ====
    Route::get('/account', [AccountController::class, 'account'])->name('account');
    
    Route::get('/account/create', [AccountController::class, 'create'])->name('account.create');
    Route::post('/account/create', [AccountController::class, 'store'])->name('account.store');

    Route::get('/account/edit/{id}', [AccountController::class, 'edit'])->name('account.edit');
    Route::post('/account/update/{id}', [AccountController::class, 'update'])->name('account.update');

    // ==== Nhật ký tài khoản Router ====
    Route::get('/logs_user', [HomeController::class, 'logs_user']);
});