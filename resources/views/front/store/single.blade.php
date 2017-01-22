@extends('layout.front_store')

@section('content')

 <div class="container store-contents">
            <div class="store-signature">
                <italic class="color-text">@ <?php echo $store['name']; ?></italic>
              </div>

                  <script>
                    $(document).ready(function()
                    {
                      var images = 
                      [
                        1,
                        "<?php Helper::image_check($product['product_image1']); ?>",
                        "<?php Helper::image_check($product['product_image2']); ?>",
                        "<?php Helper::image_check($product['product_image3']); ?>",
                        "<?php Helper::image_check($product['product_image4']); ?>"
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

                  <div class="product_area wrapper" id="singleProductDiv">
                    
                  <div>
                    <div id="imageDiv" >
                      <img src="" id="imgTag" class="img-responsive" />
                    </div>
                  </div>
                    <div id="descriptionDiv">
                      <div id="content">
                      
                    
                        <div id="productTitle">
                          <h2 class="title"><a class="single_anchor ajax_push" id="<?php echo $product['product_id']; ?>" href="<?phpecho "index.php?store=".$store['store_username']."&view=single&product=".$product['product_id']; ?>"><?php echo $product['product_name']; ?></a></h2>
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
                               echo "<span class='color-text'>".sale_price($sale['sale_discount'],$product['product_price'])."<span>/-</span></span>";
                               echo "<br />";
                               echo "<span>This product is available at this sale</span> "."<a class='sales_anchor ajax_push' href='index.php?store=".$store['store_username']."&view=sales&sale=".$sale['sale_id']."' id='".$sale['sale_id']."'>".$sale['sale_name']."</a>";
                              }
                              else
                              {
                                if(isset($product['product_discount']) && $product['product_discount'] != 0)
                                {
                                 echo "<span class='color-text'>".discount_price($product['product_discount'], $product['product_price'])."<span>/-</span></span>"." @ "."<span class='color-text'>".$product['product_discount']."</span>"."<span>% discount</span>";
                                }
                                else
                                {
                                 echo "<span class='color-text'>".number_format($product['product_price'])."<span>/-</span></span>";
                                }
                              }
                            ?>
                            </span>
                          </div>
                        </div>
                        <hr />
                        <div id="productDetailing">
                          <div id="productCategory">
                            <span><span>Category: </span><span class="color-text"><?php echo $product['product_category']; ?></span></span>

                          </div>
                          <br />
                          <div id="productDetails">
                            <span>Description: </span>
                            <p><?php echo $product['product_desc']; ?></p>
                          </div>
                        </div>









                      </div>
                    </div>





                </div>

            </div>

  @stop