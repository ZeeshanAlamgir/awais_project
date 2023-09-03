<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credientials =
        [
            'email' => $request['email'],
            'password' => $request['password'],
        ];
        $is_login = Auth::attempt($credientials) ? true : false;

        if($is_login)
        {
            $user = auth('sanctum')->user();
            if($user)
            {
                return response()->json([
                    'status'    => true,
                    'token'     =>  $user->createToken('MyApp')->plainTextToken,
                    'name'      =>  $user->name,
                    'message'   => "Logged In Successfully",
                    'status_code'   => 200
                ]);
            }
        }
        else
        {
            response()->json([
                'status'    => false,
                'message'   => "Email or Password is incorrect",
                'status_code'   => 400
            ]);
        }
    }
}
