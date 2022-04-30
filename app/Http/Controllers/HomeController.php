<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    public function redirect(){

        $usertype=Auth::User()->usertype;
        $username=Auth::user()->name;
        if($usertype=='1'){
            return view('admin.home',compact('username'));
        }
        else{
                $data=Products::paginate(6);
                return view('users.home',compact('data'));
        }

    }
    public function index(){

        if(Auth::id()){
            return redirect('/redirect');
        }
        else{
                $data=Products::paginate(6);
                return view('users.home',compact('data'));
        }
    }
    public function details(Request $request,$id){
        $data=DB::table('products')->where('id',$id)->get();
        return view('users.product_details',compact('data'));
    }
    // addtocart function
    public function addtocart(Request $request,$id){

        if(Auth::id()){
            $user=auth()->user();
            $product=Products::find($id);
            $cart= new cart;
            $cart->name=$user->name;
            $cart->email=$user->email;
            $cart->title=$product->title;
            $cart->price=$product->price;
            $cart->amount=$request->amount;
            $cart->save();
            return redirect()->back();
        }
        else{
            return redirect('login');
        }
        
    }
    // THis function is for viewing cart products
    public function cart(Request $request){
        $usermail=Auth::user()->email;
        $info=cart::where('email',$usermail)->get();
        $i=cart::where('email',$usermail)->get('amount');
        $sum=DB::table('carts')->select('price','amount')->where('email',$usermail)->sum('price');
        // $sum = DB::table('carts')
        //      ->select(DB::raw('SUM(price)'))
        //      ->where('email','usermail')
        //      ->get();
        return view('users.cart',compact('info','i','sum'));
    }


    // This function is for removing cart products
    public function removeFromCart($id){
        Cart::destroy($id);
        return redirect()->back();
    }
    
}
