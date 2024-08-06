@extends('layouts.user')

@section('content')
<div style="min-height: calc(100vh - 121px)">

    <!-- Danh sách danh mục -->
    <div class="mt-1 py-1" style="background-color: #399918">
        <div class="mt-1 d-flex justify-content-around">
            @foreach ($categories as $cate)
                <h1>
                    <a style="color: #ECFFE6" href="{{ route('user.products.showCategory', $cate->id) }}"
                       class="text-decoration-none">{{ $cate->name }}</a>
                </h1>
            @endforeach
        </div>
    </div>

    <!-- Danh sách sản phẩm -->
    <div class="mt-3 container">
        <h1 class="text-center mt-3 mb-3 text-black">Danh sách sản phẩm</h1>
        <div class="row">
            @foreach ($products as $pro)
                <div class="col-3 mb-3">
                    <a href="{{ route('user.products.showProduct', $pro->id) }}" class="text-decoration-none">
                        <div class="border rounded overflow-hidden" style="background: #eee; height: 100%;">
                            <!-- Hình ảnh sản phẩm -->
                            <div class="position-relative">
                                <img class="w-100" src="{{ asset('storage/' . $pro->image) }}" alt="{{ $pro->name }}" style="object-fit: cover; height: 200px;">
                            </div>
                            <!-- Thông tin sản phẩm -->
                            <div class="p-2">
                                <h5 class="mb-1">{{ $pro->name }}</h5>
                                <div class="d-flex justify-content-between">
                                    <div class="text-danger fs-6">{{ $pro->price }}đ</div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
