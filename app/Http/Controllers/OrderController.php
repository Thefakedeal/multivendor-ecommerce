<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\CartService;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orders = $request->user()->orders()->orderBy('created_at','DESC')->paginate(12);
        return view('frontend.orders.index',compact('orders'));
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
        if(count($cart_items)==0){
            return redirect()->back()->with('fail','The Cart Is Empty');
        }
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
        $request->user()->cart_items()->detach();
        
        return redirect(route('user.orders.show',$order->id))->with('success','Order Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $order = $request->user()->orders()->where('id',$id)->with(['products'=>function($query){
            $query->with(['product_category']);
        }])->firstOrFail();
        $total = OrderService::getTotal($order);
        return view('frontend.orders.show',compact('order','total'));
    }


    public function cancel(Request $request, $id){
        $order = $request->user()->orders()->where('id',$id)->firstOrFail();
        if(!Gate::allows('cancel-order',$order)){
            return redirect()->back()->with('fail',"Order Can't Be Cancelled");
        }
        $order->status = Order::STATUS_CANCELLED;
        $order->update();
        return redirect()->back()->with('success','Order Cancelled');
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
