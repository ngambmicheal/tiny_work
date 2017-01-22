@extends('layout.front')

@section('content')

<div class="breadcrumb-area">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12">
          <div class="breadcrumb-container">
            <ol class="breadcrumb">
              <li><a href="/index">Home</a></li>
              <li><a href="/storelist">Stores</a></li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /End Breadcrumb Area--> 
<style>
  #category-menu ul
  {
    height: 200px;
  }
</style>
          <
  <!-- Start Shop Area -->
  <div class="main-products-area">
    <div class="container">
      <div class="row"> 
        <!-- Start Products Sidebar -->
        <div class="col-md-3 col-sm-4">
          <div class="sidebar-area"> 
            <!-- Category Menu -->
            <div class="products-category">
              <h2 class="sidebar-title padding15">Category</h2>
              <div id="category-menu">
                <ul>
                	@foreach(Helper::get_categories() as $category)
                  <li><a href="/storelist/category/{{$category->id}}">{{$category->name}}</a></li>  
                  	@endforeach       
                </ul>
              </div>
              <br />
              <h2 class="sidebar-title padding15">Mode Filters</h2>
              <form action="" method="GET">
                <input type="checkbox" name="employ" onChange="this.form.submit()" <?php if(isset($_GET['employ'])){ echo "checked";} ?> /> Open to Employ
              </form>
              <br />
              <h2 class="sidebar-title padding15">By City</h2>
              <form action="storelist.php" method="GET">
          <input type="text" class="hidden" name="type" value="city">
          <input type="text" name="s" id="autoCity" class="autoText txt-fc ">
          <input type="submit" class="hidden" name="submit">
        </form>
              <br />
              <h2 class="sidebar-title padding15">By Area</h2>
              <form action="storelist.php" method="GET">
          <input type="text" class="hidden" name="type" value="area">
          <input type="text" name="s" id="autoArea" class="autoText txt-fc">
          <input type="submit" class="hidden" name="submit">
        </form>
            </div>
            <!-- Shop Filltering Options -->
   
            <!-- Sidebar add -->
          </div>
        </div>
        <!-- /End Products Sidebar --> 
        <!-- Start Producs Area -->
        <?php 



        ?>
        <div class="col-md-9 col-sm-8"> 
          <!-- Start Products Top Toolbar -->
          <div class="row">
            <div class="col-md-12 col-sm-12">
              <div class="toolbar-extra-padding products-area-top-toolbar responsive-toolbar clearfix">
                
                <div>
                  <div class="products-per-page clearfix">
                    <form action="" method="GET">
                    <div>
                    <span><select name="filter" class="txt-fc">
                        <option value="name">By Name</option>
                        <option value="email">By Email</option>
                        <option value="username">By Username</option>               
                      </select></span>
                      <span>
                      <input name="s" class="txt-fc" id="autoName" type="text" placeholder="Search by Store Name or Store Username or Store Email" value="<?php if(isset($_GET['s'])){echo $_GET['s'];} ?>" />
                      </span>
                      
                      
                    </div>  
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /End Products Top Toolbar --> 
          <!-- Start Products List -->
          <style>
          </style>

 

          <div class="row">
            
                <div class="product-grid-without-sidebar"> 

                  <!-- Start Single Product -->
                @foreach($stores as $store)
                     <div class="single-list-product" style=" height: 305px;">
                      <div class="row" >
                        <div class="col-md-4 col-sm-4">
                          <div class="product-thumbnail" style="margin-top:10%; height: 250px;"> 
                            <a href="<?php echo "/store/employment.php?view=account&store=".$store['store_id'];?>"> 
                              <img src="<?php echo "/uploads/store/logo/".$store['logo'];?>" alt="" style="" width="250" height="250" class="front-img">
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
                            <h2 class="product-name"> <a href="/storelist/store/{{$store->username}}">{{$store->name}}</a> </h2> 
                            <p>{{$store['tagline']}}</p>
                            <div class="reviews">
                              <ul class="reviews-star">
                                <li class="star-active"> <a href="#"> <i class="icon_star"></i> </a> </li>
                              </ul>
                              <a href="#" class="subscribe_form" id="<?php echo $store['id']; ?>">Subscribe</a>
                              <div class="subcription" id="<?php echo "sub_form".$store['id']; ?>">
                                <form action="" method="POST" id="<?php echo "sub_form_".$store['id']; ?>">
                                  <input type="text" class="hidden txt-fc" name="subsc_store" value="<?php echo $store['store_id']; ?>">
                                  <input type="text" class="txt-fc" name="subsc_name" id="subsc_name" placeholder="Name">
                                  <input type="text" class="txt-fc" name="subsc_email" id="subsc_email" placeholder="Email" required>
                                </form>
                              </div>                             
                            </div>
                            
                              
                              <script>
                              $(document).ready(function(){
                                $(".show-store-det").click(function(e)
                                {
                                  e.preventDefault();
                                  $('[data-toggle="popover"]').popover({placement:'bottom'});
                                })
       
                              });
                              </script>
                            
                            @if($store['employment']==1)
                              <p class="product-details-content"><?php echo $store['wage_message']; ?></p>
                              <a class="btn-fc"  href="/storelist/store/{{$store->username}}/employment"> Apply! </a> 
                              &nbsp;<a href="#" class="show-store-det" id="<?php echo $store['id']; ?>" data-toggle="popover" title="Salary" data-content="<?php echo "Rs. ".$store['min_wage']." - "."Rs. ".$store['max_wage']; ?>">Employment Salary</a>
                              
                              @endif
                          <a href="/storelist/store/{{$store->username}}">Visit Store </a> 
                          </div>
                        </div>
                      </div>
                    </div>
                @endforeach





                  <!-- End Single Product --> 
   

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
      </div>
    </div>
  </div>
  <!-- /End Shop Area --> 
  <!-- Start Brand Logos Area -->
  <div class="brand-logos-area section-padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="brand-logos-carousel"> 
            <!-- Start Single Logo -->
            <div class="col-md-12">
              <div class="single-logo"> <img src="https://placehold.it/130x90" alt=""> </div>
            </div>
            <!-- /End Single Logo --> 
            <!-- Start Single Logo -->
            <div class="col-md-12">
              <div class="single-logo"> <img src="https://placehold.it/130x90" alt=""> </div>
            </div>
            <!-- /End Single Logo --> 
            <!-- Start Single Logo -->
            <div class="col-md-12">
              <div class="single-logo"> <img src="https://placehold.it/130x90" alt=""> </div>
            </div>
            <!-- /End Single Logo --> 
            <!-- Start Single Logo -->
            <div class="col-md-12">
              <div class="single-logo"> <img src="https://placehold.it/130x90" alt=""> </div>
            </div>
            <!-- /End Single Logo --> 
            <!-- Start Single Logo -->
            <div class="col-md-12">
              <div class="single-logo"> <img src="https://placehold.it/130x90" alt=""> </div>
            </div>
            <!-- /End Single Logo --> 
            <!-- Start Single Logo -->
            <div class="col-md-12">
              <div class="single-logo"> <img src="https://placehold.it/130x90" alt=""> </div>
            </div>
            <!-- /End Single Logo --> 
            <!-- Start Single Logo -->
            <div class="col-md-12">
              <div class="single-logo"> <img src="img/brand/7.jpg" alt=""> </div>
            </div>
            <!-- /End Single Logo --> 
            <!-- Start Single Logo -->
            <div class="col-md-12">
              <div class="single-logo"> <img src="img/brand/8.jpg" alt=""> </div>
            </div>
            <!-- /End Single Logo --> 
            <!-- Start Single Logo -->
            <div class="col-md-12">
              <div class="single-logo"> <img src="img/brand/9.jpg" alt=""> </div>
            </div>
            <!-- /End Single Logo --> 
          </div>
        </div>
      </div>
    </div>
  </div>
@stop


@section('end_scripts')
	 <script src="js/jquery-ui.js"></script>
          <script>
            $(document).ready(function()
            {
              $(".subcription").hide();
              
              $(".subscribe_form").click(function(e)
              {
                e.preventDefault();
                 var id = $(this).attr('id');
                $("#sub_form"+id).toggle();
                $("#sub_form_"+id).on('keypress', function (e) 
                {
                  if(e.which === 13)
                  {
                    $.ajax(
                    {
                      url: '/scripts/store_subsc.php',
                      method: 'POST',
                      data: $(this).serialize(),
                      success: function(d)
                      {
                        console.log(d);
                      }
                    });
                    $("#sub_form"+id).hide();
                  }
                });
              });
            });
          </script>
          <script>
            $(document).ready(function()
            {
              $('#autoCity').autocomplete(
              {
                source: "scripts/search_store_by_city.php",
                minLength: 2,
                focus: function( event, ui ) {
                $( "#autoCity" ).val( ui.item.label );
                return false;
              },
              select: function( event, ui ) {
              $( "#autoCity" ).val( ui.item.label );
              return false;
              }
            });
        $('#autoArea').autocomplete(
        {
            source: "scripts/search_store_by_area.php",
            minLength: 2,
            autoFocus: true,
            focus: function( event, ui ) {
              $( "#autoArea" ).val( ui.item.label );
              return false;
            },
            select: function( event, ui ) {
              $( "#autoArea" ).val( ui.item.label );
              return false;
            }
        })    
        .autocomplete("instance")._renderItem = function(ul, item) 
        {
          return $("<li>")
          .append("<div>" + item.label + "<br>" + item.city + "</div>")
          .appendTo(ul);
        };
        $('#autoName').autocomplete(
        {
            source: "scripts/search_store_by_name.php",
            minLength: 2,
            autoFocus: true,
            focus: function( event, ui ) {
              $( "#autoName" ).val( ui.item.label );
              return false;
            },
            select: function( event, ui ) {
              $( "#autoName" ).val( ui.item.label );
              return false;
            }
        })    
        .autocomplete("instance")._renderItem = function(ul, item) 
        {
          return $("<li>")
          .append("<div>" + item.label + "<br>" + item.area + "," + item.city + "</div>")
          .appendTo(ul);
        };
    });
          </script>
@stop