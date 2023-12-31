<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\HugsIncRegistration;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends controller
{
    public function userLogin(Request $request)
    {
        $credientials =
        [
            'email'     => $request['email'],
            'password'  => $request['password'],
        ];
        $registrations = HugsIncRegistration::latest()->get();
        return Auth::attempt($credientials) ? view('users.index', compact('registrations')) : redirect()->route('login_form');
    }

    public function logout ()
    {
        Auth::logout();
        return redirect()->route('login_form');
    }
}
