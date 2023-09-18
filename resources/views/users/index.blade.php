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
            <h1 class="text-center bg-green text-white">Users</h1>
            <a href="{{ route('logout') }}"> <button class="btn btn-danger" style="margin: 10px">Logout</button></a>
        </div>
   </div>
   <div class="col-md-10 offset-md-1 table_div mt-3">
    <div class="d-flex justify-content-between">
        <div>
            <h1>Registration List</h1>
        </div>
        {{-- <div>
            <a href="{{ route('create') }}"><button class="btn btn-primary">Add User </button></a>
        </div> --}}
    </div>
       <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Full Name</th>
            <th scope="col">Email</th>
            <th scope="col">DOB</th>
            <th scope="col">Registration Date</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @forelse ($registrations as $key=>$registration)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $registration->first_name . ' ' .$registration->last_name ?? '--' }}</td>
                    <td>{{ $registration->email ?? '--' }}</td>
                    <td>{{ $registration->dob ?? '--' }}</td>
                    <td>{{ $registration->registration_date ?? '--' }}</td>
                    <td>
                        <a href="{{ route('user.detail',['id'=>$registration->id]) }}">
                            <button class="btn btn-primary"><i class="bi bi-eye"></i></button>
                        </a>
                        <a href="{{ route('delete',['id'=>$registration->id]) }}">
                            <button class="btn btn-danger">Delete</button>
                        </a>
                    </td>
                </tr>
            @empty
                <tr colspan="6">
                    <td>No Registrations Found !</td>
                </tr>
            @endforelse
        </tbody>
      </table>
   </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
