@extends('layouts.user')
<style>

</style>
@section('content')
<div class="" style="min-height: calc(100vh - 121px)">
    <div class="mt-1 py-1" style="background-color: #399918">
        <div class="mt-1 d-flex justify-content-around hi">
            @foreach ($categories as $cate)
                <h1>
                    <a style="color: #ECFFE6" href="{{ route('user.products.showCategory', $cate->id )}}"
                        class="text-decoration-none">{{ $cate->name }}</a>
                </h1>
            @endforeach
        </div>
    </div>
    <div class="mt-3 container">
        <h1 class="text-center mt-3 mb-3 text-black">{{ $category->name }}</h1>
        <div class="row">
            @foreach ($products as $pro)
                <div class="col-3">

                    <a href="{{ route('user.products.showProduct', $pro->id) }}" class="text-decoration-none">
                        <div class="border rounded overflow-hidden mt-3 mb-3 css1" style="background: #eee">
                            <div>
                                <img class="mh-100 mw-100 css1" src="{{ asset('storage/' . $pro->image) }}" alt="">
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

</div>
@endsection
