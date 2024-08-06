<?php

namespace App\Http\Requests\Request;

use Illuminate\Foundation\Http\FormRequest;

class PostRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'fullname' => ['required', 'min:5'],
            'username' => ['required', 'min:5'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:5'],
            'avatar' => ['required', 'image']
        ];
    }

    //thông báo
    public function messages()
    {
        return [
            'fullname.required' => "Họ và tên không được để trống !",
            'username.required' => "Tên đăng nhập (UserName) không được để trống !",
            'email.required' => "Email không được để trống !",
            'password.required' => "Password không được để trống !",
            'avatar.required' => "Avatar không được để trống !",

            'fullname.min' => "Họ và tên ít nhất có 5 kí tự !",
            'username.min' => "Tên đăng nhập (UserName) ít nhất có 5 kí tự !",
            'email.email' => "Email bạn đang để sai dạng !",
            'password.min' => "Password ít nhất có 5 kí tự !",
            'avatar.image' => "Avatar bạn đã nhập sai định dạng !",
        ];
    }
}
