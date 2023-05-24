<!DOCTYPE html>
<html lang="vi" class="h-100">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tiny Shop| Chuyên đồ điện tử</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom css - Các file css do chúng ta tự viết -->
    <link rel="stylesheet" href="{{ url('./css/cart.css') }}" type="text/css">
</head>

@include('client.header')

{{-- Alert --}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if (session('success'))
    <script>
        swal("{{ session('success') }}");
    </script>
@endif
<main role="main">
        <section class="jumbotron text-center">
            <div class="container">
                <h3 class="jumbotron-heading">Giỏ hàng của bạn</h3>
                <p class="lead text-muted">Các sản phẩm với chất lượng, uy tín, cam kết từ nhà Sản xuất, phân phối và
                    bảo hành 
                    chính hãng.</p>
            </div>
        </section>
        <div class="container bottom mt-4">
            <div id="thongbao" class="alert alert-danger d-none face" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="row">
                <div class="table-responsive shopping-cart">
                    <table class="table">
                        <thead>
                            <tr>
                            <th>Sản phẩm</th>
                            <th class="text-center">Số lượng</th>
                            <th class="text-center">Thành tiền</th>
                            <th class="text-center">Giảm giá</th>
                            <th class="text-center">
                                <form action="{{ route('cart.clear') }}" method="POST" >
                                    @csrf
                                    <button class="btn btn-sm btn-outline-danger">
                                        Xóa tất cả
                                    </button>
                                </form>
                            </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cartItems as $item)
                            <tr>
                                <td>
                                    <div class="product-item">
                                        <a class="product-thumb" href="/products/{{ $item->id }}"><img src="{{ $item->attributes->img }}" alt="Product"></a>
                                        <div class="product-info">
                                            <h4 class="product-title"><a href="/products/{{ $item->id }}">{{ $item->name }}</a></h4>
                                            <span><em>Dung lượng:</em> {{ $item->size }}</span>
                                            <span><em>Màu sắc:</em> {{$item->color }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="count-input">
                                        <form id="cartUpdate" action="{{ route('cart.update') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $item->id}}" >
                                            <input type="number" class="form-control" name="quantity" value="{{ $item->quantity }}" min="1">
                                        </form>
                                    </div>
                                </td>
                                <td class="text-center text-lg text-medium">{{ number_format($item->price) }} VND</td>
                                <td class="text-center text-lg text-medium">_</td>
                                <td class="text-center"> 
                                    <form action="{{ route('cart.remove') }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $item->id }}" name="id">
                                        <button class="btn btn-danger">
                                              <i class="fa fa-trash"></i>
                                      </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="shopping-cart-footer">
                    <div class="column">
                        <form class="coupon-form" method="post">
                        <input class="form-control form-control-sm" type="text" placeholder="Mã giảm giá" required>
                        <button class="btn btn-outline-primary btn-sm" type="submit">Áp dụng</button>
                        </form>
                    </div>
                    <div class="column text-lg">Tổng tiền: <span class="text-medium">{{ number_format(Cart::getTotal()) }} VND</span></div>
                </div>
                <div class="shopping-cart-footer">
                    <div class="column"><a class="btn btn-outline-secondary" href="{{ route('home') }}"><i class="icon-arrow-left"></i>&nbsp;Quay về</a></div>
                    <div class="column">
                        <button id="submitUpdateCart" class="btn btn-primary" data-toast-position="topRight" style="width:120px">Cập nhật</button>
                        <button class="btn btn-success" style="width:120px"> <a href="{{ route('checkout') }}">Thanh toán </a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    // update cart
    var form = document.getElementById('cartUpdate');
    var submitButton = document.getElementById('submitUpdateCart');

   
    submitButton.addEventListener('click', function() {
    form.submit();
    });
</script>

@include('client.footer')

