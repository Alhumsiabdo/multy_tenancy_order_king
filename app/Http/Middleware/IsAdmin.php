<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->user()) {
            return redirect()->intended('/login');
        }

        if (auth()->user()->role == 'super_admin' || (auth()->user()->role == 'merchant' && auth()->user()->merchant_id == $request->route('merchantId')) || (auth()->user()->role == 'user' && $request->route('id') == auth()->user()->id)) {
            return $next($request);
        }

        return response()->json('Your dont have access this route');
    }
}
