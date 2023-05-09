<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="HandheldFriendly" content="true">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
    <title>Muzzle Bubble</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.0/css/all.css" crossorigin="anonymous">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" type="text/css" href="css/homepage.css">
    <link href="https://fonts.googleapis.com/css2?family=Edu+SA+Beginner&family=Gluten&display=swap" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="css/img/logo.jpeg">
</head>

<body>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif
    <section class="navbar navbar-default">
        <nav class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="/"><img class="logo" src="css/img/logo.jpeg" alt="logo"></a>
            </div>
            <div class="right">
                <ul class="nav navbar-nav">
                    <li class="nav-item"><a class="active" href="/">Home</a></li>
                    <li class="nav-item"><a href="order">Order</a></li>
                    <li class="nav-item"><a href="aboutUs">About us</a></li>
                    <li class="nav-item"><a href="dashboard">Account</a></li>
                </ul>
                <div class="search_bar">
                    <form action=" {{ 'search' }} " method="GET" role="search">
                        <div class="input-group">
                            <input type="search" name="search" value="" placeholder="Find your bubble tea"
                                class="form-control">
                            <button type="submit" class="btn bg-white">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div>
                    <!-- Button trigger modal -->
                    <button type="sumbit" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModal"><i class="fa-solid fa-user"></i></button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title fs-5" id="exampleModalLabel">
                                        <a href="#login">Login</a>
                                        <a href="#registration">Register</a>
                                    </h2>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body" id="login">
                                    <div class="row justify-content-center">
                                        <div class="col-md-9">
                                            <div class="card">

                                                <div class="card-header">Login</div>
                                                <div class="card-body">
                                                    <form action="{{ route('sample.validate_login') }}" method="POST">
                                                        @csrf
                                                        <div class="form-group mb-3">
                                                            <input type="text" name="email" class="form-control"
                                                                placeholder="Email">
                                                            @if ($errors->has('email'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('email') }}</span>
                                                            @endif
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <input type="password" name="password" class="form-control"
                                                                placeholder="Password">
                                                            @if ($errors->has('password'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('password') }}</span>
                                                            @endif
                                                        </div>
                                                        <div class="d-grid mx-auto">
                                                            <button type="submit"
                                                                class="btn btn-dark btn-block">Login</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-md-9" id="registration">
                                            <div class="card">
                                                <div class="card-header">Registration</div>
                                                <div class="card-body">
                                                    <form action="{{ route('sample.validate_registration') }}"
                                                        method="POST">
                                                        @csrf
                                                        <div class="form-group mb-3">
                                                            <input type="text" name="firstname"
                                                                class="form-control" placeholder="First name">
                                                            @if ($errors->has('firstname'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('firstname') }}</span>
                                                            @endif
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <input type="text" name="lastname"
                                                                class="form-control" placeholder="Last name">
                                                            @if ($errors->has('lastname'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('lastname') }}</span>
                                                            @endif
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <input type="text" name="adress" class="form-control"
                                                                placeholder="Address">
                                                            @if ($errors->has('adress'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('adress') }}</span>
                                                            @endif
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <input type="tel" name="phone_number"
                                                                class="form-control" placeholder="Phone number">
                                                            @if ($errors->has('phone_number'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('phone_number') }}</span>
                                                            @endif
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <input type="email" name="email" class="form-control"
                                                                placeholder="Email">
                                                            @if ($errors->has('email'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('email') }}</span>
                                                            @endif
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <input type="password" name="password"
                                                                class="form-control" placeholder="Password">
                                                            @if ($errors->has('password'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('password') }}</span>
                                                            @endif
                                                        </div>
                                                        <div class="d-grid mx-auto">
                                                            <button type="submit"
                                                                class="btn btn-dark btn-block">Register</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="cart"><i class="fa-solid fa-cart-shopping"></i></a>
            </div>
        </nav>
    </section>
    <section class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Muzzle Bubble</h1>
                <h2>Enjoy a great moment together!</h2>
                <button class="orderNow"><a href="order">Order Now</a></button>
            </div>
            <div class="col-md-6">
                <img class="img-fluid" src="css/img/bubbleTeaHome.png" alt="Drawing of a bubble tea and a fox">
            </div>
        </div>
    </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

</html>
