<?php

namespace App\Http\Middleware;

use App\Board;
use App\Services\AuthPinService;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AuthPin
{
    /**
     * @var \App\Services\AuthPinService
     */
    private $authPin;

    /**
     * @var \Illuminate\Http\Request
     */
    private $request;

    /**
     * AuthPin constructor
     *
     * @param \App\Services\AuthPinService $service
     * @param \Illuminate\Contracts\Auth\Guard $auth
     * @param \Illuminate\Http\Request $request
     */
    public function __construct(AuthPinService $service, Guard $auth, Request $request)
    {
        $this->authPin = $service;
        $this->auth = $auth;
        $this->request = $request;
    }

    /**
     * Get boards url
     *
     * @return string
     */
    private function getUrl()
    {
        $url = str_replace('/', '\/', url('board'));
        $url = str_replace('.', '\.', $url);

        return $url;
    }

    /**
     * Extract board from route params
     * @return Board
     */
    private function getBoard()
    {
        if($this->request->has('page_id'))
            return Board::whereId($this->request->get('page_id'))->firstOrFail();

        if(preg_match('/'. $this->getUrl() .'\/(\w+)/', $this->request->fullUrl(), $matches) === 1)
            return Board::where('boardname', $matches[1])->firstOrFail();

        throw new NotFoundHttpException('Board not found');
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
        if($this->auth->check())
            return $next($request);

        if($this->authPin->check($this->getBoard()))
            return $next($request);

        throw new HttpException(401, 'Unauthorized');
    }
}
