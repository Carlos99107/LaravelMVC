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
Route::resource('user','App\Http\Controllers\UserController');
Route::resource('bono','App\Http\Controllers\BonoController');
Route::get('/totales','App\Http\Controllers\BonoController@totales');
Route::post('/filtertotal','App\Http\Controllers\BonoController@filtertotal');
Route::get('/usersbonos','App\Http\Controllers\BonoController@usersbonos');
Route::post('/filterusers','App\Http\Controllers\BonoController@filterusers');
Route::middleware(['auth:sanctum', 'verified'])->get('/dash', function () {
    return view('dash.index');
})->name('dash');
