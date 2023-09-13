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
        'username', 'mail', 'password','bio','images'
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

    //  フォロー機能ここに書く？Intなぜ
    // ※ここは聞いて理解深める必要あり
    public function follow(Int $user_id)
    {
        return $this->following()->attach($user_id);
    }

    // フォロー解除
    public function unfollow(Int $user_id)
    {
        return  $this->following()->detach($user_id);
    }


      public function isFollowing($user_id)
    {
        // ここ直す
        return  (bool) $this->following()->where('followed_id', $user_id)->exists();
    }

      public function isFollowed($user_id)
    {
        // ここ直す
        return  (bool) $this->followed()->where('following_id', $user_id)->exists();
    }
}
