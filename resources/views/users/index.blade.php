<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
            <h1>User List</h1>
        </div>
        <div>
            <a href="{{ route('create') }}"><button class="btn btn-primary">Add User </button></a>

        </div>
    </div>
       <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Action</th>

          </tr>
        </thead>
        <tbody>
          @forelse ($users as $key=>$user)
            <tr>
                <td>{{ $key+1 ?? '--' }}</td>
                <td>{{ $user->name ?? '--' }}</td>
                <td>{{ $user->email ?? '--' }}</td>
                <td>
                    <span class="badge bg-primary">{{ $user->role ?? '--' }}</span>
                </td>
                <td>
                    {{-- <button class="btn btn-primary"><a style="text-decoration: none; color:white" href="{{ route('delete', ['id'=>$user->id]) }}">Edit</a></button> --}}
                    <button class="btn btn-danger @if(auth()->user()->id == $user->id) disabled @endif "><a style="text-decoration: none; color:white" href="{{ route('delete',['id'=>$user->id]) }}">Delete</a></button>
                </td>
            </tr>
          @empty
            <tr>
                <td colspan="2">No Record Found !</td>
            </tr>
          @endforelse
        </tbody>
      </table>
   </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
