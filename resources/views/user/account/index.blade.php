@extends('layouts.user')

@section('content')
<div class="" style="min-height: calc(100vh - 121px)">
    <div class="container">
        <h1 class="text-center mt-3">Trang khách hàng</h1>
        <div class="row g-0 mt-5">
            <div class="col-6 col-md-4 css3">
                <h3 style="font-weight: 200;">TRANG TÀI KHOẢN</h3>
                <ul class="nav flex-column">
                    <li style="font-size: 19px; margin-bottom: 10px; "><a href="{{ route('user.account.index') }}">Thông tin tài khoản</a></li>
                    <li style="font-size: 19px; margin-bottom: 10px;"><a href="{{ route('user.account.edit') }}">Thay đổi thông tin tài khoản</a></li>
                    <li style="font-size: 19px; margin-bottom: 10px;"><a href="{{ route('user.account.resetPassword') }}">Đổi mật khẩu</a></li>
                </ul>
            </div>
            <div class="col-sm-6 col-md-8">
                <h3 style="font-weight: 200;">THÔNG TIN TÀI KHOẢN</h3>
                @auth
                <div class="d-flex">
                    <div> <strong>Avatar:</strong></div>
                    <div>
                        <img src="{{ asset('storage/' .  Auth::user()->avatar) }}" alt="{{ Auth::user()->username }}" width="100px">
                    </div>
                </div>
                <div class="d-flex">
                    <div> <strong>Họ và Tên: </strong></div>
                    <div>
                        <p>&#160; {{ Auth::user()->fullname }}</p>
                    </div>
                </div>
                <div class="d-flex">
                    <div> <strong>UserName: </strong></div>
                    <div>
                        <p>&#160; {{ Auth::user()->username }}</p>
                    </div>
                </div>
                <div class="d-flex">
                    <div> <strong>Email: </strong></div>
                    <div>
                        <p>&#160;{{ Auth::user()->email }}</p>
                    </div>
                </div>
                <div class="mt-3">
                    <a href="{{ route('user.logout') }}" class="btn btn-danger">Đăng xuất</a>
                </div>


            @endauth
            </div>
        </div>
    </div>

</div>
@endsection


