@include('partials.header')
@include('components.categoryscript')
<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Power Supply<span>OLIVES PH</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Power Supply</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <div class="toolbox">
           
                <div class="toolbox-right">
                    <div class="toolbox-sort">
                        <label for="sortby">Category:</label>
                        <div class="select-custom">
                            <select id="s1" name="section" onChange="SelectRedirect();" class="form-control">
                                <option value="All">All</option>
                                <option value="Laptop">Laptops</option>
                                <option value="CPU">Processors</option>
                                <option value="GPU">Graphics Cards</option>
                                <option value="PSU" selected="selected">Power Supply</option>
                            </select>
                            
                        </div>
                    </div><!-- End .toolbox-sort -->
                </div><!-- End .toolbox-right -->
            </div><!-- End .toolbox -->

            <div class="products">
                <div class="row">

                    @foreach($showPSUProduct as $PSUProduct)
                    <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                        <div class="product">
                            <figure class="product-media">
                                @if($PSUProduct->quantity >= 1)
                                <span class="product-label label-sale">{{ $PSUProduct->quantity }} left.</span>
                                @else
                                <span class="product-label label-out">Out of stock.</span>
                                @endif
                                <a href="/view/{{ $PSUProduct->id }}">
                                    @php $default_profile = "https://avatars.dicebear.com/api/initials/".$PSUProduct->product_name.".svg" @endphp  
                                    <img src="{{ $PSUProduct->product_image ? asset("storage/product/".$PSUProduct->product_image) : $default_profile }}">
                                </a>

                                @if($PSUProduct->quantity >= 1)
                                <div class="product-action action-icon-top">
                                    <a href="/cart/{{$PSUProduct->id}}" class="btn-product btn-cart"><span>add to cart</span></a>
                                </div><!-- End .product-action -->
                                @endif
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">{{ $PSUProduct->category}}</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="/view/{{ $PSUProduct->id }}">{{ $PSUProduct->product_name}} </a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    ₱{{ number_format($PSUProduct->price, 0, '', ',') }}
                                </div><!-- End .product-price -->

                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                    </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->
                    @endforeach


                </div><!-- End .row -->

                <div class="load-more-container toolbox-right">
                    {{ $showPSUProduct->links()}}
                </div><!-- End .load-more-container -->
            </div><!-- End .products -->
 
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main><!-- End .main -->

@include('partials.footer')

