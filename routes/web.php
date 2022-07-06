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

Route::get('/', 'LandingPageController@landing');
Route::post('/register-up', 'LandingPageController@register');

Auth::routes();

//proteksi mahasiswa middleware
Route::get('/mahasiswa-dashboard', 'MahasiswaController@dashboard');
Route::get('/mahasiswa-file', 'MahasiswaController@file');
Route::get('/mahasiswa-profile', 'MahasiswaController@profile')->name('profile');

Route::patch('/mahasiswa-profile-updated/{id}', 'MahasiswaController@update_profile');
Route::patch('/mahasiswa-file-updated/{id}', 'MahasiswaController@update_file');
Route::get('/mahasiswa-file-download/{id}', 'MahasiswaController@download');
Route::get('/mahasiswa-file-cancel/{id}', 'MahasiswaController@resetFile');

//proteksi dosen middleware

//gugus tugas role
Route::get('/gugus-tugas-dashboard', 'GugusTugasController@index');
Route::get('/gugus-tugas-request', 'GugusTugasController@request');
Route::get('/gugus-tugas-request-accept/{id}', 'GugusTugasController@accept');
Route::get('/gugus-tugas-request-decline/{id}', 'GugusTugasController@decline');
Route::get('/gugus-tugas-list-dosen', 'GugusTugasController@listDosen');
Route::post('/gugus-tugas-add-dosen', 'GugusTugasController@addDosen');
Route::get('/gugus-tugas-edit-dosen/{id}', 'GugusTugasController@editDosen');
Route::patch('/gugus-tugas-update-dosen/{id}', 'GugusTugasController@updateDosen');
Route::get('/gugus-tugas-delete-dosen/{id}', 'GugusTugasController@deleteDosen');
Route::get('/gugus-tugas-data-table-dosen', 'GugusTugasController@yajraIndexDosen')->name('dataDosen');
Route::get('/gugus-tugas-data-table-dasboard', 'GugusTugasController@yajraIndex')->name('dataGG');
Route::get('/gugus-tugas-data-table-request', 'GugusTugasController@yajraIndexRequest')->name('dataGGRequest');
Route::get('/gugus-tugas-data-table-clean', 'GugusTugasController@deleteMahasiswa');
Route::get('/gugus-tugas-edit/{id}', 'GugusTugasController@edit');
Route::patch('/gugus-tugas-update/{id}', 'GugusTugasController@update');

//kelompok keahlian role
Route::get('/kelompok-keahlian-dashboard', 'KelompokKeahlianController@index');
Route::get('/kelompok-keahlian-data-table', 'KelompokKeahlianController@yajraIndex')->name('dataKK');
Route::get('/kelompok-keahlian-edit/{id}', 'KelompokKeahlianController@edit');
Route::patch('/kelompok-keahlian-update/{id}', 'KelompokKeahlianController@update');
Route::get('/kelompok-keahlian-account', 'KelompokKeahlianController@akun');

//dosen role
Route::get('/dosen-pembimbing-1', 'DosenController@pembimbing1');
Route::get('/dosen-pembimbing-2', 'DosenController@pembimbing2');
Route::get('/dosen-data-table-1', 'DosenController@yajraIndexPembimbing1')->name('dataDosenPembimbing1');
Route::get('/dosen-data-table-2', 'DosenController@yajraIndexPembimbing2')->name('dataDosenPembimbing2');
Route::get('/dosen-pembimbing-1-edit/{id}', 'DosenController@editPembimbing1');
Route::get('/dosen-pembimbing-2-edit/{id}', 'DosenController@editPembimbing2');
Route::patch('/dosen-pembimbing-1-update/{id}', 'DosenController@updatePembimbing1');
Route::patch('/dosen-pembimbing-2-update/{id}', 'DosenController@updatePembimbing2');
Route::get('/dosen-pembimbing-1-print/{id}', 'DosenController@cetak');

Route::get('/dosen-penguji', 'DosenController@penguji');
Route::get('/dosen-data-table-3', 'DosenController@yajraIndexPenguji')->name('dataDosenPenguji');
Route::get('/dosen-penguji-edit/{id}', 'DosenController@editPenguji');
Route::patch('/dosen-penguji-update/{id}', 'DosenController@updatePenguji');

Route::get('/dosen-profile', 'DosenController@profile');
Route::patch('/dosen-profile-updated/{id}', 'DosenController@update_profile');
