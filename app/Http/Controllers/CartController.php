<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function addcart($product_id){

        $user_id = Auth::user()->id;

        $checkproductexists = DB::table('carts')
        ->where('product_id', $product_id)
        ->where('user_id', $user_id)
        ->first();

        if($checkproductexists == TRUE){

            return back()->with('message', 'Product already exist in your cart. Please check your cart!');   
        }
        else{

            $selectproduct = DB::table('products')
            ->where('id', $product_id)
            ->pluck('price')
            ->first();

            $addtocart['user_id'] = Auth::user()->id;
            $addtocart['product_id'] = $product_id;
            $addtocart['product_total_quantity'] = '1';
            $addtocart['product_total_price'] = $selectproduct;

            DB::table('carts')
            ->insert($addtocart);
            
            return back()->with('message', 'New Product was added to your cart!');

        }
    }

    public function addproductcart(Request $request, Cart $cart){

        $user_id = Auth::user()->id;

        $addcart = $request->validate([
            "product_total_quantity" => ['required'],
            "product_id" => ['']
        ]);

        $product_id = $request->product_id;
        $product_total_quantity = $request->product_total_quantity;

        $checkproductexists = DB::table('carts')
        ->where('product_id', $product_id)
        ->where('user_id', $user_id)
        ->first();

        if($checkproductexists == TRUE){
            
            return back()->with('message', 'Product already exist in your cart. Please check your cart!');

        }

        else{

            $price = DB::table('products')
            ->where('id', $product_id)
            ->pluck('price')
            ->first();

            $product_total_price = $product_total_quantity * $price;

            $addcart['user_id'] = Auth::user()->id;
            $addcart['product_total_price'] = $product_total_price;

            $cart->create($addcart);

            return back()->with('message', 'New Product was added to your cart!');

        }
        
    }

    public function viewcart(){

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

        $total = $sumCart + 100;

        return view('main.cart', ['showCart' => $showCart, 'sumCart' => $sumCart, 'countCart' => $countCart, 'total' => $total]);

    }

    public function deletecartproduct($cart){

        DB::table('carts')
        ->where('product_id', $cart)
        ->delete();
        return back()->with('message', 'Product was successfully removed!');

    }

    public function checkoutcart(){

        $user_id = Auth::user()->id;

        $profile = DB::table('users')
        ->where('id', $user_id)
        ->select('*')
        ->first();

        if($profile->full_address == NULL)

        {

            return redirect('/account')->with('message', 'Please update your billing address. Thank you!');;

        }

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

        $total = $sumCart + 100;

        return view('main.checkoutcart', ['showCart' => $showCart, 'sumCart' => $sumCart, 'countCart' => $countCart, 'total' => $total]);

    }

    public function addcartupdate(Request $request){

        $product_id = $request->product_id;
        $product_total_quantity = $request->product_total_quantity;
        $price = $request->price;     

        for ($i=0; $i < count($product_id); $i++){            


            $updatecart = [
                'product_total_quantity' => $product_total_quantity[$i],
                'product_total_price' => $price[$i] *  $product_total_quantity[$i]
            ];
    
            DB::table('carts')
            ->where('product_id', $product_id[$i])
            ->update($updatecart);


        }

        return back()->with('message', 'Cart was successfully updated!');

    }



}
