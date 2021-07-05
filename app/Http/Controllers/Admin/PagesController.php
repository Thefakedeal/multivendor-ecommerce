<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        $product_count = Product::count();
        $vendor_count = User::query()->vendor()->count();
        $product_categories = ProductCategory::withCount('products')->get();
        $orders = Order::orderBy('created_at', 'DESC')->take(10)->get();
        $date = Carbon::now()->subDay();
        $new_orders_count = Order::whereDate('created_at','>=',$date)->count();
        $pending_orders_count = Order::pending()->count();
        $delivering_orders_count = Order::delivering()->count();
        $delivered_orders_count = Order::delivered()->count();
        $cancelled_orders_count = Order::delivered()->count();
        return view(
            'admin.pages.home',
            compact(
                'product_count',
                'vendor_count',
                'product_categories',
                'orders',
                'new_orders_count',
                'pending_orders_count',
                'delivering_orders_count',
                'delivered_orders_count',
                'cancelled_orders_count',
            )
        );
    }
}
