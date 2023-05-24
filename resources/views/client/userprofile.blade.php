<!DOCTYPE html>
<html lang="zxx">

  <head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tiny Shop| Chuyên đồ điện tử</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">

    <!--  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ url('./css/user-profile.css') }}" type="text/css">
  </head>

  <body>
    
    @include('client.header')
    {{-- Alert --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if (session('message'))
        <script>
            swal("{{ session('message') }}");
        </script>
    @endif
    <main>
        <div class="container top bottom">
            <div class="row gutters">
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="account-settings">
                                <div class="user-profile">
                                    <div class="user-avatar">
                                        <img src="{{ url('./img/icon/no_avatar.jpg')}}" alt="avatar">
                                    </div>
                                    <h5 class="user-name">{{$user->name}}</h5>
                                    <h6 class="user-email">{{ $user->email }}</h6>
                                </div>
                            <div class="about">
                                <h5>Quản lý hồ sơ</h5>
                                <p>Mỗi khách hàng khi sử dụng dịch vụ của chúng tôi sẽ được cung cấp một tài khoản để tham gia mua sắm</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="card h-100">                    
                    <form  method="POST" action="/userprofile/update/{{ Auth::id() }}">
                        @method('PATCH')
                        @csrf
                        <div class="card-body">
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mb-2 text-primary">Thông tin cá nhân</h6>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="name">Tên người dùng</label>
                                        <input name="name" type="text" class="form-control" id="name" placeholder="Nhập tên người dùng" value={{$user->name}}>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                    <label for="eMail">Email</label>
                                    <input name="email" type="email" class="form-control" id="eMail" placeholder="Nhập email" value={{$user->email}}>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                    <label for="phone">Số điện thoại</label>
                                    <input name="phone" type="text" class="form-control" id="phone" placeholder="Nhập số điện thoại" value={{$user->phone}}>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="address">Địa chỉ</label>
                                        <input name="address" type="text" class="form-control" id="address" placeholder="Nhập địa chỉ" value={{$user->address}}>
                                    </div>
                                </div>
                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mb-2 text-primary">Tài khoản và bảo mật</h6>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="password">Mật khẩu</label>
                                        <input name="password" type="password" class="form-control" id="password" placeholder="Nhập mật khẩu">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                    <label for="confirmPassword">Xác nhận mật khẩu</label>
                                    <input name="confirmPassword" type="password" class="form-control" id="confirmPassword" placeholder="Xác nhận mật khẩu">
                                    </div>
                                </div>
                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="text-right">
                                <button type="button" id="submit" name="submit" class="btn btn-secondary">
                                    <a href="{{ route('home')}}">
                                    Quay về
                                    </a>
                                </button>
                                <button type="submit" id="submit" name="submit" class="btn btn-primary">Cập nhật</button>
                            </div>
                        </div>
                    <form>
                </div>
            </div>
        </div>
    </main>
    

    @include('client.footer')
  </body>
  <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
  {{-- <script>
        function validatePassword() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirmPassword").value;
        
        if (password.length < 8) {
          alert("Password should contain at least 8 characters!");
          return false;
        }

        if (password !== confirmPassword) {
          alert("Passwords do not match!");
          return false;
        } 

        return true;
      }
  </script> --}}

</html>