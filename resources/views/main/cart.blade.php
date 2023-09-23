@include('partials.header')
        <main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">Shopping Cart<span>Shop</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="/view/all">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
            	<div class="cart">
	                <div class="container">
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
									<form action="/cart/new/update" method="POST">
									@csrf
									<tbody>
										@foreach($showCart as $cart)

										<input type="hidden" name="product_id[]" value="{{$cart->product_id}}">
										<input type="hidden" name="price[]" value="{{$cart->price}}">
                                        {{-- <input type="hidden" name="product_total_price[]" value="{{$cart->product_total_price}}"> --}}
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
													</h3><!-- End .product-title -->
												</div><!-- End .product -->
											</td>
											<td class="price-col">₱{{ number_format($cart->price, 0, '', ',') }}</td>
											<td class="quantity-col">
											
										
                                                <div class="cart-product-quantity">
                                                    <input type="number" class="form-control" name="product_total_quantity[]" value="{{$cart->product_total_quantity}}" min="1" max="{{$cart->quantity}}" step="1" data-decimals="0" required>
													
                                                </div><!-- End .cart-product-quantity -->
                                            </td>
											<td class="total-col">₱{{ number_format($cart->product_total_price, 0, '', ',') }}</td>
											
											<td class="remove-col"><a href="/cart/delete/{{$cart->product_id}}" class="btn-remove"><i class="icon-close"></i></a></td>
										</tr>
										@endforeach


									</tbody>
								</table><!-- End .table table-wishlist -->

	                			<div class="cart-bottom">
			            			

			            			<button type="submit" class="btn btn-outline-dark-2"><span>UPDATE CART</span><i class="icon-refresh"></i></button>
									
		            			</div><!-- End .cart-bottom -->
							</form>
	                		</div><!-- End .col-lg-9 -->
	                		<aside class="col-lg-3">
	                			<div class="summary summary-cart">
	                				<h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

	                				<table class="table table-summary">
	                					<tbody>
	                						<tr class="summary-subtotal">
	                							<td>Subtotal:</td>
	                							<td>₱{{ number_format($sumCart, 0, '', ',') }}.00</td>
	                						</tr><!-- End .summary-subtotal -->
	                						<tr class="summary-shipping">
	                							<td>Shipping:</td>
	                							<td>&nbsp;</td>
	                						</tr>

	                						<tr class="summary-shipping-row">
	                							<td>
	                								<div class="custom-control">
														
														<label for="standart-shipping">Standard:</label>
													</div><!-- End .custom-control -->
	                							</td>
	                							<td>₱100.00</td>
	                						</tr><!-- End .summary-shipping-row -->

	                						<tr class="summary-shipping-estimate">
	                							<td> <a href="/account">Change address</a></td>
	                							<td>&nbsp;</td>
	                						</tr><!-- End .summary-shipping-estimate -->

	                						<tr class="summary-total">
	                							<td>Total:</td>
	                							<td>₱{{ number_format($total, 0, '', ',') }}.00</td>
	                						</tr><!-- End .summary-total -->
	                					</tbody>
	                				</table><!-- End .table table-summary -->
									@if($showCart->isEmpty())

									@else
	                				<a href="/cart/products/checkout" class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO CHECKOUT</a>
									@endif
	                			</div><!-- End .summary -->

		            			<a href="/view/all" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
	                		</aside><!-- End .col-lg-3 -->
	                	</div><!-- End .row -->
	                </div><!-- End .container -->
                </div><!-- End .cart -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->

@include('partials.footer')

        