<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    public function delete($id)
    {
        $user = User::find($id);
        if(isset($user) && !empty($user))
        {
            $user->delete();
            return redirect()->route('user.login');
        }
        return redirect()->route('user.login');
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request['username'];
        $user->email = $request['email'];
        $user->role = "Admin";
        $user->password = Hash::make($request['password']);
        $user->save();
        $users = User::all();
        return view('users.index', compact('users'));
    }
}
