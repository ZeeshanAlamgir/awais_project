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
    <div class="main-div">
        <h1 class="text-center bg-green text-white">Add New User</h1>
    </div>
    <div class="container">
        <div class="mt-3">
            <form method="POST" action="{{ route('store') }}">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <label for="">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="e.g John" required>
                    </div>
                    <div class="col-md-4">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="e.g abc@gmail.com" required>
                    </div>
                    <div class="col-md-4">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="e.g 123456789" required>
                    </div>
                </div>
                <div class="row mt-4 ">
                    <a href="#">
                        <button class="btn btn-primary">Submit</button>
                    </a>
                </div>
            </form>
        </div>
    </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<body>
</html>
