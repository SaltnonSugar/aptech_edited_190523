<!DOCTYPE html>
<html lang="vi" class="h-100">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tiny Shop| Chuyên đồ điện tử</title>
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <script src="https://kit.fontawesome.com/0274d45322.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ url('./css/product.css') }}">
</head>

@include('client.header')
<main class="bg-light">
        <!-- Danh sách sản phẩm -->
        <section class="jumbotron text-center">
            <div class="container">
                <h3 class="jumbotron-heading">Danh sách Sản phẩm</h3>
                <p class="lead text-muted">Các sản phẩm với chất lượng, uy tín, cam kết từ nhà Sản xuất, phân phối và
                    bảo hành
                    chính hãng.</p>
            </div>
        </section>

       
        <div class="row mt-4">
            <div class="col-lg-3 pb-3">
                <form action={{ route('filter')}} method="GET">
                    <div class="input-group">
                        <input class="form-control border-end-0 border" name="search" type="search" placeholder="Tìm kiếm" >
                    </div>
                    <div class="filter-1 bg-white rounded p-3">
                        <strong>Danh mục sản phẩm</strong>
                            @foreach ($catalogs as $catalog)
                                <div class="mb-0 form-check">
                                <input type="checkbox" class="form-check-input" id="check1" name="catalog[]"  value="{{ $catalog->id }}"/>
                                <label class="form-check-label" for="check1">{{ $catalog->catalog_name }}</label>
                                </div>
                            @endforeach      
                    </div>
                    <div class="filter-1 bg-white rounded p-3 mt-3">
                        <strong>Khoảng giá</strong>
                            <input type="range" class="form-range" id="minRange" name="min_price" min="1000000" max="50000000" value="1000000">
                            <input type="range" class="form-range" id="maxRange" name="max_price" min="1000000" max="50000000" value="50000000">
                            <div class="d-flex justify-content-between small">
                                <span>Min:<span id="minPrice">1000000</span> VND</span>
                                <span>Max:<span id="maxPrice">50000000</span> VND</span>
                            </div>
                    </div>
                    <div class="filter-1 bg-white rounded p-3 mt-3">
                        <strong>Đánh giá</strong>
                            <div class="mb-3">
                                <div class="rating w-75">
                                    <input type="radio" id="star5" name="rating" value="5">
                                    <label for="star5"></label>
                                    <input type="radio" id="star4" name="rating" value="4">
                                    <label for="star4"></label>
                                    <input type="radio" id="star3" name="rating" value="3">
                                    <label for="star3"></label>
                                    <input type="radio" id="star2" name="rating" value="2">
                                    <label for="star2"></label>
                                    <input type="radio" id="star1" name="rating" value="1">
                                    <label for="star1"></label>
                                </div>                               
                            </div>
                    </div>
                    {{-- <div class="filter-1 bg-white rounded p-3 mt-3">
                        <strong class="d-block">Memory</strong>
                        <button class="btn btn-light">64GB</button>
                        <button class="btn btn-light">128GB</button>
                        <button class="btn btn-light mt-1">256GB</button>
                        <button class="btn btn-light mt-1">512GB</button>
                    </div> --}}
                    <button type="submit" class="btn btn-outline-danger w-100 mt-3">Áp dụng</button>
                </form>
            </div>

            <div class="col-9">
                <section class="bg-white  p-3 pt-2 pb-2 rounded d-flex align-items-center">
                    <button class="btn btn-outline-dark border-0"><i class="fa-solid fa-bars"></i></button>
                    <div class="">
                        <form id="sortForm" action={{ route('sort')}} method="GET">
                            <select id="sortSelect" class="form-select border-0" aria-label="Default select example" name="sort">
                                <option value="default">
                                    Sắp xếp mặc định
                                </option>
                                <option value="latest">
                                    Sản phẩm mới nhất
                                </option>
                                <option value="desc">
                                    Giá từ cao đến thấp
                                </option>
                                <option value="asc">
                                    Giá từ thấp đến cao
                                </option>
                            </select>
                        </form>
                    </div>
                    <div  class="ms-auto text-muted small">Hiển thị {{$products->count()}} sản phẩm</div>
                </section>
                <section class="mt-3">
                    <div class="row">
                        @if ($products->count() == 0)
                            <h3 class="jumbotron-heading text-center">Không tìm thấy sản phẩm</h3>
                            
                        @else
                            @foreach ($products as $row)
                            <div class="col-4 mb-2">
                                <div class="card w-100 pb-2 position-relative">
                                    <div class="mt-3 ms-3">
                                        <button class="btn btn-sm btn-outline-dark rounded-0 pt-0 pb-0">sale</button>
                                    </div>
                                    <a href="/products/{{ $row->id }}">
                                        <img src="{{ url( $row->productImages[0]->image) }}" class="card-img-top" width="50" height="200" alt="...">
                                    </a>
                                
                                <div class="card-body pb-1 m-0">
                                    <h6 class="card-subtitle mb-2 text-muted overflow-text-1">{{ $row->catalog->catalog_name}}</h6>
                                    <h5 class="card-title overflow-text font-card mb-2">{{ $row->name }}</h5>
                                    <div class="mt-3 pb-3 star font-header">
                                        <!-- loop and print star -->
                                        @if ($row->rating->count() != 0)
                                        @php $ratenum = number_format($row->rating->sum('star') / $row->rating->count()) @endphp
                                        <div class="mt-3 mb-2">
                                            @for($i=1; $i <= $ratenum; $i++)
                                            <i class="fa-sharp fa-solid fa-star text-success"></i>
                                            @endfor
                                            @for($j=$ratenum+1; $j <= 5; $j++)
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
                                        <span  class="font-header text-muted">
                                            @if ($row->rating->count() == 0)
                                            0 đánh giá
                                            @elseif($row->rating->count() == 1)
                                            1 đánh giá
                                            @else
                                            {{ $row->rating->count()}} đánh giá
                                            @endif
                                        </span>
                                        <strong class="text-danger fs-6"> {{ number_format($row->price)}} VND</strong>
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
                                                    <a href="/products/{{ $row->id }}" style="color: #000000 !important;">
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
                                        
                                        <form action="{{ route('cart.store') }}" method="GET" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" value="{{ $row->id }}" name="id">
                                            <input type="hidden" value="{{ $row->name }}" name="name">
                                            <input type="hidden" value="{{ $row->price }}" name="price">
                                            <input type="hidden" value="{{ $row->productImages[0]->image }}" name="img">
                                            <input type="hidden" value="1" name="quantity">
                                            <button class="btn btn-sm btn-danger w-100">Thêm vào giỏ hàng</button>
                                        </form>
                                    </div>
                                </div>
                                </div>
                            </div>  
                            @endforeach
                        @endif
                    </div>
                    
                </section>
            </div>
        </div>
        

        <!-- End block content -->
</main>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    var minRange = document.getElementById("minRange");
    var minPrice = document.getElementById("minPrice");
    let min = Number(minPrice.innerHTML)
            .toLocaleString('en');
    minPrice.innerHTML = min;

    // Update the range value display when the input value changes
    minRange.addEventListener("input", function() {
    minPrice.textContent = minRange.value;
    let min = Number(minPrice.innerHTML)
            .toLocaleString('en');
    minPrice.innerHTML = min;
    });

    var maxRange = document.getElementById("maxRange");
    var maxPrice = document.getElementById("maxPrice");
    let max = Number(maxPrice.innerHTML)
            .toLocaleString('en');
    maxPrice.innerHTML = max;

    // Update the range value display when the input value changes
    maxRange.addEventListener("input", function() {
    maxPrice.textContent = maxRange.value;
    let max = Number(maxPrice.innerHTML)
            .toLocaleString('en');
    maxPrice.innerHTML = max;
   
    });

    //submit the sort form
    $(document).ready(function() {
        $('#sortSelect').change(function() {
            $('#sortForm').submit();
        });
    });
</script>




@include('client.footer')
