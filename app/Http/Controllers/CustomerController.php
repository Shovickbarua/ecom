<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Models\Offer;
use App\Models\Notice;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function viewpage(){

        $categories= Category::all();
        $recents= Product::all();
        $offers= Offer::all();
        $notices= Notice::all();
        return view('index',compact('categories','recents','offers','notices'));
    }
    public function shoppage(){
        return view('pages/shop');
    }
    public function propage(){
        $prodetails= Product::all();
        return view('pages/pro',compact('prodetails',));
       
    }
    public function search(Request $request){
        /*$products=Product::orderBy('id','desc')
                ->where('pro_name','LIKE','%'.$request->products.'%')
                ->get(); */
         $products = Product::latest() 
        ->leftjoin('categories','products.cat_id','=','categories.id') 
        ->select('categories.*', 'products.pro_name')
        ->where('pro_name', 'like', '%' .$request->products. '%')
        ->Orwhere('cat_name', 'like', '%' .$request->products. '%')
        ->get(); 

        return view('products.show_pro',compact('products'));
    }
}
