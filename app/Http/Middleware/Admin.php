<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class Admin
{
    protected $auth;

    /**
     * Admin constructor.
     * @param $auth
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }


    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->user()->group_id != 1) {
            die("Bạn không có quyền truy cập");
        }
        return $next($request);
    }
}
