  
            <center>
              <span>--------</span>
              <h2 class="title">Products</h2>
              <span class="badge" id="product_rows">{{$products->count()}}</span>
              <span>--------</span>
            </center>
          </div>
                  @foreach($products as $product)
                    <div class="product">
                      <a class="single_anchor ajax_push" id="{{$product->id}}" href="/{{$store->username}}/products/{{$product->id}}">
                        <div class="product-image">
                          <img src="{{$product->img}}" />
                        </div>
                      </a>
                      <div class="product-details">
                        <div class="product-name">
                          <a class="name single_anchor ajax_push" id="<?php echo $product['id']; ?>" href=" /{{$store['username']}}/products/{{$product['id']}}"><span><?php echo substr($product['name'], 0, 20); ?></span></a>
                        </div>
                        <div class="product-price">
                          <span class="price">@ Rs.{{ number_format($product['price'],2)}}/</span>
                        </div>
                        <div class="product-discount">
                          <span class="discount">Discount: <span class="color-text"><?php echo $product['discount_price']; ?></span>%</span>
                        </div>
                      </div>
                    </div>
                  
             
            @endforeach