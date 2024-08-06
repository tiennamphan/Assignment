@extends('layouts.admin')

@section('content')
    <div class="container mt-3">
        <h1 class="text-center">Danh sách Danh Mục</h1>
        <div class="d-flex justify-content-end"><a class="btn btn-success" href="{{ route('admin.category.add') }}">Tạo mới
                Danh Mục</a></div>
        <div class="mt-3">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <table class="table table-bordered border-black mt-3">
            <thead>
                <tr>
                    <th>Tên </th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $cate)
                    <tr">
                        <td><strong>{{ $cate->name }}</strong></td>
                        <td style="width: 1px; white-space: nowrap;">
                            <div class="d-flex justify-content-evenly">
                                <div class="m-1">
                                    <a class="btn btn-warning btn-sm"
                                        href="{{ route('admin.category.edit', $cate) }}">Sửa</a>
                                </div>
                                <div class="m-1">
                                    <form action="{{ route('admin.category.edit', $cate) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit"
                                            onclick="return confirm('Bạn có muốn xóa không ?')">
                                            Xóa
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </td>
                        </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
