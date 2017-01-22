<html class="no-js" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title><?php echo $store['store_name']; ?> - Employment Form</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="/assets/uploads/Weblogo/Flash_Cart.ico" />
<!-- Place favicon.ico in the root directory -->

<!-- Google Fonts -->

<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Poppins:300,400,500,600,700" rel="stylesheet">  

<!-- all css here -->
<!-- bootstrap v3.3.6 css -->
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
<script type="text/JavaScript" src="/assets/js/sha512.js"></script> 
<script type="text/JavaScript" src="/assets/js/forms.js"></script>

<!-- style css -->
<link rel="stylesheet" href="/assets/css/font-awesome.min.css">
<link rel="stylesheet" href="/assets/css/style.css">
<link rel="stylesheet" href="/assets/css/main.css">
<!-- responsive css -->
<link rel="stylesheet" href="/assets/css/responsive.css">
<!-- modernizr css -->
<script src="/assets/js/vendor/modernizr-2.8.3.min.js"></script>
<script type="text/javascript" src="/assets/js/1.12.4/jquery.min.js"></script>
<title><?php echo $store['store_name']; ?></title>
<input type="text" class="hidden" id="storeID" value="<?php echo $store->id ?>" />

    @include('store.style')
</head>
<body>
<!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]--> 

<!-- Start Single Product Details Page One -->
<div class="single-product-deatils-1"> 
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
                  @else <li><a href="/login">Log In</a></li>
                  @endif 
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Start Header Bottom -->
    <link rel="stylesheet" type="text/css" href="/assets/css/fc-logo-setting" />
       <div class="header-bottom">
      <div class="container">
        <div class="mega-menu-relative"> 
          <!-- Main Logo Area -->
          <div class="divLogo">
            <div class="logo"> <a href="<?php "http:flashcart.com.pk?store=".$store['username']; ?>"> <img width="100" height="100" class="img-logo img-responsive" src="{{$store['logo']}}"/> </a></div>
          </div>
          <!-- Main Menu Area -->

           <div id="name-tag">
            <div id="store-name"><a href="<?php echo "/assets/index.php?store=".$store['store_username']; ?>"><h2 class="title"><span class="color-text"><?php echo $store['store_name']; ?></span></h2></a></div>
            <div id="store-tagline"><italic><?php echo $store['store_tagline']; ?></italic></div>       
          </div>
        </div>
      </div>
    </div>
    <!-- /End



<!--  -->

@yield('content')



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
                <li>
                    <div class="address"> <?php echo trim($store['store_location']); ?> </div>
                  </li>
                  <li>
                    <div class="mobile-no"> <?php echo $store['phone']; ?><br>
                      <?php echo $store['mobile']; ?></div>
                  </li>
                  <li>
                    <div class="email"> <?php echo $store['store_email']; ?></div>
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
                  <li><a href="/storelist/store/{{$store->username}}/about">About Us</a></li>
                  <li><a href="/storelist/store/{{$store->username}}/contact">Contact Us</a></li>
                  <li><a href="/storelist/store/{{$store->username}}/employee">Employees</a></li>
                  <li><a href="/storelist/store/{{$store->username}}/policy">Policies</a></li>
                </ul>
              </div>
            </div>
          </div>
          <!-- /End Footer Top Single Widget --> 
          <!-- Start Footer Top Single Widget -->
          <div class="col-md-3 col-sm-3">
            <div class="footer-top-single-widget"> 
              <!-- Widget Title -->
              <h2 class="footer-top-widget-title border-spacing"> Navigation </h2>
              <div class="footer-top-information">
                <ul class="footer-top-menu">
                  <li><a  href="/storelist/store/{{$store->username}}/policy"><?php echo $store['name']; ?></a></li>
                  <li><a href="/storelist/store/{{$store->username}}/products">All Products</a></li>
                  <li><a  href="/storelist/store/{{$store->username}}/sales">All Sales</a></li>
                  <li><a href="/storelist/store/{{$store->username}}/policy">Policies</a></li>
                </ul>
              </div>
            </div>
          </div>

          <script>
            $(document).ready(function()
            {
              $("#subsc_form2").submit(function(e)
              {
                e.preventDefault();
                $.ajax(
                {
                  url:'/assets/scripts/store_subsc.php',
                  method: 'POST',
                  data: $("#subsc_form2").serialize(),
                  success: function(d)
                  {
                    console.log(d);
                    
                  }
                });
                $("#subsc_form2").fadeOut('800', function()
                {
                  $(this)[0].reset();
                }).fadeIn();
              });
            });
          </script>
          <div class="col-md-3 col-sm-3">
            <div class="footer-top-single-widget"> 
              <!-- Widget Title -->
              <h2 class="footer-top-widget-title border-spacing"> Get Alerts </h2>
              <div class="footer-top-newsletter">
                <form action="" method="POST" id="subsc_form2">
                  <input type="text" name="subsc_store" class="hidden" value="{{$store->id}}" />
                  <div class="form-group"><input type="text" class="txt-fc " placeholder="Enter Your name" name="subsc_name" required /></div>
                  <input type="text" class="txt-fc" placeholder="Enter Your Email" name="subsc_email" required />
                  <div class="form-group" style="width: 81%;"><input class="hidden" value="Subscribe" type="submit" name="submit" /></div>
                </form>
              </div>
            </div>
          </div>
          <!-- /End Footer Top Single Widget --> 
        </div>
      </div>
    </div>


    <script src="/assets/js/vendor/jquery-1.12.0.min.js"></script> 
<!-- bootstrap js --> 
<script src="/assets/js/bootstrap.min.js"></script> 

<script src="/assets/js/jquery.meanmenu.js"></script> 

<script src="/assets/js/wow.min.js"></script> 