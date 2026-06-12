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


// ==========================================
// 1. صرف ایڈمن روٹس (Admin Only Routes)
// (اس کو اوپر رکھا گیا ہے تاکہ /create روٹ پہلے چیک ہو)
// ==========================================
Route::middleware(['auth', 'verified', 'admin'])->group(function () {

    // Consumers / Defaulters کی باقی کارروائیاں (Create, Store, Edit, Update, Destroy)
    Route::resource('consumers', DefaulterController::class)->except(['index', 'show']);

});


// ==========================================
// 2. محفوظ روٹس (Protected Routes) - تمام لاگ ان یوزرز (Viewer + Admin) کے لیے
// ==========================================
Route::middleware(['auth', 'verified'])->group(function () {

    // Analytics Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Consumers / Defaulters - صرف دیکھنے کی اجازت (View Only: index)
    // (show میتھڈ کو یہاں سے ہٹا دیا گیا ہے تاکہ ایرر نہ آئے)
    Route::resource('consumers', DefaulterController::class)->only(['index']);

    // Reports & Exports
    Route::get('/exports', [ReportController::class, 'index'])->name('exports.index');
    Route::get('/exports/download', [ReportController::class, 'download'])->name('exports.download');

    // Profile Management (Everyone can manage their own profile)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
