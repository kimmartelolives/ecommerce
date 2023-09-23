@include('partials.header')

        <main class="main">
            <div class="intro-section pt-3 pb-3 mb-2">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="intro-slider-container slider-container-ratio mb-2 mb-lg-0">
                                <div class="intro-slider owl-carousel owl-simple owl-dark owl-nav-inside" data-toggle="owl" data-owl-options='{
                                        "nav": false, 
                                        "dots": true,
                                        "responsive": {
                                            "768": {
                                                "nav": true,
                                                "dots": false
                                            }
                                        }
                                    }'>
                                    <div class="intro-slide">
                                        <figure class="slide-image">
                                            <picture>
                                                @php $default_profile = "https://avatars.dicebear.com/api/initials/".$showBanner[0]->banner_1.".svg" @endphp  
                                                <source media="(max-width: 480px)" srcset="{{ $showBanner[0]->banner_1 ? asset("storage/banner/".$showBanner[0]->banner_1) : $default_profile }}">
                                                <img src="{{ $showBanner[0]->banner_1 ? asset("storage/banner/".$showBanner[0]->banner_1) : $default_profile }}" alt="Image Desc">
                                            </picture>
                                        </figure><!-- End .slide-image -->

                                        <div class="intro-content">
                                            <h3 class="intro-subtitle text-primary">Daily Deals</h3><!-- End .h3 intro-subtitle -->
                                            <h1 class="intro-title">
                                                Come <br>Online Shop
                                            </h1><!-- End .intro-title -->

                                            <div class="intro-price">
                                                <sup>Now!</sup>
                                                
                                            </div><!-- End .intro-price -->

                                            <a href="/view/all" class="btn btn-primary btn-round">
                                                <span>Browse</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </a>
                                        </div><!-- End .intro-content -->
                                    </div><!-- End .intro-slide -->

                                </div><!-- End .intro-slider owl-carousel owl-simple -->
                                
                                <span class="slider-loader"></span><!-- End .slider-loader -->
                            </div><!-- End .intro-slider-container -->
                        </div><!-- End .col-lg-8 -->

                        <div class="col-lg-4">
                            <div class="intro-banners">
                                <div class="banner mb-lg-1 mb-xl-2">
                                    <a href="#">
                                        @php $default_profile = "https://avatars.dicebear.com/api/initials/".$showBanner[0]->banner_2.".svg" @endphp  
                                        <img src="{{ $showBanner[0]->banner_2 ? asset("storage/banner/".$showBanner[0]->banner_2) : $default_profile }}" alt="Image Desc">
                                            
                                    </a>

                                    <div class="banner-content">
                                        <h4 class="banner-subtitle d-lg-none d-xl-block"><a href="#">Top Product</a></h4><!-- End .banner-subtitle -->
                                        <h3 class="banner-title"><a href="#">Quality <br>and Affordable</a></h3><!-- End .banner-title -->
                                        <a href="/view/all" class="banner-link">Shop Now<i class="icon-long-arrow-right"></i></a>
                                    </div><!-- End .banner-content -->
                                </div><!-- End .banner -->

                                <div class="banner mb-lg-1 mb-xl-2">
                                    <a href="#">
                                        @php $default_profile = "https://avatars.dicebear.com/api/initials/".$showBanner[0]->banner_3.".svg" @endphp  
                                        <img src="{{ $showBanner[0]->banner_3 ? asset("storage/banner/".$showBanner[0]->banner_3) : $default_profile }}" alt="Image Desc">
                                    </a>

                                    <div class="banner-content">
                                        <h4 class="banner-subtitle d-lg-none d-xl-block"><a href="#">Clearance</a></h4><!-- End .banner-subtitle -->
                                        <h3 class="banner-title"><a href="#">Shop <span>at HOME</span></a></h3><!-- End .banner-title -->
                                        <a href="/view/all" class="banner-link">Shop Now<i class="icon-long-arrow-right"></i></a>
                                    </div><!-- End .banner-content -->
                                </div><!-- End .banner -->

                                <div class="banner mb-0">
                                    <a href="#">
                                        @php $default_profile = "https://avatars.dicebear.com/api/initials/".$showBanner[0]->banner_4.".svg" @endphp  
                                        <img src="{{ $showBanner[0]->banner_4 ? asset("storage/banner/".$showBanner[0]->banner_4) : $default_profile }}" alt="Image Desc">
                                    
                                    </a>

                                    <div class="banner-content">
                                        <h4 class="banner-subtitle d-lg-none d-xl-block"><a href="#">Featured</a></h4><!-- End .banner-subtitle -->
                                        <h3 class="banner-title"><a href="#">Browse <span>Our Hottest Deals</span></a></h3><!-- End .banner-title -->
                                        <a href="/view/all" class="banner-link">Shop Now<i class="icon-long-arrow-right"></i></a>
                                    </div><!-- End .banner-content -->
                                </div><!-- End .banner -->
                            </div><!-- End .intro-banners -->
                        </div><!-- End .col-lg-4 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .intro-section -->

 
            <div class="mb-7 mb-lg-11"></div><!-- End .mb-7 -->



            <div class="container">
                <hr class="mt-3 mb-6">
            </div><!-- End .container -->

            <div class="container trending">
                <div class="heading heading-flex mb-3">
                    <div class="heading-left">
                        <h2 class="title">Trending Products</h2><!-- End .title -->
                    </div><!-- End .heading-left -->

                   <div class="heading-right">
                        <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="trending-all-link" data-toggle="tab" href="#trending-all-tab" role="tab" aria-controls="trending-all-tab" aria-selected="true">All</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="trending-laptop-link" data-toggle="tab" href="#trending-laptop-tab" role="tab" aria-controls="trending-laptop-tab" aria-selected="false">Laptop</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="trending-processor-link" data-toggle="tab" href="#trending-processor-tab" role="tab" aria-controls="trending-processor-tab" aria-selected="false">Processor</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="trending-gpu-link" data-toggle="tab" href="#trending-gpu-tab" role="tab" aria-controls="trending-gpu-tab" aria-selected="false">Graphics Card</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="trending-psu-link" data-toggle="tab" href="#trending-psu-tab" role="tab" aria-controls="trending-psu-tab" aria-selected="false">Power Supply</a>
                            </li>

                        </ul>
                   </div><!-- End .heading-right -->
                </div><!-- End .heading -->

                <div class="row">
                    <div class="col-xl-5col d-none d-xl-block">
                        <div class="banner">
                            <a href="#">
                                @php $default_profile = "https://avatars.dicebear.com/api/initials/".$showBanner[0]->banner_5.".svg" @endphp  
                                <img src="{{ $showBanner[0]->banner_5 ? asset("storage/banner/".$showBanner[0]->banner_5) : $default_profile }}" alt="Image Desc">
                            </a>
                        </div><!-- End .banner -->
                    </div><!-- End .col-xl-5col -->

                    <div class="col-xl-4-5col">
                        <div class="tab-content tab-content-carousel just-action-icons-sm">
                            <div class="tab-pane p-0 fade show active" id="trending-all-tab" role="tabpanel" aria-labelledby="trending-all-link">
                                <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                                    data-owl-options='{
                                        "nav": true, 
                                        "dots": false,
                                        "margin": 20,
                                        "loop": false,
                                        "responsive": {
                                            "0": {
                                                "items":2
                                            },
                                            "480": {
                                                "items":2
                                            },
                                            "768": {
                                                "items":3
                                            },
                                            "992": {
                                                "items":4
                                            }
                                        }
                                    }'>
                                    @foreach($showProduct as $product)
                                    <div class="product product-2">
                                        <figure class="product-media">                                     
                                            <a href="/view/{{ $product->id }}">
                                                @php $default_profile = "https://avatars.dicebear.com/api/initials/".$product->product_name.".svg" @endphp  
                                                <img src="{{ $product->product_image ? asset("storage/product/".$product->product_image) : $default_profile }}">        
                                            </a>
                                            <div class="product-action product-action-dark">
                                                <a href="/cart/{{$product->id}}" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                            
                                            </div><!-- End .product-action -->
                                        </figure><!-- End .product-media -->

                                        <div class="product-body">
                                            <div class="product-cat">
                                                <a href="#">{{ $product->category }}</a>
                                            </div><!-- End .product-cat -->
                                            <h3 class="product-title"><a href="/view/{{ $product->id }}">{{ $product->product_name }} </a></h3><!-- End .product-title -->
                                            <div class="product-price">
                                                ₱{{ number_format($product->price, 0, '', ',') }}
                                            </div><!-- End .product-price -->
                                        </div><!-- End .product-body -->
                                    </div><!-- End .product -->
                                    @endforeach
                                  
                                </div><!-- End .owl-carousel -->
                            </div><!-- .End .tab-pane -->

                            <div class="tab-pane p-0 fade" id="trending-laptop-tab" role="tabpanel" aria-labelledby="trending-laptop-link">
                                <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                                    data-owl-options='{
                                        "nav": true, 
                                        "dots": false,
                                        "margin": 20,
                                        "loop": false,
                                        "responsive": {
                                            "0": {
                                                "items":2
                                            },
                                            "480": {
                                                "items":2
                                            },
                                            "768": {
                                                "items":3
                                            },
                                            "992": {
                                                "items":4
                                            }
                                        }
                                    }'>
                                    @foreach($showLaptopProduct as $LaptopProduct)
                                    <div class="product product-2">
                                        <figure class="product-media">
                                           
                                            <a href="/view/{{ $LaptopProduct->id }}">
                                                @php $default_profile = "https://avatars.dicebear.com/api/initials/".$LaptopProduct->product_name.".svg" @endphp  
                                                <img src="{{ $LaptopProduct->product_image ? asset("storage/product/".$LaptopProduct->product_image) : $default_profile }}">
                                            </a>

                                            <div class="product-action product-action-dark">
                                                <a href="/cart/{{$LaptopProduct->id}}" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>                                            
                                            </div><!-- End .product-action -->
                                        </figure><!-- End .product-media -->

                                        <div class="product-body">
                                            <div class="product-cat">
                                                <a href="#">{{ $LaptopProduct->category }}</a>
                                            </div><!-- End .product-cat -->
                                            <h3 class="product-title"><a href="/view/{{ $LaptopProduct->id }}">{{ $LaptopProduct->product_name }} </a></h3><!-- End .product-title -->
                                            <div class="product-price">
                                                ₱{{ number_format($LaptopProduct->price, 0, '', ',') }}
                                            </div><!-- End .product-price -->


                                        </div><!-- End .product-body -->
                                    </div><!-- End .product -->
                                    @endforeach
                        
                                </div><!-- End .owl-carousel -->
                            </div><!-- .End .tab-pane -->
                            <div class="tab-pane p-0 fade" id="trending-processor-tab" role="tabpanel" aria-labelledby="trending-processor-link">
                                <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                                    data-owl-options='{
                                        "nav": true, 
                                        "dots": false,
                                        "margin": 20,
                                        "loop": false,
                                        "responsive": {
                                            "0": {
                                                "items":2
                                            },
                                            "480": {
                                                "items":2
                                            },
                                            "768": {
                                                "items":3
                                            },
                                            "992": {
                                                "items":4
                                            }
                                        }
                                    }'>
                                    @foreach($showProcessorProduct as $ProcessorProduct)
                                    <div class="product product-2">
                                        <figure class="product-media">
                                            <a href="/view/{{ $ProcessorProduct->id }}">
                                                @php $default_profile = "https://avatars.dicebear.com/api/initials/".$ProcessorProduct->product_name.".svg" @endphp  
                                                <img src="{{ $ProcessorProduct->product_image ? asset("storage/product/".$ProcessorProduct->product_image) : $default_profile }}">      
                                            </a>
                                            <div class="product-action product-action-dark">
                                                <a href="/cart/{{$ProcessorProduct->id}}" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>                                        
                                            </div><!-- End .product-action -->
                                        </figure><!-- End .product-media -->

                                        <div class="product-body">
                                            <div class="product-cat">
                                                <a href="#">{{ $ProcessorProduct->category }}</a>
                                            </div><!-- End .product-cat -->
                                            <h3 class="product-title"><a href="/view/{{ $ProcessorProduct->id }}">{{ $ProcessorProduct->product_name }}</a></h3><!-- End .product-title -->
                                            <div class="product-price">
                                                ₱{{ number_format($ProcessorProduct->price, 0, '', ',') }}
                                            </div><!-- End .product-price -->

                                        </div><!-- End .product-body -->
                                    </div><!-- End .product -->
                                    @endforeach

                                </div><!-- End .owl-carousel -->
                            </div><!-- .End .tab-pane -->
                            <div class="tab-pane p-0 fade" id="trending-gpu-tab" role="tabpanel" aria-labelledby="trending-gpu-link">
                                <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                                    data-owl-options='{
                                        "nav": true, 
                                        "dots": false,
                                        "margin": 20,
                                        "loop": false,
                                        "responsive": {
                                            "0": {
                                                "items":2
                                            },
                                            "480": {
                                                "items":2
                                            },
                                            "768": {
                                                "items":3
                                            },
                                            "992": {
                                                "items":4
                                            }
                                        }
                                    }'>
                                    @foreach($showGPUProduct as $GPUProduct)
                                    <div class="product product-2">
                                        <figure class="product-media">
                                            <a href="/view/{{ $GPUProduct->id }}">
                                                @php $default_profile = "https://avatars.dicebear.com/api/initials/".$GPUProduct->product_name.".svg" @endphp  
                                                <img src="{{ $GPUProduct->product_image ? asset("storage/product/".$GPUProduct->product_image) : $default_profile }}">
                                            </a>                                          

                                            <div class="product-action product-action-dark">
                                                <a href="/cart/{{$GPUProduct->id}}" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>                                           
                                            </div><!-- End .product-action -->
                                        </figure><!-- End .product-media -->

                                        <div class="product-body">
                                            <div class="product-cat">
                                                <a href="#">{{ $GPUProduct->category }}</a>
                                            </div><!-- End .product-cat -->
                                            <h3 class="product-title"><a href="/view/{{ $GPUProduct->id }}">{{ $GPUProduct->product_name }}</a></h3><!-- End .product-title -->
                                            <div class="product-price">
                                                ₱{{ number_format($GPUProduct->price, 0, '', ',') }}
                                            </div><!-- End .product-price -->
                                        </div><!-- End .product-body -->
                                    </div><!-- End .product -->
                                    @endforeach     
                                </div><!-- End .owl-carousel -->
                            </div><!-- .End .tab-pane -->
                            <div class="tab-pane p-0 fade" id="trending-psu-tab" role="tabpanel" aria-labelledby="trending-psu-link">
                                <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                                    data-owl-options='{
                                        "nav": true, 
                                        "dots": false,
                                        "margin": 20,
                                        "loop": false,
                                        "responsive": {
                                            "0": {
                                                "items":2
                                            },
                                            "480": {
                                                "items":2
                                            },
                                            "768": {
                                                "items":3
                                            },
                                            "992": {
                                                "items":4
                                            }
                                        }
                                    }'>
                                    @foreach($showPSUProduct as $PSUProduct)
                                    <div class="product product-2">
                                        <figure class="product-media">
                                            <a href="/view/{{ $PSUProduct->id }}">
                                                @php $default_profile = "https://avatars.dicebear.com/api/initials/".$PSUProduct->product_name.".svg" @endphp  
                                                <img src="{{ $PSUProduct->product_image ? asset("storage/product/".$PSUProduct->product_image) : $default_profile }}">
                                            </a>
                                            <div class="product-action product-action-dark">
                                                <a href="/cart/{{$PSUProduct->id}}" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                            </div><!-- End .product-action -->
                                        </figure><!-- End .product-media -->

                                        <div class="product-body">
                                            <div class="product-cat">
                                                <a href="#">{{ $PSUProduct->category }}</a>
                                            </div><!-- End .product-cat -->
                                            <h3 class="product-title"><a href="/view/{{ $PSUProduct->id }}">{{ $PSUProduct->product_name }}</a></h3><!-- End .product-title -->
                                            <div class="product-price">
                                                ₱{{ number_format($PSUProduct->price, 0, '', ',') }}
                                            </div><!-- End .product-price -->
                                        </div><!-- End .product-body -->
                                    </div><!-- End .product -->
                                    @endforeach
                                </div><!-- End .owl-carousel -->
                            </div><!-- .End .tab-pane -->

                        </div><!-- End .tab-content -->
                    </div><!-- End .col-xl-4-5col -->
                </div><!-- End .row -->
            </div><!-- End .container -->

            <div class="container">
                <hr class="mt-5 mb-6">
            </div><!-- End .container -->

        </main><!-- End .main -->


@include('partials.footer')
