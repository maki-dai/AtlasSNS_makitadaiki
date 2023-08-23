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
        $user = Auth::user();
        $posts = Post::get();// Postモデル（postsテーブル）からレコード情報取得
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
    public function update()
    {

    }

    // 投稿削除
    public function delete($id)
    {
        $posts = Post::get();
        Post::where('id',$id)->delete();
        return back();
    }

}
