<?php


namespace App\Http\Controllers;

use app\User;
use App\Post;
// use app\Follow;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Auth;

class UsersController extends Controller
{
// プロフィール編集画面へ遷移(get)（ログインユーザーの名前とメールアドレス表示）
    public function profileEdit()
    {
        // $user = User::where('id',$id)->first();
        $user = Auth::user();
        // $username = $user->username;
        // $mail = $user->mail;
    return view('users.profile',['user'=>$user]);
// ['username'=>$up_name,'mail'=>$up_mail]
}

    // プロフィール編集更新（post）更新で保存してトップに
    public function profileUpdate(Request $request)
    {
        $request->validate([ // 編集バリデーション
              'upName' => ['required','min:2','max:12'],
              'mail' =>['required','min:5','max:40','email', Rule::unique('users')->ignore(Auth::user()->id)],
              'password' =>['required','alpha_num','min:8','max:20','confirmed'],
              'upBio' =>['max:150'],
              'upImg' =>['mimes:jpg,png,bmp,gif,svg'],
        ]);


//         	"・入力必須// ・2文字以上,12文字以内"
// 	"・入力必須// ・5文字以上,40文字以内// ・登録済みメールアドレス使用不可（自分のメールアドレスは除く）// ・メールアドレスの形式
// 	"・入力必須// ・英数字のみ// ・8文字以上,20文字以内"
// 	"・入力必須// ・英数字のみ// ・8文字以上,20文字以内// ・Password入力欄と一致しているか"
// 	・150文字以内
// 	・画像(jpg、png、bmp、gif、svg)ファイル以外は不可

        $id = $request->input('id');

        // dd($request->upImg);

        User::where('id',$id)->update([
            'username' => $request->input('upName'),
            'mail' => $request->input('mail'),
            'password' =>  bcrypt($request->input('password')),
            'bio' =>  $request->input('upBio'),
        ]);

// 画像ファイルがnullでないときのみアップデート
// ↑↓まとめて記述できないか？
         if(!empty($request->file('upImg'))){
             $image = $request->file('upImg')->getClientOriginalName()->store('public/profiles');
            User::where('id',$id)->update([
            'images' => $image,
            ]);
            }

    return redirect('/top');


    }

// 検索画面遷移
    public function index()
    {
        $users = User::get();
    return view('users.search',['users'=>$users]);
}


// 検索機能
 public function search(Request $request)
    {
        $username = $request->input('searchUser');
        if(!empty($username)){
            $users = User::where('username','like','%'.$username.'%')->get();
        }else {
            $users = User::all();
        }
        return view('users.search',['users'=>$users]);
    }

    // ユーザープロフィール画面遷移
    public function userProfile($id)
    {
        $user = User::find($id);
        $posts = Post::where('user_id',$id)->latest()->get();
        return view('users.userprofile',['posts'=>$posts,'user'=>$user]);
    }
 }
