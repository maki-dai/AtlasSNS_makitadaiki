<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    //
    protected $fillable = [
        'following_id', 'followed_id','created_at','updated_at',
    ];

}
