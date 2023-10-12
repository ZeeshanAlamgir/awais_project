<?php

namespace App\Http\Controllers;

use App\Models\UserEmail;
use Illuminate\Http\Request;

class UserEmailController extends Controller
{
    public function storeEmail (Request $request)
    {
        $user_email = new UserEmail();
        $user_email->email = $request['user_email'] ?? '';
        $user_email->save();
        return response()->json([
            'message'   => "Email Saved Successfully",
            'status'    => true,
            'code'      => 200,
            'data'      => $user_email ?? '',
        ]);
    }
}
