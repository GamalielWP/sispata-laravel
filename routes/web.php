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

Auth::routes();

//proteksi mahasiswa middleware
Route::get('/mahasiswa-dashboard', 'MahasiswaController@dashboard');
Route::get('/mahasiswa-file', 'MahasiswaController@file');
Route::get('/mahasiswa-profile', 'MahasiswaController@profile')->name('profile');

Route::patch('/mahasiswa-profile-updated/{id}', 'MahasiswaController@update_profile');
Route::patch('/mahasiswa-file-updated/{id}', 'MahasiswaController@update_file');

//proteksi dosen middleware

//gugus tugas role
Route::get('/gugus-tugas-data-table', 'GugusTugasController@yajraIndex')->name('dataGG');
Route::get('/gugus-tugas-dashboard', 'GugusTugasController@index');
Route::get('/gugus-tugas-edit/{id}', 'GugusTugasController@edit');
Route::patch('/gugus-tugas-update/{id}', 'GugusTugasController@update');

//kelompok keahlian role
Route::get('/kelompok-keahlian-dashboard', 'KelompokKeahlianController@index');
Route::get('/kelompok-keahlian-account', 'KelompokKeahlianController@akun');

//dosen role
Route::get('/dosen-data-table', 'DosenController@yajraIndex')->name('dataDosen');
Route::get('/dosen-pembimbing', 'DosenController@pembimbing');
Route::get('/dosen-penguji', 'DosenController@penguji');
Route::get('/dosen-profile', 'DosenController@profile');

Route::patch('/dosen-profile-updated/{id}', 'DosenController@update_profile');
