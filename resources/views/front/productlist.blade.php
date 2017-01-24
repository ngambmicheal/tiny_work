@extends('layout.front')

@section('content')


<!-- Start Shop Page With Right Sidebar -->
<div class="shop-page-right-sidebar"> 
  <!-- Start Mian Header -->
  <header id="main-header" class="main-header"> 
    <!--Start Header Top -->
    <div class="header-top">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-8"> 
            <!-- Header Top Left Text -->
            <div class="header-top-left padding15">
              <p><span class="color-text">Follow FlashCart @ <span><a href="https:/www.facebook.com/flashcartofficial" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></span></p>
            </div>
          </div>
          <div class="col-md-6 col-sm-4"> 
            <!-- Header Top Right Menu -->
            <div class="header-top-right text-right">
              <ul>
                <li class="mobile-search"><a href="#"><i class="icon_search"></i></a>
                  <div class="search-box-area">
                    <form action="productlist.php" method="GET">
                      <input type="text" name="s" placeholder="Find your favourite products..." class="txt-fc" value="<?php if(isset($_GET['s'])){echo $_GET['s'];}?>">
                    </form>
                  </div>
                </li>
              
                <li><a href="#"><i class="icon_profile"></i></a>
                  <ul class="header-top-right-dropdown">
                    <li><a href="login.php">Log In / Register</a></li>
                    <li><a href="#">My Account</a></li>
                    <li><a href="#">My Cart</a></li>
                  </ul>
                </li>
                <li><a href="#"><i class="icon_cart_alt"></i><span>3</span></a>
                  <div class="top-cart-area">
                    <div class="top-cart-products"> 
                      <!-- Header Top Right Cart Menu Single Product -->
                      <div class="single-top-cart-product"> <a class="single-top-cart-product-img" href="#"> <img src="https://placehold.it/70x70" alt=""> </a>
                        <h3 class="top-cart-pro-title"> <a href="#">All Mobiles</a> <span>2 X $63</span> </h3>
                        <span class="remove-btn"> <a href="#" data-toggle="tooltip" data-placement="auto" title="Delete"> <i class="icon_close"></i> </a> </span> </div>
                  
                    </div>
                    <div class="subtotal-area">
                      <p>Subtotal: <span>$723</span></p>
                    </div>
                    <div class="checkout-area"> <a href="#">Checkout<i class="fa fa-arrow-right"></i></a> </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/End Header Top --> 
    <!-- Start Header Bottom -->

  </header>
  <!-- /End Mian Header --> 
  <!-- Start Breadcrumb Area-->
  <div class="breadcrumb-area">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12">
          <div class="breadcrumb-container">
            <ol class="breadcrumb">
              <li><a href="/">Home</a></li>
              <li><a href="/productlist">Product List</a></li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /End Breadcrumb Area--> 

  <!-- Start Shop Area -->
  <div class="main-products-area">
    <div class="container">
      <div class="row"> 
        <!-- Start Producs Area -->
        <div class="col-md-9 col-sm-8"> 
          <!-- Start Products Top Toolbar -->
          <div class="row">
            <div class="col-md-12 col-sm-12">
              
                
                <div class="fillter-short pull-left">
                  <div class="shot-by clearfix">
                    <form action="" method="GET">
                      Search Product: <input type="text" name="s" placeholder="Enter product name" value="<?php if(isset($_GET['s'])){echo $_GET['s'];}?>" />
                    </form>
                    <br />
                  </div>
                </div>
 
            </div>
          </div>
          <!-- /End Products Top Toolbar --> 
          <!-- Start Products List -->
          <div class="row">
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active fade in" id="grid-default">
                <div class="product-grid-without-sidebar"> 
                  <div class="col-md-12 col-sm-12">

                  @foreach($products as $product)

             @if($product->store_details && $product->price)

                    <div class="single-list-product">
                      <div class="row">
                        <div class="col-md-4 col-sm-4">
                          <div class="product-thumbnail"> 
                            <a href="<?php echo "/".$product['store_details']['username']."&s=".$product['name']; ?>"> 
                              <img src="<?php echo Helper::image_check($product['img']); ?>" alt="<?php echo $product['name']; ?>" class="front-img"> 
                              <img src="<?php echo Helper::image_check($product['image2']); ?>" alt="<?php echo $product['name']; ?>" class="back-img"> 
                              <span class="product-quick-view"> 
                                <span class="product-quick-view-table"> 
                                  <span class="product-quick-view-table-cell"> 
                                    <i class="pe-7s-look"></i> 
                                  </span> 
                                </span> 
                              </span> 
                            </a> 
                          </div>
                        </div>
                        <div class="col-md-8 col-sm-8">
                          <div class="product-details">
                            <h2 class="product-name"> <a href="<?php echo "/".$product['store_details']['username']."&view=single&product=".$product['id']; ?>"><?php echo $product['name']; ?></a> </h2>
                            <div>
                              <p>Store @ <a href="<?php echo "..//".$product['store_details']['username']; ?>"><?php echo $product['store_details']['name']; ?></a></p>
                            </div>
                            <div class="product-price-area">
                              <p class="product-price"> 
                              <?php if(isset($product['discount_price']) || $product['discount_price']!=0){echo "<span class='before-after'>Before: </span>";}?>
                              <span class="product-price"><?php echo "Rs. ".number_format($product['price'],2); ?> </span> 
                              <?php 
                              if(isset($product['discout']) || $product['discount_price']!=0){echo "<span class='before-after'>After: </span>";}?><?php if(isset($product['discout']) || $product['discount_price']!=0)
                              { 
                                echo "Rs. ".Helper::discount_price($product['discount_price'],$product['price']);
                              } 
                              ?>
                              </p>
                            </div>
                            <p class="product-details-content"><?php echo $product['desc']; ?></p>
                            <div > 
                              <a id="Buy" class="btn-fc" href="<?php echo "/product?product=".$product['id']; ?>">Buy Now (not working) </a>
                              <a id="Add" href="#" class="btn-fc">Add to Cart</a> 
                              <a id="Visit" href="<?php echo "/".$product['store_details']['username'] ?>" class="btn-fc"> Visit Shop </a> 
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                  @endif
             	@endforeach

 


                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /End Products List --> 
          <!-- Start Pagination Area -->
          <div class="row">
            <div class="col-md-12 col-sm-12">
              <nav class="pagination-container">
                <ul class="pagination-nav">
                  <li class="disabled"> <a href="#" aria-label="Previous"> <span aria-hidden="true"> <i class="fa fa-angle-double-left"></i> Previous </span> </a> </li>
                  <li class="active"><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li><a href="#">6</a></li>
                  <li><a href="#">...</a></li>
                  <li><a href="#">13</a></li>
                  <li> <a href="#" aria-label="Next"> <span aria-hidden="true"> Next<i class="fa fa-angle-double-right"></i> </span> </a> </li>
                </ul>
              </nav>
            </div>
          </div>
          <!-- /End Pagination Area --> 
        </div>
        <!-- /End Products Area --> 
        <!-- Start Products Sidebar -->
        <div class="col-md-3 col-sm-4">
          <div class="sidebar-area"> 
            <!-- Category Menu -->



            <!-- Sidebar add -->

          </div>
        </div>
        <!-- /End Products Sidebar --> 
      </div>
    </div>
  </div>

@stop