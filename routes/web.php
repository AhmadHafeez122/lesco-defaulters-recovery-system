<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DefaulterController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

// پبلک روٹس (Public Routes)
Route::get('/', function () {
    return view('welcome');
});

// Authentication روٹس
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// محفوظ روٹس (Protected Routes) - صرف لاگ ان یوزرز کے لیے
Route::middleware(['auth', 'verified'])->group(function () {

    // 1. Analytics Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // 2. Consumers / Defaulters CRUD Operations
    // یہ ایک ہی لائن (index, create, store, edit, update, destroy) کے تمام روٹس بنا دے گی
    Route::resource('consumers', DefaulterController::class);

    // 3. Reports & Exports
    Route::get('/exports', [ReportController::class, 'index'])->name('exports.index');
Route::get('/exports/download', [ReportController::class, 'download'])->name('exports.download');

    // 4. Profile Management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
