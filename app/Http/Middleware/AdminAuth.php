<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {   $user = Auth::user();
        if(!$user){
            return redirect(route('login'));
        }
        if($user && $user->user_role == User::ROLE_ADMIN){
            return $next($request);
        }
        abort(403);
    }
}
