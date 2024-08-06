@extends('layouts.admin')

@section('content')
<div class="container mt-3">
    <h1 class="text-center">Thêm sản phẩm</h1>
    <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mt-3">
            <label class="form-label">Tên sản phẩm:</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mt-3">
            <label class="form-label">Ảnh:</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
            @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mt-3">
            <label class="form-label">Giá:</label>
            <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}">
            @error('price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mt-3">
            <label class="form-label">Nội dung:</label>
            <textarea class="form-control @error('content') is-invalid @enderror" name="content" cols="10" rows="5">{{ old('content') }}</textarea>
            @error('content')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mt-3">
            <label class="form-label">Danh mục:</label>
            <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                @foreach ($categories as $cate)
                    <option value="{{ $cate->id }}" {{ old('category_id') == $cate->id ? 'selected' : '' }}>
                        {{ $cate->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="text-center mt-3 mb-3">
            <a href="{{ route('admin.products.list') }}" class="btn btn-secondary">Quay lại</a>
            <button class="btn btn-success" type="submit">Thêm sản phẩm</button>
        </div>
    </form>
</div>
@endsection
