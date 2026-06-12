<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DefaulterController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



Route::middleware(['auth', 'verified', 'admin'])->group(function () {

    Route::resource('consumers', DefaulterController::class)->except(['index', 'show']);

});



Route::middleware(['auth', 'verified'])->group(function () {


    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

   
    Route::resource('consumers', DefaulterController::class)->only(['index']);


    Route::get('/exports', [ReportController::class, 'index'])->name('exports.index');
    Route::get('/exports/download', [ReportController::class, 'download'])->name('exports.download');

    // Profile Management (Everyone can manage their own profile)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
