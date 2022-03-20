<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KabupatenController;
use App\Http\Controllers\DesaController;
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

//Front Endd
//Home


Route::get('/', [WebController::class, 'index']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

//Login
Route::get('login', 'App\Http\Controllers\Login@index');
Route::post('login/check', 'App\Http\Controllers\Login@check');
Route::get('login/lupa', 'App\Http\Controllers\Login@lupa');
Route::get('login/logout', 'App\Http\Controllers\Login@logout');
/* END FRONT END */
/* BACK END */

// dasbor
Route::get('admin/dasbor', 'App\Http\Controllers\Admin\Dasbor@index');
Route::get('admin/dasbor/konfigurasi', 'App\Http\Controllers\Admin\Dasbor@konfigurasi');

// kategori_organisasikarangtaruna
Route::get('admin/karangtaruna', 'App\Http\Controllers\Admin\Karangtaruna@index');
Route::get('admin/karangtaruna/cari', 'App\Http\Controllers\Admin\Karangtaruna@cari');
Route::get('admin/karangtaruna/status_karangtaruna/{par1}', 'App\Http\Controllers\Admin\Karangtaruna@status_karangtaruna');
Route::get('admin/karangtaruna/kategori/{par1}', 'App\Http\Controllers\Admin\Karangtaruna@kategori');
Route::get('admin/karangtaruna/detail/{par1}', 'App\Http\Controllers\Admin\Karangtaruna@detail');
Route::get('admin/karangtaruna/tambah', 'App\Http\Controllers\Admin\Karangtaruna@tambah');
Route::get('admin/karangtaruna/edit/{par1}', 'App\Http\Controllers\Admin\Karangtaruna@edit');
Route::get('admin/karangtaruna/delete/{par1}', 'App\Http\Controllers\Admin\Karangtaruna@delete');
Route::post('admin/karangtaruna/tambah_proses', 'App\Http\Controllers\Admin\Karangtaruna@tambah_proses');
Route::post('admin/karangtaruna/edit_proses', 'App\Http\Controllers\Admin\Karangtaruna@edit_proses');
Route::post('admin/karangtaruna/proses', 'App\Http\Controllers\Admin\Karangtaruna@proses');



// kategori_jabatan
Route::get('admin/kategori_jabatan', 'App\Http\Controllers\Admin\Kategori_jabatan@index');
Route::post('admin/kategori_jabatan/tambah', 'App\Http\Controllers\Admin\Kategori_jabatan@tambah');
Route::post('admin/kategori_jabatan/edit', 'App\Http\Controllers\Admin\Kategori_jabatan@edit');
Route::get('admin/kategori_jabatan/delete/{par1}', 'App\Http\Controllers\Admin\Kategori_jabatan@delete');

// kategori_tupoksi
Route::get('admin/kategori_tupoksi', 'App\Http\Controllers\Admin\Kategori_tupoksi@index');
Route::post('admin/kategori_tupoksi/tambah', 'App\Http\Controllers\Admin\Kategori_tupoksi@tambah');
Route::post('admin/kategori_tupoksi/edit', 'App\Http\Controllers\Admin\Kategori_tupoksi@edit');
Route::get('admin/kategori_tupoksi/delete/{par1}', 'App\Http\Controllers\Admin\Kategori_tupoksi@delete');




//Desa
Route::get('/desa', [DesaController::class, 'index'])->name('desa');
Route::get('/desa/add', [DesaController::class, 'add']);
Route::post('/desa/insert', [DesaController::class, 'insert']);
Route::get('/desa/edit/{desa_kode}', [DesaController::class, 'edit']);
Route::post('/desa/update/{desa_kode}', [DesaController::class, 'update']);
Route::get('/desa/delete/{desa_kode}', [DesaController::class, 'delete']);

//Kecamatan
Route::get('/kecamatan', [KecamatanController::class, 'index'])->name('kecamatan');
Route::get('/kecamatan/add', [KecamatanController::class, 'add']);
Route::post('/kecamatan/insert', [KecamatanController::class, 'insert']);
Route::get('/kecamatan/edit/{kec_kode}', [KecamatanController::class, 'edit']);
Route::post('/kecamatan/update/{kec_kode}', [KecamatanController::class, 'update']);
Route::get('/kecamatan/delete/{kec_kode}', [KecamatanController::class, 'delete']);

//Kabupaten
Route::get('/kabupaten', [KabupatenController::class, 'index'])->name('kabupaten');
Route::get('/kabupaten/add', [KabupatenController::class, 'add']);
Route::post('/kabupaten/insert', [KabupatenController::class, 'insert']);
Route::get('/kabupaten/edit/{kab_kode}', [KabupatenController::class, 'edit']);
Route::post('/kabupaten/update/{kab_kode}', [KabupatenController::class, 'update']);
Route::get('/kabupaten/delete/{kab_kode}', [KabupatenController::class, 'delete']);
