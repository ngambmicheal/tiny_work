@extends('layout.front')

@section('content')

    <script>
      (function($) {
        var element = $('.follow-scroll'),
          originalY = element.offset().top;

        // Space between element and top of screen (when scrolling)
        var topMargin = 20;

        // Should probably be set in CSS; but here just for emphasis
        element.css('position', 'relative');

        $(window).on('scroll', function(event) {
          var scrollTop = $(window).scrollTop();

          element.stop(false, false).animate({
            top: scrollTop < originalY ? 0 : scrollTop - originalY + topMargin
          }, 300);
        });
      })(jQuery);

    </script>
    <script>
      /*$(document).ready(function()
          {
              $('#productTable').DataTable();
          });*/
      $(document).ready(function() {
        //$('.btnCategory').on('click', function()
        //{
        //var id = $(this).attr('name');
        //alert("http://localhost:9999/store/product/manageproducts.php?category_id="+id);
        //window.location.replace("http://localhost:9999/store/products/manageproducts.php?category_id="+id);
        /*$.ajax({
            method: "GET",
            data: {category_id: id}, 
             success: function (data) 
             { 
                //$('#divTransactional').remove();
                $('#divTransactional').append(data); 
             },
        dataType: 'html',
            error: function(err) {
                console.error('An error occurred : ' + err);
            }
        });*/
        //});
        /*$('.pview').on('click', function()
    {
        var pid= $(this).attr('id');
        $.ajax({
     url: "http://localhost:9999/store/products/manageproducts.php?productid="+pid+"&view=edit",
     method: 'GET'
   });
   event.preventDefault();
        //var pid= $(this).attr('id');
        //window.location.replace("http://localhost:9999/store/products/manageproducts.php?productid="+pid+"&view=edit");
    });*/
        $("#formProduct").submit(function(event) {

          //disable the default form submission
          event.preventDefault();
          //grab all form data  
          var formData = new FormData($(this)[0]);

          $.ajax({
            url: '../../scripts/product_up.php',
            type: 'POST',
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function() {
              //alert('Form Submitted!');
            },
            error: function() {
              //alert("error in ajax form submission");
            }
          });

          return false;
        });
      });

    </script>
    <script>
      /*$(document).ready(function()
      {
          $('#productTable tbody td.product').on('click', function() {
          var $this = $(this);
          var $input = $('<input>', {
              value: $this.text(),
              type: 'text',
              blur: function() {
                 $this.text(this.value);
              },
              keyup: function(e) 
              {
                 if (e.which === 13)
                 {
                  
                 }
              }
          }).appendTo( $this.empty() ).focus();
      });

      });*/

    </script>
  </head>

  

      <div class="breadcrumb-area">
        <div class="container">
          <div class="store">
            <div class="col-md-12 col-sm-12">
              <div class="breadcrumb-container">
                <ol class="breadcrumb">
                  <li><a href="/index.php">Home</a></li>
                  <li><a href="/store/profile/dashboard">Profile</a></li>
                  <li><a  href="/store/products/list">My Products</a></li>
                </ol>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- /End Breadcrumb Area-->
      <!-- Start Company Story Area -->
      <div class="company-story-area section-padding">
        <div class="container">
          <div class="store">
            <!-- About Us Content Here -->






            <?php if($view=="list") {?>
              <div class="col-md-7 col-sm-12">
                <div class="company-story-content">
                  <h2 class="title">Products <span class="color-text">{{$store->name}}</span> </h2>
                  <div class="" style="width: 80%; float:left">
                    <table id="productTable" class="table table-responsive table-condensed table-striped table-hover table-bordered">
                      <thead>
                        <tr>
                          <td>Code</td>
                          <td>Names</td>
                          <td>Price</td>
                          <td>Discount</td>
                          <td>Quantity</td>
                        </tr>
                      </thead>
                      <tbody>
                    @foreach($store->products as $product)
                          <tr>
                            <td class="product" style="width: 5%;">
                              <?php echo $product['code']; ?>
                            </td>
                            <td class="product" style="width: 25%;">
                              <?php echo $product['name']; ?>
                            </td>
                            <td class="product" style="width: 5%;">
                              <?php echo $product['price']; ?>
                            </td>
                            <td class="product" style="width: 5%;">
                              <?php echo $product['discount']; ?>
                            </td>
                            <td class="product" style="width: 5%;">
                              <?php echo $product['quantity']; ?>
                            </td>
                            <td class="details" style="width: 4%;"><a href="<?php echo "/store/products/edit?productid=".$product['id']; ?>" target="_blank" id="<?php echo $product['id']; ?>">Edit</a></td>
                          </tr>
                      @endforeach
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
              <?php }?>



            @if($view == "edit") 
  
                  <div class="col-md-7 col-sm-12">
                    <div class="company-story-content">
                      <h2 class="title">Edit <span class="color-text"><?php echo $product->name; ?></span> </h2>
                      <form action="" method="post" id="formProduct" enctype="multipart/form-data">
                    @foreach($product->images as $key=>$img)
                      <input type="text" class="hidden" name="img{{($key+1)}}" value="<?php echo $img->image; ?>" />
                   
                    @endforeach
                        <div class="form-group">
                          <label> Code: </label>
                          <input type="text" name="productcode" class="form-control txt-fc" value="<?php echo $product->code; ?>" />
                        </div>
                        <div class="form-group">
                          <label> Name: </label>
                          <input type="text" name="productname" class="form-control txt-fc" value="<?php echo $product->name; ?>" />
                        </div>

                        <input type="text" class="hidden" name="productid" value="<?php echo $_GET['productid']; ?>" />
                        <div class="form-group">
                          <label> Description </label>
                          <textarea name="productdescs" class="form-control txt-fc"><?php echo $product->description; ?></textarea>
                        </div>
                        <div class="form-group">
                          <label> Category </label>
                          <select name="productcategories" class="txt-fc" style="width: 35%;">
                           
                            @foreach($store->categories as $cats)
                              <option {{$cats['id']==$product->category_id?'selected':''}} value="<?php echo $cats['id']; ?>">
                                <?php echo $cats['name']; ?>
                              </option>
                            @endforeach
                          </select>
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          <label> Price: </label>
                          <input type="text" name="productprice" class="txt-fc" value="<?php echo $product->price; ?>" />
                        </div>
                        <div class="form-group">
                          <label> Quantity: </label>
                          <input type="text" name="productqty" class="txt-fc" value="<?php echo $product->quantity; ?>" /> &nbsp;&nbsp;&nbsp;
                          <label> Discount: </label>
                          <input type="text" name="productdis" class="txt-fc" value="<?php echo $product->discount_price; ?>" />
                        </div>
                    @for($i=1; $i<=4; $i++)
                        <div class="form-group">                 

                          <label> Image 1 </label>
                          <img src="{{isset($product->images[$i-1])?$product->images[$i-1]->image:''}}" height="100" width="100" />
                          <input type="file" name="productimages{{$i}}" />
                        </div>
                      @endfor
                        <div class="form-action clearfix">
                          <input class="btn-fc" type="submit" value="Save" name="save" style="width:100%;" />
                          <a href="JavaScript:window.close()">Close</a>
                        </div>

                      </form>
                    </div>
                  </div>
              @endif













                    <script>
                      $(document).ready(function() {
                        $("#formProductAdd").submit(function(event) {

                          //disable the default form submission
                          event.preventDefault();
                          //grab all form data  
                          var formData = new FormData($(this)[0]);

                          $.ajax({
                            url: '/store/scripts/add_product',
                            type: 'POST',
                            data: formData,
                            async: false,
                            cache: false,
                            contentType: false,
                            processData: false,
                            success: function() {
                              //alert('Form Submitted!');
                            },
                            error: function() {
                              //alert("error in ajax form submission");
                            }
                          });
                          $("#formProductAdd").fadeOut('800', function() {
                           // $(this)[0].reset();
                          }).fadeIn();

                          return false;
                        });
                      });

                    </script>


                    @if($view == "add_p")   
   
                      <div class="col-md-7 col-sm-12">
                        <div class="company-story-content">
                          <h2 class="title">Add <span class="color-text">New Product</span> </h2>

                          <div>
                            <form action="javascript:;" method="post" id="formProductAdd" enctype="multipart/form-data">
                              <div class="form-group">
                                <label> Code </label>
                                <input required type="text" name="productcodes" class="form-control txt-fc" />
                              </div>
                              <div class="form-group">
                                <label>Name </label>
                                <input required type="text" name="productnames" value="" class="form-control txt-fc" />
                              </div>
                              <div class="form-group">
                              <input type='hidden' value="{{$store->id}}" name='store_id'>
                              </div>

                              <div class="form-group">
                                <label> Description </label>
                                <textarea name="productdescs" stores="2" cols="57" class="form-control txt-fc"></textarea>
                              </div>
                              <div class="form-group">
                                <label> Category </label>
                                <select name="productcategories" class=" txt-fc" style="width: 35%">
                                    @foreach($categories as $cats)
                                    <option value="<?php echo $cats['id']; ?>">
                                      <?php echo $cats['name']; ?>
                                    </option>
                                    @endforeach
                                </select>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <label> Price </label>
                                <input type="text" name="productprices" value="" class=" txt-fc" />
                              </div>
                              <div class="form-group">
                                <label> Quantity </label>
                                <input required type="text" name="productquantities" class="txt-fc" /> &nbsp;&nbsp;&nbsp;
                                <label> Discount </label>
                                <input type="text" name="productdiscounts" class="txt-fc" placeholder="1% - 99%" />
                              </div>
                              <div class="form-group">
                                <label> Image 1 </label>
                                <input type="file" name="productimages1" />
                              </div>
                              <div class="form-group">
                                <label> Image 2 </label>
                                <input type="file" name="productimages2" />
                              </div>
                              <div class="form-group">
                                <label> Image 3 </label>
                                <input type="file" name="productimages3" />
                              </div>
                              <div class="form-group">
                                <label> Image 4 </label>
                                <input type="file" name="productimages4" />
                              </div>
                              <div class="form-action clearfix">
                                <input class="btn-fc" type="submit" value="Add" name="save" style="width:100%;" />
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                   @endif



                        <!-- About Us Right Image Here -->
                        <div class="col-md-5 col-sm-12 follow-scroll">
                          <div class="company-story-content">
                            <h2 class="title">Categories <span class="color-text">{{$store->name}}</span> </h2></div>

                          <ul style="list-style: none;">

                            <li><a href="/store/products/list">All Products</a></li>
                            @foreach($categories as $cat)

                              <li>
                                <a href="/store/products/list?category_id="{{$cat->id}}">
                                  <?php echo $cat['name']; ?>
                                </a>
                              </li>
                            @endforeach

                          </ul>
                          <br />
                          <div>
                            <div class="company-story-content">
                              <h2 class="title">Quick <span class="color-text">Nav</span> </h2></div>
                            <nav>
                              <ul>
                                <li><a href="/store/profile/dashboard">Dashboard</a></li>
                                <?php if(Auth::user()->privilege=="Owner") {?>
                                  <li><a href="/store/profile/emp_req">View Employees Requests</a></li>
                                  <?php } ?>
                                    <li><a href="/store/products/list">All Products</a></li>
                                    <li><a href="/store/products/add_p">Add Product(s)</a></li>
                                    <li><a href="/store/sales/create">Create Sale</a></li>

                              </ul>
                            </nav>

                          </div>
                        </div>

          </div>
        </div>
      </div>

    </div>



  <?php

function mergeArrays($codes, $name, $price, $discount, $description, $category, $quantity, $image1temp, $image2temp, $image3temp, $image4temp,$image1,$image2,$image3,$image4) 
{
    $result = array();

    foreach ( $codes as $key=>$code) {
        $result[] = array( 'code' => $code, 'name' => $name[$key], 'price' => $price[ $key ], 'discount' => $discount[$key], 'description' => $description[$key], 'category' => $category[$key], 'quantity' => $quantity[$key], 'tmp_name1'=> $image1temp[$key], 'tmp_name2'=> $image2temp[$key],'tmp_name3'=> $image3temp[$key],'tmp_name4'=> $image4temp[$key],'tmp_name1'=> $image1temp[$key],'name1'=> $image1[$key],'name2' => $image2[$key],'name3'=> $image3[$key],'name4'=> $image4[$key]);
    }

    return $result;
}
function mergeArrays2($image1temp,$image2temp ,$image3temp,$image4temp,$image1, $image2, $image3, $image4) 
{
    $result = array();
    $i=0;
   foreach($image1temp as $key=>$image1temps) {
        $result[] = array('tmp_name1'=> $image1temps, 'tmp_name2'=> $image2temp[$key],'tmp_name3'=> $image3temp[$key],'tmp_name4'=> $image4temp[$key],'tmp_name1'=> $image1temp[$key],'name1'=> $image1[$key],'name2' => $image2[$key],'name3'=> $image3[$key],'name4'=> $image4[$key]);
    }

    return $result;
}


?>

@stop
