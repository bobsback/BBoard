<?php

namespace App\Http\Middleware;

use Closure;

/**
 * Class CheckIfBoardSaved
 *
 * @package App\Http\Middleware
 */
class CheckIfBoardSaved
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
        $redirect = false;

        if (!($user = \Auth::user())) {
            if (!session('board.' . $request->boardname->id . '.authorized')) {
                $redirect = true;
            }
        } else {
            if (!$user->boards()->find($request->boardname->id)) {
                $redirect = true;
            }
        }

        if ($redirect) {
            return redirect()->route('board.authorize', $request->boardname->boardname);
        }

        return $next($request);
    }

}
