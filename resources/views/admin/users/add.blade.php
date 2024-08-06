@extends('layouts.admin')

@section('content')
    <h1 class="text-center">Thêm Khách Hàng</h1>
    <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
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

        <div class="text-center mt-3 mb-3">
            <a href="{{ route('admin.users.list') }}" class="btn btn-secondary">Quay lại</a>
            <button type="submit" class="btn btn-success">Thêm mới</button>
        </div>
    </form>
@endsection
