<style>
  /* Dark backdrop */
  .modal-backdrop {
    background-color: rgba(0, 0, 0, 0.8) !important;
  }

  /* Modal dialog full screen & center content */
  #productImageModal .modal-dialog {
    max-width: 100vw !important;
    margin: 0 !important;
    padding: 0 !important;
    height: 100vh !important;
    display: flex !important;
    justify-content: center !important;
    align-items: center !important;
  }

  /* Modal content no padding, transparent bg */
  #productImageModal .modal-content {
    background: transparent !important;
    border: none !important;
    padding: 0 !important;
    margin: 0 !important;
    width: 100vw;
    max-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  /* Image fills modal exactly */
  #modalProductImage {
    width: 100vw !important;
    height: auto;
    max-height: 100vh !important;
    object-fit: contain;
    display: block;
    margin: 0 !important;
    padding: 0 !important;
  }

  /* Prevent body scroll when modal open */
  body.modal-open {
    overflow: hidden !important;
  }
</style>


@include('partials.header')
        <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container d-flex align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>


                        <li class="breadcrumb-item">

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
                        
                        </li>
                                           


                        <li class="breadcrumb-item active" aria-current="page">{{ $viewproduct->product_name }}</li>
                    </ol>

                </div>
            </nav>

            <div class="page-content">
                <div class="container">
                    <div class="product-details-top">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="product-gallery product-gallery-vertical">
                                    <div class="row">
                                        <figure class="product-main-image">
                                            @php $default_profile = "https://api.dicebear.com/8.x/initials/svg?seed=" . urlencode($viewproduct->product_name); @endphp
                                            {{-- @php $default_profile = "https://avatars.dicebear.com/api/initials/".$viewproduct->product_name.".svg" @endphp   --}}
                                            <img src="{{ $viewproduct->product_image ? asset("storage/product/".$viewproduct->product_image) : $default_profile }}">       

                                            <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                                <i class="icon-arrows"></i>
                                            </a>
                                        </figure>

                                        <div id="product-zoom-gallery" class="product-image-gallery">
                                            <a class="product-gallery-item active" href="#" data-image="{{ $viewproduct->product_image ? asset("storage/product/".$viewproduct->product_image) : $default_profile }}" data-zoom-image="assets/images/products/single/1-big.jpg">
                                                @php $default_profile = "https://api.dicebear.com/8.x/initials/svg?seed=" . urlencode($viewproduct->product_name); @endphp
                                                {{-- @php $default_profile = "https://avatars.dicebear.com/api/initials/".$viewproduct->product_name.".svg" @endphp   --}}
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

        <!-- Product Image Modal -->
<div class="modal fade" id="productImageModal" tabindex="-1" role="dialog" aria-labelledby="productImageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content bg-dark">
      <div class="modal-body text-center">
        <img id="modalProductImage" src="" class="img-fluid" alt="Product Image">
      </div>
    </div>
  </div>
</div>


<script>
  document.addEventListener('DOMContentLoaded', function () {
    const galleryBtn = document.getElementById('btn-product-gallery');
    const modalImg = document.getElementById('modalProductImage');
    const modal = $('#productImageModal');

    // Your image source (Blade or static URL)
    const imageSrc = `{{ $viewproduct->product_image ? asset('storage/product/' . $viewproduct->product_image) : $default_profile }}`;

    galleryBtn.addEventListener('click', function (e) {
      e.preventDefault();
      modalImg.src = imageSrc;
      modal.modal('show');
    });

    // Close modal when clicking on the image or outside (modal backdrop)
    modalImg.addEventListener('click', () => {
      modal.modal('hide');
    });

    // Optional: Bootstrap modal by default closes when clicking backdrop, so no extra code needed.
  });
</script>


@include('partials.footer')

        