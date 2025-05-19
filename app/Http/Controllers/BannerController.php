<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BannerController extends Controller
{
    public function addbanner(Request $request, Banner $banner){

      
        $addbanner = $request->validate([
            "user_id" => 'required',                
        ]);

        if($request->hasFile('banner_1')){
           
            $request->validate([
                "banner_1" => 'mimes:jpeg,jpg,png,bmp,tiff,webp |max:10096'              
            ]);

            $filenameWithExtension = $request->file("banner_1");
            $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file("banner_1")->getClientOriginalExtension();
            $filenameToStore = $filename . '_' . time() . '.' .$extension;
            $smallThumbnail = $filename .'_'.time().'.'.$extension;
            $request->file('banner_1')->storeAs('public/banner', $filenameToStore);
            $request->file("banner_1")->storeAs('public/banner/thumbnail', $smallThumbnail);
            $thumbnail = 'storage/banner/thumbnail/' . $smallThumbnail;
            // $thumbnail = storage_path('app/public/user/thumbnail/' . $smallThumbnail);
            $this->createThumbnail($thumbnail, 150, 93);

            $addbanner['banner_1'] = $filenameToStore;
        }

        if($request->hasFile('banner_2')){
           
            $request->validate([
                "banner_2" => 'mimes:jpeg,jpg,png,bmp,tiff,webp |max:10096'              
            ]);

            $filenameWithExtension = $request->file("banner_2");
            $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file("banner_2")->getClientOriginalExtension();
            $filenameToStore = $filename . '_' . time() . '.' .$extension;
            $smallThumbnail = $filename .'_'.time().'.'.$extension;
            $request->file('banner_2')->storeAs('public/banner', $filenameToStore);
            $request->file("banner_2")->storeAs('public/banner/thumbnail', $smallThumbnail);
            $thumbnail = 'storage/banner/thumbnail/' . $smallThumbnail;
            // $thumbnail = storage_path('app/public/user/thumbnail/' . $smallThumbnail);
            $this->createThumbnail($thumbnail, 150, 93);

            $addbanner['banner_2'] = $filenameToStore;

        }

        if($request->hasFile('banner_3')){
       
            $request->validate([
                "banner_3" => 'mimes:jpeg,jpg,png,bmp,tiff,webp |max:10096'              
            ]);

            $filenameWithExtension = $request->file("banner_3");
            $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file("banner_3")->getClientOriginalExtension();
            $filenameToStore = $filename . '_' . time() . '.' .$extension;
            $smallThumbnail = $filename .'_'.time().'.'.$extension;
            $request->file('banner_3')->storeAs('public/banner', $filenameToStore);
            $request->file("banner_3")->storeAs('public/banner/thumbnail', $smallThumbnail);
            $thumbnail = 'storage/banner/thumbnail/' . $smallThumbnail;
            // $thumbnail = storage_path('app/public/user/thumbnail/' . $smallThumbnail);
            $this->createThumbnail($thumbnail, 150, 93);

            $addbanner['banner_3'] = $filenameToStore;
            
        }

        if($request->hasFile('banner_4')){
   
            $request->validate([
                "banner_4" => 'mimes:jpeg,jpg,png,bmp,tiff,webp |max:10096'              
            ]);

            $filenameWithExtension = $request->file("banner_4");
            $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file("banner_4")->getClientOriginalExtension();
            $filenameToStore = $filename . '_' . time() . '.' .$extension;
            $smallThumbnail = $filename .'_'.time().'.'.$extension;
            $request->file('banner_4')->storeAs('public/banner', $filenameToStore);
            $request->file("banner_4")->storeAs('public/banner/thumbnail', $smallThumbnail);
            $thumbnail = 'storage/banner/thumbnail/' . $smallThumbnail;
            // $thumbnail = storage_path('app/public/user/thumbnail/' . $smallThumbnail);
            $this->createThumbnail($thumbnail, 150, 93);

            $addbanner['banner_4'] = $filenameToStore;

        }

        if($request->hasFile('banner_5')){

            $request->validate([
                "banner_5" => 'mimes:jpeg,jpg,png,bmp,tiff,webp |max:10096'              
            ]);

            $filenameWithExtension = $request->file("banner_5");
            $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file("banner_5")->getClientOriginalExtension();
            $filenameToStore = $filename . '_' . time() . '.' .$extension;
            $smallThumbnail = $filename .'_'.time().'.'.$extension;
            $request->file('banner_5')->storeAs('public/banner', $filenameToStore);
            $request->file("banner_5")->storeAs('public/banner/thumbnail', $smallThumbnail);
            $thumbnail = 'storage/banner/thumbnail/' . $smallThumbnail;
            // $thumbnail = storage_path('app/public/user/thumbnail/' . $smallThumbnail);
            $this->createThumbnail($thumbnail, 150, 93);

            $addbanner['banner_5'] = $filenameToStore;

        }
        
        $banner->update($addbanner);

        return back()->with('message', 'New Product was successfully updated!');
    }

    public function createThumbnail($path, $width, $height){

          if (!file_exists($path)) {
        throw new \Exception("Image file not found: " . $path);
    }

        $img = Image::make($path)->resize($width, $height, function($constraint){
            $constraint->aspectRatio();
        });
        $img->save($path);

    }

}
