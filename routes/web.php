<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TopikController;
use App\Http\Controllers\PenawaranController;

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

Route::middleware(['auth','role:super_admin|dosen|mahasiswa'])->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware(['auth','role:mahasiswa'])->group(function(){
        Route::resource('topik',TopikController::class);
        Route::resource('penawaran',PenawaranController::class);
});

//Topik
