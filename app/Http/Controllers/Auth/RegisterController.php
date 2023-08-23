<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
// use App\Http\Requests\RegisterRequest; フォームリクエストでバリデーションする場合

 use Illuminate\config\Session;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register(Request $request){

        if($request->isMethod('post')){

           $request->validate([
               'username' => ['required','max:12','min:2'],
            //  "・入力必須・2文字以上,12文字以内"
               'mail' => ['required','max:40','min:5','unique:users','email'],
            // "・入力必須・5文字以上,40文字以内・登録済みメールアドレス使用不可・メールアドレスの形式"
               'password' => ['required','alpha_num','max:20','min:8','confirmed'],
            // "・入力必須・英数字のみ・8文字以上,20文字以内"
            // 確認用と一致してるか（confirmed）
        ]);

            $username = $request->input('username');
            $mail = $request->input('mail');
            $password = $request->input('password');

            User::create([
                'username' => $username,
                'mail' => $mail,
                'password' => bcrypt($password),
            ]);
// セッションへ保存
            $request->session()->put('username',$username);
            return redirect('added');
        }
        return view('auth.register');
    }

    public function added(){
        return view('auth.added');
    }


}
