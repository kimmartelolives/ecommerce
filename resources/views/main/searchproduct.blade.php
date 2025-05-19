@include('partials.header')
@include('components.categoryscript')
<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Search Results for ...<span>{{ $query }}</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item">Search</li>
                <li class="breadcrumb-item active" aria-current="page">{{ $query }}</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
           
            <div class="products">
                <div class="row">
                      @if($products->isEmpty())
                        <h2>No products found</h2>
                    @else
                    @foreach($products as $product)
                    <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                        <div class="product">
                            <figure class="product-media">
                                @if($product->quantity >= 1)
                                <span class="product-label label-sale">{{ $product->quantity }} left.</span>
                                @else
                                <span class="product-label label-out">Out of stock.</span>
                                @endif
                                <a href="/view/{{ $product->id }}">
                                    @php $default_profile = "https://api.dicebear.com/8.x/initials/svg?seed=" . urlencode($product->product_name); @endphp
                                    {{-- @php $default_profile = "https://avatars.dicebear.com/api/initials/".$AllProduct->product_name.".svg" @endphp   --}}
                                    <img src="{{ $product->product_image ? asset("storage/product/".$product->product_image) : $default_profile }}">
                                </a>

                                @if($product->quantity >= 1)
                                <div class="product-action action-icon-top">
                                    <a href="/cart/{{$product->id}}" class="btn-product btn-cart"><span>add to cart</span></a>
                                </div><!-- End .product-action -->
                                @endif
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">{{ $product->category}}</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="/view/{{ $product->id }}">{{ $product->product_name}} </a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    ₱{{ number_format($product->price, 0, '', ',') }}
                                </div><!-- End .product-price -->

                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                    </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->
                    @endforeach
                    @endif


                </div><!-- End .row -->

                <div class="load-more-container toolbox-right">
                    {{ $products->links()}}
                </div><!-- End .load-more-container -->
            </div><!-- End .products -->
 
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main><!-- End .main -->

@include('partials.footer')

