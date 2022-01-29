<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\Leader\LeaderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// User
Route::prefix('user')->name('user.')->group(function() {
    Route::middleware(['guest:web', 'PreventBackHistory'])->group(function() {
        Route::view('/login', 'dashboard.user.login')->name('login');
        Route::view('/register', 'dashboard.user.register')->name('register');
        Route::post('/create', [UserController::class, 'create'])->name('create');
        Route::post('/check', [UserController::class, 'check'])->name('check');
    });

    Route::middleware(['auth:web', 'PreventBackHistory'])->group(function() {
        Route::view('/home', 'dashboard.user.home')->name('home');
        Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    });
});

// Admin
Route::prefix('admin')->name('admin.')->group(function() {
    Route::middleware(['guest:admin', 'PreventBackHistory'])->group(function() {
        Route::view('/login', 'dashboard.admin.login')->name('login');
        Route::post('/check', [AdminController::class, 'check'])->name('check');
    });

    Route::middleware(['auth:admin', 'PreventBackHistory'])->group(function() {
        Route::view('/home', 'dashboard.admin.home')->name('home');
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
    });
});

// Leader
Route::prefix('leader')->name('leader.')->group(function() {
    Route::middleware(['guest:leader', 'PreventBackHistory'])->group(function() {
        Route::view('/login', 'dashboard.leader.login')->name('login');
        Route::post('/check', [LeaderController::class, 'check'])->name('check');
    });

    Route::middleware(['auth:leader', 'PreventBackHistory'])->group(function() {
        Route::view('/home', 'dashboard.leader.home')->name('home');
        Route::post('/logout', [LeaderController::class, 'logout'])->name('logout');
    });
});

// Employee
Route::prefix('employee')->name('employee.')->group(function() {
    Route::middleware(['guest:employee', 'PreventBackHistory'])->group(function() {
        Route::view('/login', 'dashboard.employee.login')->name('login');
        Route::post('/check', [EmployeeController::class, 'check'])->name('check');
        Route::view('/register', 'dashboard.employee.register')->name('register');
        Route::post('/create', [EmployeeController::class, 'create'])->name('create');
    });

    Route::middleware(['auth:employee', 'PreventBackHistory'])->group(function () {
        Route::view('/home', 'dashboard.employee.home')->name('home');
        Route::post('/logout', [EmployeeController::class, 'logout'])->name('logout');
    });

});
