<?php

namespace App\Providers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('cancel-order', function(User $user, Order $order){
            if($user->user_role == User::ROLE_ADMIN){
                return true;
            }
            if($user->id != $order->user_id){
                return false;
            }
            if($order->status == Order::STATUS_PENDING){
                return true;
            }
            return false;
        });
    }
}
