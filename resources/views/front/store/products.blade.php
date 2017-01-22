        <div class="container store-contents">
              <div class="store-signature">
                <italic class="color-text">@ <?php echo $store['store_name']; ?></italic>
              </div>
                <div class="product_area wrapper">
                  <div class="products_title">
            <center>
              <span>--------</span>
              <h2 class="title">Products</h2>
              <span class="badge" id="product_rows">{{$products->count()}}</span>
              <span>--------</span>
            </center>
          </div>
                  @foreach($products as $product)
                    <div class="product">
                      <a class="single_anchor ajax_push" id="{{$product->id}}" href="/storelist/store/{{$store->username}}/products/{{$product->id}}">
                        <div class="product-image">
                          <img src="{{$product->image}}" />
                        </div>
                      </a>
                      <div class="product-details">
                        <div class="product-name">
                          <a class="name single_anchor ajax_push" id="<?php echo $product['product_id']; ?>" href="<?php echo " /index.php?store=".$store['store_username']."&view=single&product=".$product['product_id']; ?>"><span><?php echo substr($product['name'], 0, 20); ?></span></a>
                        </div>
                        <div class="product-price">
                          <span class="price">@ Rs.{{ number_format($product['price'],2)}}/</span>
                        </div>
                        <div class="product-discount">
                          <span class="discount">Discount: <span class="color-text"><?php echo $product['product_discount']; ?></span>%</span>
                        </div>
                      </div>
                    </div>
                  
                </div>
              </div>
            @endforeach