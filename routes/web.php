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
    return view('top');
});

// MyPageを表示
Route::get('/mypage', 'UserInfoController@mypage');
Route::get('/edit', 'UserInfoController@edit');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
