
  <!DOCTYPE html>
  <html>

  <head>

    <meta charset="utf-8" />
    <link rel="stylesheet" href="/assets/css/3.3.7/bootstrap.min.css">
    <script src="/assets/js/3.1.1/jquery.min.js"></script>
    <script src="/assets/js/3.3.7/bootstrap.min.js"></script>
    <meta name="description" content="Store" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="uploads/Weblogo/Flash_Cart.ico" />
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/fc-elements.css">
    <script src="/assets/js/jquery.countdown.min.js"></script>
    <script src="/assets/js/fc-elements.js"></script>
    <link href="fonts/googlefonts.css" rel="stylesheet" />
    <script src="/assets/js/jquery.countdown.min.js"></script>
    <script type="text/javascript" src="/assets/js/fc-products.js"></script>
       <link rel="stylesheet" type="text/css" href="/assets/css/fc-main.css" />
    <style>
      body {
        font-style: Open Sans;
      }

    </style>

      <title>
        <?php echo $store['name']; ?>
      </title>
      <input type="text" class="hidden" id="storeID" value="<?php echo $store->id ?>" />
      <input type="text" class="hidden" id="storeUsername" value="<?php echo $store['store_username']; ?>" />
       <link rel="stylesheet" type="text/css" href="/assets/css/fc-main.css" />
      <script>
        $(document).ready(function() {
          var store = $("#storeID").val();
          $.ajax({
            url: 'user-style.php',
            method: 'POST',
            data: {
              "store": store
            },
            success: function(data) {
              var $cssStyles = $('<style/>');
              $cssStyles.attr('type', 'text/css');
              $cssStyles.html(data);
              $cssStyles.appendTo($('head'));
            }
          });
        });

      </script>
   @include('store.style')
  </head>

  <body>

  
    <div id="mainPanel">

      <div id="topPanel">
         <nav class="navbar navbar-inverse navbar-topnav">
         <a class="left-menu-opener navbar-brand" data-toggle="collapse" data-target="#left" ><i class="left-menu-opener fa fa-angle-double-down" aria-hidden="true"></i></a>
  <div class="container-fluid container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/{{$store->username}}">{{$store->name}}</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active" ><a href="#">Home</a></li>
        <li><a href="#">Page 1</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
      </div>



      <div id="leftPanel">

        <script>
          ! function($) {

            $(document).on("click", "#left ul.nav li.parent > a > span.expandable", function() {

              if($(this).find('i').hasClass("fa fa-caret-down"))
              {
                $(this).find('i').removeClass("fa fa-caret-down").addClass("fa fa-caret-up");
              }
              else if($(this).find('i').hasClass("fa fa-caret-up")) 
              {
                $(this).find('i').removeClass("fa fa-caret-up").addClass("fa fa-caret-down");
              }
            });

            // Open Le current menu
            //$("#left ul.nav li.parent.active > a > span.expandable").find('i').removeClass("fa fa-caret-up").addClass("fa fa-caret-down");
            $("#left ul.nav li.current").parents('ul.children').addClass("in");

          }(window.jQuery);

        </script>





        <div class="container" id="sideMenu">
          <div class="">
            <div id="left" class="span3 collapse in">
              <ul id="menu-group-1" class="nav menu">
                <li class="item-1 independent-menu deeper parent">
                  <a class="" href="/index.php">
                    <span data-toggle="collapse" data-parent="#menu-group-1" href="#sub-item-1" class="sign"><i class="fa fa-home"></i></span>
                    <span class="lbl">Home</span>
                  </a>
                </li>
                <li class="item-1 independent-menu deeper parent">
                  <a class="" href="/{{$store['username']}}">
                    <span data-toggle="collapse" data-parent="#menu-group-1" href="#sub-item-1" class="sign"><i class="fa fa-cart-plus"></i></span>
                    <span class="lbl"><?php echo $store['name']; ?></span>
                  </a>
                </li>

                <hr />
                <li class="item-1 categories-menu deeper parent active">
                  <a data-toggle="collapse" data-parent="#menu-group-1" href="#sub-item-2" href="">
                    <span data-toggle="collapse" data-parent="#menu-group-1" href="#sub-item-2" class="expandable sign"><i class="fa fa-caret-down"></i></span>
                    <span class="lbl">Categories</span>
                  </a>
                  <ul class="children nav-child unstyled small collapse in" id="sub-item-2">
                    <li class="item-1">
                      <a class="mc_click ajax_push  " link="/{{$store->username}}/products" id="0" href="<?php echo " /index.php?store=".$store['store_username']." &view=products "; ?>" >
                        <span class="lbl">All Products</span>
                      </a>
                    </li>
                  @foreach($store->categories as $cat)
                      <li class="item-1" id="cat_id{{$cat->id}}">
                        <a class="mc_click ajax_push " id="{{$cat->id}}" link="/{{$store->username}}/category/{{$cat->id}}" href="<?php echo "/index.php?store=".$store['store_username']."&view=products&category=".$cat['id'] ?>">
                          <span class="lbl">{{$cat->name}}</span>
                        </a>
                      </li>
                  @endforeach
                  </ul>
                </li>
               <hr />
                <li class="item-1 sales-menu deeper parent">

                  <a data-toggle="collapse" data-parent="#menu-group-1" href="#sub-item-3">
                    <span data-toggle="collapse" data-parent="#menu-group-1" href="#sub-item-3" class="expandable sign "><i class="fa fa-caret-down"></i></span>
                    <span class="lbl">Sales</span>
                  </a>
                  <ul class="children nav-child unstyled small collapse" id="sub-item-3">
                    <li class="item-1" id="0">
                      <a class="mc_click ajax_push" link="/{{$store->username}}/sales" href="<?php echo "/index.php?store=".$store['store_username']."&view=sales"; ?>" id="0">
                        <span class="lbl">All Sales</span>
                      </a>
                    </li>
                  @foreach($store->sales as $sale)
                      <li class="item-1" id="sale_id{{$sale->id}}">
                        <a class="mc_click" link="/{{$store->username}}/sales/{{$sale->id}}" href="<?php echo "/index.php?store=".$store['store_username']."&view=sales&sale=".$sales['sale_id']; ?>" id="<?php echo $sales['sale_id']; ?>">
                          <span class="lbl">{{ $sale['sale_name'] }}</span>
                        </a>
                      </li>
                  @endforeach
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </div>








      </div>























  <div id="rightPanel" class="">


       <div class="container store-contents">
            <div class="store-signature">
                <italic class="color-text">@ <?php echo $store['store_name']; ?></italic>
              </div>
            <div class="product_area wrapper">
              <p>Choose from side menu.</p>            
            </div>
          </div>




@yield('content')











                    </div>

               

  </body>

  </html>