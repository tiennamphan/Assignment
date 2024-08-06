@extends('layouts.user')

@section('content')
<div class="" style="min-height: calc(100vh - 121px)">

    <div class="container">
        <h1 class="text-center mt-3">Giỏ hàng</h1>
        <table class="table table-bordered">
            <thead>
              <tr>
                <th>Sản Phẩm</th>
                <th>Số Lượng</th>
                <th>Tổng Tiền</th>
                <th>Xóa</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td >
                    <div class="row align-items-center">
                        <div class="col-6">
                            <div><img class="float-end" src="/images/giay-vans-old-skool-36-dx-grey-vn0a4bw3bm7-1.webp" style="width: 100px; height: 110px;" alt=""></div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex flex-column justify-content-center ">
                                <div>VANS OLK</div>
                                <div>41</div>
                                <div>2.000.000 đ</div>
                            </div>
                        </div>
                    </div>
                </td>
                <td class=" ">
                    <div class="container mt-5">
                        <div class="row">
                         <div class="d-flex justify-content-center">
                            <div class="col-md-2">
                                <button class="btn " onclick="decreaseQuantity()">-</button>
                              </div>
                              <div class="col-md-2">
                                <span id="quantity" class="form-control text-center">1</span>
                              </div>
                              <div class="col-md-2">
                                <button class="btn " onclick="increaseQuantity()">+</button>
                              </div>
                         </div>
                        </div>
                      </div>
                </td>
                <td>2.000.000 đ</td>
                <td>
                    <button type="button" class="btn btn-danger">
                                Xóa
                            </button>
                </td>
              </tr>


          </table>

          <div>
            <div class="float-end " style="margin-right: 50px;">
                <div><h3>Tổng tiền: <strong class="text-danger">2.000.000 đ</strong></h3></div>
                <a href="{{ route('user.checkout.information') }}" class="btn btn-success fs-5 fw-normal" style="width: 100%;">Tiến hành thanh toán</a>
            </div
          </div>
    </div>
    </div>
</div>
@endsection




