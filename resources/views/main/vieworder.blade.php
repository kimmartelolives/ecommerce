@include('partials.header')
  <style>
    .gradient-custom {

    }
    .card {
      border-radius: 10px;
    }
    .card-footer {
      background-color: #a8729a;
      border-bottom-left-radius: 10px;
      border-bottom-right-radius: 10px;
    }
    .product-image {
      max-width: 100%;
      height: auto;
    }
    @media (max-width: 576px) {
      .text-md-start {
        text-align: center !important;
      }
    }
  </style>
<main class="main">
    <div class="page-header text-center" style="background-image: url('/assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">My orders<span>{{ $order[0]->unique_token }}</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/account">Account</a></li>
                <li class="breadcrumb-item active" aria-current="page">Orders</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="dashboard">
            <div class="container">
                <div class="row">
                    <aside class="col-md-4 col-lg-3">
                        <ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
   
                            <li class="nav-item">
                                <a class="nav-link active" id="tab-dashboard-link" data-toggle="tab" href="#tab-dashboard" role="tab" aria-controls="tab-dashboard" aria-selected="true">Orders</a>
                            </li>

                        </ul>
                    </aside><!-- End .col-lg-3 -->

                    <div class="col-md-8 col-lg-9">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard-link">
                                
                              

                                    
                                <div class="flex justify-center items-center my-4">

       
                                
                                <section class="h-100 gradient-custom py-5">
                                <div class="container h-100">
                                    <div class="row d-flex justify-content-center align-items-center h-100">
                                    <div class="col-lg-10 col-xl-8">
                                        <div class="card">
                                        <div class="card-header px-4 py-5">
                                            <h5 class="text-muted mb-0">Thanks for your Order, <span>{{(Auth::user()->first_name)}}</span>!</h5>
                                        </div>
                                        <div class="card-body p-4">
                                            <div class="d-flex justify-content-between align-items-center mb-4">
                                            <p class="lead fw-normal mb-0">Receipt</p>
                                            <p class="small text-muted mb-0">Order ID : {{ $order[0]->unique_token }}</p>
                                            </div>

                                            <!-- Product 1 -->
                                            <div class="card shadow-0 border mb-4">

                                            <div class="card-body">

                                                 @foreach($order as $orders)

                                                <div class="row">
                                                <div class="col-md-2">

                                                    <img src="{{ $orders->product_image ? asset("storage/product/".$orders->product_image) : $default_profile }}" class="product-image img-fluid mx-auto d-block" style="max-width: 300px; height: auto;">     

                                                </div>
                                                <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                    <p class="text-muted mb-0"> {{ $orders->product_name }}</p>
                                                </div>
                                                <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                    <p class="text-muted mb-0 small">White</p>
                                                </div>
                                                <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                    <p class="text-muted mb-0 small">Capacity: 64GB</p>
                                                </div>
                                                <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                    <p class="text-muted mb-0 small">Qty: {{ $orders->product_total_quantity }}</p>
                                                </div>
                                                <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                    <p class="text-muted mb-0 small">₱{{ number_format($orders->product_total_price, 0, '', ',') }}</p>
                                                </div>
                                                </div>
                                                <hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;">
                                                 @endforeach

                                                
                                                <div class="row d-flex align-items-center">
                                                <div class="col-md-2">
                                                    <p class="text-muted mb-0 small">Order Status</p>
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="progress" style="height: 6px; border-radius: 16px;">


                                                @if( $order[0]->status == 'Processing')

                                                <div class="progress-bar" role="progressbar"
                                                        style="width: 50%; border-radius: 16px; background-color: #ee0909;" aria-valuenow="65"
                                                        aria-valuemin="0" aria-valuemax="100"></div>

                                                @else

                                                    <div class="progress-bar" role="progressbar"
                                                        style="width: 100%; border-radius: 16px; background-color: #09ee11;" aria-valuenow="65"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                @endif

                                                    </div>
                                                    <div class="d-flex justify-content-around mb-1">
                                                    <p class="text-muted mt-1 mb-0 small ms-xl-5">Processing</p>
                                                    <p class="text-muted mt-1 mb-0 small ms-xl-5">Order shipped</p>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>

                                            </div>

            

                                            <!-- Order Details -->
                                            <div class="d-flex justify-content-between pt-2">
                                            <p class="fw-bold mb-0">Order Details</p>
                                           
                                            </div>


                                            <div class="d-flex justify-content-between">
                                            <p class="text-muted mb-0">Invoice Date : {{ date('M d, Y', strtotime($date[0]->created_at)) }}</p>
                                             <p class="text-muted mb-0"><span class="fw-bold me-4">Delivery Charges</span> ₱100</p>
                                            </div>

                                            <div class="d-flex justify-content-between mb-5">
                                          
                                           <p class="text-muted mb-0">Order ID : {{ $order[0]->unique_token }}</p>
                                             <p class="text-muted mb-0"><span class="fw-bold me-4">Total</span> ₱{{ number_format($total, 0, '', ',') }}</p>    
                                            </div>
                                        </div>
             
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                </section>

                                </div>

                                   
                                

                            </div><!-- .End .tab-pane -->


                        </div>
                    </div><!-- End .col-lg-9 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .dashboard -->
    </div><!-- End .page-content -->
</main><!-- End .main -->

@include('partials.footer')