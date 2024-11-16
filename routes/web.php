<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\DataPegawaiController;
use App\Http\Controllers\Admin\ManajemenPegawaiController;
use App\Http\Controllers\SuperAdmin\TambahPegawaiController;

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
    return view('welcome');
});
Route::middleware('guest')->group(function(){
    Route::get('/login',[LoginController::class, 'index'])->name('login');
    Route::post('/login',[LoginController::class, 'login'])->name('login.auth');
    Route::get('/register',[RegisterController::class, 'index'])->name('Register');
    Route::post('/register',[RegisterController::class, 'register'])->name('Register.proses');
});
Route::middleware(['auth','role:1'])->group(function(){
    Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');
    Route::get('/data-pegawai',[DataPegawaiController::class, 'index'])->name('data.pegawai');
    Route::get('/tambah-pegawai',[DataPegawaiController::class, 'tambah_pegawai'])->name('tambah.pegawai');
    Route::get('/edit-pegawai/{id}',[DataPegawaiController::class, 'edit_pegawai'])->name('edit.pegawai');
    Route::put('/edit-pegawai-aksi/{id}',[DataPegawaiController::class, 'edit_pegawai_aksi'])->name('edit.pegawai.aksi');
});
Route::middleware(['auth','role:2'])->group(function(){
    Route::get('/profile',[ProfileController::class, 'index'])->name('profile');
});
Route::middleware(['auth','role:3'])->group(function(){
    Route::get('/profile',[ProfileController::class, 'index'])->name('profile');
});
Route::get('/logout',[LoginController::class, 'logout'])->name('logout');
Route::get('/error',[ErrorController::class, 'index'])->name('error');
