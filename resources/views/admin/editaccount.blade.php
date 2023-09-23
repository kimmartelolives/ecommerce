@include('partials.header')
<main class="main">
    <div class="page-header text-center" style="background-image: url('/assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Update Account<span>{{ $account->email }}</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
                <li class="breadcrumb-item active" aria-current="page">Update Account</li>
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
                                <a class="nav-link active" id="tab-dashboard-link" data-toggle="tab" href="#tab-dashboard" role="tab" aria-controls="tab-dashboard" aria-selected="true">Accounts</a>
                            </li>

                        </ul>
                    </aside><!-- End .col-lg-3 -->

                    <div class="col-md-8 col-lg-9">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard-link">
                                
                                <form action="/admin/account/{{ $account->id }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf

                                    
                                <div class="flex justify-center items-center my-4">

                                    @php $default_profile = "https://avatars.dicebear.com/api/initials/".$account->email.".svg" @endphp
                                    <td>
                                    <img class="rounded-full" width="150" height="150" src="{{ $account->dp_name ? asset("storage/user/".$account->dp_name) : $default_profile }}">
                                    </td>

                                </div>

                                    <div class="form-group">
                                        <label for="role">Role</label>

                                        <select name="role" class="form-control" required> 
                                            <option value="2" {{$account->role == "2" ? 'selected' : ''}}>Customer</option>  
                                            <option value="1" {{$account->role == "1" ? 'selected' : ''}}>Admin</option>           
                                        </select> 

                                    </div><!-- End .form-group -->
                                    @error('role')
                                    <p class="text-red-500 text-xs p-1">
                                    {{$message}}
                                    </p>  
                                    @enderror
                                

                                    <div class="form-group">
                                        <label for="first_name">First Name</label>
                                        <input type="text" class="form-control" name="first_name" value="{{ $account->first_name }}">
                                    </div><!-- End .form-group -->
                                    @error('first_name')
                                    <p class="text-red-500 text-xs p-1">
                                    {{$message}}
                                    </p>  
                                    @enderror

                                    <div class="form-group">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" class="form-control" name="last_name" value="{{ $account->last_name }}">
                                    </div><!-- End .form-group -->
                                    @error('last_name')
                                    <p class="text-red-500 text-xs p-1">
                                    {{$message}}
                                    </p>  
                                    @enderror

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" name="email" value="{{ $account->email }}">
                                    </div><!-- End .form-group -->
                                    @error('email')
                                    <p class="text-red-500 text-xs p-1">
                                    {{$message}}
                                    </p>  
                                    @enderror

                                    <div class="form-group">
                                        <label for="country">Country</label>
                                        <input type="text" class="form-control" name="country" value="{{ $account->country }}">
                                    </div><!-- End .form-group -->
                                    @error('country')
                                    <p class="text-red-500 text-xs p-1">
                                    {{$message}}
                                    </p>  
                                    @enderror

                                    <div class="form-group">
                                        <label for="postal_code">Postal Code</label>
                                        <input type="text" class="form-control" name="postal_code" value="{{ $account->postal_code }}">
                                    </div><!-- End .form-group -->
                                    @error('postal_code')
                                    <p class="text-red-500 text-xs p-1">
                                    {{$message}}
                                    </p>  
                                    @enderror

                                    <div class="form-group">
                                        <label for="phone">Phone Number</label>
                                        <input type="text" class="form-control" name="phone" value="{{ $account->phone }}">
                                    </div><!-- End .form-group -->
                                    @error('phone')
                                    <p class="text-red-500 text-xs p-1">
                                    {{$message}}
                                    </p>  
                                    @enderror

                                    <div class="form-group">
                                        <label for="full_address">Full Address</label>
                                        <input type="text" class="form-control" name="full_address" value="{{ $account->full_address }}">
                                    </div><!-- End .form-group -->
                                    @error('full_address')
                                    <p class="text-red-500 text-xs p-1">
                                    {{$message}}
                                    </p>  
                                    @enderror
                                  
                                      
                                    <div class="form-group">
                                        <label for="dp_name">DP Image</label>
                                        <input type="file" class="form-control" name="dp_name" value="{{ $account->dp_name }}">
                                    </div><!-- End .form-group -->
                                    @error('dp_name')
                                    <p class="text-red-500 text-xs p-1">
                                    {{$message}}
                                    </p>  
                                    @enderror
    
                                    
        
                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-outline-primary-2">
                                            <span>Update</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>         
                                    </div><!-- End .form-footer -->
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