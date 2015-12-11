<?php

namespace Hazzard\Comments\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

/**
 * Class Moderator
 *
 * @package Hazzard\Comments\Http\Middleware
 */
class Moderator
{

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!($user = \Auth::user()) || !$user->isModerator($request->boards)) {
            if ($request->ajax()) {
                return response()->json('Unauthorizedz.', 401);
            }

            return redirect('/');
        }

        return $next($request);
    }

}
