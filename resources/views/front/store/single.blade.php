@extends('layout.front_store')

@section('content')



                  <script>
                    $(document).ready(function()
                    {
                      var images = 
                      [
                        1,
                         @foreach($product->images as $img)
                          "{{$img->image}}",
                        @endforeach
                        "{{ Helper::image_check($product['image1']) }}",
                        "{{ Helper::image_check($product['image2']) }}",
                        "{{ Helper::image_check($product['image3']) }}",
                        "{{ Helper::image_check($product['image4']) }}"                       
                      ];
                      $("#imgTag").attr("src",images[images[0]]);
                      (function loopImages() 
                      {
                        ++images[0];
                        if (images[0] == images.length) 
                        {
                          images[0] = 1;
                        }
                        $("#imgTag").fadeOut(8000,function()
                        {
                          $(this).attr("src",images[images[0]]).fadeIn(500,function(){loopImages();});
                        });
                      })();
                    });
                  </script>

                  <div class="area wrapper" id="singleProductDiv">
                    
                  <div>
                    <div id="imageDiv" >
                      <img src="" id="imgTag" class="img-responsive" />
                    </div>
                  </div>
                    <div id="descriptionDiv">
                      <div id="content">
                      
                    
                        <div id="productTitle">
                          <h2 class="title"><a class="single_anchor ajax_push" id="<?php echo $product['id']; ?>"  href=" /{{$store['username']}}/products/{{$product['id']}}"><?php echo $product['name']; ?></a></h2>
                        </div>

                        <?php if(isset($avg)){ ?>
                        <div id="reviews">
                          <ul class="reviews-star">
                            <?php for($i=1;$i<=(int)$avg;$i++){?>
                            <li class="star-active"> <a> <i class="icon_star"></i> </a> </li>
                            <?php }?>
                            <li>&nbsp;Based on <span class="badge"><?php echo $rev_num; ?></span> review(s).</li>
                          </ul>

                        </div>
                        <?php } ?>
                        <hr />
                        <div id="productPricing">
                          <div id="productPrice">
                            <span>Price: </span><span>Rs. </span>
                            <span>
                            <?php 

                              if($sale_row = 0)
                              {
                               echo "<span class='color-text'>".sale_price($sale['sale_discount_price'],$product['price'])."<span>/-</span></span>";
                               echo "<br />";
                               echo "<span>This product is available at this sale</span> "."<a class='sales_anchor ajax_push' href='index.php?store=".$store['store_username']."&view=sales&sale=".$sale['sale_id']."' id='".$sale['sale_id']."'>".$sale['sale_name']."</a>";
                              }
                              else
                              {
                                if(isset($product['discount_price']) && $product['discount_price'] != 0)
                                {
                                 echo "<span class='color-text'>".Helper::discount_price($product['discount_price'], $product['price'])."<span>/-</span></span>"." @ "."<span class='color-text'>".$product['discount_price']."</span>"."<span>% discount_price</span>";
                                }
                                else
                                {
                                 echo "<span class='color-text'>".number_format($product['price'])."<span>/-</span></span>";
                                }
                              }
                            ?>
                            </span>
                          </div>
                        </div>
                        <hr />
                        <div id="productDetailing">
                          <div id="productCategory">
                            <span><span>Category: </span><span class="color-text"><?php echo $product['category']; ?></span></span>

                          </div>
                          <br />
                          <div id="productDetails">
                            <span>Description: </span>
                            <p><?php echo $product['desc']; ?></p>
                          </div>
                        </div>









                      </div>
                    </div>





            
  @stop