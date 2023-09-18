<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\HugsIncRegistration;
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
        $registration = HugsIncRegistration::find($id);
        if(isset($registration) && !empty($registration))
        {
            $registration->delete();
            return redirect()->route('users');
        }
        return redirect()->route('users');
    }

    public function create()
    {
        return view('users.create');
    }

    public function users(Request $request)
    {
        $registrations = HugsIncRegistration::all();
        return view('users.index', compact('registrations'));
    }

    public function userDetail($id)
    {
        $registration = HugsIncRegistration::find($id);
        return view('users.show',compact('registration'));
    }
}
