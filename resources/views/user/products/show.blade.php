@extends('layouts.user')

@section('content')
    <div class="container">
        <h1 class="text-center mt-3 mb-3">CHI TIẾT SẢN PHẨM </h1>
        <div class="row">
            <div class="col-6">
                <div>
                    <img class="border float-end" src="{{ asset('storage/' . $products->image) }}" alt="">
                </div>
            </div>

            <div class="col-6">
                <h3 class="fs-3">Vans</h3>
                <p class="mb-3">Thương hiệu: <strong class="text-success">{{ $products->name }}</strong></p>
                <hr>
                <p class="fs-3 text-danger fw-bold">{{ $products->price }}</p>

                <div class="mb-3">
                    <label for="shoe-size" class="form-label">Chọn kích cỡ giày:</label>
                    <select id="shoe-size" class="form-select" aria-label="Chọn kích cỡ giày">
                        <option selected disabled>Chọn kích cỡ</option>
                        <option value="36">36</option>
                        <option value="37">37</option>
                        <option value="38">38</option>
                        <option value="39">39</option>
                        <option value="40">40</option>
                    </select>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text">Số lượng</span>
                    <input type="number" class="form-control" max="10" min="1">
                </div>

                <div class="d-flex justify-content-between">
                    <form  style="width: 100%;">
                        {{-- action="{{ route('user.cart.add') }}" method="POST" --}}
                        @csrf
                        {{-- <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="size" id="selected-size">
                        <input type="hidden" name="quantity" id="selected-quantity"> --}}
                        <button type="submit" class="btn btn-success fs-5" style="width: 100%; height: 40px;">Thêm vào giỏ hàng</button>
                    </form>
                </div>
            </div>
        </div>

        <script>
            document.querySelector('form').addEventListener('submit', function(event) {
                event.preventDefault(); // Ngăn form gửi mặc định
                document.getElementById('selected-size').value = document.getElementById('shoe-size').value;
                document.getElementById('selected-quantity').value = document.querySelector('input[type="number"]').value;
                this.submit(); // Gửi form sau khi đã cập nhật giá trị
            });
        </script>


        <div class="container mb-5">
            <h3 class="text-center mt-5">Thông tin sản phẩm</h3>
            <p>{{ $products->content }}</p>
        </div>
    </div>
@endsection
