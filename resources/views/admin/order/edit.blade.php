@extends('layouts.admin')

@section('content')
<div class="container mt-3">
    <h1 class="text-center">Sửa trạng thái</h1>
    <form>
        <div class="mt-3">
            <span class="form-label">ID:</span>
            <input type="text" class="form-control" ng-model="ct_dh.id" disabled>
        </div>

        <div class="mt-3">
            <span class="form-label">Trạng thái đơn hàng:</span>
            <select class="form-control" ng-model="ct_dh.trang_thai" ng-disabled="disableStatusChange()">
              <option value="Xác nhận đơn hàng">Xác nhận đơn hàng</option>
              <option value="Đang chuẩn bị hàng">Đang chuẩn bị hàng</option>
              <option value="Đơn hàng đang giao đến bạn">Đơn hàng đang giao đến bạn</option>
              <option value="Đơn hàng giao thành công">Đơn hàng giao thành công</option>
              <option value="Hủy">Hủy</option>
            </select>
        </div>

        <div class="text-center mt-3 mb-3">
            <a href="#!don_hang/list" class="btn btn-secondary">Quay lại </a>
            <button ng-click="update()" class="btn btn-success">Cập nhật</button>
        </div>


    </form>

</div>
@endsection
