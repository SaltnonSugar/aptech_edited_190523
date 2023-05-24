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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ url('./css/contact.css') }}" type="text/css">
  </head>

  <body>
    
    @include('client.header')
    <main>
        <!-- Contact Section Begin -->
            <div class="container top">
                <div class="row">
                <div class="col-lg-6 col-md-6 ">
                    <div class="contact-text">
                    <div class="section-title">
                        <span>Thông tin</span>
                        <h2>Liên hệ với chúng tôi</h2>
                        <p>Trải nghiệm tốt của khách hàng là ưu tiên hàng đầu của chúng tôi.</p>
                    </div>
                    <p>175 Tây Sơn phường Trung Liệt quận Đống Đa thành phố Hà Nội</p>
                    <p>+84123456789</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="contact-form">
                    <form action="#">
                        <div class="row">
                        <div class="col-lg-6">
                            <input type="text" placeholder="Tên">
                        </div>
                        <div class="col-lg-6">
                            <input type="text" placeholder="Email">
                        </div>
                        <div class="col-lg-12">
                            <textarea placeholder="Lời nhắn"></textarea>
                            <button type="submit" class="btn btn-dark" style="border-radius: 0 !important">Gửi Email</button>
                        </div>
                        </div>
                    </form>
                    </div>
                </div>
                </div>
            </div>
        <!-- Contact Section End -->

        <!-- Map Begin -->
        <div style="padding-top:20px">
            <div class="map">
                <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.6327985893085!2d105.8225417157954!3d21.00735159388287!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac8109765ba5%3A0xd84740ece05680ee!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBUaOG7p3kgbOG7o2k!5e0!3m2!1svi!2s!4v1676531304746!5m2!1svi!2s"
                width="600" height="450" style="border:0;" allowfullscreen=""
                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <!-- Map End -->
    </main>
    

    @include('client.footer')
  </body>
  <!-- JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/8e47a4543e.js" crossorigin="anonymous"></script>

</html>