<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\User\PostRegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function register(){

        return view('user.auth.register');
    }

    public function postRegister(Request $request)
    {

        $data = $request->all();

        if ($request->hasFile('avatar')) {
            $path_image = $request->file('avatar')->store('images', 'public');
            $data['avatar'] = $path_image;
        } else {
            $data['avatar'] = '';
        }

        User::query()->create($data);

        return redirect()->route('user.auth.login')->with('message', 'Bạn đã đăng kí thành công!');
    }

    public function login(){

        return view('user.auth.login');
    }

    public function postLogin(Request $request)
    {
        // Lấy dữ liệu đầu vào
        $data = $request->only(['username', 'password']);

        // Xác thực người dùng
        if (Auth::attempt($data)) {
            // Lấy người dùng hiện tại
            $user = Auth::user();

            if ($user->active === 1 ) {
                if ($user->role === 'admin') {
                    return redirect()->route('admin.home');
                } else {
                    return redirect()->route('user.account.index');
                }
            } else {
                return redirect()->back()->with('active', 'Tài khoản của bạn đang bị khóa !');
            }
        } else {
            // Nếu xác thực không thành công, quay lại với thông báo lỗi
            return redirect()->back()->with('erro', 'Bạn đã nhập sai UserName hoặc Password !');
        }
    }


}

