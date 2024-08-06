@extends('layouts.admin')

@section('content')
    <h1 class="text-center">Cập Nhật Khách Hàng</h1>

    <div class="mt-3 mb-3">
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>

    <form action="{{ route('admin.users.update', $user) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label style="font-weight: 700;" class="form-label">Họ và tên:</label>
            <input type="text" class="form-control" name="fullname" value="{{ old('fullname', $user->fullname) }}">
            @error('fullname')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label style="font-weight: 700;" class="form-label">Tên đăng nhập (UserName):</label>
            <input type="text" class="form-control" name="username" value="{{ old('username', $user->username) }}">
            @error('username')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label style="font-weight: 700;" class="form-label">Email:</label>
            <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}">
            @error('email')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div>

        <div class="avatar-container">
            <label style="font-weight: 700;" class="form-label">Ảnh đại diện cũ:</label>
            <img class="avatar-img" style="width: 100px" src="{{ asset('storage/' . $user->avatar) }}" alt="">
        </div>

        <div class="mb-3 mt-3">
            <label style="font-weight: 700;" class="form-label">Ảnh đại diện mới:</label>
            <input type="file" class="form-control" name="avatar">
            @error('avatar')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div>

        <div class="text-center mt-3 mb-3">
            <a href="{{ route('admin.users.list') }}" class="btn btn-secondary">Quay lại</a>
            <button type="submit" class="btn btn-success">Cập nhật</button>
        </div>
    </form>
@endsection
