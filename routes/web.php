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


Route::get('/loguser', 'BlogController@loguser');
Route::get('/dashboard', 'BlogController@dashboard');
Route::post('/loginaction', 'BlogController@loginaction');
Route::post('/tambahpetugas', 'BlogController@tambahpetugas');
Route::get('/hapuspetugas={id}', 'BlogController@hapuspetugas');
Route::post('/updatepetugas={id}', 'BlogController@updatepetugas');
Route::get('/petugas', 'BlogController@petugas');
Route::get('/saklar', 'BlogController@saklar');
Route::get('/log', 'BlogController@log');
Route::get ('index/', 'BlogController@index');

//Android
Route::get('/logandroid', 'AndroidController@logandroid');
Route::post('/loginactionandroid', 'AndroidController@loginactionandroid');
Route::get('/dashboardandroid', 'AndroidController@dashboardandroid');


