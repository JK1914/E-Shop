<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsFilterRequest;
use App\Models\Category;
use App\Models\Product;
use \Debugbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MainController extends Controller
{
    public function index (ProductsFilterRequest $request){ 
        
        //Log::channel('single')->info($request->ip()); 
               
        // $productsQuery = Product::query();

        // Debugbar::info($request->has('price_from'));

        $productsQuery = Product::with('category');
        
        if($request->filled('price_from')){            
            $productsQuery->where('price', '>=', $request->price_from);
        }          

        if($request->filled('price_to')){
            $productsQuery->where('price', '<=', $request->price_to);
        } 

        foreach(['hit', 'new', 'recommend'] as $filed){
            if($request->has($filed)){
                $productsQuery->$filed();
            }
        }       

        $products = $productsQuery->paginate(6)->withPath("?" . $request->getQueryString());
        return view('index', compact('products'));
    }

    public function categories (){
        $categories = Category::get();
        return view('categories', compact('categories'));
    }

    public function category ($code){

        $category = Category::where('code', $code)->first();  
        return view('category', compact('category'));
    }

    public function product ($category, $productCode){     
        $product = Product::withTrashed()->byCode($productCode)->first();    
        return view('product', compact('product'));
    }

    public function basket (){        
        return view('basket');
    }

    public function basketPlace (){        
        return view('order');
    }
}
