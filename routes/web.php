<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PresensiController;
use App\Models\Presensi;
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
    return view('home');
});

Route::get('/cek', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function(){
    Route::get('/login', [authController::class, 'index'])->name('login');
    Route::post('/loginAttempt', [authController::class, 'login'])->name('loginAttempt');
    Route::get('/Registrasi', [authController::class, 'showRegister'])->name('register');
    Route::post('/Registrasi', [authController::class, 'register'])->name('register.create');
});

Route::middleware('auth')->group(function(){
    Route::get('/dashboard', [KaryawanController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/search', [KaryawanController::class, 'cariKaryawan'])->name('cariKaryawan');
    Route::get('/dashboard/presensi', [PresensiController::class, 'index'])->name('dashboard.presensi');
    Route::get('/dashboard/presensi/search', [PresensiController::class, 'cariPresensi'])->name('cariPresensi');
    Route::get('/logout', [authController::class, 'logout'])->name('logout');
    Route::post('/dashboard/karyawan/create', [KaryawanController::class, 'store'])->name('create.karyawan');
    Route::put('/dashboard/karyawan/edit/{id}', [KaryawanController::class, 'update'])->name('edit.karyawan');
    Route::delete('/dashboard/karyawan/delete/{id}', [KaryawanController::class, 'delete'])->name('delete.karyawan');
    Route::post('/dashboard/presensi/create', [PresensiController::class, 'store'])->name('create.presensi');
    Route::put('/dashboard/presensi/edit/{id}', [PresensiController::class, 'update'])->name('edit.presensi');
    Route::delete('/dashboard/presensi/delete/{id}', [PresensiController::class, 'delete'])->name('delete.presensi');
    Route::get('/dashboard/absensi', [PresensiController::class, 'absensi'])->name('absensi.karyawan');
    Route::get('/dashboard/absensi/presensi/{id}', [PresensiController::class, 'presensiKaryawan'])->name('presensi.karyawan');
});
