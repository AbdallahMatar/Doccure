<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // if (Auth::guard($guard)->check()) {
        //     return redirect(RouteServiceProvider::HOME);
        // }

        // return $next($request);

        switch ($guard) {
            case 'admin':
                if (Auth::guard($guard)->check()) {
                    $admin = Auth::guard($guard)->user();
                    if ($admin->status == 'Active') {
                        return redirect(route('admin.dashboard'));
                    } else {
                        return redirect(route('admin.error-500'));
                    }
                }
                break;

            case 'doctor':
                if (Auth::guard($guard)->check()) {
                    $doctor = Auth::guard($guard)->user();
                    if ($doctor->status == 'Active') {
                        return redirect(route('doctor.dashboard'));
                    } else {
                        return redirect(route('admin.error-404'));
                    }
                }
                break;

            case 'patient':
                if (Auth::guard($guard)->check()) {
                    $patient = Auth::guard($guard)->user();
                    if ($patient->stauts == 'Active') {
                        return redirect(route('patient.dashboard'));
                    } else {
                        return redirect(route('admin.error-404'));
                    }
                }
                break;
        }
    }
}
