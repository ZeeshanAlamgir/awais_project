<?php

namespace App\Http\Controllers\PreRegistration;

use App\Http\Controllers\Controller;
use App\Http\Repo\HugsIncReg\RegistrationInterface;
use App\Models\HugsIncRegistration;
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

    public function delete(Request $request)
    {
        $is_logged_in = auth('sanctum')->user();
        if($is_logged_in)
        {
            if(isset($request['id']))
            {
                $hugs_reg = HugsIncRegistration::find($request['id']);
                $hugs_reg->delete();
                return response()->json([
                    'status'    => true,
                    'status_code'   => 200,
                    'message'   => "Record Deleted",
                ]);
            }
        }
        else
        {
            return response()->json([
                'status'    => false,
                'status_code'   => 400,
                'message'   => "Please logged In.",
            ]);
        }
    }

    public function show(Request $request)
    {
        $is_logged_in = auth('sanctum')->user();
        if($is_logged_in)
        {
            $hugs_reg = HugsIncRegistration::find($request['id']);
            if(isset($hugs_reg))
            {
                return response()->json([
                    'status'    => true,
                    "data"      => $hugs_reg,
                    'status_code'   => 200,
                    'message'   => "Record Found",
                ]);
            }
            else
            {
                return response()->json([
                    'status'    => false,
                    "data"      => null,
                    'status_code'   => 400,
                    'message'   => "Record Not Found",
                ]);
            }
        }
        else
        {
            return response()->json([
                'status'    => false,
                'status_code'   => 400,
                'message'   => "Please logged In.",
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $id = (int)$id;
        $hug_reg = $this->hug_inc_reg->registration($request->all(), $id);
        if(isset($hug_reg))
        {
            return response()->json([
                'status'    => true,
                'status_code'   => 200,
                'message'   => "Report Updated Successfully.",
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
