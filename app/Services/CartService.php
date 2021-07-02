<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;

class CartService {

    public static function getCartTotal(Collection $cart_items){
        $total = $cart_items->sum(function($item){
            return $item->discounted_price * $item->cart->quantity;
        });
        return $total;
    }
}
