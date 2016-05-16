<?php

namespace App\Http\Middleware;

use App\Invite;
use App\Services\AuthPinService;
use Auth;
use Closure;

/**
 * Class CheckIfBoardSaved
 *
 * @package App\Http\Middleware
 */
class CheckIfBoardSaved
{
    /**
     * @var \App\Services\AuthPinService
     */
    private $authPinService;

    /**
     * CheckIfBoardSaved constructor.
     *
     * @param \App\Services\AuthPinService $authPinService
     */
    public function __construct(AuthPinService $authPinService)
    {
        $this->authPinService = $authPinService;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->has('access_key') && $invite = Invite::whereAccessKey($request->get('access_key'))->first())
        {
           /* if($invite->pincode === $invite->board->pincode)*/
            if($invite->pincode === 'yes')
            {
                $this->authPinService->login($invite->board);

                return redirect()->to('board/' . $invite->board->boardname);
            }
        }

        $redirect = false;

        $storedInSession = $this->authPinService->check($request->boardname);

        if (!($user = Auth::user())) {
            if (!$storedInSession) {
                $redirect = true;
            }
        } else {
            if (!$user->boards()->find($request->boardname->id) && !$storedInSession) {
                $redirect = true;
            }
        }

        if ($redirect) {
            return redirect()->route('board.authorize', $request->boardname->boardname);
        }

        return $next($request);
    }

}
