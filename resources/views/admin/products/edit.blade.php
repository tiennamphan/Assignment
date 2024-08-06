@extends('layouts.admin')

@section('content')
<div class="container mt-3">
    <h1 class="text-center">Sửa sản phẩm</h1>

    <div class="mt-3">
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>

    <form action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mt-3">
            <label class="form-label">Tên sản phẩm:</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $product->name) }}" >
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mt-3">
            <label class="form-label">Ảnh:</label>
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
            @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="Hình ảnh sản phẩm" class="mt-2" style="height: 100px;">
            @endif
            @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mt-3">
            <label class="form-label">Giá:</label>
            <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $product->price) }}" >
            @error('price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mt-3">
            <label class="form-label">Nội dung:</label>
            <textarea name="content" class="form-control @error('content') is-invalid @enderror" cols="10" rows="5" >{{ old('content', $product->content) }}</textarea>
            @error('content')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mt-3">
            <label class="form-label">Danh mục:</label>
            <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" >
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
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
            <button class="btn btn-success" type="submit">Cập nhật sản phẩm</button>
        </div>
    </form>
</div>
@endsection
