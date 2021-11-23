<?php

use App\Http\Controllers\Guru\DataPersonalController;
use App\Http\Controllers\Guru\GuruDashboardController;
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
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
