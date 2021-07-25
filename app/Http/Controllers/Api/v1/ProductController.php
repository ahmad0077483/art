<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use \App\Http\Resources\v1\Product as ProductResource;
use App\Http\Resources\v1\ProductCollection;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {

        $product=Product::paginate(2);
        return  new ProductCollection($product) ;

    }

    public function single(Product $product){

        return new ProductResource($product);
    }


    public function store(Request $request)
    {

        $this->validate($request,[

            'title'=>'required|unique:product|max:255',
            'description'=>'required'
        ]);





//       $validator=Validator::make($request->all() ,[
//
//           'title'=>'required|unique:courses|max:255',
//           'description'=>'required'
//
//       ]);
//
//       if ($validator->fails()){
//
//           return response([
//
//               'data'=>$validator->errors(),
//                  'status'=> 'error'
//
//           ],422);

//       }
//       return  response([
//           'data'=>[],
//           'status'=>'success'
//
//       ],200);

    }

}
