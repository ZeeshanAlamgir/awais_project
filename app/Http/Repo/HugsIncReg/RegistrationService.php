<?php

namespace App\Http\Repo\HugsIncReg;

use App\Events\SendRegistrationMailEvent;
use App\Mail\RegistrationMail;
use App\Models\HugsIncRegistration;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class RegistrationService implements RegistrationInterface
{
    public function registration($request, $id=null)
    {
        try
        {
            Log::info("Before Registration Api Calling");
            if(isset($id) && !is_null($id))
            {
                $hugs_inc_reg = HugsIncRegistration::find($id);
                if(is_null($hugs_inc_reg))
                {
                    return response()->json([
                        'status'    => false,
                        'status_code'   => 400,
                        'message'   => "Record Not Found",
                    ]);
                }
            }
            else
            {
                $hugs_inc_reg = new HugsIncRegistration();
            }
            DB::transaction( function () use($hugs_inc_reg, $request) {
                $hugs_inc_reg->registration_date = $request['registration_date'] ? date('Y-m-d', strtotime($request['registration_date'])) : null;
                $hugs_inc_reg->bnatp = $request['bnatp'] ?? null;
                $hugs_inc_reg->phlebotomy = $request['phlebotomy'] ?? null;
                $hugs_inc_reg->recert = $request['recert'] ?? null;
                $hugs_inc_reg->first_name = $request['first_name'] ?? null;
                $hugs_inc_reg->last_name = $request['last_name'] ?? null;
                $hugs_inc_reg->middle_name = $request['middle_name'] ?? null;
                $hugs_inc_reg->dob = $request['dob'] ? date('Y-m-d', strtotime($request['dob'])) : null;
                $hugs_inc_reg->current_phone = $request['current_phone'] ?? null;
                $hugs_inc_reg->current_address = $request['current_address'] ?? null;
                $hugs_inc_reg->city = $request['city'] ?? null;
                $hugs_inc_reg->state = $request['state'] ?? null;
                $hugs_inc_reg->zip = $request['zip'] ?? null;
                $hugs_inc_reg->us_citizen = $request['us_citizen'] ?? null;
                $hugs_inc_reg->email = $request['email'] ?? null;
                $hugs_inc_reg->communicable_diseases = $request['communicable_diseases'] ?? null;
                $hugs_inc_reg->criminal_background_check = $request['criminal_background_check'] ?? null;
                $hugs_inc_reg->commit_complete_course = $request['commit_complete_course'] ?? null;
                $hugs_inc_reg->certified_nursing_assistant = $request['certified_nursing_assistant'] ?? null;
                $hugs_inc_reg->phlebotomy_Technician = $request['phlebotomy_Technician'] ?? null;
                $hugs_inc_reg->recertification_of_skills = $request['recertification_of_skills'] ?? null;
                $hugs_inc_reg->rate_yourself = $request['rate_yourself'] ?? null;
                $hugs_inc_reg->cooperation_other = $request['cooperation_other'] ?? null;
                $hugs_inc_reg->afraid_of_blood_other = $request['afraid_of_blood_other'] ?? null;
                $hugs_inc_reg->lift_50_70_lbs = $request['lift_50_70_lbs'] ?? null;
                $hugs_inc_reg->injuries = $request['injuries'] ?? null;
                $hugs_inc_reg->currently_working = $request['currently_working'] ?? null;
                $hugs_inc_reg->employment_affect_class_schedule = $request['employment_affect_class_schedule'] ?? null;
                $hugs_inc_reg->personal_support_completion_course_responsibity = $request['personal_support_completion_course_responsibity'] ?? null;
                $hugs_inc_reg->learning_difficulty = $request['learning_difficulty'] ?? null;
                $hugs_inc_reg->financial_obligations = $request['financial_obligations'] ?? null;
                $hugs_inc_reg->about_hugs_inc_courses = $request['about_hugs_inc_courses'] ?? null;
                $hugs_inc_reg->reffered_by = $request['reffered_by'] ?? null;
                $hugs_inc_reg->sponsor = $request['sponsor'] ?? null;
                $hugs_inc_reg->walk_in = $request['walk_in'] ?? null;
                $hugs_inc_reg->selected_course = $request['selected_course'] ?? null;
                $hugs_inc_reg->save();
            } );
            Log::info("After Registration Api Calling".$hugs_inc_reg);

            if(isset($request['email']) && !empty($request['email']))
            {
                $details =
                [
                    'email'     => $request['email'],
                    'username'  => $request['first_name']. ' '.$request['last_name']
                ];
                event(new SendRegistrationMailEvent($details));
            }
            return $hugs_inc_reg;
        }
        catch (Exception $ex)
        {
            return $ex->getMessage();
        }
    }
}
