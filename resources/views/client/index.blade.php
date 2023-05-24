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
    <link rel="stylesheet" href="{{ url('./css/product.css') }}" type="text/css">
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
    <div class="container my-5">
        <hr>
        <h3 class="mb-4" style="font-weight:bold">Sản phẩm của chúng tôi</h3> 
        <div class="row">
            @foreach ($demoProducts as $row)
                <div class="col-3 mb-2">
                    <div class="card w-100 pb-2 position-relative">
                        <div class="mt-3 ms-3">
                            <button class="btn btn-sm btn-outline-dark rounded-0 pt-0 pb-0">sale</button>
                        </div>
                        <a href="/products/{{ $row->id }}">
                            <img src="{{ url($row->productImages[0]->image) }}" class="card-img-top"
                                width="50" height="200" alt="...">
                        </a>

                        <div class="card-body pb-1 m-0">
                            <h6 class="card-subtitle mb-2 text-muted overflow-text-1">
                                {{ $row->catalog->catalog_name }}</h6>
                            <h5 class="card-title overflow-text font-card mb-2">{{ $row->name }}</h5>
                            <div class="mt-3 pb-3 star font-header">
                                <!-- loop and print star -->
                                @if ($row->rating->count() != 0)
                                    @php $ratenum = number_format($row->rating->sum('star') / $row->rating->count()) @endphp
                                    <div class="mt-3 mb-2">
                                        @for ($i = 1; $i <= $ratenum; $i++)
                                            <i class="fa-sharp fa-solid fa-star text-success"></i>
                                        @endfor
                                        @for ($j = $ratenum + 1; $j <= 5; $j++)
                                            <i class="fa-sharp fa-solid fa-star"></i>
                                        @endfor
                                    </div>
                                @else
                                    <div class="mt-3 mb-2">
                                        <i class="fa-sharp fa-solid fa-star"></i>
                                        <i class="fa-sharp fa-solid fa-star"></i>
                                        <i class="fa-sharp fa-solid fa-star"></i>
                                        <i class="fa-sharp fa-solid fa-star"></i>
                                        <i class="fa-sharp fa-solid fa-star"></i>
                                    </div>
                                @endif
                                <span class="font-header text-muted">
                                    @if ($row->rating->count() == 0)
                                        0 đánh giá
                                    @elseif($row->rating->count() == 1)
                                        1 đánh giá
                                    @else
                                        {{ $row->rating->count() }} đánh giá
                                    @endif
                                </span>
                                <strong class="text-danger fs-6"> {{ number_format($row->price) }}
                                    VND</strong>
                            </div>
                        </div>
                        <div class="card-body card-hover pt-0 pb-0">
                            <div class="view ">
                                <div class="position-relative">
                                    <div class="clearfix">
                                        <button class="my-button float-end btn btn-sm btn-light ">
                                            <i class="fa-sharp fa-solid fa-heart"></i>
                                            <span class="child">Yêu thích</span>
                                        </button>
                                    </div>
                                    <div class="clearfix">
                                        <button class="float-end btn btn-sm btn-light my-button">
                                            <a href="/products/{{ $row->id }}"
                                                style="color: #000000 !important;">
                                                <i class="fa-solid fa-eye"></i>
                                                <span class="child">Xem chi tiết</span>
                                            </a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="position-relative">
                            <div class="card-body position-absolute w-100 bg-white card-hv-2">

                                <form action="{{ route('cart.store') }}" method="GET"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="{{ $row->id }}" name="id">
                                    <input type="hidden" value="{{ $row->name }}" name="name">
                                    <input type="hidden" value="{{ $row->price }}" name="price">
                                    <input type="hidden" value="{{ $row->size->size_name }}"
                                        name="size">
                                    <input type="hidden" value="{{ $row->color->color_name }}"
                                        name="color">
                                    <input type="hidden" value="{{ $row->productImages[0]->image }}"
                                        name="img">
                                    <input type="hidden" value="1" name="quantity">
                                    <button class="btn btn-sm btn-danger w-100">Thêm vào giỏ hàng</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Product End -->
</div>
@include('client.footer')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/8e47a4543e.js" crossorigin="anonymous"></script>
<script src="{{ url('./js/main.js') }}"></script>
