<?php

namespace App\Http\Controllers;

use App\Mail\ContactUs as MailContactUs;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    public function store(Request $request)
    {
        $receiver = env('MAIL_FROM_ADDRESS');

        $contact_us = (new ContactUs());
        $contact_us->name = $request['name'] ?? '';
        $contact_us->email = $request['email'] ?? '';
        $contact_us->subject = $request['subject'] ?? '';
        $contact_us->phone = $request['phone'] ?? '';
        $contact_us->location = $request['location'] ?? '';
        $contact_us->save();
        if(isset($request['email']))
        {
            Mail::to($receiver)->send(new MailContactUs($contact_us));
        }
        return response()->json([
            'status'        => true,
            'status_code'   => 200,
            'message'       => "Contacted Successfully",
            'data'          => $contact_us,
        ]);
    }

    public function showContactUs ()
    {
        $contact_us = ContactUs::all();
        if(count($contact_us)>0)
        {
            return response()->json([
                'status'        => true,
                'status_code'   => 200,
                'message'       => "Record Found Successfully",
                'data'          => $contact_us,
            ]);
        }
        else
        {
            return response()->json([
                'status'        => false,
                'status_code'   => 400,
                'message'       => "Record Not Found",
                'data'          => $contact_us,
            ]);
        }
    }

    public function deleteContactUs ($id)
    {
        $contact_us = ContactUs::find($id);
        if(isset($contact_us))
        {
            $contact_us->delete();
            return response()->json([
                'status'        => true,
                'status_code'   => 200,
                'message'       => "Contact Deleted",
            ]);
        }
        else
        {
            return response()->json([
                'status'        => false,
                'status_code'   => 400,
                'message'       => "Record Not Found",
            ]);
        }
    }

    public function updateContactUs ($id)
    {
        $contact_us = ContactUs::find($id);
        if(isset($contact_us))
        {
            $contact_us->name = $request['name'] ?? '';
            $contact_us->email = $request['email'] ?? '';
            $contact_us->subject = $request['subject'] ?? '';
            $contact_us->phone = $request['phone'] ?? '';
            $contact_us->location = $request['location'] ?? '';
            $contact_us->save();
            return response()->json([
                'status'        => true,
                'status_code'   => 200,
                'message'       => "Record Updated Successfully",
                'data'          => $contact_us,
            ]);
        }
        else
        {
            return response()->json([
                'status'        => false,
                'status_code'   => 400,
                'message'       => "Record Not Found",
            ]);
        }
    }
}
