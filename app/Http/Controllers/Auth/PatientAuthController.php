<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientAuthController extends Controller
{
    //
    public function showLoginView()
    {
        return view('patient.auth.login');
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

        if (Auth::guard('patient')->attempt($credentials)) {
            $patient = Auth::guard('patient')->user();
            if ($patient->status == 'Active') {
                return redirect(route('patient.dashboard'));
            } else {
                return redirect(route('admin.error-500'));
            }
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('patient')->logout();
        $request->session()->invalidate();
        return redirect()->guest(route('patient.login_view'));
    }
}
