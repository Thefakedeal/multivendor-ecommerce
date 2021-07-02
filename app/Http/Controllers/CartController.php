<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cart_items = $request->user()->cart_items()->with(['product_category'])->get();
        $total = CartService::getCartTotal($cart_items);
        return view('frontend.cart.index',compact('cart_items','total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'product_id' => ['required','exists:products,id'],
            'quantity'=> ['required','min:1']
        ]);

        $request->user()->cart_items()
        ->syncWithoutDetaching([$request->product_id => ['quantity'=>$request->quantity]]);

        return redirect()->back()->with('success','Item Added To Cart');
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
    public function destroy(Request $request,$id)
    {
        $request->user()->cart_items()->detach($id);
        return redirect()->back()->with('success', 'Removed From Cart');
    }

    public function clear(Request $request){
        $request->user()->cart_items()->detach();
        return redirect()->back()->with('success','Cart has been cleared');
    }
}
