<?php

namespace App\Http\Controllers;

use App\Hellper\Cart\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function index(){

        $orders=auth()->user()->orders()->paginate(12);
        return view('admin.body.order-list', compact('orders'));
    }


    public function showDetails(Order $order){

        $this->authorize('view',$order);

        return view('admin.body.order-detail',compact('order'));
    }


    public function payment(Order $order){

        $this->authorize('view',$order);

        $products = $order->products;

        // Live price
        $price = $products->sum(function ($product){
            return $product->price * $product->pivot->quantity;
        });

        //update price
        $order->update([
            'price' => $price,
        ]);

        // check inventory
        foreach($products as $product){
            if($product->pivot->quantity > $product->inventory){
                return back();
            }
        }


        $token = "d2f90f71cab4e3564734ecad831a3158f89ced93ead50101eb27d5003c32a5d2";
        $res_number = Str::random();
        $args = [
            // "amount" => $price ,
            "amount" => 1000 ,
            "payerName" => auth()->user()->name,
            "returnUrl" => route('payment.callback'),
            "clientRefId" => $res_number
        ];

        $payment = new \PayPing\Payment($token);

        try {
            $payment->pay($args);
        } catch (\Exception $e) {
            throw $e;
        }
        //echo $payment->getPayUrl();
        $order->payments()->create([
            'resnumber' => $res_number,
        ]);


        return redirect($payment->getPayUrl());


    }


}
