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
    return view('home');
});

Route::get('/home', 'App\Http\Controllers\myController@index')->name('home');
Route::post('search', 'App\Http\Controllers\myController@showInfoRunner');


Route::get('register', 'App\Http\Controllers\myController@register');
Route::post('register/creted', 'App\Http\Controllers\myController@store');

Route::get('distance', 'App\Http\Controllers\myController@insertDistance');
Route::post('distance/updated', 'App\Http\Controllers\myController@updateDistance');

Route::get('rank', 'App\Http\Controllers\myController@showRank');
Route::get('toprank', 'App\Http\Controllers\myController@showTopRank');
//->name('index') = ตั้งชื่อสำหรับ controller
