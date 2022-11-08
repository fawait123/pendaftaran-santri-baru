<?php

use App\Http\Controllers\FormulirController;
use App\Http\Controllers\PenerimaanController;
use App\Http\Controllers\InformasiController;
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
