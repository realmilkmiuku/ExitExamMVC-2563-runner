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
/* 
การไปหน้าเว็บ หรือขอ request พร้อมกับรอรับข้อมูลจาก form 
โดยใช้คำสั่ง get '/home' request นี้จึงเรียก func 'home 'ใน myController 
func 'home 'ใน controller คือการ return view 'home.blade.php' กลับมาตาม request
get '/url' อื่นๆ ก็เช่นเดียวกัน ซึ่งการ return view ถูกกำหนดตาม func แต่ละตัวใน controller

//->name('index') = ตั้งชื่อสำหรับเรียกใช้ใน myController

การไปหน้าเว็บที่แสดงข้อมูลที่มีตัวแปลที่รับมาจาก form ui หน้านั้นๆ หรือการส่งข้อมูลกลับไปยังที่ที่มีข้อมูลอยู่แล้ว โดยใช้คำสั่ง post '/url'   
ยกตัวอย่าง เช่น มีการลงทะเบียนจาก form ui มีคำสั่ง ดังนี้
    <form action="{{ url('register/creted')}}" method="POST"  class="needs-validation" novalidate>
    {{ csrf_field() }}
คำสั่งหมายถึงให้ไปที่ Route::post('register/creted', 'App\Http\Controllers\myController@store');
โดย request นี้จะเรียก func 'store'ใน myController เป็น func สำหรับการเพิ่มข้อมูลลง db 
พร้อมกับ return layout,ตัวแปล,สถานะการลงทะเบียน 
*/

Route::get('/home', 'App\Http\Controllers\myController@index')->name('home');
Route::post('search', 'App\Http\Controllers\myController@showInfoRunner');


Route::get('register', 'App\Http\Controllers\myController@register');
Route::post('register/creted', 'App\Http\Controllers\myController@store');

Route::get('distance', 'App\Http\Controllers\myController@insertDistance');
Route::post('distance/updated', 'App\Http\Controllers\myController@updateDistance');

Route::get('rank', 'App\Http\Controllers\myController@showRank');
Route::get('toprank', 'App\Http\Controllers\myController@showTopRank');

