<?php

namespace App\Http\Controllers;

use App\Post;
use app\User;
use Illuminate\Http\Request;
use Auth;


class PostsController extends Controller
{
    //トップページ（投稿表示）
    public function index()
    {
        $following_id = Auth::user()->following()->pluck('followed_id');
        // フォローユーザーとAuthユーザーの投稿を表示する（orWhere）
        $posts = Post::with('user')->whereIn('user_id',$following_id)->orWhere('user_id',Auth::user()->id)->latest()->get();
        // $user = Auth::user();
        // $posts = Post::get();// Postモデル（postsテーブル）からレコード情報取得
        return view('posts.index',['posts'=>$posts]);
    }

    // 新規投稿
     public function create(Request $request)
    {
        $request->validate([ // 投稿バリデーション
              'newPost' => ['required','max:150'],
        ]);

        $id = Auth::user()->id; // ログインしているユーザーID取得
        $posts = Post::get();// Postモデル（postsテーブル）からレコード情報取得
        $post = $request->input('newPost');

        Post::create([
            'user_id' => $id,
            'post' => $post
        ]);
        return back();
    }

    // 投稿内容編集
    public function postUpdate(Request $request)
    {
        $id = $request->input('id');
        $up_post = $request->input('upPost');
        $posts = Post::get();
        Post::where('id',$id)->update([
            'post' => $up_post
    ]);
        return back();

    }

    // 投稿削除
    public function delete($id)
    {
        $posts = Post::get();
        Post::where('id',$id)->delete();
        return back();
    }
    // フォローリスト画面　投稿内容表示
    public function followlist()
    {
        $following_id = Auth::user()->following()->pluck('followed_id');
        // ユーザーアイコン表示
        $lists = User::find($following_id);
        $posts = Post::with('user')->whereIn('user_id',$following_id)->latest()->get();
        return view('follows.followlist',['posts'=>$posts,'lists'=>$lists]);
    }
    // フォロワーリスト画面　投稿内容表示
    public function followerlist()
    {
        $followed_id = Auth::user()->followed()->pluck('following_id');
        $lists = User::find($followed_id);
        $posts = Post::with('user')->whereIn('user_id',$followed_id)->latest()->get();
        return view('follows.followerlist',['posts'=>$posts,'lists'=>$lists]);
}
}
