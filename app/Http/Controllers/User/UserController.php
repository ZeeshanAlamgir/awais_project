<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index ()
    {
        $users = User::all();
        if(isset($users) && count($users)>0)
        {
            return response()->json([
                'status'    => true,
                'status_code'   => 200,
                'message'   => "Users Found.",
                'users'   => $users,
            ]);
        }
        else
        {
            return response()->json([
                'status'    => false,
                'status_code'   => 400,
                'message'   => "No User Found.",
                'users'     => []
            ]);
        }
    }
}
