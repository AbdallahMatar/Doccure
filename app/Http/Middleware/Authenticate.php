<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        // if (! $request->expectsJson()) {
        //     return route('login');
        // }

        if ($this->auth->guard('admin')) {
            return route('admin.login_view');
        }
        if ($this->auth->guard('doctor')) {
            return route('doctor.login_view');
        }
        if ($this->auth->guard('patient')) {
            return route('patient.login_view');
        }
    }
}
