@extends('layouts.user')

@section('content')

<div class="" style="min-height: calc(100vh - 121px)">
    <div class="container ">
        <h1 class="text-center mt-3 mb-3">Xác nhận đặt hàng</h1>
        <div class="row">
            <div class="col-6 ">
                <div class="">
                    <h3 class="text-center">Thông tin nhận hàng</h3>
                    <form>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tên người nhận:</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Số điện thoại:</label>
                            <input type="number" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Địa chỉ:</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Phường xã:</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Quận huyện:</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tỉnh thành:</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Ghi chú:</label>
                            <textarea class="form-control" name="" id="" cols="30" rows="10"></textarea>
                        </div>


                    </form>
                </div>
            </div>
            <div class="col-6 ">
                <div class="container mt-5">
                    <h3 class="text-center mb-4">Vận chuyển</h3>
                    <div class="d-flex justify-content-around">
                        <div class="shipping-option">
                            <label class="form-check-label fw-bold" for="express">
                                <input class="form-check-input" type="radio" name="shipping" id="express">
                                Hỏa tốc
                            </label>
                        </div>
                        <div class="shipping-option">
                            <label class="form-check-label fw-bold" for="standard">
                                <input class="form-check-input" type="radio" name="shipping" id="standard">
                                Bình thường (30k)
                            </label>
                        </div>
                    </div>
                </div>
                <hr>
                <div>
                    <h3 class="text-center">Thanh Toán</h3>
                    <div class="d-flex justify-content-around">
                        <div class="pay-option">
                            <label class="form-check-label fw-bold" for="cod">
                                <input class="form-check-input" type="radio" name="pay" id="cod">
                                Thanh toán trực tiếp(COD)
                            </label>
                        </div>
                        <div class="pay-option">
                            <label class="form-check-label fw-bold" for="on">
                                <input class="form-check-input" type="radio" name="pay" id="onli">
                                Thanh toán online
                            </label>
                        </div>
                    </div>
                </div>
                <hr>
                <div>
                    <div>
                        <h3 class="text-center">Đơn hàng (1 sản phẩm)</h3>

                        <div>

                        </div>
                        <!-- A grey horizontal navbar that becomes vertical on small screens -->
                        <nav class="navbar navbar-expand-sm ">

                            <div class="container-fluid">
                                <!-- Links -->
                          <div class="d-flex">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <img src="/images/giay-vans-old-skool-36-dx-grey-vn0a4bw3bm7-1.webp" class="" style=" width: 80px; height: 90px;" alt="">
                                </li>
                            </ul>

                             <!-- Links -->
                             <ul class="navbar-nav flex-column ">
                                <li class="nav-item">
                                    VANS OLK
                                </li>
                                <li class="nav-item">
                                    41
                                </li>
                            </ul>
                          </div>

                                 <!-- Links -->
                                 <ul class="navbar-nav">
                                    <li class="nav-item">
                                       2.000.000 đ
                                    </li>
                                </ul>
                            </div>

                        </nav>
                    </div>

                </div>
                <hr>
                <div class="row">
                    <div class="col-6">
                        <div>Tạm tính:</div>
                    </div>
                    <div class="col-6 ">
                       <div class="float-end" style="margin-right: 13px;"> 2.000.000 đ</div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div>Vận chuyển:</div>
                    </div>
                    <div class="col-6 ">
                       <div class="float-end" style="margin-right: 13px;"> 30.000 đ</div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-6">
                        <div>Tổng cộng:</div>
                    </div>
                    <div class="col-6 ">
                       <div class=" float-end fs-4 text-danger" style="margin-right: 13px;"> 2.030.000 đ</div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div><a href="" class="fs-6 nav"> < Quay về giỏ hàng</a></div>
                    </div>
                    <div class="col-6 ">
                       <div class="float-end fs-4 text-danger" style="margin-right: 13px;"><a href="" class="btn btn-success">Đặt Hàng</a></div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection
