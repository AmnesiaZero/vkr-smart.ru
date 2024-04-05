<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;



class VerifyRole extends \jeremykenedy\LaravelRoles\App\Http\Middleware\VerifyRole
{
    /**
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param Guard $auth
     */
    public function __construct(Guard $auth)
    {
        parent::__construct($auth);
    }


    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$role): Response
    {
        $roles = explode('|', $role);
        for ($i = 0; $i < count($roles); $i++) {
            if ($this->auth->check() && $this->auth->user()->hasRole($roles[$i])) {
                return $next($request);
            }
        }
        return abort(403);
    }
}
