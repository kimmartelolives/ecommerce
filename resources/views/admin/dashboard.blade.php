@include('partials.header')
@include('components.addproduct')
@include('components.addaccount')
@include('components.addbanner')
<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Admin Page<span>{{ auth::user()->email }}</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Admin Page</li>
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
                                <a class="nav-link active" id="tab-dashboard-link" data-toggle="tab" href="#tab-dashboard" role="tab" aria-controls="tab-dashboard" aria-selected="true">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-products-link" data-toggle="tab" href="#tab-products" role="tab" aria-controls="tab-products" aria-selected="false">Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-orders-link" data-toggle="tab" href="#tab-orders" role="tab" aria-controls="tab-orders" aria-selected="false">Orders</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-accounts-link" data-toggle="tab" href="#tab-accounts" role="tab" aria-controls="tab-accounts" aria-selected="false">Accounts</a>
                            </li>
                           
                        </ul>
                    </aside><!-- End .col-lg-3 -->

                    <div class="col-md-8 col-lg-9">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard-link">
                                <p>Hello <span class="font-weight-normal text-dark">{{ auth::user()->email }}</span>
                                <br>
                                From your account dashboard you can view your <a href="#tab-products" class="tab-trigger-link link-underline">products</a>, manage your <a href="#tab-accounts" class="tab-trigger-link">customer's order</a>, and <a href="#tab-account" class="tab-trigger-link">check customer's account</a>.</p>
                                <br>
                                <a href="#add-banner" data-toggle="modal" class="btn btn-outline-primary-2"><span>Add Banners</span><i class="icon-long-arrow-right"></i></a>
                            </div><!-- .End .tab-pane -->

                            <div class="tab-pane fade" id="tab-products" role="tabpanel" aria-labelledby="tab-products-link">
                                <a href="#add-product" data-toggle="modal" class="btn btn-outline-primary-2"><span>Add New</span><i class="icon-long-arrow-right"></i></a>
                                
                                @include('admin.tableproduct')
                            </div><!-- .End .tab-pane -->

                            <div class="tab-pane fade" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders-link">
                                @if($showOrder->isEmpty())
                                <p>No orders available yet.</p>
                                @else
                                
                                @include('admin.editordertable')
                                @endif
                            </div><!-- .End .tab-pane -->

                            <div class="tab-pane fade" id="tab-accounts" role="tabpanel" aria-labelledby="tab-accounts-link">
                                <a href="#add-account" data-toggle="modal" class="btn btn-outline-primary-2"><span>Add New</span><i class="icon-long-arrow-right"></i></a>                           
                                @include('admin.tableaccount')
                            </div><!-- .End .tab-pane -->

                        </div>
                    </div><!-- End .col-lg-9 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .dashboard -->
    </div><!-- End .page-content -->
</main><!-- End .main -->

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const hash = window.location.hash;
        if (hash) {
            const tabTrigger = document.querySelector(`a[data-toggle="tab"][href="${hash}"]`);
            if (tabTrigger) {
                $(tabTrigger).tab('show');
            }
        }
    });
</script>


@include('partials.footer')