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
Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');


// [ログイン中のページ]

Route::group(['middleware' => 'auth'],function(){ // ミドルウェア処理でログインユーザーか否かでアクセス制限

 Route::get('/top','PostsController@index');
 Route::post('/top','PostsController@index');

 Route::get('/profile/{id}/edit','UsersController@profileEdit');//  プロフィール編集画面へ遷移
 Route::post('/profile/update','UsersController@profileUpdate')->name('profile.update');
//  ->name('profile.edit');

// 投稿機能
// 新規投稿
 Route::get('/post','PostController@create');//表示用
 Route::post('/post','PostsController@create')->name('post.create');//投稿を押した時
//  投稿内容編集
//  Route::post('/update','PostsController@postUpdate')->name('post.update');
// 投稿削除
 Route::get('/post/{id}/delete','PostsController@delete')->name('post.delete');

// 検索機能(post?get?)
 Route::get('/search','UsersController@index');// 検索ボタン押して画面遷移

 Route::get('/search','UsersController@search');
 Route::post('/search','UsersController@search')->name('user.search');

// フォロー機能ルーティング
 Route::get('/follow','UsersController@follow')->name('follow');
 Route::post('/follow','UsersController@follow');
// フォロー解除ルーティング
 Route::get('/unfollow','UsersController@unfollow')->name('unfollow');
 Route::post('/unfollow','UsersController@unfollow');

 Route::get('/follow-list','UsersController@followlist');//  フォローリスト押して画面遷移
 Route::get('/follower-list','UsersController@followerlist');//  フォロワーリスト押して画面遷移

 Route::get('/logout', 'Auth\LoginController@logout'); // ログアウト実装
 Route::post('/logout', 'Auth\LoginController@logout');

});
