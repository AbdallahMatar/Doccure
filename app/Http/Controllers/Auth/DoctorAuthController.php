<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorAuthController extends Controller
{
    //
    public function showLoginView()
    {
        return view('doctor.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = [
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ];

        if (Auth::guard('doctor')->attempt($credentials)) {
            $doctor = Auth::guard('doctor')->user();
            if ($doctor->status == 'Active') {
                return redirect(route('doctor.dashboard'));
            }else {
                return redirect(route('admin.error-500'));
            }
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('doctor')->logout();
        $request->session()->invalidate();
        return redirect(route('doctor.login_view'));
    }
}
