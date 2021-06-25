<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TopikController;
use App\Http\Controllers\PenawaranController;
use App\Http\Controllers\LogbookController;
use App\Http\Controllers\Dosen;
use App\Http\Controllers\Superadmin;
use App\Http\Controllers\Controller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes(['register' => false]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/emailcheck/{email}', [App\Http\Controllers\Controller::class, 'isEmailExist']);
Route::get('/otpcheck/{otp}/{email}', [App\Http\Controllers\Controller::class, 'isOTPExist']);

Route::middleware(['auth','role:super_admin|dosen|mahasiswa'])->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware(['auth','role:mahasiswa'])->group(function(){
        Route::resource('topik',TopikController::class);
        Route::get('/penawaran/topiksaya', [PenawaranController::class, 'topiksaya'])->name('penawaran.topiksaya');
        Route::resource('penawaran',PenawaranController::class);
        Route::resource('logbook',LogbookController::class);
        Route::get('download/{file}', [LogbookController::class, 'download']);
        Route::get('view/{id}', [LogbookController::class, 'view']);
});

Route::middleware(['auth','role:dosen|super_admin'])->group(function(){
        Route::resource('penelitian',Dosen\TopikController::class);
        Route::resource('mytopik',Dosen\DitawarkanController::class);
        Route::resource('bimbingan',Dosen\BimbinganController::class);
        Route::get('view/{id}', [Dosen\BimbinganController::class, 'view']);
        Route::post('/mytopik/ubah', [Dosen\DitawarkanController::class, 'edit'])->name('mytopik.ubah');
});

Route::middleware(['auth','role:super_admin'])->group(function(){
        Route::resource('dosen',Superadmin\DosenController::class);
        Route::resource('setup',Superadmin\SetupController::class);
        Route::resource('skripsi',Superadmin\SkripsiMahasiswaController::class);
});


//Topik
