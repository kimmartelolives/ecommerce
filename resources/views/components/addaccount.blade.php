<div class="modal fade" id="add-account" tabindex="-1" role="dialog" aria-hidden="true">
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
                            <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin" role="tab" aria-controls="signin" aria-selected="true">Add New Account</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="tab-content-5">
                        <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
                            <form action="/admin/addaccount" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="role">Role</label>

                                    <select name="role" class="form-control" required> 
                                        <option value="2">Customer</option>  
                                        <option value="1">Admin</option>           
                                    </select> 

                                </div><!-- End .form-group -->
                                @error('role')
                                <p class="text-red-500 text-xs p-1">
                                {{$message}}
                                </p>  
                                @enderror

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" required>
                                </div><!-- End .form-group -->
                                @error('email')
                                <p class="text-red-500 text-xs p-1">
                                {{$message}}
                                </p>  
                                @enderror
    
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" required>
                                </div><!-- End .form-group -->
                                @error('password')
                                <p class="text-red-500 text-xs p-1">
                                {{$message}}
                                </p>  
                                @enderror

                                <div class="form-group">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" class="form-control" name="password_confirmation" required>
                                </div><!-- End .form-group -->
                                @error('password_confirmation')
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