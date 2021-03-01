<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RemembersReferrer
{
    public function handle(Request $request, Closure $next)
    {
        if ($referrer = $request->get('referrer')) {
            $request->session()->put('referrer', $referrer);
        }

        return $next($request);
    }
}
