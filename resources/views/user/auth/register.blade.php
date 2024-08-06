@extends('layouts.user')

@section('content')

<div class="container d-flex justify-content-center align-items-center" style="height: 100%;">

    <form class="border p-4 shadow" style="width: 500px;" action="{{ route('user.auth.postRegister') }}"
        method="POST" enctype="multipart/form-data">
        @csrf
        <h1 class="text-center mt-3 mb-3">Đăng Ký</h1>
        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}

        <div class="mb-3">
            <label style="font-weight: 700;"class="form-label">Họ và tên:</label>
            <input type="text" class="form-control" name="fullname" value="{{ old('fullname') }}">
            @error('fullname')
                <span style="color:red">{{ $message }}</span>
            @enderror

        </div>
        <div class="mb-3">
            <label style="font-weight: 700;"class="form-label">Tên đăng nhập (UserName):</label>
            <input type="text" class="form-control" name="username" value="{{ old('username') }}">
            @error('username')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label style="font-weight: 700;"class="form-label">Email:</label>
            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
            @error('email')
                <span style="color:red">{{ $message }}</span>
            @enderror

        </div>

        <div class="mb-3">
            <label style="font-weight: 700;" class="form-label">Mật khẩu:</label>
            <input type="password" class="form-control" name="password" value="{{ old('password') }}">
            @error('password')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label style="font-weight: 700;" class="form-label">Ảnh đại diện:</label>
            <input type="file" class="form-control" name="avatar" value="{{ old('avatar') }}">
            @error('avatar')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-success " style="width: 100%;">Đăng Ký</button>

        <p class="text-center mt-5 mb-5" style="width: 100%;">Bạn đã có tài khoản, đăng nhập <a
                class="text-danger" href="{{ route('user.auth.login') }}">tại đây</a></p>
    </form>

</div>

@endsection


