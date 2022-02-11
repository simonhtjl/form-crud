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

//Auth
Route::get('/','\App\Http\Controllers\AuthController@login')->name('login');
Route::post('/actionlogin','\App\Http\Controllers\AuthController@actionlogin')->name('actionlogin');
Route::get('/actionlogout','\App\Http\Controllers\AuthController@actionlogout')->name('actionlogout');
Route::get('/lupapassword','\App\Http\Controllers\AuthController@lupapassword');
Route::post('/lupapassword/validasiemail','\App\Http\Controllers\AuthController@validasiemail');

Route::get('/gantipassword/{id}','\App\Http\Controllers\AuthController@gantipassword');
Route::post('/ubahpassword/{id}','\App\Http\Controllers\AuthController@ubahpassword');
Route::get('/gantipassword','\App\Http\Controllers\AuthController@lupas');



//user
Route::group(['middleware' => ['tamu']], function () {
    Route::get('/user','\App\Http\Controllers\PengunjungController@index');
    Route::post('/user/tambah','\App\Http\Controllers\PengunjungController@store');
});

//supervisi
Route::group(['middleware' => ['supervisi']], function () {
    Route::get('/supervisi','\App\Http\Controllers\SupervisiController@index');
    Route::get('supervisi/cetakpdf/{id}','\App\Http\Controllers\SupervisiController@cetakpdf');
    Route::get('supervisi/cetakdocs/{id}','\App\Http\Controllers\SupervisiController@cetakdocs');
});

//Admin

Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin','\App\Http\Controllers\AdminController@index');
    Route::post('/admin/tambah','\App\Http\Controllers\AdminController@tambahAkun');
    Route::get('/admin/delete/{id}','\App\Http\Controllers\AdminController@delete');
  
    Route::get('/admin/tamu','\App\Http\Controllers\AdminController@indexTamu');
    Route::get('admin/cetakpdf/{id}','\App\Http\Controllers\AdminController@cetakpdf');
    Route::get('admin/cetakdocs/{id}','\App\Http\Controllers\AdminController@cetakdocs');

  });



