@include('partials.header')
<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Checkout<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/view/all">Shop</a></li>
                <li class="breadcrumb-item"><a href="/cart">Shopping Cart</a></li>
                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="checkout">
            <div class="container">
                
                
                <form action="/cart/products/order" method="POST">
                @csrf
               
                    <div class="row">

                        <div class="col-lg-9">
	                			<table class="table table-cart table-mobile">
									<thead>
										<tr>
											<th>Product</th>
											<th>Price</th>
											<th>Quantity</th>
											<th>Total</th>
											<th></th>
										</tr>
									</thead>

									<tbody>
										@foreach($showCart as $cart)
										<tr>
											<td class="product-col">
												<div class="product">
													<figure class="product-media">
														<a href="#">
															@php $default_profile = "https://avatars.dicebear.com/api/initials/".$cart->product_name.".svg" @endphp  
															<img src="{{ $cart->product_image ? asset("storage/product/".$cart->product_image) : $default_profile }}">
														</a>
													</figure>

													<h3 class="product-title">
														<a href="/view/{{ $cart->id }}">{{$cart->product_name}}</a>
                                                        <
													</h3><!-- End .product-title -->
												</div><!-- End .product -->
											</td>
											<td class="price-col">₱{{ number_format($cart->price, 0, '', ',') }}</td>
                                         
											<td class="quantity-col">
											
										
                                                <div class="cart-product-quantity">
                                                     {{$cart->product_total_quantity}}
                                                     
													
                                                </div><!-- End .cart-product-quantity -->
                                            </td>
											<td class="total-col">₱{{ number_format($cart->product_total_price, 0, '', ',') }}</td>
                                            
											
											
										</tr>
										@endforeach


									</tbody>
								</table><!-- End .table table-wishlist -->

	                		</div><!-- End .col-lg-9 -->

                        <aside class="col-lg-3">
                            <div class="summary">
                                <h3 class="summary-title">Your Order</h3><!-- End .summary-title -->

                                <table class="table table-summary">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                           
                                    <tbody>
                                        @foreach($showCart as $cart)

                                        <input type="hidden" name="user_id[]" value="{{$cart->user_id}}">
                                        <input type="hidden" name="product_id[]" value="{{$cart->product_id}}">
                                        <input type="hidden" name="product_total_quantity[]" value="{{$cart->product_total_quantity}}">
                                        <input type="hidden" name="product_total_price[]" value="{{$cart->product_total_price}}">
                           
                                           
                                        <tr>
                                            
                                            <td>
                                                <span class="cart-product-qty">{{ $cart->product_total_quantity}}</span>
                                                x
                                                <a href="/view/{{ $cart->id }}">{{$cart->product_name}}</a>
                                            </td>
                                            <td>
                                                 ₱{{ number_format($cart->price, 0, '', ',') }}.00
                                            </td>
                                        </tr>
                                        @endforeach

                                       
                                        <tr class="summary-subtotal">
                                            <td>Subtotal:</td>
                                            <td>₱{{ number_format($sumCart, 0, '', ',') }}.00</td>
                                        </tr><!-- End .summary-subtotal -->
                                        <tr>
                                            <td>Shipping:</td>
                                            <td>Standard (₱100.00)</td>
                                        </tr>
                                        <tr class="summary-total">
                                            <td>Total:</td>
                                            <td>₱{{ number_format($total, 0, '', ',') }}.00</td>
                                        </tr><!-- End .summary-total -->
                                    </tbody>
                                </table><!-- End .table table-summary -->

                                <div class="accordion-summary" id="accordion-payment">
                                    


                                    <div class="card">
                                        <div class="card-header" id="heading-3">
                                            <h2 class="card-title">
                                                Cash on delivery      
                                                
                                            </h2>
                                        </div><!-- End .card-header -->
                                        
                                    </div><!-- End .card -->
                                    <br>
                                   

           
                                </div><!-- End .accordion -->
                                
                                @if($showCart->isEmpty())

                                @else
                                <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                                    <span class="btn-text">Place Order</span>
                                    <span class="btn-hover-text">Proceed to Checkout</span>
                                </button>
                                @endif
                            
                            </div><!-- End .summary -->
                        </aside><!-- End .col-lg-3 -->
                    </div><!-- End .row -->
                </form>
            </div><!-- End .container -->
        </div><!-- End .checkout -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
@include('partials.footer')

