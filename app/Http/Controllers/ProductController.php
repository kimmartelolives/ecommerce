<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function dashboard(){

        $user_id = Auth::user()->id;

        $showProduct = DB::table('products')
        // ->where('quantity', '>=',  1)
        ->orderBy('updated_at', 'desc')
        ->simplePaginate(10);

        $showAccount = DB::table('users')
        // ->where('quantity', '>=',  1)
        ->orderBy('updated_at', 'desc')
        ->simplePaginate(10);

        $showBanner = DB::table('banners')
        ->get();

        $showCart = DB::table('carts')
        ->join('products', 'carts.product_id', 'products.id')
        ->select('carts.*', 'products.*')
        ->where('carts.user_id', $user_id)
        ->get();

        $sumCart = DB::table('carts')
        ->where('user_id', $user_id)
        ->sum('product_total_price');

        $countCart = DB::table('carts')
        ->where('user_id', $user_id)
        ->count();

        $showOrder = DB::table('orders')
        ->select('unique_token', 'status', 'created_at')
        ->groupBy('unique_token', 'status', 'created_at')
        ->orderBy('status', 'desc')
        ->simplePaginate(10);

        return view('admin.dashboard', ['showProduct' => $showProduct, 'showAccount' => $showAccount, 'showBanner' => $showBanner, 'showCart' => $showCart, 'sumCart' => $sumCart
    , 'countCart' => $countCart, 'showOrder' => $showOrder]);
               
    }

    public function addproduct(Request $request)
{
    $addproduct = $request->validate([
        "product_name" => ['required'],
        "price" => ['required'],
        "category" => ['required'],
        "quantity" => ['required'],
        "overview" => ['required'],
        "description" => ['required'],
    ]);

    if($request->hasFile('product_image')){
           
            $request->validate([
                "product_image" => 'mimes:jpeg,jpg,png,bmp,tiff,webp |max:10096'
            ]);

            $filenameWithExtension = $request->file("product_image");
            $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file("product_image")->getClientOriginalExtension();
            $filenameToStore = $filename . '_' . time() . '.' .$extension;
            $smallThumbnail = $filename .'_'.time().'.'.$extension;
            $request->file('product_image')->storeAs('public/product', $filenameToStore);
            $request->file("product_image")->storeAs('public/product/thumbnail', $smallThumbnail);
            $thumbnail = 'storage/product/thumbnail/' . $smallThumbnail;
            $this->createThumbnail($thumbnail, 150, 93);

            $addproduct['product_image'] = $filenameToStore;
        }

    Product::create($addproduct);
    // return back()->with('message', 'New Product was successfully added!');

     return redirect()->to(url()->previous() . '#tab-products')
    ->with('message', 'New Product was successfully added!');
}


    public function createThumbnail($path, $width, $height){

        $img = Image::make($path)->resize($width, $height, function($constraint){
            $constraint->aspectRatio();
        });
        $img->save($path);

    }

    public function deleteproduct(Product $product){

        $product->delete();
        // return back()->with('message', 'Product was successfully removed!');

        return redirect()->to(url()->previous() . '#tab-products')
        ->with('message', 'Orders was successfully shipped!');
    }
    
    public function showproduct($id){

        $user_id = Auth::user()->id;

        $showCart = DB::table('carts')
        ->join('products', 'carts.product_id', 'products.id')
        ->select('carts.*', 'products.*')
        ->where('carts.user_id', $user_id)
        ->get();

        $sumCart = DB::table('carts')
        ->where('user_id', $user_id)
        ->sum('product_total_price');

        $countCart = DB::table('carts')
        ->where('user_id', $user_id)
        ->count();

        $product = Product::findorFail($id);
        return view('admin.editproduct', ['product' => $product, 'showCart' => $showCart, 'sumCart' => $sumCart, 'countCart' => $countCart]);
    }

    public function viewallproduct(){

        $user_id = Auth::user()->id;

        $showCart = DB::table('carts')
        ->join('products', 'carts.product_id', 'products.id')
        ->select('carts.*', 'products.*')
        ->where('carts.user_id', $user_id)
        ->get();

        $sumCart = DB::table('carts')
        ->where('user_id', $user_id)
        ->sum('product_total_price');

        $countCart = DB::table('carts')
        ->where('user_id', $user_id)
        ->count();

        $showAllProduct = DB::table('products')
        // ->where('quantity', '>=',  1)
        ->orderBy('updated_at', 'desc')
        ->simplePaginate(8);

        return view('main.productcategory', ['showAllProduct' => $showAllProduct, 'showCart' => $showCart, 'sumCart' => $sumCart, 'countCart' => $countCart]);
    }

    public function viewlaptopproduct(){

        $user_id = Auth::user()->id;

        $showCart = DB::table('carts')
        ->join('products', 'carts.product_id', 'products.id')
        ->select('carts.*', 'products.*')
        ->where('carts.user_id', $user_id)
        ->get();

        $sumCart = DB::table('carts')
        ->where('user_id', $user_id)
        ->sum('product_total_price');

        $countCart = DB::table('carts')
        ->where('user_id', $user_id)
        ->count();

        $showLaptopProduct = DB::table('products')
         ->where('category',  'Laptop')
        ->orderBy('updated_at', 'desc')
        ->simplePaginate(8);

        return view('main.productlaptop', ['showLaptopProduct' => $showLaptopProduct, 'showCart' => $showCart, 'sumCart' => $sumCart, 'countCart' => $countCart]);
    }

    public function viewprocessorproduct(){

        $user_id = Auth::user()->id;

        $showCart = DB::table('carts')
        ->join('products', 'carts.product_id', 'products.id')
        ->select('carts.*', 'products.*')
        ->where('carts.user_id', $user_id)
        ->get();

        $sumCart = DB::table('carts')
        ->where('user_id', $user_id)
        ->sum('product_total_price');

        $countCart = DB::table('carts')
        ->where('user_id', $user_id)
        ->count();

        $showProcessorProduct = DB::table('products')
         ->where('category',  'Processor')
        ->orderBy('updated_at', 'desc')
        ->simplePaginate(8);

        return view('main.productprocessor', ['showProcessorProduct' => $showProcessorProduct, 'showCart' => $showCart, 'sumCart' => $sumCart, 'countCart' => $countCart]);

    }

    public function viewgpuproduct(){

        $user_id = Auth::user()->id;

        $showCart = DB::table('carts')
        ->join('products', 'carts.product_id', 'products.id')
        ->select('carts.*', 'products.*')
        ->where('carts.user_id', $user_id)
        ->get();

        $sumCart = DB::table('carts')
        ->where('user_id', $user_id)
        ->sum('product_total_price');

        $countCart = DB::table('carts')
        ->where('user_id', $user_id)
        ->count();

        $showGPUProduct = DB::table('products')
         ->where('category',  'Graphics Card')
        ->orderBy('updated_at', 'desc')
        ->simplePaginate(8);

        return view('main.productgpu', ['showGPUProduct' => $showGPUProduct, 'showCart' => $showCart, 'sumCart' => $sumCart, 'countCart' => $countCart]);

    }

    public function viewpsuproduct(){

        $user_id = Auth::user()->id;

        $showCart = DB::table('carts')
        ->join('products', 'carts.product_id', 'products.id')
        ->select('carts.*', 'products.*')
        ->where('carts.user_id', $user_id)
        ->get();

        $sumCart = DB::table('carts')
        ->where('user_id', $user_id)
        ->sum('product_total_price');

        $countCart = DB::table('carts')
        ->where('user_id', $user_id)
        ->count();

        $showPSUProduct = DB::table('products')
         ->where('category',  'Power Supply')
        ->orderBy('updated_at', 'desc')
        ->simplePaginate(8);

        return view('main.productpsu', ['showPSUProduct' => $showPSUProduct, 'showCart' => $showCart, 'sumCart' => $sumCart, 'countCart' => $countCart]);

    }

    public function viewproduct($product_id){

        $user_id = Auth::user()->id;

        $showCart = DB::table('carts')
        ->join('products', 'carts.product_id', 'products.id')
        ->select('carts.*', 'products.*')
        ->where('carts.user_id', $user_id)
        ->get();

        $sumCart = DB::table('carts')
        ->where('user_id', $user_id)
        ->sum('product_total_price');

        $countCart = DB::table('carts')
        ->where('user_id', $user_id)
        ->count();

        $viewproduct = Product::findorFail($product_id);
        return view('main.product', ['viewproduct' => $viewproduct, 'showCart' => $showCart, 'sumCart' => $sumCart, 'countCart' => $countCart]);

    }

  
    public function updateproduct(Request $request, Product $product){

        $updateproduct = $request->validate([
            "product_name" => ['required'],
            "price" => ['required'],
            "category" => ['required'],
            "quantity" => ['required'],
            "overview" => ['required'],
            "description" => ['required'],
        ]);

        if($request->hasFile('product_image')){
           
            $request->validate([
                "product_image" => 'mimes:jpeg,jpg,png,bmp,tiff,webp |max:10096'
            ]);

            $filenameWithExtension = $request->file("product_image");
            $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file("product_image")->getClientOriginalExtension();
            $filenameToStore = $filename . '_' . time() . '.' .$extension;
            $smallThumbnail = $filename .'_'.time().'.'.$extension;
            $request->file('product_image')->storeAs('public/product', $filenameToStore);
            $request->file("product_image")->storeAs('public/product/thumbnail', $smallThumbnail);
            $thumbnail = 'storage/product/thumbnail/' . $smallThumbnail;
            $this->createThumbnail($thumbnail, 150, 93);

            $updateproduct['product_image'] = $filenameToStore;
        }

        $product->update($updateproduct);
        // return back()->with('message', 'New Product was successfully updated!');

        
        return redirect()->to(url()->previous() . '#tab-products')
        ->with('message', 'New Product was successfully updated');
    }


    public function searchproduct(Request $request)
    {

    $query = $request->input('product');

    $products = Product::where('product_name', 'like', '%' . $query . '%')
        ->orderBy('updated_at', 'desc')
        ->simplePaginate(8);



    
        $user_id = Auth::user()->id;

        $showCart = DB::table('carts')
        ->join('products', 'carts.product_id', 'products.id')
        ->select('carts.*', 'products.*')
        ->where('carts.user_id', $user_id)
        ->get();

        $sumCart = DB::table('carts')
        ->where('user_id', $user_id)
        ->sum('product_total_price');

        $countCart = DB::table('carts')
        ->where('user_id', $user_id)
        ->count();


    return view('main.searchproduct', ['query' => $query,'products' => $products, 'showCart' => $showCart, 'sumCart' => $sumCart, 'countCart' => $countCart]);

    }
   
}
