<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Models\Products;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('/redirect',[HomeController::class,'redirect']);

Route::get('/',[HomeController::class,'index']);


Route::get('/adminproducts',[AdminController::class,'SetProducts']);
Route::get('/showproducts',[AdminController::class,'ShowProducts']);
Route::resource('/addproducts',AdminController::class);
// Route::view('/products','users.products');
Route::get('/prodct',function(){
    $data=Products::paginate(10);
    return view('users.products',compact('data'));
});

// route for deleting products
Route::get('/deleteProducts/{id}',[AdminController::class,'deleteProducts']);

// route for update products
Route::get('/updateProducts/{id}',[AdminController::class,'updateProducts']);
Route::post('/updateProducts1/{id}',[AdminController::class,'updateProducts1']);


// route for specific product view
Route::view('/details/{id}',[HomeController::class,'details']);

// Add to cart
Route::post('/addtocart/{id}',[HomeController::class,'addtocart']);
Route::get('/cart',[HomeController::class,'cart'])->middleware('auth');
Route::get('/removeFromCart/{id}',[HomeController::class,'removeFromCart']);