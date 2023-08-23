<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    // 投稿内容postとつなぐ（対多のリレーション）
     public function post()
     {
        return $this->hasMany(Post::class);
     }

    //  ☆☆☆
// フォローフォロワー機能、Userテーブル同士をfollowsテーブルを介して繋ぐ（多対多のリレーション）
//
     public function following()
     {
// Userクラスでfollowsテーブルを参照して、following_idがfollowed_idをフォローしている関係をつくる
        return $this->belongsToMany(User::class,'follows','following_id','followed_id');
     }

     public function followed()
     {
        // Userクラスでfollowsテーブルを参照して、followed_idがfollowing_idにフォローされている
        return $this->belongsToMany(User::class,'follows','followed_id','following_id');
     }

    //  フォロー機能ここに書く？
    public function follow($id)
    {
        return $this->follows()->attach($id);
    }

    // フォロー解除
    public function unfollow($id)
    {
        return $this->$follows()->detach($id);
    }

}
