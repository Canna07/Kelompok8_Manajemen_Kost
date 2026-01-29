<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\PenghuniController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\PenyewaDashboardController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LoginController;

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');
Route::resource('tagihan', TagihanController::class)->except(['show']);
Route::resource('penghuni', PenghuniController::class)->except(['show']);
Route::resource('/kamar', KamarController::class);
Route::get('/', [DashboardController::class, 'index']);
Route::get('/dashboard-penyewa/{id}', [PenyewaDashboardController::class, 'index'])
    ->name('dashboard-penyewa');
Route::get('/', [LandingController::class, 'index']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/logout', function () {
    session()->forget('user'); 
    session()->flush();        

    return redirect('/');      
})->name('logout');

