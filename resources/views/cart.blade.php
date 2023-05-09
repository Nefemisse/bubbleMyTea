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
    <link rel="icon" href="css/img/logo.jpeg">
</head>

<body>
    <main>
        <section class="navbar navbar-default">
            <nav class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/"><img class="logo" src="css/img/logo.jpeg"
                            alt="logo"></a>
                </div>
                <div class="right">
                    <ul class="nav navbar-nav">
                        <li class="nav-item"><a class="active" href="/">Home</a></li>
                        <li class="nav-item"><a href="order">Order</a></li>
                        <li class="nav-item"><a href="aboutUs">About us</a></li>
                    </ul>
                    <div class="search_bar">
                        <input id="field" type="text" name="search"
                            placeholder="Find your bubble tea"><button><i
                                class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                    <a href="{{ route('logout') }}"><i class="fa-solid fa-user"></i>
                        Logout
                    </a>
                    <a href="cart"><i class="fa-solid fa-cart-shopping"></i></a>
            </nav>
            <?php
            // print_r(session('cart'));
            ?>
            <div class="card card_cart">
                <div class="card-header">Your Cart</div>
                <div class="card-body">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Size</th>
                                    <th>Sugar</th>
                                    <th>Temperature</th>
                                    <th>Poppings</th>
                                    <th>Price</th>
                                    <th>total_price</th>
                                </tr>
                            </thead>
                            <thead>
                                @foreach (session('cart') as $cart)
                                    <tr>
                                        <form action="{{ url('validate/cart') }}" method="post">
                                            @csrf
                                            <th>
                                                <label for=""> {{ $cart['name'] }}</label>
                                                <input type="hidden" name="name" value=" {{ $cart['name'] }}">
                                            </th>
                                            <th>
                                                <label for=""> {{ $cart['quantity'] }}</label>
                                                <input type="hidden" name="quantity" value="{{ $cart['quantity'] }}">
                                            </th>
                                            <th>
                                                <label for="">{{ $cart['format'] }}</label>
                                                <input type="hidden" value="{{ $cart['format'] }}">
                                            </th>
                                            <th>
                                                <label for=""> {{ $cart['sugar_quantity'] }}</label>
                                                <input type="hidden" value="{{ $cart['sugar_quantity'] }}">
                                            </th>
                                            <th>
                                                <label for=""> {{ $cart['temperature'] }}</label>
                                                <input type="hidden" value="{{ $cart['temperature'] }}">
                                            </th>
                                            <th>
                                                <label for=""> {{ $cart['popping'] }}</label>
                                                <input type="hidden" value="{{ $cart['popping'] }}">
                                            </th>
                                            <th>
                                                <label for="">{{ $cart['price'] }} € </label>
                                                <input type="hidden" value="{{ $cart['price'] }}">
                                            </th>
                                            <th>
                                                <label for="">{{ $cart['total_price'] }} € </label>
                                                <input type="hidden" value="{{ $cart['total_price'] }}">
                                            </th>
                                    </tr>
                                    </form>
                                @endforeach
                                <a href="/order">validate</a>
                            </thead>
                            <tbody>
                                <div class="container mt-5">
                                    @yield('content')
                                </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
</section>
</main>
</body>

</html>
