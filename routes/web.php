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

//Route::get('/', function (){
    // return redirect()->route('login');
//});

//Route::get('/URLの部品', '繋げたいController@メゾット名')->name('ルートに名前を付けられる');

//ログアウト中のページ
//ミドルウェアの処理　->nameとは、ホームページのリンクを短縮させたい時に使用する。('飛ばしたいページの名前を記入する');
Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');


Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

Route::get('/logout', 'Auth\LoginController@logout');

//ログイン中のページ
//ログイン閲覧制限、ミドルウェアを使用し、URLに/topなどのログイン中のページを開いてもログインページに飛ぶ仕組みになっている。
Route::get('/top','PostsController@index')->middleware('auth');


Route::get('/Usersprofile','UsersController@Usersprofile');

Route::get('/search','UsersController@usersearch')->middleware('auth')->name('users.usersearch');
//ユーザー検索

Route::get('/follow-list','FollowsController@followList')->middleware('auth')->name('follow_icon');
Route::get('/follower-list','FollowsController@followerList')->middleware('auth');

//投稿した内容をtopへ送る処理
// Route::get('/top', 'PostsController@postCreate')->name('post.create');
Route::post('/top', 'PostsController@postCreate')->name('post.create');

//投稿内容を編集し、投稿を更新する処理
Route::get('/post/update','PostsController@update');
//投稿を削除する処理
Route::get('/post/{id}/delete','PostsController@delete');

//フォロワーする
Route::post('/follow/{user}', 'FollowsController@follow');
//Route::post(見えないルート)もしくはget('/follow/{ブレードから送られてきたパラメータ}', '行き先のController@メソット');
//フォロー解除する
Route::post('/unfollow/{user}', 'FollowsController@unfollow');
//ユーザー検索
// Route::get('/search/usersearch','UsersController@usersearch')->name('users.usersearch');
// Auth::routes();

//プロフィール編集ページを表示させる
Route::post('/top','UsersController@profileCreate')->middleware('auth')->name('profile.create');
//プロフィール編集し、更新する処理
Route::get('/profile/update_profile','UsersController@update_profile');