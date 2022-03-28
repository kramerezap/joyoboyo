<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/loginAndroid', 'APIcontroller@loginAndroid');
Route::get('/saklarAndroid', 'APIcontroller@saklarAndroid'); 
Route::post('/tambahjadwalAndroid', 'APIcontroller@tambahjadwalAndroid'); 
Route::get('/index','APIcontroller@index');
Route::get('/updatesaklarAndroidmati={id}', 'APIcontroller@updatesaklarAndroidmati');
Route::get('/updatesaklarAndroidhidup={id}', 'APIcontroller@updatesaklarAndroidhidup');
Route::post('tambahlog', 'APIcontroller@tambahlog');
Route::get('updatestatusAndroidhidup={id}', 'APIcontroller@updatestatusAndroidhidup');
Route::get('updatestatusAndroidmati={id}', 'APIcontroller@updatestatusAndroidmati');
Route::get('/penjadwalansaklar', 'APIcontroller@penjadwalansaklar'); 
Route::get('/hapusjadwalAndroid={id}', 'APIcontroller@hapusjadwalAndroid');
Route::get('/alarm', 'APIcontroller@alarm');
Route::post('/updatejadwal={id}', 'APIcontroller@updatejadwal');
Route::get('/deletejadwal={id}', 'APIcontroller@deletejadwal');
Route::get('/arduino','APIcontroller@arduino');