@extends('layouts.user')
@section('content')
    <div class="" style="min-height: calc(100vh - 121px)">
        <div class="container">
            <h1 class="text-center mt-3">Trang khách hàng</h1>
            <div class="row g-0 mt-5">
                <div class="col-6 col-md-4 css3">
                    <h3 style="font-weight: 200;">TRANG TÀI KHOẢN</h3>
                    <ul class="nav flex-column">
                        <li style="font-size: 19px; margin-bottom: 10px; "><a href="{{ route('user.account.index') }}">Thông
                                tin tài khoản</a>
                        </li>
                        <li style="font-size: 19px; margin-bottom: 10px;"><a href="{{ route('user.account.edit') }}">Thay đổi thông tin tài khoản</a></li>
                        <li style="font-size: 19px; margin-bottom: 10px;"><a
                                href="{{ route('user.account.resetPassword') }}">Đổi mật khẩu</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 col-md-8">
                    <h3 style="font-weight: 200;">THAY ĐỔI THÔNG TIN TÀI KHOẢN</h3>
                    @auth
                        <form action="{{ route('user.account.update') }}" method="POST" enctype="multipart/form-data">
                            <div class="d-flex mb-3">
                                @csrf
                                <div> <strong>Avatar:</strong></div>
                                <div>
                                    <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="{{ Auth::user()->username }}"
                                        width="100px">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Avatar_New:</label>
                                <input class="form-control" type="file" name="avatar">
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Họ và Tên</label>
                                <input class="form-control" type="text" name="fullname" value="{{ Auth::user()->fullname }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">UserName:</label>
                                <input class="form-control" type="text" name="username" value="{{ Auth::user()->username }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Email: </label>
                                <input class="form-control" type="text" name="email" value="{{ Auth::user()->email }}" required>
                            </div>
                            @if (session('message'))
                                <div class="alert alert-success">
                                    {{ session('message') }}
                                </div>
                            @endif

                            <button type="submit" class="btn btn-success mb-3" style="width: 100%;">Đặt lại thông tin</button>
                        </form>

                    @endauth
                </div>
            </div>
        </div>
    </div>
@endsection
