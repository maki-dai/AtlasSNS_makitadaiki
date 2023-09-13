<?php

namespace App\Http\Controllers;
use app\User;
use Illuminate\Http\Request;
use Auth;

class FollowsController extends Controller
{
    //

    // フォロー機能
    public function follow(Request $request)
    {
        $follower = Auth::user();
        $user_id = $request->input('id');
        $is_following = $follower->isFollowing($user_id);
        if(!$is_following){
             $follower->follow($user_id);
             return back();
        }
    }
    public function unfollow(Request $request)
    {
        $follower = Auth::user();
        $user_id = $request->input('id');
        $is_following = $follower->isFollowing($user_id);
        if($is_following){
            $follower->unfollow($user_id);
            return back();
        }
    }

    public function followList(){
        return view('follows.followList');
    }
    public function followerList(){
        return view('follows.followerList');
    }


}
