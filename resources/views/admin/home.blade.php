@extends('layouts.admin')

@section('content')
<div class="container mt-3">
    <h1 class="text-center">Trang chủ quản trị</h1>

    <div class="row">
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-primary">
                <div class="card-header">Tổng Sản Phẩm</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $totalProducts }}</h5>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card text-white bg-secondary">
                <div class="card-header">Tổng Danh Mục</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $totalCategories }}</h5>
                </div>
            </div>
        </div>


        <div class="col-md-3 mb-3">
            <div class="card text-white bg-success">
                <div class="card-header">Tổng Khách Hàng</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $totalUsers }}</h5>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection
