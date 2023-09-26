<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [
        'user_id',
        'post'
    ];
    //  public $timestamps = false;

     // ユーザーuserと繋ぐ（対１のリレーション）
    public function user(){
        return $this->belongsTo(User::class);
    }
}
