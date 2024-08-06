@extends('layouts.admin')

@section('content')
    <style>
        /* custom.css */

        .container {
            max-width: 1200px;
            margin: auto;
        }

        .custom-table th,
        .custom-table td {
            vertical-align: middle;
        }

        .custom-table .thead-dark th {
            background-color: #343a40;
            color: #fff;
        }

        .avatar-container {
            height: 100px;
            width: 100px;
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 50%;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .avatar-img {
            max-height: 100%;
            max-width: 100%;
        }
    </style>

    <div class="container mt-3">
        <h1 class="text-center">Danh sách khách hàng</h1>
        <div class="d-flex justify-content-end mb-3">
            <a class="btn btn-success" href="{{ route('admin.users.add') }}">Tạo mới khách hàng</a>
        </div>
        <div class="mt-3">
           @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
           @endif
        </div>

        <div class="mt-3">
            @if (session('success'))
                 <div class="alert alert-success">
                     {{ session('success') }}
                 </div>
            @endif
         </div>

        <div class="mt-3">
            @if (session('error'))
                 <div class="alert alert-danger">
                     {{ session('error') }}
                 </div>
            @endif
         </div>

        <table class="table table-bordered border-black mt-3 custom-table">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Ảnh đại diện</th>
                    <th>Tên khách hàng</th>
                    <th>Tên đăng nhập (UserName)</th>
                    <th>Email</th>
                    <th>Quyền truy cập</th>
                    <th>Trạng thái tài khoản</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="text-center"><strong>{{ $user->id }}</strong></td>
                        <td class="text-center">
                            <div class="avatar-container">
                                <img class="avatar-img" src="{{ asset('storage/' . $user->avatar) }}" alt="">
                            </div>
                        </td>
                        <td>{{ $user->fullname }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->active ? 'Hoạt Động' : 'Khóa' }}</td>
                        <td class="text-nowrap">
                            <form action="{{ route('admin.users.toggle', $user) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-sm {{ $user->active ? 'btn-warning' : 'btn-success' }}">
                                    {{ $user->active ? 'Khóa' : 'Hoạt Động' }}
                                </button>
                            </form>
                            <a class="btn btn-warning btn-sm" href="{{ route('admin.users.edit', $user) }}">Sửa</a>
                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit"
                                    onclick="return confirm('Bạn có muốn xóa không ?')">
                                    Xóa
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
@endsection
