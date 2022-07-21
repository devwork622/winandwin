<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Win&amp;Win @yield('title')</title>
  <!-- site favicon -->
  <link rel="shortcut icon" type="image/png" href="assets/images/favicon.jpg">
  <!-- fontawesome css link -->
  <link rel="stylesheet" href="{{url('assets/css/fontawesome.min.css')}}">
  <!-- bootstrap css link -->
  <link rel="stylesheet" href="{{url('assets/css/bootstrap.min.css')}}">
  <!-- animate css link -->
  <link rel="stylesheet" href="{{url('assets/css/animate.css')}}">
  <!-- lightcase css link -->
  <link rel="stylesheet" href="{{url('assets/css/lightcase.css')}}">
  <!-- slick css link -->
  <link rel="stylesheet" href="{{url('assets/css/slick.css')}}">
  <!-- swiper css link -->
  <link rel="stylesheet" href="{{url('assets/css/swiper.min.css')}}">
  <!-- flipclock css link -->
  <link rel="stylesheet" href="{{url('assets/css/flipclock.css')}}">
  <!-- jqvmap css link -->
  <link rel="stylesheet" href="{{url('assets/css/jqvmap.min.css')}}">
  <link rel="stylesheet" href="{{url('assets/css/jquery-ui.css')}}">
  <!-- main style css link -->
  <link rel="stylesheet" href="{{url('assets/css/style.css?t='.strtotime(now()))}}">
  <link rel="stylesheet" href="{{url('assets/css/custom.css?t='.strtotime(now()))}}">
  <!-- responsive css link -->
  <link rel="stylesheet" href="{{url('assets/css/responsive.css')}}">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{url('assets/css/slider.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  @stack('css')
  <style>
  .breadcrumb{
	  background:transparent !important;
  }
  </style>
  <style>
.cart-section h4{
    margin:15px 0px;
}
.cart-section p{
    padding:5px 15px;
}
.cart-section ul{
    list-style: disc;
    padding-left:30px;
}
</style>
</head>

<body>

  <!-- preloader start -->
  <div id="preloader"></div>
  <!-- preloader end -->


  <div class="main-light-version">
    <!--  header-section start  -->
    <header class="header-section">
      
      <div class="header-bottom">
        <div class="container">
          <nav class="navbar navbar-expand-xl">
            <a class="site-logo site-title" href="{{ url('/') }}"><img src="{{url('new_logo.png')}}" alt="site-logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="menu-toggle"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              @if(!empty(auth()->user()))
              <ul class="navbar-nav main-menu ml-auto">
                <li><a href="{{ url('admin/') }}">Home</a></li>
                <li><a href="{{ url('admin/users') }}">Users</a></li>
                
                
              </ul>
              
              <div class="header-join-part">
                <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="cmn-btn">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        @csrf
                  </form>
              </div>
              @endif
            </div>
          </nav>
        </div>
      </div><!-- header-bottom end -->
    </header>
    <!--  header-section end  -->
    <!--login registration Modal -->
    

    <!-- banner-section start -->
    @yield('content')

    <!-- footer-section start -->
    <footer class="footer-section">
      <div class="footer-top border-top border-bottom has_bg_image" data-background="{{url('assets/images/bg-four.jpg')}}">
        <div class="footer-top-first">
          <div class="container">
            <div class="row">
              <div class="col-lg-6 col-md-5 col-sm-4 text-center text-sm-left">
                <a href="{{ url('/') }}" class="site-logo"><img src="{{ url('new_logo.png') }}" alt="logo"></a>
              </div>
              <div class="col-lg-6 col-md-7 col-sm-8">
                
              </div>
            </div>
          </div>
        </div>
        <div class="footer-top-second">
          <div class="container">
            <div class="row justify-content-between">
              <div class="col-xl-2 col-lg-3 col-md-3 col-sm-6">
                <div class="footer-widget widget-about">
                  <h3 class="widget-title">About WIN&WIN</h3>
                  <ul class="footer-list-menu">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('buy-now') }}">Buy Now</a></li>
                    <li><a href="{{ url('winners') }}">Winners</a></li>
                    <li><a href="#0">About Us</a></li>
                    <li><a href="#0">News</a></li>
                    <li><a href="{{ url('faq') }}">FAQs</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-xl-2 col-lg-3 col-md-3 col-sm-6">
                <div class="footer-widget widget-links">
                  <h3 class="widget-title">Quick links</h3>
                  <ul class="footer-list-menu">
                    <li><a href="{{ url('privacy-policy') }}">Privacy Policy</a></li>
                    <li><a href="{{ url('legal') }}">Legal</a></li>
                    <li><a href="{{ url('game-rules') }}">Game Rules</a></li>
                    <li><a href="{{ url('terms-and-conditions') }}">Terms And Conditions</a></li>
                    <li><a href="{{ url('participate-responsibly') }}">Participate Responsibly</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="footer-widget widget-subscribe">
                  <h3 class="widget-title">email newsletters</h3>
                  <div class="subscribe-part">
                    <p>Subscribe now and receive weekly newsletter for latest draw and offer news and much more!</p>
                    <form class="subscribe-form">
                      <input type="email" name="subs_email" id="subs_email" placeholder="Email address">
                      <input type="submit" value="subscribe">
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-bottom">
        <div class="container">
          <div class="row justify-content-between align-items-center">
            <div class="col-lg-6 col-sm-7">
              <div class="copy-right-text">
                <p>© <?= date('Y') ?> <a href="#">Win&Win</a> - All Rights Reserved.</p>
              </div>
            </div>
            <div class="col-lg-6 col-sm-5">
              <ul class="footer-social-links d-flex justify-content-end">
                <li><a href="#0"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#0"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#0"><i class="fa fa-instagram"></i></a></li>
                <li><a href="#0"><i class="fa fa-youtube"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- footer-section end -->

  </div>

  <!-- scroll-to-top start -->
  <div class="scroll-to-top">
    <span class="scroll-icon">
      <i class="fa fa-angle-up"></i>
    </span>
  </div>
  <!-- scroll-to-top end -->

  <!-- jquery library js file -->
  <script src="{{url('assets/js/jquery-3.3.1.min.js')}}"></script>
  <!-- bootstrap js file -->
  <script src="{{url('assets/js/bootstrap.min.js')}}"></script>
  <!-- flipclock js file -->
  <script src="{{url('assets/js/flipclock.min.js')}}"></script>
  <!-- countdown js file -->
  <script src="{{url('assets/js/jquery.countdown.min.js')}}"></script>
  <!-- slick js file -->
  <script src="{{url('assets/js/slick.min.js')}}"></script>
  <!-- swiper js file -->
  <script src="{{url('assets/js/swiper.min.js')}}"></script>
  <!-- lightcase js file -->
  <script src="{{url('assets/js/lightcase.js')}}"></script>
  <!-- wow js file -->
  <script src="{{url('assets/js/wow.min.js')}}"></script>
  <!-- vamp js files -->
  <script src="{{url('assets/js/jquery.vmap.min.js')}}"></script>
  <script src="{{url('assets/js/jquery.vmap.world.js')}}"></script>
  <script src="{{url('assets/js/jquery-ui.js')}}"></script>
  <!-- main script js file -->
  <script src="{{url('assets/js/main.js')}}"></script>
  
  <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/gsap-latest-beta.min.js"></script>
  <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/CSSRulePlugin3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.3.2/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.3.2/CSSRulePlugin.min.js"></script> 
  <script src="assets/js/slider.js"></script>-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    var currentDate = new Date();
	var futureDate = new Date(2022, 06, 19, 21, 0, 0);
	var diff = futureDate.getTime() / 1000 - currentDate.getTime() / 1000;
    var clock = $('.clock').FlipClock(diff, {
      clockFace: 'DailyCounter',
      countdown: true
    });
    jQuery(document).ready(function () {
      jQuery('#vmap').vectorMap({
        map: 'world_en',
        color: '#eaedef',
        backgroundColor: '#f7fcff',
        hoverOpacity: 0.8,
        selectedColor: '#eaedef',
        scaleColors: ['#f7fcff', '#f7fcff'],
        normalizeFunction: 'polynomial'
      });
    });
  </script>
  @stack('js')
</body>

</html>