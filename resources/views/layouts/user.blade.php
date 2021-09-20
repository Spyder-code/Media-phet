<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phet - UINSA</title>
    <!-- === webfont=== -->
    <link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
    <!--Font awesome css-->
    <link rel="stylesheet" href="{{ asset('/') }}css/font-awesome.min.css">
    <!--Bootstrap-->
    <link href="{{ asset('/') }}css/bootstrap.min.css" rel="stylesheet">
    <!--UI css-->
    <link rel="stylesheet" href="{{ asset('/') }}css/jquery-ui.css">
    <!-- Venobox CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}css/venobox.css">
    <!--Owl Carousel css-->
    <link href="{{ asset('/') }}css/owl.carousel.css" rel="stylesheet">
    <link href="{{ asset('/') }}css/owl.theme.css" rel="stylesheet">
    <!--Animate css-->
    <link href="{{ asset('/') }}css/animate.css" rel="stylesheet">
    <!--Main Stylesheet -->
    <link href="{{ asset('/') }}style.css" rel="stylesheet">
    <!--Responsive Stylesheet -->
    <link href="{{ asset('/') }}css/responsive.css" rel="stylesheet">
    @yield('style')
</head>
<body>

    <div class="preloader"></div>

    @include('partials.main-navbar')

    @yield('isi')

    <!--Footer widget area start-->
    <section class="footer-widget style-three">
        <div class="container-fluid">
            <div class="row">
            <div class="col-sm-6 col-lg-6">
                <div class="single-widget">
                        <h3 class="font-red">Contact us</h3>
                        <div class="footer-contact">
                            <div class="sin-con">
                                <img src="img/icon/marker-3.png" alt="">
                                <p>Jl. Ahmad Yani No.117, Jemur Wonosari, Kec. Wonocolo, Kota SBY</p>
                            </div>
                            <div class="sin-con">
                            <img src="img/icon/phone-i3.png" alt="">
                                <a href="">Telp. 031 8410298</a>
                            </div>
                            <div class="sin-con">
                                <img src="img/icon/envelope-i3.png" alt="">
                                <a href="">humas@uinsby.ac.id </a>
                            </div>
                            <div class="social-footer-3">
                                <span class="fs-text">follow us :</span>
                                <ul class="social-icon float-right">
                                    <li><a href=""><i class="fa fa-behance"></i></a></li>
                                    <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href=""><i class="fa fa-twitter"></i></a></li>
                                    <li><a href=""><i class="fa fa-facebook"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6 ">
                    <div class="single-widget">
                    <h3 class="font-red">Useful Links</h3>
                    <ul class="footer-tab">
                        <li><a href="#">Classes</a></li>
                        <li><a href="#">Teachers</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Children`S Safety</a></li>
                        <li><a href="#">Testimonials</a></li>
                        <li><a href="#">Our Mission</a></li>
                        <li><a href="#">Learning & Fun</a></li>
                        <li><a href="#">Healthy Meals</a></li>
                        <li><a href="#">blog</a></li>
                    </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Footer widget area end-->
    <!--Footer area start-->
    <footer class="footer-area footer-in-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <p>&copy; 2021 Phet - UINSA</p>
                </div>
            </div>
        </div>
    </footer>
    <!--Footer area end-->

    <!-- === jqyery === -->
    <script src="{{ asset('/') }}js/jquery.min.js"></script>
    <!-- === bootsrap-min === -->
    <script src="{{ asset('/') }}js/bootstrap.min.js"></script>
    <!-- === Scroll up min js === -->
    <script src="{{ asset('/') }}js/jquery.scrollUp.min.js"></script>
    <!-- === Price slider js === -->
    <script src="{{ asset('/') }}js/jquery-price-slider.js"></script>
    <!-- === Counter up js === -->
    <script src="{{ asset('/') }}js/jquery.counterup.min.js"></script>
    <!-- === Waypoint js === -->
    <script src="{{ asset('/') }}js/jquery.waypoints.js"></script>
    <!-- === Venobox js === -->
    <script src="{{ asset('/') }}js/venobox.min.js"></script>
    <!-- === ZOOM  js === -->
    <script src="{{ asset('/') }}js/jquery.elevatezoom.js"></script>
    <!-- === filterizr filter  js === -->
    <script src="{{ asset('/') }}js/jquery.filterizr.min.js"></script>
    <!-- === Owl Carousel js === -->
    <script src="{{ asset('/') }}js/owl.carousel.min.js"></script>
    <!-- === WOW js === -->
    <script src="{{ asset('/') }}js/wow.js"></script>
    <!-- === Coundown js === -->
    <script src="{{ asset('/') }}js/jquery.countdown.min.js"></script>
    <!-- === Image loaded js === -->
    <script src="{{ asset('/') }}js/imageloaded.pkgd.min.js"></script>
    <!-- === Mailchimp integration js === -->
    <script src="{{ asset('/') }}js/mailchimp.js"></script>
    <!-- === Mobile menu  js === -->
    <script src="{{ asset('/') }}js/mobile-menu.js"></script>
    <!-- === Main  js === -->
    <script src="{{ asset('/') }}js/main.js"></script>

    @yield('script')
</body>
</html>
