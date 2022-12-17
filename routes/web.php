<?php

use App\Http\Controllers\FormulirController;
use App\Http\Controllers\PenerimaanController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DataPendaftarController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\SeleksiController;
use App\Http\Controllers\Admin\InformasiController as AdminInformasiController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;

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

Route::get('/persyaratan',function(){
    $path = './persyaratan.pdf';
    return Response::download($path);
})->name('persyaratan.download');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('formulir',[FormulirController::class,'index'])->name('formulir.index');
Route::get('profile',[ProfileController::class,'index'])->name('profile.index');
Route::post('profile/change-password',[ProfileController::class,'updatePassword'])->name('profile.password.change');
Route::post('profile/upload',[ProfileController::class,'upload'])->name('profile.upload');
Route::post('formulir',[FormulirController::class,'store'])->name('formulir.store');
Route::get('formulir/cetak',[FormulirController::class,'cetak'])->name('formulir.cetak');
Route::get('formulir/download/{id}',[FormulirController::class,'download'])->name('formulir.download');
Route::get('penerimaan',[PenerimaanController::class,'index'])->name('penerimaan.index');
Route::get('informasi',[InformasiController::class,'index'])->name('informasi.index');
Route::get('notifikasi',[NotifikasiController::class,'index'])->name('notifikasi.index');
Route::get('notifikasi/read/all',[NotifikasiController::class,'readAll'])->name('notifikasi.readAll');
Route::get('notifikasi/read/{id}',[NotifikasiController::class,'read'])->name('notifikasi.read');
Route::delete('notifikasi/destroy/{id}',[NotifikasiController::class,'destroy'])->name('notifikasi.destroy');


// admin
Route::group(['prefix' => 'admin','middleware'=>'role:admin'], function () {
    Route::group(['prefix' => 'pendaftaran'],function () {
        Route::get('/', [DataPendaftarController::class, 'index'])->name('admin.pendaftar.index');
        Route::get('/verifikasi', [DataPendaftarController::class, 'verifikasiAll'])->name('admin.pendaftar.verifikasi.all');
        Route::get('create/', [DataPendaftarController::class, 'create'])->name('admin.pendaftar.create');
        Route::post('store/', [DataPendaftarController::class, 'store'])->name('admin.pendaftar.store');
        Route::get('/{id}', [DataPendaftarController::class, 'detail'])->name('admin.pendaftar.detail');
        Route::get('/edit/{id}', [DataPendaftarController::class, 'edit'])->name('admin.pendaftar.edit');
        Route::put('/{id}', [DataPendaftarController::class, 'update'])->name('admin.pendaftar.update');
        Route::delete('/{id}', [DataPendaftarController::class, 'destroy'])->name('admin.pendaftar.destroy');
        Route::post('/verifikasi/{id}', [DataPendaftarController::class, 'verifikasi'])->name('admin.pendaftar.verifikasi');
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
    Route::group(['prefix' => 'laporan'],function () {
        Route::get('santri', [LaporanController::class, 'santri'])->name('admin.laporan.santri');
        Route::get('seleksi', [LaporanController::class, 'seleksi'])->name('admin.laporan.seleksi');
        Route::post('download', [LaporanController::class, 'download'])->name('admin.laporan.download');
    });
    Route::group(['prefix' => 'informasi'],function () {
        Route::get('/', [AdminInformasiController::class, 'index'])->name('admin.informasi.index');
        Route::get('create/', [AdminInformasiController::class, 'create'])->name('admin.informasi.create');
        Route::post('store/', [AdminInformasiController::class, 'store'])->name('admin.informasi.store');
        Route::get('/{id}', [AdminInformasiController::class, 'detail'])->name('admin.informasi.detail');
        Route::get('/edit/{id}', [AdminInformasiController::class, 'edit'])->name('admin.informasi.edit');
        Route::put('/{id}', [AdminInformasiController::class, 'update'])->name('admin.informasi.update');
        Route::delete('/{id}', [AdminInformasiController::class, 'destroy'])->name('admin.informasi.destroy');
    });
    Route::group(['prefix' => 'pengguna'],function () {
        Route::get('/', [AdminUserController::class, 'index'])->name('admin.user.index');
        Route::get('create/', [AdminUserController::class, 'create'])->name('admin.user.create');
        Route::post('store/', [AdminUserController::class, 'store'])->name('admin.user.store');
        Route::get('/{id_user}', [AdminUserController::class, 'detail'])->name('admin.user.detail');
        Route::get('/edit/{id_user}', [AdminUserController::class, 'edit'])->name('admin.user.edit');
        Route::put('/{id_user}', [AdminUserController::class, 'update'])->name('admin.user.update');
        Route::delete('/{id_user}', [AdminUserController::class, 'destroy'])->name('admin.user.destroy');
    });
});
