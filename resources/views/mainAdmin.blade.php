<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.0/css/all.css" crossorigin="anonymous">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>Muzzle Bubble</title>
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <link href="https://fonts.googleapis.com/css2?family=Edu+SA+Beginner&family=Gluten&display=swap" rel="stylesheet">

</head>

<body>
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
                    <input id="field" type="text" name="search" placeholder="Find your bubble tea"><button><i
                            class="fa-solid fa-magnifying-glass"></i></button>
                </div>
                <a href="{{ route('logout') }}"><i class="fa-solid fa-user"></i>
                    Logout
                </a>
                <a href="cart"><i class="fa-solid fa-cart-shopping"></i></a>
        </nav>
    </section>
    <div class="container mt-5">
        @yield('content')
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

</html>
