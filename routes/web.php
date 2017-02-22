<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::resource('/pegawai', 'pegawaicontroller');
Route::resource('/penggajian', 'penggajiancontroller');
Route::resource('/jabatan','jabatancontroller');
Route::resource('/golongan','golongancontroller');
Route::resource('/tunjangan','tunjangancontroller');
Route::resource('/kategori_lembur','kategori_lemburcontroller');
Route::resource('/lembur_pegawai','lembur_pegawaicontroller');
Route::resource('/tunjangan_pegawai','tunjangan_pegawaicontroller');
