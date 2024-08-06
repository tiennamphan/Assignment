@extends('layouts.admin')

@section('content')
<h1 class="text-center">Thêm Danh Mục</h1>
<form action="{{ route('admin.category.store') }}" method="POST">
    @csrf
    <div class="mt-3">
        <label class="form-label">Tên danh mục:</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="text-center mt-3">
        <a class="btn btn-secondary" href="{{ route('admin.categories.list') }}" >Trở lại</a>
        <button class="btn btn-success" type="submit">Thêm mới</button>
    </div>
</form>
@endsection
