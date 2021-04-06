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
    return view('welcome');
});
//authentication 
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
//layout giới thiệu
Route::get('/about',function(){
    return view('layouts/about');
});
//layout liên hệ 
Route::get('/contact',function(){
    return view('layouts/contact'); 
});

// hiển thị form thêm từ
Route::get('/addword', 'WordController@getForm'); 

// lưu từ vào cơ sở dữ liệu
Route::post('/store_word','WordController@storeWord'); 

//hiển thị danh sách từ
Route::get('/display_word', 'WordController@getWord'); 

Route::post('/display_word', 'WordController@delete');
//sửa từ 
Route::get('/update', 'WordController@update');