<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [LandingController::class, 'index'])->name('landing.index');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::get('/dashboard-admin', [DashboardController::class, 'indexAdmin'])->name('admin.index');
Route::get('/dashboard-warga', [DashboardController::class, 'indexWarga'])->name('warga.index');
