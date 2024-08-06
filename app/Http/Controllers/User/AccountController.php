<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.account.index', compact('users'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('user.auth.login');
    }

    public function edit()
    {

        return view('user.account.update');
    }


    public function update(Request $request)
    {

        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('avatars', 'public');
            $user = Auth::user();
            $user->avatar = $path;
            $user->save();
        }

        $user = Auth::user();
        $user->fullname = $request->input('fullname');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->save();

        return redirect()->route('user.account.edit')->with('message', 'Cập nhật dữ liệu thành công');
    }


    public function resetPassword()
    {
        return view('user.account.resetPassword');
    }


    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        if (!Hash::check($request->input('current_password'), $user->password)) {
            return redirect()->route('user.account.resetPassword')
                             ->withErrors(['current_password' => 'Mật khẩu cũ không đúng']);
        }

        // Update password
        $user->password = Hash::make($request->input('new_password'));
        $user->save();

        return redirect()->route('user.account.resetPassword')
                         ->with('message', 'Cập nhật mật khẩu thành công');
    }

}
