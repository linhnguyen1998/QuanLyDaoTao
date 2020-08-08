<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check())
        {
            $user = Auth::user();
            if($user->quyen == 0)
                return $next($request);
            else
                return redirect('admin/login')->with('loi', 'Admin không thể vào trang dành cho sinh viên');
        }
        else
            return redirect('admin/login');
    }
}
