@extends('layouts.admin')

@section('content')
    <div class="container mt-3">
        <h1 class="text-center">Danh sách sản phẩm</h1>
        <div class="d-flex justify-content-end"><a class="btn btn-success" href="{{ route('admin.product.add') }}">Tạo mới sản
                phẩm</a></div>
                <div class="mt-3">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>

                <div class="mt-3">
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>
        <table class="table table-bordered border-black mt-3">
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Ảnh</th>
                    <th>Giá</th>
                    <th>Nội Dung</th>
                    <th>Danh Mục</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td class="d-flex justify-content-center">
                            <div style="height: 100px; width: 100px;"
                                class="bg-light border rounded overflow-hidden d-flex justify-content-center align-items-center">
                                <img class="mh-100 mw-100" src="{{asset('storage/' . $product->image) }} " alt="">

                            </div>
                        </td>

                        <td>{{ $product->price }}Đ</td>
                        <td>
                            <p>{{ $product->content }}</p>
                        </td>
                        <td>
                            <p>{{ $product->category->name }}</p>
                        </td>
                        <td style="width: 1px;" class="text-nowrap">
                           <div class="d-flex gap-2">
                            <a class="btn btn-warning btn-sm" href="{{ route('admin.product.edit', $product) }}">Sửa</a>
                            <form action="{{ route('admin.product.destroy', $product) }}" method="POST">
                             @csrf
                             @method('DELETE')
                             <button type="submit" class="delete btn btn-danger btn-sm" onclick=" return confirm('Bạn có muốn xóa không ?')">
                                 Xóa
                             </button>
                            </form>
                           </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
        {{ $products->links() }}
    </div>
@endsection
