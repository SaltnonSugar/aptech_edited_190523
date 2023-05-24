@include('admin.admin_header')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Thêm các danh mục cho sản phẩm</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Backup Data</a>
    </div>

    
    <!-- Content Row -->
    <div class="container p-">
        {{-- Alert --}}
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        @if (session('message'))
            <script>
                swal("{{ session('message') }}");
            </script>
        @endif
        @if ($errors->any())
        <div class="alert alert-warning">
          @foreach ($errors->all() as $error)
              <div>{{ $error }}</div>
          @endforeach
        </div>
        @endif
        <form method="POST" action="/admin/catalogs/store" enctype="multipart/form-data">
            @csrf
          <div class="form-group">
            <label for="catalog_name">Tên danh mục:</label>
            <input type="text" class="form-control" id="catalog_name" placeholder="Thêm tên" name="catalog_name">
          </div>
          <button type="submit" class="btn btn-primary">Xác nhận</button>
        </form>
        <form method="POST" action="/admin/colors/store" enctype="multipart/form-data">
            @csrf
          <div class="form-group">
            <label for="color_name">Màu sắc:</label>
            <input type="" class="form-control" id="color_name" placeholder="Thêm màu" name="color_name">
          </div>
          <button type="submit" class="btn btn-primary">Xác nhận</button>
        </form>
        <form method="POST" action="/admin/sizes/store" enctype="multipart/form-data">
            @csrf
          <div class="form-group">
            <label for="size_name">Dung lượng:</label>
            <input type="" class="form-control" id="size_name" placeholder="Thêm dung lượng" name="size_name">
          </div>
          <button type="submit" class="btn btn-primary">Xác nhận</button>
        </form>
    </div>
    
    
    
</div>
<!-- End of Content Wrapper -->
@include('admin.admin_footer')