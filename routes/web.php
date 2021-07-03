<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group([
    'as'=>'frontend.'
], function(){
    Route::get('/',[PagesController::class,'index'])->name('home');
    Route::resource('products',ProductController::class)->only(['index','show']);
});

Route::group([
    'as'=>'user.',
    'middleware'=>'auth'
], function(){
    Route::delete('cart/clear',[CartController::class,'clear'])->name('cart.clear');
    Route::resource('cart',CartController::class)->only(['index','store','destroy']);
    Route::put('order/{id}/cancel',[OrderController::class, 'cancel'])->name('order.cancel');
    Route::resource('orders',OrderController::class)->only(['index','create','store','show']);
});

Auth::routes();

