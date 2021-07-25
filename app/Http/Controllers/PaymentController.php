<?php

namespace App\Http\Controllers;

use App\Hellper\Cart\Cart;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function payment()
    {
        $cart = Cart::instance('cart-art');
        $cartItems = $cart->all();
        if($cartItems->count()) {
            $price = $cartItems->sum(function($cart) {


                return $cart['discount_percent'] == 0

                    ?  $cart['product']->price * $cart['quantity']
                    : ($cart['product']->price - ($cart['product']->price * $cart['discount_percent'])) * $cart['quantity'];            });
            $orderItems = $cartItems->mapWithKeys(function($cart) {
                return [$cart['product']->id => [ 'quantity' => $cart['quantity']] ];
            });

            $order = auth()->user()->orders()->create([
                'status' => 'unpaid',
                'price' => $price,

            ]);

            $order->products()->attach($orderItems);

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

            Cart::flush();

            return redirect($payment->getPayUrl());
        }

        // alert()->error();
        return back();
    }

    public function callback(Request $request)
    {
        $payment=Payment::where('resnumber',$request->clientrefid)->firstOrFail();


        $token ="d2f90f71cab4e3564734ecad831a3158f89ced93ead50101eb27d5003c32a5d2";

        $payping = new \PayPing\Payment($token);

        try {
            //$payment->priceبجای هزار تومن ها
            if($payping->verify($request->refid , 1000)){

                $payment->update([
                   'status' =>1
                ]);

                $payment->order()->update([

                    'status'=>'paid'

                ]);

                return redirect('/product');

            }else{

                return redirect('/product');

            }
        }
        catch (\Exception $e) {
            $errors = collect(json_decode($e->getMessage() , true));

            return redirect('/product');
        }


    }
}
