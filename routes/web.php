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
Route::get('/user_info/mypage', 'UserInfoController@mypage');
// プロフィール作成画面に遷移
Route::get('/user_info/create', 'UserInfoController@create');
// プロフィール作成完了
Route::post('/user_info/create_confirmed', 'UserInfoController@create_confirmed');
// プロフィール編集画面に遷移
Route::get('/user_info/edit', 'UserInfoController@edit');
// 編集を完了し、更新
Route::post('/user_info/update', 'UserInfoController@update');
// 一覧画面に遷移
Route::get('/user_info/list', 'UserInfoController@list');
Route::get('/user_info/list/{category?}', 'UserInfoController@list');
// ユーザーページに遷移
Route::get('/user_info/userpage/{id}', 'UserInfoController@userpage');
// ユーザーをフォロー
Route::get('/user_info/userpage/{request_user}/{user}', 'UserInfoController@follow');

Auth::routes();
// ログアウト
Route::get("/logout", "Auth\LoginController@logout");
// チャット機能
Route::get('/chat/{user_id?}', 'UserInfoController@chat');
Route::get('ajax/chat', 'Ajax\ChatController@index');
Route::post('ajax/chat', 'Ajax\ChatController@send');
