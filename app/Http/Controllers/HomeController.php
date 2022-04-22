<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $data=Products::find($id);
        // return view('users.product_details',compact('data'));
        // return view('user.product_details');
        // dd($data);
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

        // For testing purpose
        // dd($info);
        return view('users.cart',compact('info','i'));
    }
    // This function is for removing cart products
    public function removeFromCart($id){
        Cart::destroy($id);
        return redirect()->back();
    }
    
}
