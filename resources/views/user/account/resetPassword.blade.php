
@extends('layouts.user')

@section('content')
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
            <h3 style="font-weight: 200;">ĐỔI MẬT KHẨU</h3>

            <form action="{{ route('updatePassword') }}" method="POST" style="width: 500px; height: 100%;">
                @csrf
                <div class="mb-3">
                    <label for="current_password" class="form-label">Mật khẩu cũ:</label>
                    <input type="password" class="form-control" name="current_password" id="current_password" required>

                    <label for="new_password" class="form-label">Mật khẩu mới:</label>
                    <input type="password" class="form-control" name="new_password" id="new_password" required>

                    <label for="new_password_confirmation" class="form-label">Nhập lại mật khẩu mới:</label>
                    <input type="password" class="form-control" name="new_password_confirmation" id="new_password_confirmation" required>
                </div>

                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <button type="submit" class="btn btn-success" style="width: 100%;">Đặt lại mật khẩu</button>
            </form>


        </div>
      </div>
   </div>
</div>
@endsection

