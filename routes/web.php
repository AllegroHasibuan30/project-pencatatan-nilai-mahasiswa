<?php

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

Route::get('/', 'mhscontroller@home')->name('home');
route::group(['middleware' => 'auth'], function () {
    Route::get('list', 'mhscontroller@listmahasiswa')->name('list.mahasiswa');
    Route::get('form', 'mhscontroller@formmahasiswa')->name('form.mahasiswa');
    route::get('delete/{nim}','mhscontroller@deletemahasiswa')->name('hapus.mahasiswa');
    route::post('simpan','mhscontroller@simpanform')->name('simpan.mahasiswa');
    Route::get('rubah/{nim}','mhscontroller@rubahmahasiswa')->name('rubah.mahasiswa');
    Route::post('update/{nim}','mhscontroller@updatemahasiswa')->name('update.mahasiswa');
    
    
    Route::get('matakuliah', 'matakuliahcontroller@matakuliah')->name('matakuliah.matakuliah');
    Route::get('formmata', 'matakuliahcontroller@formmata')->name('formmata.matakuliah');
    Route::get('rubahmatkul/{id}','matakuliahcontroller@rubahmatkul')->name('rubahmatkul');
    route::get('hapusmatkul/{id}','matakuliahcontroller@hapusmatkul')->name('hapusmatkul');
    Route::post('/matakuliah/update/{id}','matakuliahcontroller@update')->name('matakuliah.update');
    Route::post('/matakuliah','matakuliahcontroller@simpan')->name('matakuliah.simpan');
    
    Route::get('kelas','kelascontroller@kelas')->name('kelas.kelas');
    Route::get('formkelas','kelascontroller@formkelas')->name('formkelas.kelas');
    Route::post('/kelas/update/{nama}','kelascontroller@update')->name('kelas.update');
    Route::post('/kelas','kelascontroller@simpan')->name('kelas.simpan');
    route::get('hapuskelas/{id}','kelascontroller@hapuskelas')->name('hapuskelas');
    Route::get('rubahkelas/{id}','kelascontroller@rubahkelas')->name('rubahkelas');
    Route::post('/kelas/update/{id}','kelascontroller@update')->name('kelas.update');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
