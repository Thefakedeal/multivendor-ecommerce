<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    public function product_category(){
        return $this->belongsTo(ProductCategory::class);
    }

    public function vendor(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function getDiscountedPriceAttribute(){
        return ($this->price - $this->discount);
    }
}