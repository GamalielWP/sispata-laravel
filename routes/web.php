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
Route::get('/mahasiswa-data', 'MahasiswaController@data');

//proteksi gugus tugas middleware
Route::get('/gugus-tugas', 'GugusTugasController@index');

//proteksi kelompok keahlian middleware
Route::get('/kelompok-keahlian', 'KelompokKeahlianController@index');

//proteksi pembimbing middleware
Route::get('/pembimbing-penguji', 'PembimbingPengujiController@index');
