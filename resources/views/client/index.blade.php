<!DOCTYPE html>
<html lang="vi" class="h-100">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tiny Shop| Chuyên đồ điện tử</title>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
        rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font awesome -->
    <link rel="stylesheet" href="{{ url('./vendor/font-awesome/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom css - Các file css do chúng ta tự viết -->
    <link rel="stylesheet" href="{{ url('./css/app.css') }}" type="text/css">
</head>

@include('client.header')
<main role="main">
    {{-- Alert --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if (session('message'))
        <script>
            swal("{{ session('message') }}");
        </script>
    @endif
</main>
@include('client.slider')

<div>
    <!-- Product Begin -->
    <section class="form-list spad">
        <div class="container">
            <div class="form-title">
                <h3>Shop Products</h3>
            </div>
            <div id="formList">
                <div id="list">
                    <div class="item product-item-list">
                        <div class="product-item sale">
                            <div class="product-item-pic set-bg">
                                <img src="{{ url('img/product/demo1.jpeg') }}" "
                                    alt="">
                            </div>
                            <div class="product-item-text">
                                <a href="./product_details.html?id=2">
                                    <h4>Iphone 14</h4>
                                </a>
                                <h5>30 000 000</h5>
                                <p>Kiểu dáng sang trọng. Thiết kế thời thượng</p>
                            </div>
                        </div>
                    </div>
                    <div class="item product-item-list">
                        <div class="product-item sale">
                            <div class="product-item-pic set-bg">
                                <img src="{{ url('img/product/demo1.jpeg') }}" " alt="">
                            </div>
                            <div class="product-item-text">
                                <a href="./product_details.html?id=2">
                                    <h4>Iphone 14</h4>
                                </a>
                                <h5>30 000 000</h5>
                                <p>Kiểu dáng sang trọng. Thiết kế thời thượng</p>
                            </div>
                        </div>
                    </div>
                    <div class="item product-item-list">
                        <div class="product-item sale">
                            <div class="product-item-pic set-bg">
                                <img src="{{ url('img/product/demo1.jpeg') }}" "
                                    alt="">
                            </div>
                            <div class="product-item-text">
                                <a href="./product_details.html?id=2">
                                    <h4>Iphone 14</h4>
                                </a>
                                <h5>30 000 000</h5>
                                <p>Kiểu dáng sang trọng. Thiết kế thời thượng</p>
                            </div>
                        </div>
                    </div>
                    <div class="item product-item-list">
                        <div class="product-item sale">
                            <div class="product-item-pic set-bg">
                                <img src="{{ url('img/product/demo1.jpeg') }}" " alt="">
                            </div>
                            <div class="product-item-text">
                                <a href="./product_details.html?id=2">
                                    <h4>Iphone 14</h4>
                                </a>
                                <h5>30 000 000</h5>
                                <p>Kiểu dáng sang trọng. Thiết kế thời thượng</p>
                            </div>
                        </div>
                    </div>

                </div>
                <button type="button" class="btn btn-primary rounded-pill position-relative start-50 mb-2"><a
                        href="/products">Shop
                        Now</a></button>

            </div>
        </div>
    </section>
    <!-- Product End -->

</div>
@include('client.footer')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/8e47a4543e.js" crossorigin="anonymous"></script>
<script src="{{ url('./js/main.js') }}"></script>
