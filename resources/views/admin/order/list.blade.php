@extends('layouts.admin')

@section('content')
<div class="container mt-3">
    <h1 class="text-center">Danh sách sản phẩm</h1>

    <table class="table table-bordered border-black mt-3">
        <thead>
            <tr>
                <th>Mã đơn hàng</th>
                <th>Tên khách hàng</th>
                <th>Địa chỉ</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Ngày đặt hàng</th>
                <th>Trạng thái đơn hàng</th>
                <th>Chức năng</th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="item in danhSachDonHang">
                <td class="text-center"><strong>JQK113</strong></td>
                <td>
                   Nguyễn Quang Hùy
                </td>

                <td>số 2 ngõ 45 Lai Xá, Kim Chung, Hoài Đức </td>
                <td>huynqph41853.fpt.edu.vn</td>
                <td>
                     113
                </td>
                <td>
                  15/12/2023
                </td>
                <td>
                    <span class="badge prounded-pill"
                          ng-class="{}">

                    </span>
                </td>


                <td style="width: 1px;" class="text-nowrap">
                    {{-- <a class="btn btn-primary btn-sm" href="">Xem</a> --}}
                    <a class="btn btn-warning btn-sm" href="">Sửa trạng thái</a>
                    <button type="button" class="btn btn-danger btn-sm">
                        Xóa
                    </button>


                </td>

            </tr>
        </tbody>
    </table>

</div>
@endsection
