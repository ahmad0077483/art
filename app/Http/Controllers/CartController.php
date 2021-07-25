<?php

namespace App\Http\Controllers;

use App\Hellper\Cart\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{


    public function cart()
    {
        return view('layouts.cart');
    }


    public function addToCart(Product $product)
    {

        $cart=Cart::instance('cart-art');


        if (Cart::has($product)) {
            Cart::update($product, 1);
        } else {

            Cart::put(
                [
                    'quantity' => 1,
                ],
                $product
            );

        }


        return redirect('/cart');
    }






    public function quantityChange(Request $request)
    {

        $data = $request->validate([
            'quantity' => 'required',
            'id' => 'required',
//            'cart'=>'required'
        ]);


        if (Cart::has($data['id'])) {

            $product = Cart::get($data['id'])['product'];
            Cart::update($data['id'], [
                'quantity' => $data['quantity']
            ]);

            return  response(['status'=>'success']);
        }
        return response(['status' => 'error'], 404);

    }
    public function deleteFromCart($id){
        Cart::delete($id);

        return back();
    }
}
