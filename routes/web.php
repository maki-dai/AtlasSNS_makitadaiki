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

 Route::get('/profile','UsersController@profileEdit');//  プロフィール編集画面へ遷移
 Route::post('/profile/update','UsersController@profileUpdate')->name('profile.update');
//  ->name('profile.edit');

// 投稿機能
// 新規投稿
 Route::get('/post','PostController@create');//表示用
 Route::post('/post','PostsController@create')->name('post.create');//投稿を押した時
//  投稿内容編集
 Route::post('/post/update','PostsController@postUpdate')->name('post.update');
// 投稿削除
 Route::get('/post/{id}/delete','PostsController@delete')->name('post.delete');

// 検索機能(post?get?)
 Route::get('/search','UsersController@index');// 検索ボタン押して画面遷移

 Route::get('/search','UsersController@search');
 Route::post('/search','UsersController@search')->name('user.search');

// フォロー機能ルーティング
//  Route::get('/follow','FollowsController@follow'); ゲットなくてもOKっぽい
 Route::post('/follow','FollowsController@follow')->name('follow');
// フォロー解除ルーティング
 Route::get('/unfollow','FollowsController@unfollow');
 Route::post('/unfollow','FollowsController@unfollow')->name('unfollow');

 Route::get('/follow-list','PostsController@followlist');//  フォローリスト押して画面遷移
 Route::get('/follower-list','PostsController@followerlist');//  フォロワーリスト押して画面遷移

//  ユーザープロフィール画面
 Route::get('/userprofile/{id}','UsersController@userProfile');
//  Route::post('/userprofile/{id}','UsersController@userProfile');

 Route::get('/logout', 'Auth\LoginController@logout'); // ログアウト実装
 Route::post('/logout', 'Auth\LoginController@logout');

});
