<div class="dropdown cart-dropdown">
    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
        <i class="icon-shopping-cart"></i>
        <span class="cart-count">{{$countCart}}</span>
    </a>
    <div class="dropdown-menu dropdown-menu-right">
        <div class="dropdown-cart-products">
            
        @if($showCart->isEmpty())

        <p>No Product Yet.</p>

        @else
            @foreach($showCart as $cart)
            <div class="product">
                <div class="product-cart-details">
                    <h4 class="product-title">
                        <a href="/view/{{ $cart->id }}">{{ $cart->product_name }}</a>
                    </h4>

                    <span class="cart-product-info">
                        <span class="cart-product-qty">{{ $cart->product_total_quantity}}</span>
                        x ₱{{ number_format($cart->product_total_price, 0, '', ',') }}
                    </span>
                </div><!-- End .product-cart-details -->

                <figure class="product-image-container">
                    <a href="#" class="product-image">
                        @php $default_profile = "https://avatars.dicebear.com/api/initials/".$cart->product_name.".svg" @endphp  
                        <img src="{{ $cart->product_image ? asset("storage/product/".$cart->product_image) : $default_profile }}">
                    </a>
                </figure>
            </div><!-- End .product -->
            @endforeach
           
            

        </div><!-- End .cart-product -->

        <div class="dropdown-cart-total">
            <span>Total</span>

            <span class="cart-total-price">₱{{ number_format($sumCart, 0, '', ',') }}</span>
        </div><!-- End .dropdown-cart-total -->        
        
        <div class="dropdown-cart-action">
            <a href="/cart" class="btn btn-primary">View Cart</a>
            {{-- <a href="checkout.html" class="btn btn-outline-primary-2"><span>Checkout</span><i class="icon-long-arrow-right"></i></a> --}}
        </div><!-- End .dropdown-cart-total -->
        @endif
    </div><!-- End .dropdown-menu -->
</div><!-- End .cart-dropdown -->
