<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('main.landing');
// })->middleware('auth');

Route::get('/', [UserController::class, 'index'])->middleware('auth');


// Route::get('/', [UserController::class, 'index'])
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

Route::post('/login/process', [UserController::class, 'process']);
Route::post('/register', [UserController::class, 'register']);

Route::post('/logout', [UserController::class, 'logout']);

Route::get('/account', [UserController::class, 'account']);
Route::put('/account/{user}', [UserController::class, 'customerupdateaccount']);

Route::get('/admin', [ProductController::class, 'dashboard']);
Route::post('/admin/addproduct', [ProductController::class, 'addproduct']);
Route::get('/admin/{product}', [ProductController::class, 'showproduct']);
Route::delete('/admin/{product}', [ProductController::class, 'deleteproduct']);
Route::put('/admin/{product}', [ProductController::class, 'updateproduct']);
Route::get('/view/all', [ProductController::class, 'viewallproduct']);
Route::get('/view/laptop', [ProductController::class, 'viewlaptopproduct']);
Route::get('/view/processor', [ProductController::class, 'viewprocessorproduct']);
Route::get('/view/gpu', [ProductController::class, 'viewgpuproduct']);
Route::get('/view/psu', [ProductController::class, 'viewpsuproduct']);
Route::get('/view/{product}', [ProductController::class, 'viewproduct']);


Route::get('/cart/{product}', [CartController::class, 'addcart']);
Route::post('/view/cart/add', [CartController::class, 'addproductcart']);
Route::get('/cart/delete/{cart}', [CartController::class, 'deletecartproduct']);
Route::get('/cart', [CartController::class, 'viewcart']);
Route::get('/cart/products/checkout', [CartController::class, 'checkoutcart']);
Route::post('/cart/new/update', [CartController::class, 'addcartupdate']);

Route::post('/cart/products/order', [OrderController::class, 'addcheckoutorder']);
Route::get('/account/orders/{order}', [OrderController::class, 'vieworder']);
Route::post('/admin/orders/{order}', [OrderController::class, 'updatestatus']);


Route::post('/admin/addaccount', [UserController::class, 'addaccount']);
Route::delete('/admin/account/{user}', [UserController::class, 'deleteaccount']);
Route::get('/admin/account/{user}', [UserController::class, 'showaccount']);
Route::put('/admin/account/{user}', [UserController::class, 'updateaccount']);

Route::put('/admin/addbanner/{banner}', [BannerController::class, 'addbanner']);
