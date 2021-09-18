<!--Top bar area start-->
<header class="top-bar">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-lg-6 col-xl-7 d-sm-none  d-md-block">
                <span class="first-span"><i class="fa fa-map-marker"></i> Jl. Ahmad Yani No.117, Jemur Wonosari, Kec. Wonocolo, Kota SBY</span>
                <span><i class="fa fa-phone"></i> Telp. 031 8410298</span>
            </div>
            <div class="col-md-12 col-lg-6 col-xl-5">
             <!--Search box for Mobile Small devices (landscape phones, less than 768px)-->
               {{-- <div class="serch-wrapper float-right hide-sm-up">
                    <div class="search align-middle">
                        <input class="search-input" placeholder="Search" type="text">
                        <a href="javascript:void(0)"><i class="fa fa-search"></i></a>
                    </div>
                </div> --}}
               <!-- <div class=" cart-area">
                    <a href="javascript:void(0)"><i class="fa fa-shopping-basket"></i><span class="hide-sm">My cart</span></a>
                    <div class="cart-drop">
                        <div class="single-cart">
                            <div class="cart-img">
                                <img alt="" src="img/cart-1.jpg">
                            </div>
                            <div class="cart-title">
                                <p><a href="">Aliquam Consequat</a></p>
                            </div>
                            <div class="cart-price">
                                <p>1 x $500</p>
                            </div>
                            <a href="#"><i class="fa fa-times"></i></a>
                        </div>
                        <div class="single-cart">
                            <div class="cart-img">
                                <img alt="" src="img/cart-2.jpg">
                            </div>
                            <div class="cart-title">
                                <p><a href="">Quisque In Arcuc</a></p>
                            </div>
                            <div class="cart-price">
                                <p>1 x $200</p>
                            </div>
                            <a href="#"><i class="fa fa-times"></i></a>
                        </div>
                        <div class="cart-bottom">
                            <div class="cart-sub-total">
                                <p>Sub-Total <span>$700</span></p>
                            </div>
                            <div class="cart-sub-total">
                                <p>Eco Tax (-2.00)<span>$7.00</span></p>
                            </div>
                            <div class="cart-sub-total">
                                <p>VAT (20%) <span>$40.00</span></p>
                            </div>
                            <div class="cart-sub-total">
                                <p>Total <span>$244.00</span></p>
                            </div>
                            <div class="cart-checkout">
                                <a href="shop.html"><i class="fa fa-shopping-cart"></i>View Cart</a>
                            </div>
                            <div class="cart-share">
                                <a href="checkout.html"><i class="fa fa-share"></i>Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="social-icon">
                    <li><a href=""><i class="fa fa-youtube"></i></a></li>
                    <li><a href=""><i class="fa fa-behance"></i></a></li>
                    <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                    <li><a href=""><i class="fa fa-instagram"></i></a></li>
                    <li><a href=""><i class="fa fa-twitter"></i></a></li>
                    <li><a href=""><i class="fa fa-facebook"></i></a></li>
                </ul> -->
            </div>
        </div>
    </div>
</header>
<!--Top bar area end-->
  <!--Main menu area start-->
<section class="main-menu-area border-top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-2">
                <div class="logo">
                    <a href="{{ url('/') }}">
                        <img src="img/logo.png" alt="">
                    </a>
                </div>
                <div class="accordion-wrapper hide-sm-up">
                    <a href="#" class="mobile-open"><i class="fa fa-bars" ></i></a>
                    <!--Mobile Menu start-->

                    <ul id="mobilemenu" class="accordion">
                   <li class="mob-logo"><a href="{{ url('/') }}">
                        <img src="img/logo.png" alt="">
                    </a></li>
                   <li ><a class="closeme" href="#"><i class="fa fa-times" ></i></a></li>
                   <li class="fc-red out-link"><a class="" href={{ url('/') }}>Home</a></li>
                   <li>
                        <div class="link font-per"><a href="{{ route('simulation') }}">Simulation</a></div>
                    </li>
                   <li>
                        <div class="link font-per"><a href="{{ route('room') }}">Room</a></div>
                    </li>
                   <li>
                        <div class="link font-per"><a href="{{ Auth::check()?route('akun'):route('login') }}">My profile</a></div>
                    </li>
                    <li>
                        <div class="link font-red"><a href="">Contact</a></div>
                    </li>
                    <li>
                        <div class="top-contact-btn">
                                @if (Auth::check())
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button class="kids-care-btn bg-sky" onclick="return confirm('are you sure?')" type="submit">Logout</button>
                            </form>
                            @else
                                <a href="{{ route('login') }}" class="kids-care-btn bg-sky">Login</a>
                            @endif
                        </div>
                    </li>

                </ul>
                    <!--Mobile Menu end-->

                </div>
            </div>
            <!--Main menu start-->

            <div class="col-md-9 col-lg-9 col-xl-8">
                <div class="mainmenu float-right style-4">
                    <ul id="navigation">
                        <li class="fc-orange"><img src="img/icon/menu-icon3.png" alt=""><a href="/">Home</a></li>
                        <li class="fc-red hav-sub"><img src="img/icon/menu-icon1.png" alt=""><a href="{{ route('simulation') }}" class="font-red">Simulations<i class="fa fa-angle-down" ></i></a>
                           <div class="mega-menu">
                                <div class="mega-catagory">
                                    <h4><a href="#"><span>Pecahan</span></a></h4>
                                    <div class="mega-button">
                                        <a href="#"><span>Membangun Pecahan</span></a>
                                        <a href="#"><span>Penjumlahan & Pengurangan</span></a>
                                        <a href="#"><span>Pecahan Senilai</span></a>
                                    </div>
                                </div>
                                <div class="mega-catagory">
                                    <h4><a class="font-per" href="#"><span>Pola Bilangan</span></a></h4>
                                    <div class="mega-button">
                                        <a href="#"><span>Menentukan Suku Selanjutnya</span></a>
                                        <a href="#"><span>Menentukan Pola ke-n</span></a>
                                    </div>
                                </div>
                                <div class="mega-catagory">
                                    <h4><a class="font-green" href="#"><span>Dimensi Tiga</span></a></h4>
                                    <div class="mega-button">
                                        <a href="#"><span>Jarak Titik ke Titik</span></a>
                                        <a href="#"><span>Jarak Titik ke Garis</span></a>
                                        <a href="#"><span>Jarak Titik ke Bidang</span></a>
                                        <a href="#"><span>Jarak Titik ke Bidang</span></a>
                                    </div>
                                </div>
                                <div class="mega-catagory mega-img">
                                    <img src="img/mega-1.jpg" alt="">
                                </div>
                            </div>
                       </li>
                        {{-- <li class="fc-green hav-sub"><img src="img/icon/menu-icon4.png" alt=""><a href="facilities.html">Teaching<i class="fa fa-angle-down" ></i></a>
                            <div class="mega-menu">
                                <div class="mega-catagory">
                                    <div class="mega-button">
                                        <a href="shortcode-header.html"><span>About</span></a>
                                        <a href="shortcode-testimonial.html"><span>Tips for using</span></a>
                                    </div>
                                </div>
                                <div class="mega-catagory">
                                    <div class="mega-button">
                                        <a href="shortcode-services-features.html"><span>Browse Activities</span></a>
                                        <a href="shortcode-newsletter.html"><span>Share Your Activities</span></a>
                                    </div>
                                </div>
                                <div class="mega-catagory">
                                    <div class="mega-button">
                                        <a href="shortcode-button.html"><span>My Activities</span></a>
                                        <a href="shortcode-call-to-action.html"><span>Virtual Workshop</span></a>
                                    </div>
                                </div>
                                <div class="mega-catagory">
                                    <div class="mega-button">
                                        <a href="shortcode-footer.html"><span>My Article</span></a>
                                        <a href="shortcode-wellcome.html"><span>My Books</span></a>
                                    </div>
                                </div>
                            </div>
                        </li> --}}
                       <li class="fc-per"><img src="img/icon/menu-icon5.png" alt=""><a href="{{ route('room') }}">Room</a></li>
                       <li class="fc-green hav-sub nv-disabled" style="{{ Auth::check()?'':'opacity: 50%' }}"><img src="img/icon/menu-icon4.png" alt=""><a class="disabled nv-disabled" href="{{ Auth::check()?route('akun'):'#' }}">My profile <i class="{{ Auth::check()?'':'fa fa-lock' }}"></i></a></li>
                       <li class="fc-sky hav-sub"><img src="img/icon/menu-icon7.png" alt=""><a href="contact.html">Contact us</a></li>
                    </ul>
               </div>
            </div>
            <!--Main menu end-->
            <div class="col-lg-3 col-xl-2">
                <div class="serch-wrapper float-right hide-sm">
                    {{-- <div class="search align-middle">
                        <input class="search-input" placeholder="Search" type="text">
                        <a href="javascript:void(0)"><i class="fa fa-search"></i></a>
                    </div> --}}
                    <div class="top-contact-btn align-middle">
                        @if (Auth::check())
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button class="kids-care-btn bg-sky" onclick="return confirm('are you sure?')" type="submit">Logout</button>
                        </form>
                        @else
                            <a href="{{ route('login') }}" class="kids-care-btn bg-sky">Login</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Main menu area end-->
