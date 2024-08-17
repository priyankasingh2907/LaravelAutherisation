<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class AccountAuthenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login.index');
    }
    protected function authenticate($request, array $guards)
    {
        if ($this->auth->guard('account')->check()) {
            return $this->auth->shouldUse('account');
        }
        $this->unauthenticated($request, ['account']);
    }

}
