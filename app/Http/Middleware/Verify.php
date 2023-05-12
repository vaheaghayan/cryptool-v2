<?php

namespace App\Http\Middleware;

use App\Models\User\User;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;

class Verify
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        dd(1);
        if ($request->user()->status != User::STATUS_VERIFIED) {
            return redirect(RouteServiceProvider::HOME);
        }

        return $next($request);
    }
}
