<div class="modal fade" id="add-product" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="icon-close"></i></span>
            </button>
    
            <div class="form-box">
                <div class="form-tab">
                    <ul class="nav nav-pills nav-fill nav-border-anim" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin" role="tab" aria-controls="signin" aria-selected="true">Add New Product</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="tab-content-5">
                        <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
                            <form action="/admin/addproduct" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="product_name">Product Name</label>
                                    <input type="text" class="form-control" name="product_name" required>
                                </div><!-- End .form-group -->
                                @error('product_name')
                                <p class="text-red-500 text-xs p-1">
                                {{$message}}
                                </p>  
                                @enderror

                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="number" class="form-control" name="price" required>
                                </div><!-- End .form-group -->
                                @error('price')
                                <p class="text-red-500 text-xs p-1">
                                {{$message}}
                                </p>  
                                @enderror
    
                                <div class="form-group">
                                    <label for="category">Category</label>

                                    <select name="category" class="form-control" required> 
                                        <option value="Laptop">Laptop</option>  
                                        <option value="Processor">Processor</option>       
                                        <option value="Graphics Card">Graphics Card</option> 
                                        <option value="Graphics Card">Power Supply</option>       
                                    </select> 

                                </div><!-- End .form-group -->
                                @error('category')
                                <p class="text-red-500 text-xs p-1">
                                {{$message}}
                                </p>  
                                @enderror

                                <div class="form-group">
                                    <label for="quantity">Quantity</label>
                                    <input type="number" class="form-control" name="quantity" required>
                                </div><!-- End .form-group -->
                                @error('quantity')
                                <p class="text-red-500 text-xs p-1">
                                {{$message}}
                                </p>  
                                @enderror

                                <div class="form-group">
                                    <label for="overview">Overview</label>
                                    <textarea class="form-control" name="overview" required></textarea>
                                </div><!-- End .form-group -->
                                @error('overview')
                                <p class="text-red-500 text-xs p-1">
                                {{$message}}
                                </p>  
                                @enderror

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" required></textarea>
                                </div><!-- End .form-group -->
                                @error('description')
                                <p class="text-red-500 text-xs p-1">
                                {{$message}}
                                </p>  
                                @enderror

                                <div class="form-group">
                                    <label for="product_image">Product Image</label>
                                    <input type="file" class="form-control" name="product_image" multiple required>
                                </div><!-- End .form-group -->
                                @error('product_image')
                                <p class="text-red-500 text-xs p-1">
                                {{$message}}
                                </p>  
                                @enderror

                                
    
                                <div class="form-footer">
                                    <button type="submit" class="btn btn-outline-primary-2">
                                        <span>Add</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>         
                                </div><!-- End .form-footer -->
                            </form>
    
                        </div><!-- .End .tab-pane -->
                    </div><!-- End .tab-content -->
                </div><!-- End .form-tab -->
            </div><!-- End .form-box -->
        </div><!-- End .modal-body -->
    </div><!-- End .modal-content -->
    </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->