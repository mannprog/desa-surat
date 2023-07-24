<?php

use App\Http\Controllers\AdminSuratKkController;
use App\Http\Controllers\AdminSuratKtpController;
use App\Http\Controllers\AdminSuratSkckController;
use App\Http\Controllers\AdminSuratSktmController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\UserAdminController;
use App\Http\Controllers\UserWargaController;
use App\Http\Controllers\WargaSuratKkController;
use App\Http\Controllers\WargaSuratKtpController;
use App\Http\Controllers\WargaSuratSkckController;
use App\Http\Controllers\WargaSuratSktmController;
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
        Route::get('/dashboard-admin/profil/{id}', [DashboardController::class, 'profilAdmin'])->name('admin.profil');
        Route::get('/dashboard-admin/profil/{id}/edit', [DashboardController::class, 'editProfilAdmin'])->name('edit.admin.profil');
        Route::put('/dashboard-admin/profil/{id}', [DashboardController::class, 'updateProfilAdmin'])->name('update.admin.profil');

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

                // SPSKTM
                Route::resource('sktm', AdminSuratSktmController::class)->except(['create', 'edit', 'update']);
                Route::post('sktm/{id}/accept', [AdminSuratSktmController::class, 'acceptPermohonan'])->name('sktm.accept');
                Route::post('sktm/{id}/reject', [AdminSuratSktmController::class, 'rejectPermohonan'])->name('sktm.reject');
                Route::post('sktm/{id}/upload', [AdminSuratSktmController::class, 'upload'])->name('sktm.upload');
                Route::get('sktm/download/{spsktm}', [AdminSuratSktmController::class, 'download'])->name('sktm.download');

                // SPSKCK
                Route::resource('skck', AdminSuratSkckController::class)->except(['create', 'edit', 'update']);
                Route::post('skck/{id}/accept', [AdminSuratSkckController::class, 'acceptPermohonan'])->name('skck.accept');
                Route::post('skck/{id}/reject', [AdminSuratSkckController::class, 'rejectPermohonan'])->name('skck.reject');
                Route::post('skck/{id}/upload', [AdminSuratSkckController::class, 'upload'])->name('skck.upload');
                Route::get('skck/download/{spskck}', [AdminSuratSkckController::class, 'download'])->name('skck.download');
            });
        });

        Route::prefix('/dashboard-admin/laporan/')->group(function () {
            Route::name('laporan.')->group(function () {
                // Data
                Route::get('ktp', [LaporanController::class, 'dataSuratKtp'])->name('ktp.index');
                Route::get('kk', [LaporanController::class, 'dataSuratKk'])->name('kk.index');
                Route::get('sktm', [LaporanController::class, 'dataSuratSktm'])->name('sktm.index');
                Route::get('skck', [LaporanController::class, 'dataSuratSkck'])->name('skck.index');
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
    Route::get('/dashboard-warga/profil/{id}', [DashboardController::class, 'profilWarga'])->name('warga.profil');
    Route::get('/dashboard-warga/profil/{id}/edit', [DashboardController::class, 'editProfilWarga'])->name('edit.warga.profil');
    Route::put('/dashboard-warga/profil/{id}', [DashboardController::class, 'updateProfilWarga'])->name('update.warga.profil');
    Route::prefix('/dashboard-warga/surat/')->group(function () {
        Route::name('surat.')->group(function () {
            Route::resource('ktp', WargaSuratKtpController::class)->except(['create', 'edit', 'update']);
            Route::get('ktp/download/{spktp}', [WargaSuratKtpController::class, 'download'])->name('ktp.download');
            Route::resource('kk', WargaSuratKkController::class)->except(['create', 'edit', 'update']);
            Route::get('kk/download/{spkk}', [WargaSuratKkController::class, 'download'])->name('kk.download');
            Route::resource('sktm', WargaSuratSktmController::class)->except(['create', 'edit', 'update']);
            Route::get('sktm/download/{spsktm}', [WargaSuratSktmController::class, 'download'])->name('sktm.download');
            Route::resource('skck', WargaSuratSkckController::class)->except(['create', 'edit', 'update']);
            Route::get('skck/download/{spskck}', [WargaSuratSkckController::class, 'download'])->name('skck.download');
        });
    });

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
