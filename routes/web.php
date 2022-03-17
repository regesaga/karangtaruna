<?php

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

//Front Endd
//Home

Route::get('/', 'App\Http\Controllers\Home@index');


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