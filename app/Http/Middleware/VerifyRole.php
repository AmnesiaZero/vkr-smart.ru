<?php

namespace App\Http\Middleware;

use Illuminate\Contracts\Auth\Guard;


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


}
