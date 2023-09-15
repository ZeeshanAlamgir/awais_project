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
            if(isset($user) && !is_null($user))
            {
                return response()->json([
                    'status'    => true,
                    'status_code' => 200,
                    'name'      =>  $user->name,
                    'role'      =>  $user->role,
                    'message'   => "Logged In Successfully",
                    'token'     =>  $user->createToken('MyApp')->plainTextToken,
                ]);
            }
        }
        else
        {
            return response()->json([
                'status'    => false,
                'message'   => "Invalid Credientials",
                'status_code'   => 400
            ]);
        }
    }
}
