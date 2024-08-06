<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminUserController extends Controller
{
    public function list()
    {
        $users = User::query()
            ->paginate(5);
        return view('admin.users.list', compact('users'));
    }


    public function add()
    {
        return view('admin.users.add');
    }
    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'fullname.required' => 'Tên người dùng là bắt buộc.',
            'username.required' => 'Tên đăng nhập là bắt buộc.',
            'username.unique' => 'Tên đăng nhập đã tồn tại.',
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Email không hợp lệ.',
            'email.unique' => 'Email đã tồn tại.',
            'password.required' => 'Mật khẩu là bắt buộc.',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
            'password.confirmed' => 'Xác nhận mật khẩu không khớp.',
            'avatar.image' => 'Ảnh đại diện phải là một hình ảnh.',
            'avatar.mimes' => 'Ảnh đại diện phải có định dạng jpeg, png, jpg, hoặc gif.',
            'avatar.max' => 'Ảnh đại diện không được lớn hơn 2MB.',
        ]);

        $data = $request->except('password');


        $data['password'] = bcrypt($request->input('password'));

        if ($request->hasFile('avatar')) {
            $path_image = $request->file('avatar')->store('images', 'public');
            $data['avatar'] = $path_image;
        } else {
            $data['avatar'] = '';
        }
        User::create($data);

        return redirect()->route('admin.users.list')->with('message', 'Bạn đã thêm mới user thành công!');
    }


    public function edit(User $user)
    {

        return view('admin.users.edit', compact('user'));
    }
    public function update(Request $request, User $user)
{
    // Validate request data
    $request->validate([
        'fullname' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users,username,' . $user->id,
        'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        'password' => 'nullable|string|min:8|confirmed',
        'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ], [
        'fullname.required' => 'Tên người dùng là bắt buộc.',
        'username.required' => 'Tên đăng nhập là bắt buộc.',
        'username.unique' => 'Tên đăng nhập đã tồn tại.',
        'email.required' => 'Email là bắt buộc.',
        'email.email' => 'Email không hợp lệ.',
        'email.unique' => 'Email đã tồn tại.',
        'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
        'password.confirmed' => 'Xác nhận mật khẩu không khớp.',
        'avatar.image' => 'Ảnh đại diện phải là một hình ảnh.',
        'avatar.mimes' => 'Ảnh đại diện phải có định dạng jpeg, png, jpg, hoặc gif.',
        'avatar.max' => 'Ảnh đại diện không được lớn hơn 2MB.',
    ]);

    // Update user data
    $user->fullname = $request->input('fullname');
    $user->username = $request->input('username');
    $user->email = $request->input('email');

    if ($request->filled('password')) {
        $user->password = bcrypt($request->input('password'));
    }


    if ($request->hasFile('avatar')) {
        // Delete old avatar
        if ($user->avatar) {
            Storage::delete('public/' . $user->avatar);
        }

        $avatarPath = $request->file('avatar')->store('images', 'public');
        $user->avatar = $avatarPath;
    }

    $user->save();

    return redirect()->route('admin.users.edit', $user)->with('message', 'Thông tin khách hàng đã được cập nhật thành công!');
}


public function toggleActivation(User $user)
{
    if ($user->role === 'admin') {
        return redirect()->route('admin.users.list')->with('error', 'Không được thay đổi trạng thái của Admin!');
    } else {
        $user->active = !$user->active;
        $user->save();
        return redirect()->route('admin.users.list')->with('success', 'Trạng thái người dùng đã được cập nhật thành công.');
    }
}


    public function destroy(User $user)
    {
        if($user->role === 'admin'){
            return redirect()->route('admin.users.list')->with('error', 'Không được xóa Admin!');
        }else{
            $user->delete();
            return redirect()->route('admin.users.list')->with('message', 'Xóa dữ liệu thành công');
        }

    }
}
