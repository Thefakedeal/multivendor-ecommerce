<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $products = Product::query()->with(['product_category'])
        ->orderBy('created_at','DESC')->paginate(12)->fragment('products');
        return view('frontend.pages.home',compact('products'));
    }
}
