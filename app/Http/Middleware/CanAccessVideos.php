<?php

namespace App\Http\Middleware;

use Closure;

class CanAccessVideos
{
    public function handle($request, Closure $next)
    {
        /** @var \App\Models\User $user */
        $user = $request->user();

        if (! $user->canAccessVideos()) {
            abort(401, 'You cannot access the videos');
        }

        return $next($request);
    }
}
