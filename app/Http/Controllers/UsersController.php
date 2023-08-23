<?php



namespace App\Http\Controllers;

use app\User;
// use app\Follow;
use Illuminate\Http\Request;
use Auth;

class UsersController extends Controller
{
// プロフィール編集画面へ遷移(get)（ログインユーザーの名前とメールアドレス表示）
    public function profileEdit($id)
    {
        $user = User::where('id',$id)->first();
        // $user = Auth::user();
        // $username = $user->username;
        // $mail = $user->mail;
    return view('users.profile',['user'=>$user]);
// ['username'=>$up_name,'mail'=>$up_mail]
}

    // プロフィール編集更新（post）更新で保存してトップに
    public function profileUpdate(Request $request)
    {
        // $request->validate([ // 編集バリデーション
        //       'UserName' => ['required','min:2','max:12'],
        //       'MailAdress' =>['required','min:5','max:40','unique:User','email'],
        //       'NewPassword' =>['required','alpha_num','min:8','max:20','confirmed'],

        //       'Bio' =>['max:150'],
        //       'IconImage' =>['mimes:jpg,png,bmp,gif,svg'],

        // ]);


//         	"・入力必須// ・2文字以上,12文字以内"
// 	"・入力必須// ・5文字以上,40文字以内// ・登録済みメールアドレス使用不可（自分のメールアドレスは除く）// ・メールアドレスの形式
// 	"・入力必須// ・英数字のみ// ・8文字以上,20文字以内"
// 	"・入力必須// ・英数字のみ// ・8文字以上,20文字以内// ・Password入力欄と一致しているか"
// 	・150文字以内
// 	・画像(jpg、png、bmp、gif、svg)ファイル以外は不可


        // $id = $request->input('id');
        // $up_name = $request->input('upName');
        // $up_mail = $request->input('upMail');
        // $up_pass = $request->input('upPass');
        // $up_bio = $request->input('upBio');
        // $up_img = $request->input('upImg');

        $user = User::find($id);
        $user->username = $request->upName;
        $user->mail = $request->upMail;
        $user->password = $request->upPass;
        $user->bio = $request->upBio;
        $user->images = $request->upImg;
        $user->save();

    return redirect('/top');
        // User::where('id', $id)->update([
        //       'username' => $up_name,
        //       'mail' => $up_mail,
        //       'password'=> $up_pass,
        //       'bio'=> $up_bio,
        //       'images'=>$up_img
        // ]);

        // return redirect('/top');// セッションで保存しつつ的な奴でトップに遷移


    //      public function update(Request $request)
    // {
    //
    // }
    }

// フォローリスト画面遷移
    public function followlist()
    {
        return view('follows.followlist');
}
// フォロワーリスト画面遷移
    public function followerlist()
    {
    return view('follows.followerlist');
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


// フォロー機能
    public function follow(User $user)
    {
        $following_id = Auth::user()->id;
        $followed_id = $user->id;

        return back();
}

// フォロー解除
    public function unfollow(User $user)
    {
        follow::where('following_id',$following_id)->delete();
        return back();
}
}
