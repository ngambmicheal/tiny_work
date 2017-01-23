

                   @foreach($sales as $sale)
                      <script>
                        $(document).ready(function() {
                          $('.products_title').hide();
                          $(".timer").each(function() {
                            var time = this.id;
                            var timeLeft = time.split('-').reverse().join('-');
                            $(this).countdown(timeLeft, function(event) {
                              $(this).text(event.strftime("%D days %H hours %M minutes %S seconds remaining"));
                            });
                          })
                        });

                      </script>
                      
                      <div class="area wrapper ">
                      <div class="sale_title">
            <center>
              <span>--------</span>
              <h2 class="title" id="sale_header">Sales</h2>
              <span class="badge" id="sales_rows"><?php echo $sale->products->count();?></span>
              <span>--------</span>
            </center>
          </div>
                      <div class="sale_title">
                        <h2 class="title" id="sale_products"><?php echo $sale['name']; ?></h2> <span class="badge"><?php echo $sale->products->count(); ?></span> <span class="timer" id="<?php echo $sale['till']; ?>"></span></div>

                      <div class="sale_title"><span class="discount">Discount: <span class="color-text"><?php echo $sale['sale_discount']; ?></span>%</span></div>
                        @foreach($sale->products as $saleproducts)

                          <div class="product">
                            <a class="single_anchor ajax_push" id="<?php echo $saleproducts['product']['id']; ?>"  href="/{{$store['username']}}/products/{{$saleproducts['product']['id']}}">
                              <div class="product-image">
                                <img src="<?php echo Helper::image_check($saleproducts['product']['img']); ?>" />
                              </div>
                            </a>
                            <div class="product-details">
                              <div class="product-name">
                                <a class="name single_anchor ajax_push" id="<?php echo $saleproducts['product']['id']; ?>" href="/{{$store['username']}}/products/{{$saleproducts['product']['id']}}"><span><?php echo substr($saleproducts['product']['name'], 0, 20); ?></span></a>
                              </div>
                              <div class="product-price">
                                <span class="price">@ Rs. <?php echo Helper::sale_price($sale['sale_discount'],$saleproducts['product']['price']); ?>/</span>
                              </div>
                            </div>
                          </div>

                  @endforeach

              @endforeach
                   