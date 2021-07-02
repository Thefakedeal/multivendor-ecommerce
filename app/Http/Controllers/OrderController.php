<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $municipals = Order::MUNICIPALS;
        $delivery_charge = Order::DELIVERY_CHARGE;
        $cart_items = $request->user()->cart_items()->get();
        $total = CartService::getCartTotal($cart_items);

        return view(
            'frontend.orders.create',
            compact('municipals', 'delivery_charge', 'total')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'municipality' => ['required', Rule::in(Order::MUNICIPALS)],
            'ward' => 'required'
        ]);
        $cart_items = $request->user()->cart_items()->get();

        $order_items = $cart_items->mapWithKeys(function($item){
            return [$item->id => ['quantity' =>$item->cart->quantity]];
        });

        $order = new Order();
        $order->user_id = $request->user()->id;
        $order->street_name = $request->street_name;
        $order->ward = $request->ward;
        $order->municipality = $request->municipality;
        $order->save();

        $order->products()->sync($order_items);
        
        return redirect()->back()->with('success','Order Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
