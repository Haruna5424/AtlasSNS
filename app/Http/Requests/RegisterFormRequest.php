<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "username"=>"required|min:4|max:12",
            "mail"=>"required|email|unique:users",
            "password"=>"required|min:4|max:12|confirmed"
        ];
    }

    public function messages(){
        return [
            "username.required"=>"名前は必須項目です",
            "username.min"=>"4文字以上で入力してください",
            "username.max"=>"12文字以内で入力してください",
            "mail.required"=>"メールアドレスは必須です",
            "mail.email"=>"メール形式で入力してください",
            "mail.unique"=>"すでに登録済みのメールアドレスです",
            "password.required"=>"パスワードは必須です",
            "password.min"=>"4文字以上で入力してください",
            "password.max"=>"12文字以内で入力してください",
            "password.confirmed"=>"パスワードが一致しません",
        ];
    }
}
