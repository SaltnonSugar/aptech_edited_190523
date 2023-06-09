<!DOCTYPE html>
<html lang="vi" class="h-100">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tiny Shop| Chuyên đồ điện tử</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ url('./vendor/bootstrap/css/bootstrap.min.css') }}" type="text/css">
    <!-- Font awesome -->
    <link rel="stylesheet" href="{{ url('./vendor/font-awesome/css/font-awesome.min.css') }}" type="text/css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
          integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <!-- Custom css - Các file css do chúng ta tự viết -->
    <link rel="stylesheet" href="{{ url('./css/product-detail.css') }}" type="text/css">

</head>

@include('client.header')
<main role="main">
    <div class="container mt-4">
        <div id="thongbao" class="alert alert-danger d-none face" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>

        <div class="card">
            <div class="container-fliud">
                <div>
                    <div class="wrapper row">
                        <div class="preview col-md-6">
                            <div class="preview-pic tab-content">
                                <div class="tab-pane" id="pic-1">
                                    <img src="{{ url($products->productImages[0]->image) }}">
                                </div>
                                <div class="tab-pane" id="pic-2">
                                    <img src="{{ url($products->productImages[1]->image) }}">
                                </div>
                                <div class="tab-pane active" id="pic-3">
                                    <img src="{{ url($products->productImages[2]->image) }}">
                                </div>
                            </div>
                            <ul class="preview-thumbnail nav nav-tabs">
                                <li class="active">

                                    <a data-target="#pic-1" data-toggle="tab" class="">
                                        <img src="{{ url($products->productImages[0]->image)}}">
                                    </a>
                                </li>
                                <li class="">
                                    <a data-target="#pic-2" data-toggle="tab" class="">
                                        <img src="{{ url($products->productImages[1]->image)}}">
                                    </a>
                                </li>
                                <li class="">
                                    <a data-target="#pic-3" data-toggle="tab" class="active">
                                        <img src="{{ url($products->productImages[2]->image) }}">
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="details col-md-6">
                            <p class="product-category">Danh mục: {{ $products->catalog->catalog_name}}</p>
                            <h3 class="product-title">{{ $products->name }}</h3>
                            @php $ratenum = number_format($rating_value) @endphp
                            <div class="rating">
                                <div class="stars">
                                    @for($i=1; $i <= $ratenum; $i++)
                                    <span class="fa fa-star text-success"></span>
                                    @endfor
                                    @for($j=$ratenum+1; $j <= 5; $j++)
                                    <span class="fa fa-star"></span>
                                    @endfor
                                </div>
                                <span class="review-no">
                                    @if ($ratings->count() == 0)
                                    No review
                                    @elseif($ratings->count() == 1)
                                    1 review
                                    @else
                                    {{ $ratings->count()}} reviews
                                    @endif
                                </span>
                            </div>
                           
                            {{-- <small class="text-muted">Giá cũ: <s><span>30,990,000.00 VNĐ</span></s></small> --}}
                            <h4 class="price">Giá hiện tại: <span>{{ number_format($products->price) }} VNĐ</span></h4>
                            <p class="vote"><strong>100%</strong> hàng <strong>Chất lượng</strong>, đảm bảo
                                <strong>Uy tín</strong>!</p>
                            <h6 class="description-title"> Mô tả sản phẩm </h6>
                            <p class="product-description">{{ $products->description }}</p>
                            <h6 class="sizes">Dung lượng: {{ $products->size->size_name }} </h6>
                        
                            <h6 class="colors">Màu sắc: <span class="color" style="background-color: {{ $products->color->color_name}}"></span></h6>
                            
                            
                            <form action="{{ route('cart.store') }}" method="GET" enctype="multipart/form-data">
                                <input type="hidden" value="{{ $products->id }}" name="id">
                                <input type="hidden" value="{{ $products->name }}" name="name">
                                <input type="hidden" value="{{ $products->price }}" name="price">
                                <input type="hidden" value="{{ $products->size->size_name }}" name="size">
                                <input type="hidden" value="{{ $products->color->color_name }}" name="color">
                                <input type="hidden" value="{{ $products->productImages[0]->image }}" name="img">

                                <div class="buttons d-flex">
                                    <div class="block">
                                        <button type="button" class="shadow btn custom-btn btn-danger" data-toggle="modal" data-target="#rating">Đánh giá</button>
                                    </div>
    
                                    <div class="block">
                                        <button type="submit" class="shadow btn custom-btn btn-danger" id="btnThemVaoGioHang">
                                            giỏ hàng
                                        </button>
                                    </div>
                                    <div class="block quantity">
                                        <input type="number" class="form-control" id="soluong" name="quantity" value="1" min="1">
                                    </div>
                                </div>
                                
                                
                            </form>

                           

                            <div class="modal fade" id="rating" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Đánh giá sản phẩm <strong>{{ $products->name }} </strong></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ url('rating') }}" method="POST">
                                            @csrf
                                            <div class="modal-body">

                                                        <input type="hidden" name="product_ID" value="{{ $products->id }}">
                                                        <div class="form-group">
                                                            <label for="commment">Nhận xét:</label>
                                                            <input type="text" class="form-control" name="comment">
                                                        </div>
                                                        <div class="rating-css text-success">
                                                            <div class="star-icon">
                                                                <input type="radio" value="1" name="product_rating" checked id="rating1">
                                                                <label for="rating1" class="fa fa-star"></label>
                                                                <input type="radio" value="2" name="product_rating" id="rating2">
                                                                <label for="rating2" class="fa fa-star"></label>
                                                                <input type="radio" value="3" name="product_rating" id="rating3">
                                                                <label for="rating3" class="fa fa-star"></label>
                                                                <input type="radio" value="4" name="product_rating" id="rating4">
                                                                <label for="rating4" class="fa fa-star"></label>
                                                                <input type="radio" value="5" name="product_rating" id="rating5">
                                                                <label for="rating5" class="fa fa-star"></label>
                                                            </div>
                                                        </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">Gửi</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- Hiển thị sản phẩm liên quan --}}

    <div class="container similar-products my-4">
        <hr>
        <h3 class="mb-4">Sản phẩm tương tự</h3>
        <div class="row">
            @foreach($related_products as $row)
            <div class="col-md-3">
                <div class="similar-product">
                    <a href="/products/{{ $row->id }}">
                        <img class="w-100" src="{{ url( $row->productImages[2]->image) }}" alt="Preview">
                    </a>
                    <p class="title overflow-text ">{{$row->name}}</p>
                    <p class="price text-danger">{{ number_format($row->price)}} VND</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Đánh giá của khách hàng -->

    <div class="container my-4">
        <hr>
        <h3 class="mb-4">Đánh giá sản phẩm</h3> 
        <div class="col">
            @foreach($ratings as $rating)
            <div class="d-flex flex-start">
                <img class="rounded-circle shadow-1-strong avatar"
                    src="{{ url('./img/icon/no_avatar.jpg')}}" alt="avatar" width="65"
                    height="65" />
            <div class="flex-grow-1 flex-shrink-1">
                <div>
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="font-weight-bolder mb-1">
                            {{ $rating->users->name}} <span class="small">- {{ $rating->created_at->format('d M Y') }}</span>
                        </p>
                    </div>
                    @php $user_rate = $rating->star @endphp
                    <div class="rating text-success">
                        <div class="stars">
                            @for($i=1; $i <= $user_rate; $i++)
                            <span class="fa fa-star checked"></span>
                            @endfor
                            @for($j=$user_rate+1; $j <= 5; $j++)
                            <span class="fa fa-star"></span>
                            @endfor
                        </div>
                    </div>
                    <p>
                        {{ $rating->comment }}
                    </p>
                </div>
            </div>
            </div>
            @endforeach
        </div>
                  
         
       
    </div>

</main>


@include('client.footer')
