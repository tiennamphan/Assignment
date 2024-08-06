@extends('layouts.admin')

@section('content')
<h1 class="text-center">Sửa Danh Mục</h1>
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<form action=" {{ route('admin.category.update', $category->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mt-3">
        <label class="form-label">Tên danh mục:</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $category->name) }}" >
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="text-center mt-3">
        <a class="btn btn-secondary" href="{{ route('admin.categories.list') }}" >Trở lại</a>
        <button class="btn btn-warning" type="submit">Sửa</button>
    </div>

</form>
@endsection


