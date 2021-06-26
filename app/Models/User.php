<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    const ROLE_USER = 0;
    const ROLE_VENDOR = 1;
    const ROLE_ADMIN = 2;

    const ROLES = array('User','Vendor','Admin');

    public function getRoleAttribute(){
        switch($this->user_role){
            case 0:
                return 'User';
            case 1:
                return 'Vendor';
            case 2:
                return 'Admin';
            default:
                return 'User';
        }
    }

    public function scopeVendor(Builder $query){
        return $query->where('user_role', $this::ROLE_VENDOR);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function cart_items(){
        return $this->belongsToMany(Product::class,'carts')->withPivot('quantity')->withTimestamps();
    }
}
