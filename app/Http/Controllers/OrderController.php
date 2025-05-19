<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function addcheckoutorder(Request $request){

        $randomString = Str::random(15);

        $user_id = $request->user_id;
        $product_id = $request->product_id;
        $product_total_quantity = $request->product_total_quantity;
        $product_total_price = $request->product_total_price;



        for ($i=0; $i < count($product_id); $i++){
            $save = [
                'user_id' => $user_id[$i],
                'product_id' => $product_id[$i],
                'product_total_quantity' => $product_total_quantity[$i],
                'product_total_price' => $product_total_price[$i],
                'created_at' => date('Y-m-d H:i:s'),
                'status' => 'Processing',
                'unique_token' => $randomString
            ];
            DB::table('orders')
            ->insert($save);

        }

        for ($i=0; $i < count($product_id); $i++){
            DB::table('products')
            ->where('id', $product_id[$i])
            ->decrement('quantity', $product_total_quantity[$i]);
        }

        for ($i=0; $i < count($product_id); $i++){
            DB::table('carts')
            ->where('user_id', $user_id[$i])
            ->delete();
        }

        return redirect('/')->with('message', 'Your order is being processed. Please check your order in account section!');; 
    }

    public function vieworder($token){


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

        $order = DB::table('orders')
        ->join('products', 'orders.product_id', 'products.id')
        ->select('orders.*', 'products.*')
        ->where('orders.unique_token', $token)
        ->get();

        $date = DB::table('orders')
        ->select('created_at')
        ->where('unique_token', $token)
        ->get();

        $total_price = DB::table('orders')
        ->where('unique_token', $token)
        ->selectRaw('SUM(product_total_price * product_total_quantity) as total')
        ->value('total');
        
        $total = $total_price + 100;

        return view('main.vieworder', ['order' => $order, 'showCart' => $showCart, 'sumCart' => $sumCart, 'countCart' => $countCart, 'total' => $total, 'date' => $date]);

    }

    public function updatestatus($token){

        $updatecart = [
            'status' => 'Order Shipped'

        ];

        DB::table('orders')
        ->where('unique_token', $token)
        ->update($updatecart);

        // return back()->with('message', 'Orders was successfully shipped!');

         return redirect()->to(url()->previous() . '#tab-orders')
        ->with('message', 'Orders was successfully shipped!');
    }
}
