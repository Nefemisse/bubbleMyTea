<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Muzzle Bubble</title>
    <link rel="stylesheet" type="text/css" href="css/homepage.css">
</head>

<body>
    @if ($message = Session::get('success'))
        <div class="alert alert-successs">
            {{$message}}
        </div>
    @endif
    <nav class="navbar navbar-light navbar-expend-lg mb-5">
        <ul class="navbar-nav">
            @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('registration') }}">Register</a>
            </li>
            @else
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}">Logout</a>
            </li>
            @endguest
        </ul>
    </nav>
    <div class="container mt-5">
        @yield('content')
    </div>
</body>

</html>
