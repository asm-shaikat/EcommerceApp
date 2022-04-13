<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function SetProducts(){
        return view('admin.adminproducts');
    }
    public function store(Request $request){
        $product= new Products();
        $product->title= $request->has('title')? $request->get('title'):'';
        $product->price= $request->has('price')? $request->get('price'):'';
        $product->amount= $request->has('amount')? $request->get('amount'):'';
        $product->description= $request->has('description')? $request->get('description'):'';
        if($request->hasFile('image')){
            $files = $request->file('image');
            $imageLocation= array();
            $i=0;
            foreach ($files as $file){
                $extension = $file->getClientOriginalExtension();
                $fileName= 'product_'. time() . ++$i . '.' . $extension;
                $location= '/products/uploads/';
                $file->move(public_path() . $location, $fileName);
                $imageLocation[]= $location. $fileName;
            }

            $product->pictures= implode('|', $imageLocation);
            $product->save();
            return back()->with('success', 'Product Successfully Saved!');
        } else{
            return back()->with('error', 'Product was not saved');
        }
        
    }
    public function show(Request $product)
    {
        // $pictures=explode('|',$product->pictures);
        // return view('product_details',compact('pictures','product'));
        dd($product);
    }

    public function ShowProducts(){
        $elements=Products::all();
        return view('admin.showproducts',compact('elements'));
    }
    public function deleteProducts($id){
            $product=Products::find($id);
            $product->delete();
            return redirect()->back();
    }

    public function updateProducts($id){
        $products=Products::find($id);
        return view('admin.updateProducts',compact('products'));
        // dd($products);   
    }

    public function updateProducts1(Request $request,$id){
        $product=Products::find($id);
        // $product->title= $request->has('title')? $request->get('title'):'';
        // $product->price= $request->has('price')? $request->get('price'):'';
        // $product->amount= $request->has('amount')? $request->get('amount'):'';
        // $product->description= $request->has('description')? $request->get('description'):'';
        $product->title=$request->get('title');
        $product->price=$request->get('price');
        $product->amount=$request->get('amount');
        $product->description=$request->get('description');
        if($request->hasFile('image')){
            $files = $request->file('image');
            $imageLocation= array();
            $i=0;
            foreach ($files as $file){
                $extension = $file->getClientOriginalExtension();
                $fileName= 'product_'. time() . ++$i . '.' . $extension;
                $location= '/products/uploads/';
                $file->move(public_path() . $location, $fileName);
                $imageLocation[]= $location. $fileName;
            }

            $product->pictures= implode('|', $imageLocation);    
        } 
        $product->save();
        return redirect()->back();
    }
}
