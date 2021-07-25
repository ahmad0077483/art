<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use EloquentBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class ProductPageController extends Controller
{
    public function index()
    {

        $product = Product::query();

        $category = request('category');
        if (isset($category) && trim($category) != '' && $category != 'all') {
            $product->whereHas('categories', function ($product) use ($category) {
                $product->whereId($category);
            });
        };


        if(request('price') == '1') {

            $product->orderBy('price', 'Asc');
        }

        if(request('price') == '1') {
            $product->orderBy('price', 'Asc');
        }





        if(request('order') == '1') {
            $product->oldest();
        } else {
            $product->latest();
        }




        $products= $product->latest()->paginate(20);


        return view('layouts.body.pro.pro',compact('products'));


    }

    public function single(Product $product){

        Redis::incr("views.{$product->id}.products");

return view('layouts.body.pro.single-product',compact('product',));

    }
    public function ProductSearch(Request $request){

        $products = Product::query();
        if ($keyword = request('search')) {

            $products->where('title', 'LIKE', "%{$keyword}%")
                ->orWhere('name', 'LIKE', "%{$keyword}%")
                ->orWhere('id', "%{$keyword}%") ;

        }




        $products = $products->latest()->paginate(20);
        return view('layouts.body.pro.pro',compact('products'));

    }



}
