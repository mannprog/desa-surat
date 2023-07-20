<?php

use App\Http\Controllers\AdminSuratKkController;
use App\Http\Controllers\AdminSuratKtpController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\UserAdminController;
use App\Http\Controllers\UserWargaController;
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
Route::post('/login', [AuthController::class, 'prosesLogin'])->name('prosesLogin');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'prosesRegister'])->name('prosesRegister');

Route::middleware(['auth'])->group(function () {
    Route::middleware(['admin'])->group(function () {
        Route::get('/dashboard-admin', [DashboardController::class, 'indexAdmin'])->name('admin.index');

        Route::prefix('/dashboard-admin/surat/')->group(function () {
            Route::name('pengantar.')->group(function () {

                // SPKTP
                Route::resource('ktp', AdminSuratKtpController::class)->except(['create', 'edit', 'update']);
                Route::post('ktp/{id}/accept', [AdminSuratKtpController::class, 'acceptPermohonan'])->name('ktp.accept');
                Route::post('ktp/{id}/reject', [AdminSuratKtpController::class, 'rejectPermohonan'])->name('ktp.reject');
                Route::post('ktp/{id}/upload', [AdminSuratKtpController::class, 'upload'])->name('ktp.upload');
                Route::get('ktp/download/{spktp}', [AdminSuratKtpController::class, 'download'])->name('ktp.download');

                // SPKK
                Route::resource('kk', AdminSuratKkController::class)->except(['create', 'edit', 'update']);
                Route::post('kk/{id}/accept', [AdminSuratKkController::class, 'acceptPermohonan'])->name('kk.accept');
                Route::post('kk/{id}/reject', [AdminSuratKkController::class, 'rejectPermohonan'])->name('kk.reject');
                Route::post('kk/{id}/upload', [AdminSuratKkController::class, 'upload'])->name('kk.upload');
                Route::get('kk/download/{spkk}', [AdminSuratKkController::class, 'download'])->name('kk.download');
            });
        });

        Route::prefix('/dashboard-admin/users/')->group(function () {
            Route::name('kelola.')->group(function(){
                Route::resource('admin', UserAdminController::class)->except('create');
                Route::resource('warga', UserWargaController::class)->except('create');
            });
        });
    });
    
    Route::get('/dashboard-warga', [DashboardController::class, 'indexWarga'])->name('warga.index');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
