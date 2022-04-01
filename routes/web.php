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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

//proteksi mahasiswa middleware
Route::get('/mahasiswa-dashboard', 'MahasiswaController@index');
Route::get('/mahasiswa-file', 'MahasiswaController@file');
Route::get('/mahasiswa-profile', 'MahasiswaController@profile');

//proteksi gugus tugas middleware
Route::get('/gugus-tugas-dashboard', 'GugusTugasController@index');
Route::get('/gugus-tugas-account', 'GugusTugasController@akun');

//proteksi kelompok keahlian middleware
Route::get('/kelompok-keahlian-diajukan', 'KelompokKeahlianController@index');
Route::get('/kelompok-keahlian-diterima', 'KelompokKeahlianController@diterima');
Route::get('/kelompok-keahlian-ditolak', 'KelompokKeahlianController@ditolak');
Route::get('/kelompok-keahlian-account', 'KelompokKeahlianController@akun');

//proteksi pembimbing & penguji middleware
Route::get('/data-table', 'DosenController@yajraIndex')->name('data');
Route::get('/dosen-pembimbing', 'DosenController@pembimbing');
Route::get('/dosen-penguji', 'DosenController@penguji');
Route::get('/dosen-profile', 'DosenController@profile');
