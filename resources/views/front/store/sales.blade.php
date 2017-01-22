
   <div class="container store-contents">
                    <div class="store-signature">
                <italic class="color-text">@ <?php echo $store['store_name']; ?></italic>
              </div>
                    <?php while($allsales = $getallsales->fetch_assoc())
                    {
                      $stmtgetsaleproducts = $mysqli->prepare("SELECT * FROM store_products sp
                        INNER JOIN store_sale_products ssp ON sp.product_id = ssp.product_id 
                        WHERE ssp.sale_id=? AND sp.store_id=?");
                      $stmtgetsaleproducts->bind_param("ii",$allsales['sale_id'],$storeid);
                      $stmtgetsaleproducts->execute();
                      $getsaleproducts = $stmtgetsaleproducts->get_result();
                      $sale_product_rows = $getsaleproducts->num_rows;
                      $stmtgetsaleproducts->close();

                    ?>
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
                      
                      <div class="product_area wrapper ">
                      <div class="sale_title">
            <center>
              <span>--------</span>
              <h2 class="title" id="sale_header">Sales</h2>
              <span class="badge" id="sales_rows"><?php echo $sales_rows; ?></span>
              <span>--------</span>
            </center>
          </div>
                      <div class="sale_title">
                        <h2 class="title" id="sale_products"><?php echo $allsales['sale_name']; ?></h2> <span class="badge"><?php echo $sale_product_rows; ?></span> <span class="timer" id="<?php echo $allsales['sale_till']; ?>"></span></div>

                      <div class="sale_title"><span class="discount">Discount: <span class="color-text"><?php echo $allsales['sale_discount']; ?></span>%</span></div>
                        <?php while($saleproducts = $getsaleproducts->fetch_assoc()){?>

                          <div class="product">
                            <a class="single_anchor ajax_push" id="<?php echo $saleproducts['product_id']; ?>" href="<?php echo " index.php?store=".$store['store_username']."&view=single&product=".$saleproducts['product_id']; ?>">
                              <div class="product-image">
                                <img src="<?php echo image_check($saleproducts['product_image1']); ?>" />
                              </div>
                            </a>
                            <div class="product-details">
                              <div class="product-name">
                                <a class="name single_anchor ajax_push" id="<?php echo $saleproducts['product_id']; ?>" href="<?php echo " index.php?store=".$store['store_username']."&view=single&product=".$saleproducts['product_id']; ?>"><span><?php echo substr($saleproducts['product_name'], 0, 20); ?></span></a>
                              </div>
                              <div class="product-price">
                                <span class="price">@ Rs. <?php echo sale_price($allsales['sale_discount'],$saleproducts['product_price']); ?>/</span>
                              </div>
                            </div>
                          </div>

                          <?php }?>
                        <?php } ?>
                      </div>
                    </div>
                    <?php }?>