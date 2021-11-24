<?php

use App\Http\Controllers\Guru\DataPersonalController;
use App\Http\Controllers\Guru\RiwayatPendidikanController;
use App\Http\Controllers\Guru\RiwayatKepangkatanController;
use App\Http\Controllers\Guru\GuruDashboardController;
use App\Http\Controllers\Guru\RiwayatJabatanController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::group(['prefix'  => 'guru/'],function(){
    Route::get('/',[GuruDashboardController::class, 'dashboard'])->name('guru.dashboard');

    Route::group(['prefix'  => 'data_personal/'],function(){
        Route::get('/',[DataPersonalController::class, 'index'])->name('guru.personal');
        Route::get('/add',[DataPersonalController::class, 'add'])->name('guru.personal.add');
        Route::post('/post',[DataPersonalController::class, 'post'])->name('guru.personal.post');
        Route::delete('/delete',[DataPersonalController::class, 'delete'])->name('guru.personal.delete');
    });

    Route::group(['prefix'  => 'riwayat_pendidikan/'],function(){
        Route::get('/',[RiwayatPendidikanController::class, 'index'])->name('guru.pendidikan');
        Route::get('/add',[RiwayatPendidikanController::class, 'add'])->name('guru.pendidikan.add');
        Route::post('/post',[RiwayatPendidikanController::class, 'post'])->name('guru.pendidikan.post');
        Route::delete('/delete',[RiwayatPendidikanController::class, 'delete'])->name('guru.pendidikan.delete');
    });

    Route::group(['prefix'  => 'riwayat_kepangkatan/'],function(){
        Route::get('/',[RiwayatKepangkatanController::class, 'index'])->name('guru.kepangkatan');
        Route::get('/add',[RiwayatKepangkatanController::class, 'add'])->name('guru.kepangkatan.add');
        Route::post('/post',[RiwayatKepangkatanController::class, 'post'])->name('guru.kepangkatan.post');
        Route::delete('/delete',[RiwayatKepangkatanController::class, 'delete'])->name('guru.kepangkatan.delete');
    });

    Route::group(['prefix'  => 'riwayat_jabatan/'],function(){
        Route::get('/',[RiwayatJabatanController::class, 'index'])->name('guru.jabatan');
        Route::get('/add',[RiwayatJabatanController::class, 'add'])->name('guru.jabatan.add');
        Route::post('/post',[RiwayatJabatanController::class, 'post'])->name('guru.jabatan.post');
        Route::delete('/delete',[RiwayatJabatanController::class, 'delete'])->name('guru.jabatan.delete');
    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
