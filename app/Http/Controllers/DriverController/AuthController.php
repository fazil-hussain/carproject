<?php

namespace App\Http\Controllers\DriverController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function authentication(Request $request)
    {
        $credientials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::guard('driver')->attempt($credientials)) {
            return view('site.index');
        } else {
            return redirect()->back();
        }
    }
    public function logout()
    {
        Auth::guard('driver')->logout();
        return view('site.login');
    }
}
