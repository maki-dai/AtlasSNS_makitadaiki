<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
//     public function rules()
//     {

//         // 新規登録時のバリデーション設定
//     //     return  [
//     //           'username' => ['required','min:2','max:12'],
//     //             // 	"・入力必須・2文字以上,12文字以内"
//     //            'mail' => ['required','max:40','min:5','unique:users','email'],
//     //             // "・入力必須// ・5文字以上,40文字以内// ・登録済みメールアドレス使用不可// ・メールアドレスの形式"
//     //            'password' => ['required','regex:/^[a-zA-Z0-9]+$/','max:20','min:8','confirmed'],
//     //             // 	"・入力必須// ・英数字のみ// ・8文字以上,20文字以内"
//     //             //    confirmedで確認用もpasswordがpassword_confirmationと一致チェックしてくれる
//     //             // 	"・入力必須// ・英数字のみ// ・8文字以上,20文字以内// ・Password入力欄と一致しているか"
//     //     ];
//     // }



//
}

// バリデーション設定条件
// UserName	"・入力必須
// ・2文字以上,12文字以内"
// MailAdress	"・入力必須
// ・5文字以上,40文字以内
// ・登録済みメールアドレス使用不可
// ・メールアドレスの形式"
// Password	"・入力必須
// ・英数字のみ
// ・8文字以上,20文字以内"
// PasswordConfirm	"・入力必須
// ・英数字のみ
// ・8文字以上,20文字以内
// ・Password入力欄と一致しているか" -->
