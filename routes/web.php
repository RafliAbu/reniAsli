<?php

use App\Http\Controllers\Admin\ArsipSuratController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\KartuKeluargaController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\PendudukController;
use App\Http\Controllers\Admin\PengajuanController as AdminPengajuanController;
use App\Http\Controllers\Admin\PengaturanController;
use App\Http\Controllers\Admin\PenggunaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Masyarakat\DashboardController as MasyarakatDashboardController;
use App\Http\Controllers\Masyarakat\PengajuanController as MasyarakatPengajuanController;
use App\Http\Controllers\Masyarakat\ProfileController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    $totalPenduduk = \App\Models\Penduduk::count();
    $totalKK = \App\Models\KartuKeluarga::count();
    $totalSurat = \App\Models\PengajuanSurat::count();
    $beritas = \App\Models\Berita::latest('tanggal')->take(6)->get();
    $pengaturan = \App\Models\Pengaturan::first();

    return view('welcome', compact('totalPenduduk', 'totalKK', 'totalSurat', 'beritas', 'pengaturan'));
})->name('portal');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.store');

    Route::get('/verify-email', [AuthController::class, 'showVerifyForm'])->name('verification.notice');
    Route::post('/verify-email', [AuthController::class, 'verifyEmail'])->name('verification.verify');

    Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'sendResetCode'])->name('password.email');
    Route::get('/reset-password', [AuthController::class, 'showResetPassword'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::resource('penduduk', PendudukController::class)->except('show');
    Route::resource('kartu-keluarga', KartuKeluargaController::class)->except('show');
    Route::resource('arsip-surat', ArsipSuratController::class)->except('show');

    Route::get('laporan/pelayanan', [LaporanController::class, 'pelayanan'])->name('laporan.pelayanan');
    Route::get('laporan/pelayanan/download', [LaporanController::class, 'downloadPelayanan'])->name('laporan.pelayanan.download');
    Route::match(['get', 'post'], 'laporan/administrasi', [LaporanController::class, 'administrasi'])->name('laporan.administrasi');

    Route::get('persetujuan', [AdminPengajuanController::class, 'persetujuan'])->name('persetujuan.index');
    Route::patch('persetujuan/{pengajuanSurat}/status', [AdminPengajuanController::class, 'updateStatus'])->name('persetujuan.status');
    Route::get('verifikasi-pengajuan', [AdminPengajuanController::class, 'verifikasi'])->name('verifikasi.index');
    Route::get('verifikasi-pengajuan/{pengajuanSurat}/cetak', [AdminPengajuanController::class, 'cetak'])->name('verifikasi.cetak');
    Route::get('persetujuan/laporan-administrasi', [LaporanController::class, 'melihatAdministrasi'])->name('persetujuan.laporan-administrasi');

    Route::resource('berita', BeritaController::class)->except('show');

    Route::get('pengajuan-surat', [AdminPengajuanController::class, 'index'])->name('pengajuan.index');
    Route::patch('pengajuan-surat/{pengajuanSurat}/status', [AdminPengajuanController::class, 'updateStatus'])->name('pengajuan.status');

    Route::resource('pengguna', PenggunaController::class)->except('show');

    Route::get('pengaturan', [PengaturanController::class, 'index'])->name('pengaturan.index');
    Route::put('pengaturan', [PengaturanController::class, 'update'])->name('pengaturan.update');
});

Route::middleware(['auth', 'role:masyarakat'])->prefix('masyarakat')->name('masyarakat.')->group(function () {
    Route::get('/dashboard', [MasyarakatDashboardController::class, 'index'])->name('dashboard');
    Route::get('pengajuan/create', [MasyarakatPengajuanController::class, 'create'])->name('pengajuan.create');
    Route::post('pengajuan', [MasyarakatPengajuanController::class, 'store'])->name('pengajuan.store');
    Route::get('pengajuan/status', [MasyarakatPengajuanController::class, 'status'])->name('pengajuan.status');
    Route::get('pengajuan/{pengajuanSurat}', [MasyarakatPengajuanController::class, 'show'])->name('pengajuan.show');
    Route::get('pengajuan/{pengajuanSurat}/cetak', [MasyarakatPengajuanController::class, 'cetak'])->name('pengajuan.cetak');

    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
});
