@include('partials.header')
<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">My Account<span>{{$showAccount[0]->email}}</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>

                <li class="breadcrumb-item active" aria-current="page">My Account</li>
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
                                <a class="nav-link" id="tab-orders-link" data-toggle="tab" href="#tab-orders" role="tab" aria-controls="tab-orders" aria-selected="false">Orders</a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" id="tab-address-link" data-toggle="tab" href="#tab-address" role="tab" aria-controls="tab-address" aria-selected="false">Address</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-account-link" data-toggle="tab" href="#tab-account" role="tab" aria-controls="tab-account" aria-selected="false">Account Details</a>
                            </li>
                            <li class="nav-item">
                                <form action="/logout" method="POST">
                                @csrf
                                <button type="submit" class="nav-link">Sign Out</button>
                                </form>
                            </li>
                        </ul>
                    </aside><!-- End .col-lg-3 -->

                    <div class="col-md-8 col-lg-9">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard-link">
                                <p>Hello <span class="font-weight-normal text-dark">{{$showAccount[0]->email}}</span>
                                <br>
                                From your account dashboard you can view your <a href="#tab-orders" class="tab-trigger-link link-underline">recent orders</a>, manage your <a href="#tab-address" class="tab-trigger-link">shipping and billing addresses</a>, and <a href="#tab-account" class="tab-trigger-link">edit your password and account details</a>.</p>
                            </div><!-- .End .tab-pane -->

                            <div class="tab-pane fade" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders-link">
                                @if($showOrder->isEmpty())
                                <p>No order has been made yet.</p>
                                <a href="/view/all" class="btn btn-outline-primary-2"><span>GO SHOP</span><i class="icon-long-arrow-right"></i></a>
                                @else
                                @include('main.ordertable')
                                @endif

                            </div><!-- .End .tab-pane -->                        

                            <div class="tab-pane fade" id="tab-address" role="tabpanel" aria-labelledby="tab-address-link">
                                <p>This address will be used on the checkout page by default.</p>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="card card-dashboard">
                                            <div class="card-body">
                                                <h3 class="card-title">Billing / Shipping Address</h3><!-- End .card-title -->

                                                <p>{{$showAccount[0]->first_name}} {{$showAccount[0]->last_name}}<br>
                                                {{$showAccount[0]->full_address}}<br>
                                                {{$showAccount[0]->country}}, {{$showAccount[0]->postal_code}}<br>
                                                {{$showAccount[0]->phone}}<br>
                                                {{$showAccount[0]->email}}<br>
                                                <a href="#tab-account" class="tab-trigger-link link-underline">Manage <i class="icon-edit"></i></a></p>
                                            </div><!-- End .card-body -->
                                        </div><!-- End .card-dashboard -->
                                    </div><!-- End .col-lg-6 -->

                                </div><!-- End .row -->
                            </div><!-- .End .tab-pane -->

                            <div class="tab-pane fade" id="tab-account" role="tabpanel" aria-labelledby="tab-account-link">
                                <form action="/account/{{$showAccount[0]->id}}" method="POST" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="flex justify-center items-center my-4">

                                        @php $default_profile = "https://avatars.dicebear.com/api/initials/".$showAccount[0]->email.".svg" @endphp
                                        <td>
                                        <img class="rounded-full" width="150" height="150" src="{{ $showAccount[0]->dp_name ? asset("storage/user/".$showAccount[0]->dp_name) : $default_profile }}">
                                        </td>
    
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" name="first_name" value="{{$showAccount[0]->first_name}}" required>
                                        </div><!-- End .col-sm-6 -->
                                        @error('first_name')
                                        <p class="text-red-500 text-xs p-1">
                                        {{$message}}
                                        </p>  
                                        @enderror

                                        <div class="col-sm-6">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" name="last_name" value="{{$showAccount[0]->last_name}}" required>
                                        </div><!-- End .col-sm-6 -->
                                    </div><!-- End .row -->
                                    @error('last_name')
                                    <p class="text-red-500 text-xs p-1">
                                    {{$message}}
                                    </p>  
                                    @enderror

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" name="email" value="{{$showAccount[0]->email}}" readonly required>
                                    </div><!-- End .form-group -->
                                    @error('email')
                                    <p class="text-red-500 text-xs p-1">
                                    {{$message}}
                                    </p>  
                                    @enderror

                                    <div class="form-group">
                                        <label for="full_address">Address</label>
                                        <input type="text" class="form-control" name="full_address" value="{{$showAccount[0]->full_address}}" required>
                                    </div><!-- End .form-group -->
                                    @error('full_address')
                                    <p class="text-red-500 text-xs p-1">
                                    {{$message}}
                                    </p>  
                                    @enderror

                                    <div class="form-group">
                                        <label for="country">Country</label>
                                        <input type="text" class="form-control" name="country" value="{{$showAccount[0]->country}}" required>
                                    </div><!-- End .form-group -->
                                    @error('country')
                                    <p class="text-red-500 text-xs p-1">
                                    {{$message}}
                                    </p>  
                                    @enderror

                                    <div class="form-group">
                                        <label for="postal_code">Postal Code</label>
                                        <input type="text" class="form-control" name="postal_code" value="{{$showAccount[0]->postal_code}}" required>
                                    </div><!-- End .form-group -->
                                    @error('postal_code')
                                    <p class="text-red-500 text-xs p-1">
                                    {{$message}}
                                    </p>  
                                    @enderror

                                    <div class="form-group">
                                        <label for="phone">Phone Number</label>
                                        <input type="text" class="form-control" name="phone" value="{{$showAccount[0]->phone}}" required>
                                    </div><!-- End .form-group -->
                                    @error('phone')
                                    <p class="text-red-500 text-xs p-1">
                                    {{$message}}
                                    </p>  
                                    @enderror

                                    <label>New password</label>
                                    <input type="password" class="form-control" name="password">
                                    @error('password')
                                    <p class="text-red-500 text-xs p-1">
                                    {{$message}}
                                    </p>  
                                    @enderror

                                    <label>Confirm new password</label>
                                    <input type="password" class="form-control mb-2" name="password_confirmation">
                                    @error('password_confirmation')
                                    <p class="text-red-500 text-xs p-1">
                                    {{$message}}
                                    </p>  
                                    @enderror

                                  
                                      
                                    <div class="form-group">
                                        <label for="dp_name">DP Image</label>
                                        <input type="file" class="form-control" name="dp_name" value="{{$showAccount[0]->dp_name}}">
                                    </div><!-- End .form-group -->
                                    @error('dp_name')
                                    <p class="text-red-500 text-xs p-1">
                                    {{$message}}
                                    </p>  
                                    @enderror

                                   
                                    <button type="submit" class="btn btn-outline-primary-2">
                                        <span>SAVE CHANGES</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>
                                </form>
                            </div><!-- .End .tab-pane -->
                        </div>
                    </div><!-- End .col-lg-9 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .dashboard -->
    </div><!-- End .page-content -->
</main><!-- End .main -->

@include('partials.footer')