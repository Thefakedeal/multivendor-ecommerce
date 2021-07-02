<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes, HasSlug;


    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->preventOverwrite();
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function product_category(){
        return $this->belongsTo(ProductCategory::class);
    }

    public function vendor(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function getDiscountedPriceAttribute(){
        return ($this->price - $this->discount);
    }

    public function orders(){
        return $this->belongsToMany(Order::class,'order_items');
    }

    public function order_items(){
        return $this->hasMany(OrderItem::class);
    }
}
