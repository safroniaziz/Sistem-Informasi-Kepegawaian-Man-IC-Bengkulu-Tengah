<?php

use App\Http\Controllers\Guru\DataPersonalController;
use App\Http\Controllers\Guru\RiwayatPendidikanController;
use App\Http\Controllers\Guru\RiwayatKepangkatanController;
use App\Http\Controllers\Guru\RiwayatPelatihanController;

use App\Http\Controllers\Guru\GuruDashboardController;
use App\Http\Controllers\Guru\RiwayatJabatanFungsionalController;
use App\Http\Controllers\Guru\RiwayatTugasTambahanController;
use App\Http\Controllers\Guru\DataIstriAtauSuamiController;
use App\Http\Controllers\Guru\DataAnakController;
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
        Route::get('{pendNip}/edit',[RiwayatPendidikanController::class, 'edit'])->name('guru.pendidikan.edit');
        Route::patch('{pendNip}/update',[RiwayatPendidikanController::class, 'update'])->name('guru.pendidikan.update');
        Route::delete('{pendNip}/delete',[RiwayatPendidikanController::class, 'delete'])->name('guru.pendidikan.delete');
    });

    Route::group(['prefix'  => 'riwayat_pelatihan/'],function(){
        Route::get('/',[RiwayatPelatihanController::class, 'index'])->name('guru.pelatihan');
        Route::get('/add',[RiwayatPelatihanController::class, 'add'])->name('guru.pelatihan.add');
        Route::post('/post',[RiwayatPelatihanController::class, 'post'])->name('guru.pelatihan.post');
        Route::delete('/delete',[RiwayatPelatihanController::class, 'delete'])->name('guru.pelatihan.delete');
    });

    Route::group(['prefix'  => 'riwayat_kepangkatan/'],function(){
        Route::get('/',[RiwayatKepangkatanController::class, 'index'])->name('guru.kepangkatan');
        Route::get('/add',[RiwayatKepangkatanController::class, 'add'])->name('guru.kepangkatan.add');
        Route::post('/post',[RiwayatKepangkatanController::class, 'post'])->name('guru.kepangkatan.post');
        Route::get('{pendNip}/edit',[RiwayatKepangkatanController::class, 'edit'])->name('guru.kepangkatan.edit');
        Route::patch('{pendNip}/update',[RiwayatKepangkatanController::class, 'update'])->name('guru.kepangkatan.update');
        Route::delete('{pendNip}/delete',[RiwayatKepangkatanController::class, 'delete'])->name('guru.kepangkatan.delete');
        Route::delete('/delete',[RiwayatKepangkatanController::class, 'delete'])->name('guru.kepangkatan.delete');
    });

    Route::group(['prefix'  => 'riwayat_jabatan_fungsional/'],function(){
        Route::get('/',[RiwayatJabatanFungsionalController::class, 'index'])->name('guru.jabatan_fungsional');
        Route::get('/add',[RiwayatJabatanFungsionalController::class, 'add'])->name('guru.jabatan_fungsional.add');
        Route::post('/post',[RiwayatJabatanFungsionalController::class, 'post'])->name('guru.jabatan_fungsional.post');
        Route::get('{pendNip}/edit',[RiwayatJabatanFungsionalController::class, 'edit'])->name('guru.jabatan_fungsional.edit');
        Route::patch('{pendNip}/update',[RiwayatJabatanFungsionalController::class, 'update'])->name('guru.jabatan_fungsional.update');
        Route::delete('{pendNip}/delete',[RiwayatJabatanFungsionalController::class, 'delete'])->name('guru.jabatan_fungsional.delete');
        Route::delete('/delete',[RiwayatJabatanFungsionalController::class, 'delete'])->name('guru.jabatan_fungsional.delete');
    });

    Route::group(['prefix'  => 'riwayat_tugas_tambahan/'],function(){
        Route::get('/',[RiwayatTugasTambahanController::class, 'index'])->name('guru.tugas_tambahan');
        Route::get('/add',[RiwayatTugasTambahanController::class, 'add'])->name('guru.tugas_tambahan.add');
        Route::post('/post',[RiwayatTugasTambahanController::class, 'post'])->name('guru.tugas_tambahan.post');
        Route::get('{pendNip}/edit',[RiwayatTugasTambahanController::class, 'edit'])->name('guru.tugas_tambahan.edit');
        Route::patch('{pendNip}/update',[RiwayatTugasTambahanController::class, 'update'])->name('guru.tugas_tambahan.update');
        Route::delete('{pendNip}/delete',[RiwayatTugasTambahanController::class, 'delete'])->name('guru.tugas_tambahan.delete');
        Route::delete('/delete',[RiwayatTugasTambahanController::class, 'delete'])->name('guru.tugas_tambahan.delete');
    });

    Route::group(['prefix'  => 'data_keluarga_istri_atau_suami/'],function(){
        Route::get('/',[DataIstriAtauSuamiController::class, 'index'])->name('guru.istri_atau_suami');
        Route::get('/add',[DataIstriAtauSuamiController::class, 'add'])->name('guru.istri_atau_suami.add');
        Route::post('/post',[DataIstriAtauSuamiController::class, 'post'])->name('guru.istri_atau_suami.post');
        Route::get('{pendNip}/edit',[DataIstriAtauSuamiController::class, 'edit'])->name('guru.istri_atau_suami.edit');
        Route::patch('{pendNip}/update',[DataIstriAtauSuamiController::class, 'update'])->name('guru.istri_atau_suami.update');
        Route::delete('{pendNip}/delete',[DataIstriAtauSuamiController::class, 'delete'])->name('guru.istri_atau_suami.delete');
        Route::delete('/delete',[DataIstriAtauSuamiController::class, 'delete'])->name('guru.istri_atau_suami.delete');
    });

    Route::group(['prefix'  => 'data_anak/'],function(){
        Route::get('/',[DataAnakController::class, 'index'])->name('guru.data_anak');
        Route::get('/add',[DataAnakController::class, 'add'])->name('guru.data_anak.add');
        Route::post('/post',[DataAnakController::class, 'post'])->name('guru.data_anak.post');
        Route::get('{pendNip}/edit',[DataAnakController::class, 'edit'])->name('guru.data_anak.edit');
        Route::patch('{pendNip}/update',[DataAnakController::class, 'update'])->name('guru.data_anak.update');
        Route::delete('{pendNip}/delete',[DataAnakController::class, 'delete'])->name('guru.data_anak.delete');
        Route::delete('/delete',[DataAnakController::class, 'delete'])->name('guru.data_anak.delete');
    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
