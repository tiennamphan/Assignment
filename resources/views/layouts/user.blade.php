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
        .dropdown-menu {
            display: none;
            position: absolute;
            background-color: white;
            border: 1px solid #ccc;
            padding: 10px;
        }

        .dropdown-item:hover {
            background-color: rgba(43, 255, 57, 0.67);

        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }

        .shipping-option {
            background: #f8f9fa;
            border: 1px solid #dee2e6;
            padding: 20px;
            border-radius: 10px;
            transition: background-color 0.3s ease;
        }

        .shipping-option:hover {
            background-color: #e2e6ea;
        }

        .shipping-option input[type="radio"] {
            margin-right: 10px;
        }


        .pay-option {
            background: #f8f9fa;
            border: 1px solid #dee2e6;
            padding: 20px;
            border-radius: 10px;
            transition: background-color 0.3s ease;
        }

        .pay-option:hover {
            background-color: #e2e6ea;
        }

        .pay-option input[type="radio"] {
            margin-right: 10px;
        }


    </style>
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-white shadow">

        <div class="container-fluid">

            <div class="d-flex align-items-center">
                <!-- Links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="" href="#">
                            <img src="{{ asset('images/faet-low-resolution-color-logo.png') }}" class="rounded"
                                style="width: 100%; height: 80px;" alt="">
                        </a>
                    </li>
                </ul>



                <!-- Links -->
                <ul class="navbar-nav ms-5">
                    <li class="nav-item">
                        <a class="nav-link active fs-5 fw-medium" href="/">Trang Chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fs-5 fw-medium" href="#">Giới Thiệu</a>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <a class="nav-link active fs-5 fw-medium" href="{{ route('user.products.index') }}">
                                Sản Phẩm
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fs-5 fw-medium" href="#">Liên Hệ</a>
                    </li>
                </ul>
            </div>

            <div class="d-flex justify-content-between align-items-center">
                <form class="d-flex" ng-submit="search()">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success " type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>

                <ul class="navbar-nav">
                    <li class="nav-item">
                        @auth
                            <a class="nav-link" href="{{ route('user.account.index') }}">
                                <i class="fa-solid fs-4 text-secondary s fa-user"></i>
                            </a>
                        @else
                            <a class="nav-link" href="{{ route('user.auth.login') }}">
                                <i class="fa-solid fs-4 text-secondary s fa-user"></i>
                            </a>
                        @endauth
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href=""><i
                                class="fa-solid fs-4 text-warning fa-bag-shopping"></i></i></a>
                    </li>

                </ul>
            </div>
        </div>

    </nav>
    <!-- Carousel -->
    <div class=" mt-3" style="min-height: calc(100vh - 86px);">
        <div class="content">
            @yield('content')
        </div>
    </div>


<div>
    <div class="row bg-black " style="width: 1525px; height: 200px;">
        <div class="col-12">
            <div class="d-flex justify-content-around mt-5">
                <div class="">
                    <h1 class="h6 text-white">
                        SẢN PHẨM
                    </h1>
                    <ul class="nav flex-column">
                        <li><a href="" class="text-white">Gucci</a></li>
                        <li><a href="" class="text-white">Adidas</a></li>
                        <li><a href="" class="text-white">Nike</a></li>
                    </ul>

                </div>

                <div class="">
                    <h1 class="h6 text-white">
                        THÔNG TIN VỀ CÔNG TY
                    </h1>
                    <ul class="nav flex-column">
                        <li><a href="" class="text-white">Giới thiệu về công ty chúng tôi</a></li>
                        <li><a href="" class="text-white">Tin tức</a></li>

                    </ul>

                </div>

                <div class="">
                    <h1 class="h6 text-white">
                        HỖ TRỢ
                    </h1>
                    <ul class="nav flex-column">
                        <li><a href="" class="text-white">Biểu đồ kích cỡ</a></li>
                        <li><a href="" class="text-white">Trả hàng & Hoàn tiền</a></li>
                        <li><a href="" class="text-white">Trợ giúp dịch vụ khách hàng</a></li>
                    </ul>

                </div>

                <div class="">
                    <h1 class="h6 text-white">
                        THEO DÕI CHÚNG TÔI
                    </h1>
                    <ul class="nav flex-column">
                        <li><a href="" class="text-white"><i class=" fa-brands fa-facebook"></i></a></li>
                        <li><a href="" class="text-white"><i class=" fa-brands fa-instagram"></i> </a></li>
                        <li><a href="" class="text-white"><i class=" fa-brands fa-twitter"></i></a></li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
    <div class="bg-dark text-center pt-3" style="height: 50px;">
        <p class="text-white">© 2024 Công ty TNHH faet Việt Nam</p>
    </div>
</div>

</body>

</html>
