@include('partials.header')
        <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container d-flex align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">{{ $viewproduct->category }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $viewproduct->product_name }}</li>
                    </ol>

                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
                    <div class="product-details-top">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="product-gallery product-gallery-vertical">
                                    <div class="row">
                                        <figure class="product-main-image">
                                            @php $default_profile = "https://avatars.dicebear.com/api/initials/".$viewproduct->product_name.".svg" @endphp  
                                            <img src="{{ $viewproduct->product_image ? asset("storage/product/".$viewproduct->product_image) : $default_profile }}">       

                                            <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                                <i class="icon-arrows"></i>
                                            </a>
                                        </figure><!-- End .product-main-image -->

                                        <div id="product-zoom-gallery" class="product-image-gallery">
                                            <a class="product-gallery-item active" href="#" data-image="{{ $viewproduct->product_image ? asset("storage/product/".$viewproduct->product_image) : $default_profile }}" data-zoom-image="assets/images/products/single/1-big.jpg">
                                                @php $default_profile = "https://avatars.dicebear.com/api/initials/".$viewproduct->product_name.".svg" @endphp  
                                                <img src="{{ $viewproduct->product_image ? asset("storage/product/".$viewproduct->product_image) : $default_profile }}">
                                            </a>

                                          
                                        </div><!-- End .product-image-gallery -->
                                    </div><!-- End .row -->
                                </div><!-- End .product-gallery -->
                            </div><!-- End .col-md-6 -->

                            <div class="col-md-6">
                                <div class="product-details">
                                    <h1 class="product-title">{{ $viewproduct->product_name }}</h1><!-- End .product-title -->

                                    <div class="product-price">
                                        ₱{{ number_format($viewproduct->price, 0, '', ',') }}
                                    </div><!-- End .product-price -->

                                    <div class="product-content">
                                        <p>{{ $viewproduct->overview }}</p>
                                    </div><!-- End .product-content -->

                                    <form action="/view/cart/add" method="POST">
                                    @csrf
                                    <div class="details-filter-row details-row-size">
                                        <label for="qty">Qty:</label>
                                        <div class="product-details-quantity">
                                            <input type="number" id="qty" name="product_total_quantity" class="form-control" value="1" min="1" max="{{ $viewproduct->quantity }}" step="1" data-decimals="0" required>
                                        </div><!-- End .product-details-quantity -->
                                        @error('quantity')
                                        <p class="text-red-500 text-xs p-1">
                                        {{$message}}
                                        </p>  
                                        @enderror

                                        <input type="hidden" name="product_id" value="{{ $viewproduct->id }}">

                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <label for="qty">Left:</label>
                                        <div class="product-details-quantity">
                                            <p>{{ $viewproduct->quantity }}</p>
                                        </div><!-- End .product-details-quantity -->
                                    </div><!-- End .details-filter-row -->

                                    @if($viewproduct->quantity >= 1)
                                    <div class="product-details-action">
                                        <button type="submit" class="btn-product btn-cart"><span>add to cart</span></button>

                                    </div><!-- End .product-details-action -->
                                    @endif
                                    </form>
                                    <div class="product-details-footer">
                                        <div class="product-cat">
                                            <span>Category:</span>
                                            @if($viewproduct->category == "Graphics Card")
                                            <a href="/view/gpu">{{ $viewproduct->category }}</a>

                                            @elseif($viewproduct->category == "Laptop")
                                            <a href="/view/laptop">{{ $viewproduct->category }}</a>

                                            @elseif($viewproduct->category == "Processor")
                                            <a href="/view/processor">{{ $viewproduct->category }}</a>

                                            @elseif($viewproduct->category == "Power Supply")
                                            <a href="/view/psu">{{ $viewproduct->category }}</a>

                                            @else
                                            
                                            @endif
                                        </div><!-- End .product-cat -->

                                    </div><!-- End .product-details-footer -->
                                </div><!-- End .product-details -->
                            </div><!-- End .col-md-6 -->
                        </div><!-- End .row -->
                    </div><!-- End .product-details-top -->

                    <div class="product-details-tab">
                        <ul class="nav nav-pills justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                            </li>
                           
                            <li class="nav-item">
                                <a class="nav-link" id="product-shipping-link" data-toggle="tab" href="#product-shipping-tab" role="tab" aria-controls="product-shipping-tab" aria-selected="false">Shipping & Returns</a>
                            </li>
                           
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                                <div class="product-desc-content">
                                    <h3>Product Information</h3>
                                    <p>{{ $viewproduct->product_name }}</p><br>
                                    <p>{{ $viewproduct->overview }}</p>
                                    <ul><br>

                                        <li>{{ $viewproduct->description }}/li>
                                        
                                    </ul>
                                </div><!-- End .product-desc-content -->
                            </div><!-- .End .tab-pane -->

                            <div class="tab-pane fade" id="product-shipping-tab" role="tabpanel" aria-labelledby="product-shipping-link">
                                <div class="product-desc-content">
                                    <h3>Delivery & returns</h3>
                                    <p>We deliver to over 100 countries around the world. For full details of the delivery options we offer, please view our <a href="#">Delivery information</a><br>
                                    We hope you’ll love every purchase, but if you ever need to return an item you can do so within a month of receipt. For full details of how to make a return, please view our <a href="#">Returns information</a></p>
                                </div><!-- End .product-desc-content -->
                            </div><!-- .End .tab-pane -->

                        </div><!-- End .tab-content -->
                    </div><!-- End .product-details-tab -->

                    

                    </div><!-- End .owl-carousel -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->

@include('partials.footer')

        