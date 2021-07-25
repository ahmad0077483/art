<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\Rule;

class OrederbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $orders = Order::query();

        if($search = \request('search')) {
            $orders->where('id' , $search)->orWhere('tracking_serial' , $search);
        }
        $orders = $orders->where('status' , request('type'))->latest()->paginate(30);
        return view('admin.orders.all' , compact('orders'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function show(Order $order)
    {
        $products= $order->products()->latest()->paginate();
        return view('admin.orders.details',compact('products','order'));

    }

    public function payments(Order $order){

        $payments= $order->payments()->latest()->paginate(20);
        return view('admin.orders.payments',compact('payments','order'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function edit(Order $order)
    {
        return view('admin.orders.edit' , compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Application|RedirectResponse|Redirector
     */
    public function update(Request $request, Order $order)
    {
        $data = $this->validate($request , [
            'status' => ['required' , Rule::in(['unpaid' , 'paid' , 'preparation' , 'posted' , 'received' , 'canceled'])],
            'tracking_serial' => 'required'
        ]);

        $order->update($data);
        // alert
        return redirect(route('orders.index') . "?type=$order->status");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Order $order
     * @return Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        // alert()
        return back();
    }
}
