<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Store List - FlashCart</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="uploads/Weblogo/Flash_Cart.ico" />
<!-- Place favicon.ico in the root directory -->

<!-- Google Fonts -->

<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Poppins:300,400,500,600,700" rel="stylesheet">  

<!-- all css here -->
<!-- bootstrap v3.3.6 css -->
<script type="text/javascript" src="/assets/js/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" href="/assets/css/bootstrap.min.css">
<!-- animate css -->
<link rel="stylesheet" href="/assets/css/animate.css">
<!-- jquery-ui.min css -->
<link rel="stylesheet" href="/assets/css/jquery-ui.min.css">
<!-- meanmenu css -->
<link rel="stylesheet" href="/assets/css/meanmenu.css">
<!-- owl.carousel css -->
<link rel="stylesheet" href="/assets/css/owl.carousel.css">
<!-- font-legant css -->
<link rel="stylesheet" href="/assets/css/legant.css">

<!-- nivo slider CSS -->
<link rel="stylesheet" href="/assets/custom-slider/css/preview.css" type="text/css" media="screen" />
<link rel="stylesheet" href="/assets/css/font-awesome.min.css">
<!-- style css -->
<link rel="stylesheet" href="/assets/css/style.css">
<link rel="stylesheet" href="/assets/css/main.css">
<!-- responsive css -->
<link rel="stylesheet" href="/assets/css/responsive.css">
<!-- modernizr css -->
<script src="/assets/js/vendor/modernizr-2.8.3.min.js"></script>


  <!--<script src="/assets/js/fc-autocomplete-js.js"></script>-->
</head>
<body>
<!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]--> 

<!-- Start Shop Page With Left Sidebar -->
<div class="shop-page-left-sidebar"> 
  <!-- Start Mian Header -->
  <header id="main-header" class="main-header"> 
    <!--Start Header Top -->
    <div class="header-top" style="background-color: white;">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-8"> 
            <!-- Header Top Left Text -->
            <div class="header-top-left padding15">
              <p class="fc_social">Follow Us @ <span><a class="fc_social" href="https:/www.facebook.com/flashcartofficial" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></span> &nbsp;<span><a class="fc_social" href="https:/www.twitter.com/flashcartofficial" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></span>&nbsp;<span><a class="fc_social" href="https:/www.instagram.com/flashcartofficial" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></span></p>
            </div>
          </div>
          <div class="col-md-6 col-sm-4"> 
            <!-- Header Top Right Menu -->
            <div class="header-top-right text-right">
              <ul>
                <li class="mobile-search"><a href="#"><i class="fa fa-search"></i></a>
                  <div class="search-box-area">
                    <form action="productlist.php" method="GET">
                      <input type="text" name="s" placeholder="Find your favourite products..." class="txt-fc" />
                    </form>
                  </div>
                </li>

                <li><a href="#"><i class="fa fa-user-o"></i></a>
                  <ul class="header-top-right-dropdown">
                    <li><a href="#">My Account</a></li>
                    @if(Auth::check()) <li><a href="/logout">Log Out</a></li>
                    @else              <li><a href="/login">Log In</a></li>
                    @endif  
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/End Header Top --> 
    <!-- Start Header Bottom -->
    <div class="header-bottom">
      <div class="container">
        <div class="row mega-menu-relative"> 
          <!-- Main Logo Area -->
          <div class="col-md-3 col-sm-12 hidden-xs">
            <div class="logo"> <a href="/"> <img class="img-responsive" src="/uploads/Weblogo/flashcart.png" alt="Flast Cart" width="100" height="100"> </a> </div>
          </div>
          <!-- Main Menu Area -->
          <div class="col-md-9 col-sm-12 hidden-xs">
            <nav class="main-menu-area">
              <ul class="text-right">
              <li><a href="/">Home</a></li>
              <li><a href="/storelist">Stores List</a></li>
              
              @if(Auth::check() && Auth::user()->stores)
                <li> <a href="/store/profile/dashboard">Profile</a></li>
                <li><a href="/store/products/list">My Products</a>
                    <ul class="main-dropdown-menu">
                        <li><a href="/store/products/add_p">Add Products</a></li>
                    </ul>
                </li>
                <li><a href="/store/sales/list">My Sales</a>
                    <ul class="main-dropdown-menu">
                        <li><a href="/store/sales/create">Create Sale</a></li>
                    </ul>
                </li>
                <li> <a href="/store/settings">Settings</a></li>
                
              @endif
                <li> <a href="/contact">Contact US</a></li>
              @if(Auth::check())
                <li> <a href="/logout">Logout</a> </li>
              @endif
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
    <!-- /End Header Bottom --> 
  </header>



  @yield('content')




    <!-- Start Main Footer Area -->
  <footer class="main-footer-area"> 
    <!-- Start Footer Top Area -->
    <div class="footer-top-area section-padding">
      <div class="container">
        <div class="row"> 
          <!-- Start Footer Top Single Widget -->
          <div class="col-md-3 col-sm-3">
            <div class="footer-top-single-widget"> 
              <!-- Widget Title -->
              <h2 class="footer-top-widget-title border-spacing"> Contact Us </h2>
              <div class="footer-top-contact">
                <ul class="contac-details">
                  <li> <i class=" icon_pin_alt"></i>
                    <div class="address"> 795 Folsom Ave, Suite 600<br>
                      San Francisco, CA 94107 </div>
                  </li>
                  <li> <i class="icon_mobile"></i>
                    <div class="mobile-no"> (+91)09876543210<br>
                      (+91)09876543210</div>
                  </li>
                  <li> <i class="icon_mail_alt "></i>
                    <div class="email"> Support@Fastshppoing.com</div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <!-- /End Footer Top Single Widget --> 
          <!-- Start Footer Top Single Widget -->
          <div class="col-md-3 col-sm-3">
            <div class="footer-top-single-widget"> 
              <!-- Widget Title -->
              <h2 class="footer-top-widget-title border-spacing"> Information </h2>
              <div class="footer-top-information">
                <ul class="footer-top-menu">
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Delivery Information</a></li>
                  <li><a href="#">Our Blog</a></li>
                  <li><a href="#">Privacy Policy</a></li>
                </ul>
              </div>
            </div>
          </div>
          <!-- /End Footer Top Single Widget --> 
          <!-- Start Footer Top Single Widget -->
          <div class="col-md-3 col-sm-3">
            <div class="footer-top-single-widget"> 
              <!-- Widget Title -->
              <h2 class="footer-top-widget-title border-spacing"> My Account </h2>
              <div class="footer-top-my-account">
                <ul class="footer-top-menu">
                  <li><a href="#">My Account</a></li>
                  <li><a href="#">Register / Login</a></li>
                  <li><a href="#">My Cart</a></li>
                  <li><a href="#">Wishlist</a></li>
                </ul>
              </div>
            </div>
          </div>
          <!-- /End Footer Top Single Widget --> 
          <!-- Start Footer Top Single Widget -->
          <div class="col-md-3 col-sm-3">
            <div class="footer-top-single-widget"> 
              <!-- Widget Title -->
              <h2 class="footer-top-widget-title border-spacing"> Newsletter </h2>
              <div class="footer-top-newsletter">
                <p>Sign Up for Our Newsletter!</p>
                <form action="#">
                  <input type="email" placeholder="Leave Your Email..." name="#" required>
                  <button class="submit-btn">Subscribe</button>
                </form>
              </div>
            </div>
          </div>
          <!-- /End Footer Top Single Widget --> 
        </div>
      </div>
    </div>
    <!-- /End Footer Top Area --> 
    <!-- Start Footer Bottom Area -->
    <div class="footer-bottom-area section-padding" style="background-color: white;">
      <div class="container">
        <div class="row"> 
          <!-- Copyright Text -->
          <div class="col-md-6 col-sm-6">
            <div class="copyright-text">
              <p style="color:black"> Copyright &copy; <a href="/" style="color: #ffad1f;"> FlashCart 2016</a>. All Rights Reserved. </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /End Footer Bottom Area --> 
  </footer>
  <!-- /End Main Footer Area --> 
</div>

                  <!-- Modal Subscription -->


<!-- /End Shop Page With Left Sidebar --> 


<!-- bootstrap js --> 
<script src="/assets/js/bootstrap.min.js"></script> 
<!-- owl.carousel js --> 
<script src="/assets/js/owl.carousel.min.js"></script> 
<!-- meanmenu js --> 
<script src="/assets/js/jquery.meanmenu.js"></script> 

<script src="/assets/js/wow.min.js"></script> 
<!-- Scroll To Top js --> 
<script src="/assets/js/jquery.scrollUp.js"></script> 

<script src="/assets/js/main.js"></script>

@yield('end_scripts')

</body>
</html>