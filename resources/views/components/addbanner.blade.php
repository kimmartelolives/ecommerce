<div class="modal fade" id="add-banner" tabindex="-1" role="dialog" aria-hidden="true">
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
                            <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin" role="tab" aria-controls="signin" aria-selected="true">Add Banners</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="tab-content-5">
                        <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
                            <form action="/admin/addbanner/{{$showBanner[0]->id}}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf

                                    <input type="hidden" class="form-control" name="user_id" value="{{ auth::user()->id }}" required>
                       
                                <div class="form-group">
                                    <label for="banner_1">Banner #1</label>
                                    <input type="file" class="form-control" name="banner_1" value="{{ $showBanner[0]->banner_1 }}">
                                </div><!-- End .form-group -->
                                @error('banner_1')
                                <p class="text-red-500 text-xs p-1">
                                {{$message}}
                                </p>  
                                @enderror

                                <div class="form-group">
                                    <label for="banner_2">Banner #2</label>
                                    <input type="file" class="form-control" name="banner_2" value="{{ $showBanner[0]->banner_2 }}">
                                </div><!-- End .form-group -->
                                @error('banner_2')
                                <p class="text-red-500 text-xs p-1">
                                {{$message}}
                                </p>  
                                @enderror

                                <div class="form-group">
                                    <label for="banner_3">Banner #3</label>
                                    <input type="file" class="form-control" name="banner_3" value="{{ $showBanner[0]->banner_3 }}">
                                </div><!-- End .form-group -->
                                @error('banner_3')
                                <p class="text-red-500 text-xs p-1">
                                {{$message}}
                                </p>  
                                @enderror

                                <div class="form-group">
                                    <label for="banner_4">Banner #4</label>
                                    <input type="file" class="form-control" name="banner_4" value="{{ $showBanner[0]->banner_4 }}">
                                </div><!-- End .form-group -->
                                @error('banner_4')
                                <p class="text-red-500 text-xs p-1">
                                {{$message}}
                                </p>  
                                @enderror     
                                
                                <div class="form-group">
                                    <label for="banner_5">Trending Banner</label>
                                    <input type="file" class="form-control" name="banner_5" value="{{ $showBanner[0]->banner_5 }}">
                                </div><!-- End .form-group -->
                                @error('banner_5')
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