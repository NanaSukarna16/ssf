
<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>SEBI SOCIAL FUND</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{ asset('template_fe') }}/images/SSF.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('template_fe') }}/images/SSF.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('template_fe') }}/css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{ asset('template_fe') }}/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('template_fe') }}/css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('template_fe') }}/css/custom.css">
    <!-- Aos-->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .videoWrapper {
            position: relative;
            width: 100%;
            height: 0;
            padding-bottom: 56.25%;
        }
        .video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>

</head>

<body>
    <!-- Start Main Top -->
    <div class="main-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    {{-- <div class="custom-select-box">
                        <select id="basic" class="selectpicker show-tick form-control" data-placeholder="$ USD">
                            <option>¥ JPY</option>
                            <option>$ USD</option>
                            <option>€ EUR</option>
                        </select>
                    </div> --}}
                    {{-- <div class="right-phone-box">
                        <p>Call US :- <a href="#"> +11 900 800 100</a></p>
                    </div> --}}
                    <div class="our-link">
                        <ul>
                            <li><a href="#">Butuh Info? <i class="fas fa-phone-square"></i>  (0251) 861 6655</a></li>
                            <li><a href="#"><i class="fas fa-envelope"></i> ssf@sebi.ac.id</a></li>
                            {{-- <li><a href="#"><i class="fas fa-headset"></i> Contact Us</a></li> --}}
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="login-box">
                        <select id="basic" class="selectpicker show-tick form-control" onchange="location = this.value;" data-placeholder="Sign In">
                            <option >Register Here</option>
                            <option value="{{ route('login')}}"><a href="">Sign In</a> </option>
                        </select>
                    </div>
                    {{-- <div class="text-slid-box">
                        <div id="offer-box" class="carouselTicker">
                            <ul class="offer-box">
                                <li>
                                    <i class="fab fa-opencart"></i> We Care
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> We Share
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> We Aware
                                </li>
                            </ul>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Top -->

    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu"
                        aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="index.html"><img src="{{ asset('template_fe') }}/images/SSF.png" width="60%" class="logo" alt=""></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item"><a class="nav-link" href="{{ route('web')}}">Home</a></li>
                        {{-- <li class="nav-item"><a class="nav-link" href="{{ route('tentang')}}">Tentang Kami</a></li> --}}
                        <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                              Tentang Kami <i class="fa fa-angle-double-down"></i>
                            </a>  
                            <ul class="dropdown-menu">
                                @foreach ($tentang as $item)
                                    <li><a href="#">{{ $item->nama }}</a></li> 
                                @endforeach
                               
                                {{-- <li><a href="cart.html">Struktur Organisasi</a></li> --}}
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('program_web')}}">Program</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('donasi')}}">Donasi</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('berita')}}">Berita</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('halaman_download') }}">Download</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                {{-- <div class="attr-nav">
                    <ul>
                      <li class="nav-item"><a class="nav-link" href="contact-us.html">Berita</a></li>
                        <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                        <li class="side-menu">
                            <a href="#">
                                <i class="fa fa-shopping-bag"></i>
                                <span class="badge">3</span>
                                <p>Berita</p>
                            </a>
                        </li>
                    </ul>
                </div> --}}
                <!-- End Atribute Navigation -->
            </div>
            <!-- Start Side Menu -->
            <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                <li class="cart-box">
                    <ul class="cart-list">
                        <li>
                            <a href="#" class="photo"><img src="{{ asset('template_fe') }}/images/img-pro-01.jpg" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">Delica omtantur </a></h6>
                            <p>1x - <span class="price">$80.00</span></p>
                        </li>
                        <li>
                            <a href="#" class="photo"><img src="{{ asset('template_fe') }}/images/img-pro-02.jpg" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">Omnes ocurreret</a></h6>
                            <p>1x - <span class="price">$60.00</span></p>
                        </li>
                        <li>
                            <a href="#" class="photo"><img src="{{ asset('template_fe') }}/images/img-pro-03.jpg" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">Agam facilisis</a></h6>
                            <p>1x - <span class="price">$40.00</span></p>
                        </li>
                        <li class="total">
                            <a href="#" class="btn btn-default hvr-hover btn-cart">VIEW CART</a>
                            <span class="float-right"><strong>Total</strong>: $180.00</span>
                        </li>
                    </ul>
                </li>
            </div>
            <!-- End Side Menu -->
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->

    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->

    @yield('konten')
    
    <!-- Start Footer  -->
    <footer>
        <div class="footer-main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link-contact">
                            <h4>Peta Lokasi</h4>
                            <ul class="list-time">
                                {{-- <li>Monday - Friday: 08.00am to 05.00pm</li>
                                <li>Saturday: 10.00am to 08.00pm</li>
                                <li>Sunday: <span>Closed</span></li> --}}
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.866125435333!2d106.73039401413953!3d-6.411240164484039!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69e89a52e32555%3A0x10dd01ee40d29b15!2sSTEI%20SEBI!5e0!3m2!1sid!2sus!4v1640761949884!5m2!1sid!2sus" width="340" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        {{-- <div class="footer-top-box">
                            <h3>Newsletter</h3>
                            <form class="newsletter-box">
                                <div class="form-group">
                                    <input class="" type="email" name="Email" placeholder="Email Address*" />
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <button class="btn hvr-hover" type="submit">Submit</button>
                            </form>
                        </div> --}}
                        <div class="footer-link-contact">
                            <h4>Sosial Media</h4>
                        </div>
                        <div class="footer-top-box">
                            <p>Ikuti Kami Melalui :</p>
                            <ul>
                                <li><a href="https://www.facebook.com/sebisocialfund/" target="_blank"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="https://www.instagram.com/sebi_socfund/" target="_blank"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                                <li><a href="https://www.youtube.com/channel/UCVfXwRcVVfKoIMxzaPpW-mw/featured" target="_blank"><i class="fab fa-youtube" aria-hidden="true"></i></a></li>
                                {{-- <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li> --}}
                                {{-- <li><a href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a></li> --}}
                                {{-- <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li> --}}
                                <li><a href="https://api.whatsapp.com/send?phone=6282134972462."><i class="fab fa-whatsapp" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">                        
                        <div class="footer-link-contact">
                            <h4>Kontak Kami</h4>
                            <ul>
                                <li>
                                    <p><i class="fas fa-map-marker-alt"></i>Jl. Raya Bojongsari, Pondok Rangga,  <br>Kec. Sawangan, Kota Depok, Jawa<br>  Barat 16517</p>
                                </li>
                                <li>
                                    <p><i class="fab fa-whatsapp-square"></i>Whatsapp: <a>+62821-3497-2462</a></p>
                                </li>
                                <li>
                                    <p><i class="fas fa-phone-square"></i>Phone: <a href="tel:(0251) 8616655">
                                        (0251) 8616655</a></p>
                                </li>
                                <li>
                                    <p><i class="fas fa-envelope"></i>Email: <a
                                            href="mailto:ssf@sebi.ac.id">ssf@sebi.ac.id</a></p>
                                </li>
                              
                            </ul>
                        </div>
                       
                    </div>
                </div>
                {{-- <hr> --}}
                {{-- <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-widget">
                            <h4>About Freshshop</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link">
                            <h4>Information</h4>
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Customer Service</a></li>
                                <li><a href="#">Our Sitemap</a></li>
                                <li><a href="#">Terms &amp; Conditions</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Delivery Information</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link-contact">
                            <h4>Contact Us</h4>
                            <ul>
                                <li>
                                    <p><i class="fas fa-map-marker-alt"></i>Address: Michael I. Days 3756 <br>Preston
                                        Street Wichita,<br> KS 67213 </p>
                                </li>
                                <li>
                                    <p><i class="fas fa-phone-square"></i>Phone: <a href="tel:+1-888705770">+1-888 705
                                            770</a></p>
                                </li>
                                <li>
                                    <p><i class="fas fa-envelope"></i>Email: <a
                                            href="mailto:contactinfo@gmail.com">contactinfo@gmail.com</a></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </footer>
    <!-- End Footer  -->

    <!-- Start copyright  -->
    <div class="footer-copyright">
        <p class="footer-company">All Rights Reserved. &copy; 2022 <a href="#">Sebi Social Fund</a>
        </p>
    </div>
    <!-- End copyright  -->

    <a href="#" id="back-to-top" title="Back to top" style="display: none; background-color:darkorange;"><i class="fa fa-angle-double-up"></i> </a>

    <!-- ALL JS FILES -->
    <script src="{{ asset('template_fe') }}/js/jquery-3.2.1.min.js"></script>
    <script src="{{ asset('template_fe') }}/js/popper.min.js"></script>
    <script src="{{ asset('template_fe') }}/js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="{{ asset('template_fe') }}/js/jquery.superslides.min.js"></script>
    <script src="{{ asset('template_fe') }}/js/bootstrap-select.js"></script>
    <script src="{{ asset('template_fe') }}/js/inewsticker.js"></script>
    <script src="{{ asset('template_fe') }}/js/bootsnav.js."></script>
    <script src="{{ asset('template_fe') }}/js/images-loded.min.js"></script>
    <script src="{{ asset('template_fe') }}/js/isotope.min.js"></script>
    <script src="{{ asset('template_fe') }}/js/owl.carousel.min.js"></script>
    <script src="{{ asset('template_fe') }}/js/baguetteBox.min.js"></script>
    <script src="{{ asset('template_fe') }}/js/form-validator.min.js"></script>
    <script src="{{ asset('template_fe') }}/js/contact-form-script.js"></script>
    <script src="{{ asset('template_fe') }}/js/custom.js"></script>

     <!-- script Aos -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    @stack('js-popup')
</body>

</html>