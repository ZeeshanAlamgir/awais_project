<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        .main-div {
            background-color: #03C04A;
            padding: 10px;
        }
        body {
            margin: 0px;
        }
    </style>
</head>
<body>
    <div class="main-div">
        <div class="d-flex justify-content-between">
            <h1 class="text-center bg-green text-white">User Details</h1>
            <a href="{{ route('logout') }}"> <button class="btn btn-danger" style="margin: 10px">Logout</button></a>
        </div>
   </div>
   <div class="row mt-3" style="margin-left: 5px; margin-right: 5px">
        <div class="col-md-3">
            Registration Date
            <input type="text" value = "{{ $registration->registration_date ?? '--' }}" disabled class="form-control">
        </div>
        <div class="col-md-3">
            BNATP
            <input type="text" value = "{{ $registration->bnatp ?? '--' }}"  disabled class="form-control">
        </div>
        <div class="col-md-3">
            Phlebotomy
            <input type="text" value = "{{ $registration->phlebotomy ?? '--' }}" class="form-control" disabled>
        </div>
        <div class="col-md-3">
            Recert
            <input type="text" value = "{{ $registration->recert ?? '--' }}" class="form-control" disabled>
        </div>
   </div>
   <div class="row mt-3" style="margin-left: 5px; margin-right: 5px">
        <div class="col-md-3">
            First Name
            <input type="text" value = "{{ $registration->first_name ?? '--' }}" disabled class="form-control">
        </div>
        <div class="col-md-3">
            Middle Name
            <input type="text" value = "{{ $registration->middle_name ?? "--" }}"  disabled class="form-control">
        </div>
        <div class="col-md-3">
            Last Name
            <input type="text" value = "{{ $registration->last_name ?? '--' }}" class="form-control" disabled>
        </div>
        <div class="col-md-3">
            DOB
            <input type="text" value = "{{ $registration->dob ?? '--' }}" class="form-control" disabled>
        </div>
   </div>
   <div class="row mt-3" style="margin-left: 5px; margin-right: 5px">
        <div class="col-md-3">
            Phone No
            <input type="text" value = "{{ $registration->current_phone ?? '--' }}" disabled class="form-control">
        </div>
        <div class="col-md-3">
            Current Address
            <input type="text" value = "{{ $registration->current_address ?? "--" }}"  disabled class="form-control">
        </div>
        <div class="col-md-3">
            City
            <input type="text" value = "{{ $registration->city ?? '--' }}" class="form-control" disabled>
        </div>
        <div class="col-md-3">
            State
            <input type="text" value = "{{ $registration->state  ?? '--' }}" class="form-control" disabled>
        </div>
   </div>
    <div class="row mt-3" style="margin-left: 5px; margin-right: 5px">
        <div class="col-md-3">
            Zip
            <input type="text" value = "{{ $registration->zip ?? '--' }}" disabled class="form-control">
        </div>
        <div class="col-md-3">
            US Citizen
            @if(!is_null($registration->us_citizen))
                @if($registration->us_citizen == 'y')
                    <input type="text" value = "Yes" disabled class="form-control">
                @else
                    <input type="text" value = "No" disabled class="form-control">
                @endif
            @else
                <input type="text" value = "--" disabled class="form-control">
            @endif
        </div>
        <div class="col-md-3">
            Email
            <input type="text" value = "{{ $registration->email ?? '--' }}" class="form-control" disabled>
        </div>
        <div class="col-md-3">
            Communicable Diseases
        @if(!is_null($registration->communicable_diseases))
            @if($registration->communicable_diseases == 'y')
                <input type="text" value = "Yes" disabled class="form-control">
            @else
                <input type="text" value = "No" disabled class="form-control">
            @endif
        @else
            <input type="text" value = "--" disabled class="form-control">
        @endif
        </div>
    </div>
    <div class="row mt-3" style="margin-left: 5px; margin-right: 5px">
        <div class="col-md-3">
            Criminal Background Check
            @if(!is_null($registration->criminal_background_check))
                @if($registration->criminal_background_check == 'y')
                    <input type="text" value = "Yes" disabled class="form-control">
                @else
                    <input type="text" value = "No" disabled class="form-control">
                @endif
            @else
                <input type="text" value = "--" disabled class="form-control">
            @endif
        </div>
        <div class="col-md-3">
            Certified Nursing Assistant
                <input type="text" value = "{{ $registration->certified_nursing_assistant ?? '--' }}" disabled class="form-control">
        </div>
        <div class="col-md-3">
            Phlebotomy Technician
            <input type="text" value = "{{ $registration->phlebotomy_technician ?? '--' }}" class="form-control" disabled>
        </div>
        <div class="col-md-3">
            Recertification Of Skills
            <input type="text" value = "{{ $registration->recertification_of_skills ?? '--' }}" disabled class="form-control">
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

