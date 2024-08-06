<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/css.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap5/bootstrap.min.css') }}">
    <script src="{{ asset('bootstrap5/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('bootstrap5/font-fontawesome-ae333ffef2.js') }}"></script>
    <style>
        /* CSS để thay đổi màu khi hover */
        .css1:hover {
            background-color: lightblue;
        }

        .css1 a {
            color: black;
        }

        .css1 {
            padding: 10px;
            border-bottom: 1px solid #ccc;
            /* Thêm đường viền dưới cho mỗi thẻ */
        }
    </style>
</head>


<body>
    <nav class="navbar navbar-expand-sm bg-light  shadow ">

        <div class="container-fluid">
            <!-- Links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="" href="#">
                        <img src="{{ asset('images/faet-low-resolution-color-logo.png') }}" style="height: 50px;" alt="">
                    </a>
                </li>

            </ul>

            <!-- Links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Hi "admin"</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.logout') }}">Logout</a>
                </li>

            </ul>
        </div>

    </nav>

    <div class="d-flex">
        <div class="bg-light border-end " style="width: 300px; min-height: calc(100vh - 66px);">
            <ul class="nav flex-column ">
                <li class="nav-item css1 fw-medium">
                    <a class="nav-link " href="{{ route('admin.home') }}">Trang chủ</a>
                </li>
                <li class="nav-item css1 fw-medium">
                    <a class="nav-link" href="{{ route('admin.categories.list') }}">Danh sách danh mục</a>
                </li>
                <li class="nav-item css1 fw-medium">
                    <a class="nav-link" href="{{ route('admin.products.list') }}">Danh sách sản phẩm</a>
                </li>
                <li class="nav-item css1 fw-medium">
                    <a class="nav-link" href="{{ route('admin.users.list') }}">Danh sách khác hàng</a>
                </li>
            </ul>
        </div>

        <div style="width: calc(100% - 300px);">
            <div class="container mt-3">
                <div class="content">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>

</html>
