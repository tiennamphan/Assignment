@extends('layouts.user')

@section('content')
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div id="demo" class="carousel slide" data-bs-ride="carousel">

        <!-- Indicators/dots -->
        <div class="carousel-indicators">
            <button type="button" data-bs-slide-to="0" class="active"></button>
        </div>

        <!-- The slideshow/carousel -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/anh3.jpg') }}">
            </div>

        </div>
    </div>



    <div class="mt-3 container mb-3">
        <!-- Khu vực tiêu đề trang -->
        <h1 class="text-center">Sản phẩm mới</h1>
        <!-- Khu vực danh sách sản phẩm -->
        <div class="row row-cols-1 row-cols-md-4 g-2">
            <!-- Sản phẩm 1 -->
            @foreach ($descProducts as $pro)
                <div class="col">

                    <a href="{{ route('user.products.showProduct', $pro->id) }}" class="text-decoration-none">
                        <div class="border rounded overflow-hidden mt-3 mb-3 css1" style="background: #eee">
                            <div>
                                <img class="w-100 h-150 css1" src="{{ $pro->image }}" alt="">
                                <img class="w-100 h-150 css1" src="{{ asset('storage/' . $pro->image) }}" alt="">
                            </div>

                            <div class="p-2">
                                <h1 class="h5 ">{{ $pro->name }}</h1>
                                <div class="d-flex justify-content-between mb-2">
                                    <div class="text-danger fs-6">{{ $pro->price }}đ</div>
                                </div>
                            </div>
                        </div>

                    </a>

                </div>
            @endforeach

        </div>
    </div>
@endsection
