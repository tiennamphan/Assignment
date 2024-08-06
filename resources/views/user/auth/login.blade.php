@extends('layouts.user')

@section('content')
    <div class="" style="min-height: calc(100vh - 121px)">
        <div class="container d-flex justify-content-center align-items-center" style="height: 100%;">
            <form class="border p-4 shadow" style="width: 500px;" action="{{ route('user.auth.postLogin') }}" method="POST">
                <h1 class="text-center mt-3 mb-3">Đăng Nhập</h1>
                @csrf
                <div class="mb-3">
                    <label for="" style="font-weight: 700;" class="form-label">UserName:</label>
                    <input type="text" class="form-control" name="username">
                </div>
                <div class="mb-3">
                    <label for="" style="font-weight: 700;" class="form-label">Mật khẩu:</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <button type="submit" class="btn btn-success mb-3" style="width: 100%;">Đăng Nhập</button>
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                @if (session('erro'))
                    <div class="alert alert-danger">
                        {{ session('erro') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                @if (session('active'))
                    <div class="alert alert-danger">
                        {{ session('active') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <p class="text-center mt-5">Bạn chưa có tài khoản, đăng ký <a class="text-danger"
                        href="{{ route('user.auth.register') }}">tại đây</a></p>

            </form>
        </div>
    </div>
@endsection
