@include('partials.header')
<main class="main">
    <div class="page-header text-center" style="background-image: url('/assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Update Product<span>{{ $product->product_name }}</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
                <li class="breadcrumb-item active" aria-current="page">Update Product</li>
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
                                <a class="nav-link active" id="tab-dashboard-link" data-toggle="tab" href="#tab-dashboard" role="tab" aria-controls="tab-dashboard" aria-selected="true">Products</a>
                            </li>

                        </ul>
                    </aside><!-- End .col-lg-3 -->

                    <div class="col-md-8 col-lg-9">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard-link">
                                
                                <form action="/admin/{{ $product->id }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf

                                    
                                <div class="flex justify-center items-center my-4">

                                    @php $default_profile = "https://avatars.dicebear.com/api/initials/".$product->product_name.".svg" @endphp
                                    <td>
                                    <img class="w-[200] h-[200] rounded-full" src="{{ $product->product_image ? asset("storage/product/".$product->product_image) : $default_profile }}">
                                    </td>

                                </div>

                                    <div class="form-group">
                                        <label for="product_name">Product Name</label>
                                        <input type="text" class="form-control" name="product_name" value="{{ $product->product_name }}" required>
                                    </div><!-- End .form-group -->
                                    @error('product_name')
                                    <p class="text-red-500 text-xs p-1">
                                    {{$message}}
                                    </p>  
                                    @enderror

                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input type="text" class="form-control" name="price" value="{{ $product->price }}" required>
                                    </div><!-- End .form-group -->
                                    @error('price')
                                    <p class="text-red-500 text-xs p-1">
                                    {{$message}}
                                    </p>  
                                    @enderror
        
                                    <div class="form-group">
                                        <label for="category">Category</label>
    
                                        <select name="category" class="form-control" required> 
                                            <option value="Laptop" {{$product->category == "Laptop" ? 'selected' : ''}}>Laptop</option>  
                                            <option value="Processor" {{$product->category == "Processor" ? 'selected' : ''}}>Processor</option>       
                                            <option value="Graphics Card" {{$product->category == "Graphics Card" ? 'selected' : ''}}>Graphics Card</option> 
                                            <option value="Power Supply" {{$product->category == "Power Supply" ? 'selected' : ''}}>Power Supply</option>       
                                        </select> 
    
                                    </div><!-- End .form-group -->
                                    @error('category')
                                    <p class="text-red-500 text-xs p-1">
                                    {{$message}}
                                    </p>  
                                    @enderror
    
                                    <div class="form-group">
                                        <label for="quantity">Quantity</label>
                                        <input type="number" class="form-control" name="quantity" value="{{ $product->quantity }}" required>
                                    </div><!-- End .form-group -->
                                    @error('quantity')
                                    <p class="text-red-500 text-xs p-1">
                                    {{$message}}
                                    </p>  
                                    @enderror
    
                                    <div class="form-group">
                                        <label for="overview">Overview</label>
                                        <textarea class="form-control" name="overview"required>{{ $product->overview }}</textarea>
                                    </div><!-- End .form-group -->
                                    @error('overview')
                                    <p class="text-red-500 text-xs p-1">
                                    {{$message}}
                                    </p>  
                                    @enderror
    
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" name="description" required>{{ $product->description }}</textarea>
                                    </div><!-- End .form-group -->
                                    @error('description')
                                    <p class="text-red-500 text-xs p-1">
                                    {{$message}}
                                    </p>  
                                    @enderror
    
                                    <div class="form-group">
                                        <label for="product_image">Product Image</label>
                                        <input type="file" class="form-control" name="product_image" value="{{ $product->product_image }}">
                                    </div><!-- End .form-group -->
                                    @error('product_image')
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