<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){

        $user_id = Auth::user()->id;

        $showBanner = DB::table('banners')
        ->get();

        $showProduct = DB::table('products')
        ->where('quantity', '>=', '1')
        ->get();

        $showLaptopProduct = DB::table('products')
        ->where('quantity', '>=', '1')
        ->where('category', 'Laptop')
        ->get();

        $showProcessorProduct = DB::table('products')
        ->where('quantity', '>=', '1')
        ->where('category', 'Processor')
        ->get();

        $showGPUProduct = DB::table('products')
        ->where('quantity', '>=', '1')
        ->where('category', 'Graphics Card')
        ->get();

        $showPSUProduct = DB::table('products')
        ->where('quantity', '>=', '1')
        ->where('category', 'Power Supply')
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
       
        return view('main.landing', ['showBanner' => $showBanner, 'showProduct' => $showProduct,
         'showLaptopProduct' => $showLaptopProduct, 'showProcessorProduct' => $showProcessorProduct,
         'showGPUProduct' => $showGPUProduct, 'showPSUProduct' => $showPSUProduct,
         'showCart' => $showCart, 'sumCart' => $sumCart, 'countCart' => $countCart]);
    }

    public function account(){

        $user_id = auth::user()->id;

        $showAccount = DB::table('users')
        ->where('id', '=', $user_id)
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
        ->where('user_id', $user_id)
        ->groupBy('unique_token', 'status', 'created_at')
        ->orderBy('status', 'desc')
        ->simplePaginate(10);

        return view('main.account', ['showAccount' => $showAccount, 'showCart' => $showCart, 'sumCart' => $sumCart, 'countCart' => $countCart, 'showOrder' => $showOrder]);
    }

    public function login(){
        if(View::exists('main.portal')){

            return view('main.portal');            
           
        }else{
           // return response()->view('errors.404');
           return abort(404);
        }
    }

    public function register(Request $request){

        $register = $request->validate([
            "email" => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:3',
            'role' =>   'required'
        ]);

        $register['password'] = bcrypt($register['password']);

        User::create($register);
        return back();
    }

    public function process(Request $request){

        $login = $request->validate([
            "email" => ['required', 'email'],
            'password' => 'required',           
        ]);

        $remember = $request->has('remember');

        if(auth()->attempt($login, $remember)){

            $request->session()->regenerate();
            return redirect('/');
            
        }

        return back()->withErrors(['email' => 'Login Failed!'])->onlyInput('email');

    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function addaccount(Request $request){

        $addaccount = $request->validate([
            "email" => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:3',
            'role' =>   'required'
        ]);

        $addaccount['password'] = bcrypt($addaccount['password']);

        User::create($addaccount);
        // return back()->with('message', 'New Account was successfully added!');

          return redirect()->to(url()->previous() . '#tab-accounts')
    ->with('message', 'New Account was successfully added!');
        
     
    }

    public function deleteaccount(User $user){

        $user->delete();
        // return back()->with('message', 'Account was successfully removed!');

         return redirect()->to(url()->previous() . '#tab-accounts')
        ->with('message', 'Account was successfully removed!');
    }

    public function showaccount($id){

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

        $account = User::findorFail($id);
        return view('admin.editaccount', ['account' => $account, 'showCart' => $showCart, 'sumCart' => $sumCart, 'countCart' => $countCart]);
    }

    public function updateaccount(Request $request, User $user){

        $updateaccount = $request->validate([
            "role" => ['required'],
            "first_name" => [''],
            "last_name" => [''],
            "email" => ['required'],
            "country" => [''],
            "postal_code" => [''],
            "phone" => [''],
            "full_address" => ['']
        ]);

        if($request->hasFile('dp_name')){
           
            $request->validate([
                "product_image" => 'mimes:jpeg,jpg,png,bmp,tiff,webp |max:10096'
            ]);

            $filenameWithExtension = $request->file("dp_name");
            $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file("dp_name")->getClientOriginalExtension();
            $filenameToStore = $filename . '_' . time() . '.' .$extension;
            $smallThumbnail = $filename .'_'.time().'.'.$extension;
            $request->file('dp_name')->storeAs('public/user', $filenameToStore);
            $request->file("dp_name")->storeAs('public/user/thumbnail', $smallThumbnail);
            // $thumbnail = 'storage/user/thumbnail/' . $smallThumbnail;
            $thumbnail = public_path('storage/user/thumbnail/' . $smallThumbnail);

            $this->createThumbnail($thumbnail, 150, 93);

            $updateaccount['dp_name'] = $filenameToStore;
        }

        $user->update($updateaccount);
        // return back()->with('message', 'Account was successfully updated!');

        return redirect()->to(url()->previous() . '#tab-accounts')
        ->with('message', 'Account was successfully removed!');
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

    public function customerupdateaccount(Request $request, User $user){

        $updateaccount = $request->validate([
            "first_name" => ['nullable'],
            "last_name" => ['nullable'],
            "email" => ['required', 'email'],
            "full_address" => ['nullable'],
            "country" => ['nullable'],
            "postal_code" => ['nullable'],
            "phone" => ['nullable'],
            'password' => ['nullable', 'confirmed'],
        ]);

        // Only hash password if it's not empty in the request
        if ($request->filled('password')) {
            $updateaccount['password'] = bcrypt($request->input('password'));
        } else {
            unset($updateaccount['password']); // Prevent overriding with null or empty string
        }

        if($request->hasFile('dp_name')){
           
            $request->validate([
                "product_image" => 'mimes:jpeg,jpg,png,bmp,tiff,webp |max:10096'
            ]);

            $filenameWithExtension = $request->file("dp_name");
            $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file("dp_name")->getClientOriginalExtension();
            $filenameToStore = $filename . '_' . time() . '.' .$extension;
            $smallThumbnail = $filename .'_'.time().'.'.$extension;
            $request->file('dp_name')->storeAs('public/user', $filenameToStore);
            $request->file("dp_name")->storeAs('public/user/thumbnail', $smallThumbnail);
            $thumbnail = 'storage/user/thumbnail/' . $smallThumbnail;
            $this->createThumbnail($thumbnail, 150, 93);

            $updateaccount['dp_name'] = $filenameToStore;
        }

        $user->update($updateaccount);

        // return back()->with('message', 'Account was successfully updated!');
       return redirect()->to(url()->previous() . '#tab-account')
    ->with('message', 'Account was successfully updated!');



    }



}
