<?php

use App\Http\Controllers\FormulirController;
use App\Http\Controllers\PenerimaanController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\Admin\DataPendaftarController;
use App\Http\Controllers\Admin\SeleksiController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('formulir',[FormulirController::class,'index'])->name('formulir.index');
Route::post('formulir',[FormulirController::class,'store'])->name('formulir.store');
Route::get('formulir/cetak',[FormulirController::class,'cetak'])->name('formulir.cetak');
Route::get('penerimaan',[PenerimaanController::class,'index'])->name('penerimaan.index');
Route::get('informasi',[InformasiController::class,'index'])->name('informasi.index');


// admin
Route::group(['prefix' => 'admin'], function () {
    Route::group(['prefix' => 'pendaftaran'],function () {
        Route::get('/', [DataPendaftarController::class, 'index'])->name('admin.pendaftar.index');
        Route::get('create/', [DataPendaftarController::class, 'create'])->name('admin.pendaftar.create');
        Route::post('store/', [DataPendaftarController::class, 'store'])->name('admin.pendaftar.store');
        Route::get('/{id}', [DataPendaftarController::class, 'detail'])->name('admin.pendaftar.detail');
        Route::get('/edit/{id}', [DataPendaftarController::class, 'edit'])->name('admin.pendaftar.edit');
        Route::put('/{id}', [DataPendaftarController::class, 'update'])->name('admin.pendaftar.update');
        Route::delete('/{id}', [DataPendaftarController::class, 'destroy'])->name('admin.pendaftar.destroy');
    });
    Route::group(['prefix' => 'seleksi'],function () {
        Route::get('/', [SeleksiController::class, 'index'])->name('admin.seleksi.index');
        Route::get('create/', [SeleksiController::class, 'create'])->name('admin.seleksi.create');
        Route::post('store/', [SeleksiController::class, 'store'])->name('admin.seleksi.store');
        Route::get('/{id}', [SeleksiController::class, 'detail'])->name('admin.seleksi.detail');
        Route::get('/edit/{id}', [SeleksiController::class, 'edit'])->name('admin.seleksi.edit');
        Route::put('/{id}', [SeleksiController::class, 'update'])->name('admin.seleksi.update');
        Route::delete('/{id}', [SeleksiController::class, 'destroy'])->name('admin.seleksi.destroy');
    });
});
