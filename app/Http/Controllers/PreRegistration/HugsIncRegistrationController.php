<?php

namespace App\Http\Controllers\PreRegistration;

use App\Http\Controllers\Controller;
use App\Http\Repo\HugsIncReg\RegistrationInterface;
use Illuminate\Http\Request;

class HugsIncRegistrationController extends Controller
{
    public $hug_inc_reg = '';
    public function __construct(RegistrationInterface $registration_interface)
    {
        return $this->hug_inc_reg = $registration_interface;
    }

    public function store (Request $request)
    {
        $hug_reg = $this->hug_inc_reg->registration($request->all());
        if(isset($hug_reg))
        {
            return response()->json([
                'status'    => true,
                'status_code'   => 200,
                'message'   => "Report Inserted Successfully.",
                'pre_reg'   => $hug_reg,
            ]);
        }
        else
        {
            return response()->json([
                'status'    => false,
                'status_code'   => 400,
                'message'   => "Something went wrong.",
            ]);
        }
    }
}
