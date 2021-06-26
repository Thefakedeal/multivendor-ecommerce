<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $products = Product::query()->paginate(12);
        return view('frontend.pages.home',compact('products'));
    }
}
