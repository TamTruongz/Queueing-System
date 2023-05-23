<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LogAccountController;
use App\Http\Controllers\Auth\ForgotPasswordController;

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
Route::get('/forget_password', [ForgotPasswordController::class, 'ForgetPassword'])->name('password.forget');
Route::post('/forget_password', [ForgotPasswordController::class, 'VerifyEmail'])->name('password.email');

Route::get('/reset_password/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::put('/reset_password', [ForgotPasswordController::class, 'resetPassword'])->name('password.update');

Route::post('/logout', [AccountController::class, 'logout'])->name('logout');


// Đăng nhập vào trang
Route::middleware(['auth'])->group(function () {
    
    // ==== Dashboard Router (Default routes) ====
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    // ==== Device Router ====
    Route::get('/device', [DeviceController::class, 'device'])->name('device'); // == Quản lý
    Route::get('/device/create', [DeviceController::class, 'create'])->name('device.create'); // == Thêm
    Route::post('/device/create', [DeviceController::class, 'store']);

    Route::get('/device/edit/{id}', [DeviceController::class, 'edit'])->name('device.edit'); // == Sửa
    Route::put('/device/update/{id}', [DeviceController::class, 'update'])->name('device.update'); // Xử lý cập nhật

    Route::get('/device/info/{id}', [DeviceController::class, 'info'])->name('device.info');

    Route::get('/device/search', [DeviceController::class, 'search'])->name('device.search'); // == Tìm kiếm
    Route::get('/device/filter', [DeviceController::class, 'filter'])->name('device.filter'); // == lọc

    // ==== Service Router ====
    Route::get('/service', [ServiceController::class, 'service'])->name('service');

    Route::get('/service/create', [ServiceController::class, 'create'])->name('service.create');
    Route::post('/service/create', [ServiceController::class, 'store'])->name('service.store');

    Route::get('/service/edit/{id}', [ServiceController::class, 'edit'])->name('service.edit');
    Route::put('/service/update/{id}', [ServiceController::class, 'update'])->name('service.update');

    Route::get('/service/info/{id}', [ServiceController::class, 'info'])->name('service.info');
    Route::get('/service/searchinfo/{id}', [ServiceController::class, 'searchinfo'])->name('service.searchinfo');
    Route::get('/service/filterinfo/{id}', [ServiceController::class, 'filterinfo'])->name('service.filterinfo');

    Route::get('/service/search', [ServiceController::class, 'search'])->name('service.search'); // == Tìm kiếm

    Route::get('/service/filter', [ServiceController::class, 'filter'])->name('service.filter'); // == lọc

    // ==== Cấp số Router ====
    Route::get('/ticket', [TicketController::class, 'ticket'])->name('ticket');

    Route::get('/ticket/create', [TicketController::class, 'create'])->name('ticket.create');
    Route::post('/ticket/create', [TicketController::class, 'store'])->name('ticket.store');
    Route::get('/ticket/info/{id}', [TicketController::class, 'info'])->name('ticket.info');

    Route::get('/ticket/search', [TicketController::class, 'search'])->name('ticket.search'); // == Tìm kiếm

    Route::get('/ticket/filter', [TicketController::class, 'filter'])->name('ticket.filter'); // == lọc

    // ==== Báo cáo Router ====
    Route::get('/report', [ReportController::class, 'report'])->name('report');
    Route::get('/report/filter', [ReportController::class, 'filter'])->name('report.filter'); // == lọc

    // ==== Vai trò Router ====
    Route::get('/role', [RolesController::class, 'role'])->name('role');

    Route::get('/role/create', [RolesController::class, 'create'])->name('role.create');
    Route::post('/role/create', [RolesController::class, 'store'])->name('role.store');

    Route::get('/role/edit/{id}', [RolesController::class, 'edit'])->name('role.edit');
    Route::put('/role/update/{id}', [RolesController::class, 'update'])->name('role.update');
    
    Route::get('/role/search', [RolesController::class, 'search'])->name('role.search'); // == Tìm kiếm

    // ==== Tài khoản Router ====
    Route::get('/account', [AccountController::class, 'account'])->name('account');
    
    Route::get('/account/create', [AccountController::class, 'create'])->name('account.create');
    Route::post('/account/create', [AccountController::class, 'store'])->name('account.store');

    Route::get('/account/edit/{id}', [AccountController::class, 'edit'])->name('account.edit');
    Route::put('/account/update/{id}', [AccountController::class, 'update'])->name('account.update');

    Route::get('/account/info', [AccountController::class, 'info'])->name('account.info');

    Route::get('/account/search', [AccountController::class, 'search'])->name('account.search'); // == Tìm kiếm

    Route::get('/account/filter', [AccountController::class, 'filter'])->name('account.filter'); // == lọc
    Route::put('/account/info', [AccountController::class, 'updateAvatar'])->name('account.update_avatar'); // == lọc

    // ==== Nhật ký tài khoản Router ====
    Route::get('/logs_account', [LogAccountController::class, 'index'])->name('logs');
    Route::get('/logs_account/search', [LogAccountController::class, 'search'])->name('logs.search');
    Route::get('/logs_account/filter', [LogAccountController::class, 'filter'])->name('logs.filter');
});