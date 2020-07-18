<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <div class="container-fluid">
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="#">
                Admin
            </a>
            <span class="navbar-text">
                <a href="{{route('logout')}}">Logout</a>
            </span>
        </nav>
        <div class="row">
            <div class="col-sm-3">
                <div class="list-group">
                    <a href="{{route('companies.index')}}" class="list-group-item list-group-item-action">Company</a>
                    <a href="{{route('employees.index')}}" class="list-group-item list-group-item-action">Employe</a>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="card">
                    <div class="card-body">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <script src="{{asset('js/app.js')}}"></script> --}}
</body>
</html>