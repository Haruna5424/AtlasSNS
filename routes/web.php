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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@registerForm');
Route::post('/register/create', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');


//ログイン中のページ
//ログアウト
Route::get('/logout', 'Auth\LoginController@logout');

// 投稿画面の表示
Route::get('/top','PostsController@index');

// 投稿処理
Route::post('/posts', 'PostsController@store');

Route::post('/post/edit', 'PostsController@update');
Route::get('top/{id}/delete', 'postsController@delete');

Route::get('/profile','UsersController@profile');
Route::post('/profile/update','UsersController@profileUpdate');

//検索ページ
Route::get('/search','UsersController@index');
Route::post('/search','UsersController@index');

Route::post('/search/follow/{id}', 'UsersController@follow')->name('follow');
Route::delete('/search/unfollow/{id}', 'UsersController@unfollow')->name('unfollow');


Route::get('/follow-list','UsersController@follow_list');
Route::get('/follower-list','UsersController@follower_list');

Route::get('/user-profile/{id}','UsersController@userProfile')->name('userProfile');

