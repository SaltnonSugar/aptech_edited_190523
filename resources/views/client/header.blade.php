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
    <link rel="stylesheet" href="{{ url('./vendor/bootstrap/css/bootstrap.min.css') }}" type="text/css">
    <!-- Font awesome -->
    <link rel="stylesheet" href="{{ url('./vendor/font-awesome/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom css - Các file css do chúng ta tự viết -->
    <link rel="stylesheet" href="{{ url('./css/style.css') }}" type="text/css">
    
</head>

<body>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if (session('message'))
        <script>
            swal("{{ session('message') }}");
        </script>
    @endif
    <!-- header -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7">
                        <div class="header__top__left">
                            <p>Miễn phí ship, bảo hành trong vòng 1 năm.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5">
                        <div class="header__top__right">
                            <div class="header__top__links">
                                @guest
                                    @if (Route::has('login'))
                                            <a href="/login">Đăng nhập</a>
                                    @endif

                                    @if (Route::has('register'))
                                            <a href="/register">Đăng ký</a>
                                    @endif
                                    @else
                                        {{-- <a href="#">{{ Auth::user()->name }}</a> --}}
                                        <a href="{{ route('user.profile')}}">Tài khoản </a>
                        
                                    @if (Auth::check())
                                        <a data-toggle="modal" data-target="#exampleModal" href="{{ route('logout') }}" >
                                        Đăng xuất
                                        </a>
    
                                    @endif
                                @endguest
                            </div>
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Xác nhận</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body" style="text-align: left">
                                            Bạn chắc chắn muốn đăng xuất chứ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Đăng xuất</button>
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
        <div class="container">
          <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="header-logo">
                    <h5>Tiny shop </h5>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
              <nav class="header-menu">
                <ul id="menu">
                  <li class="active"><a href="/">Trang chủ</a></li>
                  <li><a href="{{ route('products.list') }}">Sản phẩm</a></li>
                  <li><a href="{{ route('cart.list') }}">Giỏ hàng</a></li>
                  <li><a href="{{ route('contact') }}">Liên hệ</a></li>
                </ul>
              </nav>
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="header-nav-option">
                    <a href="" class="search-switch"><img src="{{ url('./img/icon/search.png') }}" alt=""></a>
                    <a href="#"><img src="{{ url('./img/icon/heart.png') }}" alt=""></a>
                    <a href="{{ route('cart.list') }}"><img src="{{ url('./img/icon/cart.png') }}" alt=""> <span>1</span></a>
                    <div class="price">{{ number_format(Cart::getTotal()) }} VND</div>
                </div>
            </div>

          </div>
        </div>
    </header>
    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>

    <script
src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/8e47a4543e.js" crossorigin="anonymous"></script>
<script>
    
    // // //Menu active
    // const menu = document.getElementById('menu')
    // const listItems = menu.getElementsByTagName('li');
    // for (var i = 0; i < listItems.length; i++) {
    // var aTag = listItems[i].getElementsByTagName('a')[0];
    // aTag.addEventListener('click', function(event) {
    //     event.preventDefault(); // Prevent the default link behavior
    //     // Remove the "active" class from all <li> elements
    //     for (var j = 0; j < listItems.length; j++) {
    //     listItems[j].classList.remove('active');
    //     }
    //     // Add the "active" class to the parent <li> element
    //     this.parentNode.classList.add('active');
    // });
    // }

</script>

</body>
</html>


