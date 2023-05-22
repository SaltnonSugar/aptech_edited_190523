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
            {{-- <div class="col-lg-3" style="border:1px solid #ccc">
                <h2 class="text-center mt-4">Lọc sản phẩm</h2>
                <form action="{{ route('locsanpham') }}" method="get">
                    <div class="container">
                        <span>Tìm kiếm</span>
                        <input class="form-control form-control-lg" type="search" name="search" id="" value="@if(isset($search)){{ $search }}@endif" placeholder="Bạn muốn tìm gì?">
                        <div>Nhà sản xuất</div>
                        @foreach ($catalogs as $row)
                        <label for="nsx" class="d-block">
                            <input type="checkbox" class="" name="factory[]" checked value="{{ $row->id }}" id=""> {{ $row->catalog_name }}
                        </label>
                        @endforeach
                        <div>Tầm giá</div>
                        <div class="row">
                            <div class="col custom-control custom-radio mt-1 d-inline-block" style="padding-left: 0px; width:60%">
                                <input type="range" class="custom-range" name="min" min="50000" max="50000000" value="50000" id="">Thấp nhất
                            </div>
                            <div class="col custom-control custom-radio mt-1 d-inline-block" style="padding-left: 0px; width:60%">
                                <input type="range" class="custom-range" name="max" min="50000" max="50000000" value="25000000" id="">Cao nhất
                            </div>
                        </div>
                        <div>Màu sắc</div>
                        <input type="radio" name="color" value="red" id=""> Đỏ
                        <input type="radio" name="color" value="gold" id=""> Vàng
                        <input type="radio" name="color" value="blue" id=""> Xanh 
                        <div>
                            <input type="submit" class="btn btn-outline-success" value="Lọc">
                        </div>
                        
                    </div>

                </form>
            </div> --}}
            <div class="col-lg-3 pb-3">
                <div class="filter-1 bg-white rounded p-3">
                    <strong>Products categories</strong>
                    <form action="" method="get">
                        <div class="mb-0 form-check">
                          <input type="checkbox" class="form-check-input" id="check1" checked/>
                          <label class="form-check-label" for="check1">Accessories</label>
                        </div>
                        <div class="mb-0 form-check">
                            <input type="checkbox" class="form-check-input" id="check1" checked/>
                            <label class="form-check-label" for="check1">Air Conditioner</label>
                          </div>
                          <div class="mb-0 form-check">
                            <input type="checkbox" class="form-check-input" id="check1" checked/>
                            <label class="form-check-label" for="check1">Computer & Gaming</label>
                          </div>
                          <div class="mb-0 form-check">
                            <input type="checkbox" class="form-check-input" id="check1" checked/>
                            <label class="form-check-label" for="check1">Laptops</label>
                          </div>
                          <div class="mb-0 form-check">
                            <input type="checkbox" class="form-check-input" id="check1" checked/>
                            <label class="form-check-label" for="check1">Mobiles</label>
                          </div>
                          <div class="mb-0 form-check">
                            <input type="checkbox" class="form-check-input" id="check1" checked/>
                            <label class="form-check-label" for="check1">Tablets</label>
                          </div>
                        
                    </form>
                </div>
                <div class="filter-1 bg-white rounded p-3 mt-3">
                    <strong>Filter by price </strong>
                    <form action="" method="get">
                        <input type="range" class="form-range" id="customRange" name="points">
                        <input type="range" class="form-range" id="customRange" name="points">
                        <div class="d-flex justify-content-between small">
                            <span>Min:$<span>1</span></span>
                            <span>Max:$<span>10</span></span>
                        </div>
                    </form>
                </div>
                <div class="filter-1 bg-white rounded p-3 mt-3">
                    <strong>Rating</strong>
                    <form action="" method="get">
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
                    </form>
                </div>
                <div class="filter-1 bg-white rounded p-3 mt-3">
                    <strong class="d-block">Memory</strong>
                    <button class="btn btn-light">64GB</button>
                    <button class="btn btn-light">128GB</button>
                    <button class="btn btn-light mt-1">256GB</button>
                    <button class="btn btn-light mt-1">512GB</button>
                </div>
            </div>

            {{-- <div class="danhsachsanpham py-5 bg-light col-lg-9">
                <div class="container">
                    <div class="row">
                    @foreach ($products as $row)
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <a href="/products/{{ $row->id }}">
                                    <img class="bd-placeholder-img card-img-top" width="100%" height="350"
                                        src="{{ url( $row->productImages[0]->image) }}">
                                </a>
                                <div class="card-body">
                                    <a href="">
                                        <h5>{{$row->name}}</h5>
                                    </a>
                                    <h6>Điện thoại</h6>
                                    <p class="card-text">Sản phẩm của Apple</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a class="btn btn-sm btn-outline-secondary"
                                                href="/products/{{ $row->id }}">Xem chi tiết</a>
                                        </div>
                                        <small class="text-muted text-right">
                                            <s>12,600,000.00</s>
                                            <b>{{ number_format($row->price)}} vnđ</b>
                                        </small>
                                    </div>
                                    <form action="{{ route('cart.store') }}" method="GET" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" value="{{ $row->id }}" name="id">
                                            <input type="hidden" value="{{ $row->name }}" name="name">
                                            <input type="hidden" value="{{ $row->price }}" name="price">
                                            <input type="hidden" value="{{ $row->productImages[0]->image }}" name="img">
                                            <input type="hidden" value="1" name="quantity">
                                            <button class="btn btn-success" style="margin-top: 10px;"><i class=" fas fa-light fa-cart-shopping"></i>Thêm vào giỏ hàng</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div> --}}
            <div class="col-9">
                <section class="bg-white  p-3 pt-2 pb-2 rounded d-flex align-items-center">
                    <button class="btn btn-outline-dark border-0"><i class="fa-solid fa-bars"></i></button>
                    <div class="">
                      <select class="form-select border-0" aria-label="Default select example">
                        <option selectedu>Default sorting</option>
                        <option value="1">Short by latest</option>
                        <option value="2">Short by price</option>
                      </select>
                    </div>
                    <div  class="ms-auto text-muted small">Shows 9 products</div>
                </section>
                <section class="mt-3">
                    <div class="row">
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
                                    @php $ratenum = number_format($row->rating->sum('star') / $row->rating->count()) @endphp
                                    <div class="mt-3 mb-2">
                                        @for($i=1; $i <= $ratenum; $i++)
                                        <i class="fa-sharp fa-solid fa-star text-success"></i>
                                        @endfor
                                        @for($j=$ratenum+1; $j <= 5; $j++)
                                        <i class="fa-sharp fa-solid fa-star"></i> 
                                        @endfor
                                    </div>
                                    <span  class="font-header text-muted">
                                        @if ($row->rating->count() == 0)
                                        No Review
                                        @elseif($row->rating->count() == 1)
                                        1 Review
                                        @else
                                        {{ $row->rating->count()}} Reviews
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
                    </div>
                    
                </section>
            </div>
        </div>
        

        <!-- End block content -->
</main>



@include('client.footer')
