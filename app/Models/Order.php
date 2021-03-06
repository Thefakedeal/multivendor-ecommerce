<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    const DELIVERY_CHARGE = 100;

    protected $attributes = [
        'delivery_charge' => self::DELIVERY_CHARGE,
    ];

    const STATUS = [
        0 => 'Pending',
        1 => 'Delivering',
        2 => 'Delivered',
        3 => 'Cancelled'
    ];

    const STATUS_PENDING = 0;
    const STATUS_DELIVERING = 1;
    const STATUS_DELIVERED = 2;
    const STATUS_CANCELLED = 3;

    const MUNICIPALS = array('Dharan');

    public function getOrderStatusAttribute()
    {
        return self::STATUS[$this->status] ?? 'Pending';
    }

    public function getCodeAttribute(){
        return 'ODR-'.strtoupper(substr($this->municipality,0,3)).'-'.$this->id;
    }

    public function products(){
        return $this->belongsToMany(Product::class,'order_items')->as('order_item')->withPivot('quantity')->withTimestamps()->withTrashed();
    }

    public function order_items(){
        return $this->hasMany(OrderItem::class);
    }

    public function user(){
        return $this->belongsTo(User::class)->withTrashed();
    }
}
