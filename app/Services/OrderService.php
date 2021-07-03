<?php

namespace App\Services;

use App\Models\Order;

class OrderService {

    public static function getTotal(Order $order){
        $products = $order->products;
        $total = $products->sum(function($item){
            return $item->discounted_price * $item->order_item->quantity ;
        });
        return $total + $order->delivery_charge;
    }
}
