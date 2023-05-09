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
    <link rel="stylesheet" type="text/css" href="css/order.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css2?family=Edu+SA+Beginner&family=Gluten&display=swap" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="css/img/logo.jpeg">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
    </script>
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
                {{-- search bar --}}
                <div class="search_bar">
                    {{-- <input id="field" type="search" wire:mode='search' name="search" placeholder="Find your bubble tea"><button><i class="fa-solid fa-magnifying-glass"></i></button>
                    <select class="js-example-basic-single" name="state">
                        @foreach ($bubbleTea as $bubbleTeadata)
                            <option >{{ $bubbleTeadata->name }}</option>
                        @endforeach
                      </select> --}}

                    {{-- Form 1 test --}}

                    <form action=" {{ 'search' }} " method="GET" role="search">
                        <div class="input-group">
                            <input type="search" name="search" value="" placeholder="Find your bubble tea"
                                class="form-control">
                            <button type="submit" class="btn bg-white">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </form>

                    {{-- ----------- --}}
                    {{-- <form method="post">
                        <label for=""></label>
                        <input type="text" name="search" placeholder="Search...">
                        <input type="submit" name="submit">
                    </form> --}}
                    <?php
                    // session()->put('cart', []);
                    // print_r($bubbleTea);
                    // print_r(session('cart'));
                    ?>

                </div>
                {{-- ---------- --}}
                <div class="connectionUser">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                        data-bs-target="#userconnection"><i class="fa-solid fa-user"></i></button>
                    <!-- Modal -->
                    <div class="modal fade" id="userconnection" tabindex="-1" aria-labelledby="userconnectionLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title fs-5" id="userconnectionLabel"><a href="#login">Login</a><a
                                            href="#registration">Register</a></h2>
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
    <section class="sizeCup">
        <h2>Choose your size</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="sizeCupSmall">
                    <img src="css/img/sizeCupSmall.png" class="sizeCupImg" alt="Small cup and fox">
                    <p>A small one (250ml)</p>
                    <button class="selectSize">Total Price - 1€</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="sizeCupMedium">
                    <img src="css/img/sizeCupMedium.png" class="sizeCupImg" alt="Medium fox">
                    <p>A medium one (500ml)</p>
                    <button class="selectSize">Base Price</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="sizeCupLarge">
                    <img src="css/img/sizeCupBig.png" class="sizeCupImg" alt="Large cup and fox">
                    <p>A large one (700ml)</p>
                    <button class="selectSize">Total Price + 1€</button>
                </div>
            </div>
        </div>
    </section>
    <section class="withTea">
        <div class="row">
            @if ($bubbleTea)
                @foreach ($bubbleTea as $bubbleTeadata)
                    <div class="col-md-2" id="cremeBrulee">
                        <img src="{{ $bubbleTeadata->img }}" class="img-thumbnail"
                            alt="{{ $bubbleTeadata->name }}">
                        <h3>{{ $bubbleTeadata->name }}</h3>
                        <p>{{ $bubbleTeadata->description }}</p>
                        <div class="modifyMilk">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#modify{{ $bubbleTeadata->id }}">Select</button>
                            <!-- Modal -->
                            <div class="modal fade" id="modify{{ $bubbleTeadata->id }}" tabindex="-1"
                                aria-labelledby="modifyLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h2 class="modal-title fs-5" id="modifyLabel">Modify your Bubble tea</h2>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row justify-content-center">
                                                <div class="col-md-9">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <img src="{{ $bubbleTeadata->img }}">
                                                            <hr class="top">
                                                            <div class="row">
                                                                <div class="size">
                                                                    <li><input {{-- {{ $bubbleTeadata->size === 1 ? 'checked="checked"' : '' }} --}} type="radio"
                                                                            id="sizeChoice"
                                                                            name="sizeChoice{{ $bubbleTeadata->created_at }}"
                                                                            value="1">
                                                                        <label for="sizeChoice">Small</label>
                                                                    <li><input {{-- {{ $bubbleTeadata->size === 0 ? 'checked="checked"' : '' }} --}} type="radio"
                                                                            id="sizeChoice"
                                                                            name="sizeChoice{{ $bubbleTeadata->created_at }}"
                                                                            value="2">
                                                                        <label for="sizeChoice">Medium</label>
                                                                    <li><input {{-- {{ $bubbleTeadata->size === 0 ? 'checked="checked"' : '' }} --}} type="radio"
                                                                            id="sizeChoice"
                                                                            name="sizeChoice{{ $bubbleTeadata->created_at }}"
                                                                            value="3">
                                                                        <label for="sizeChoice">Large</label>
                                                                    </li>
                                                                </div>
                                                                <div class="col-md-7">
                                                                    <h3>Change your toppings:</h3>
                                                                    <ul>
                                                                        @foreach ($poppings as $poppingsdata)
                                                                            <?php
                                                                            $i = 0;
                                                                            ?>
                                                                            <li>
                                                                                <input type="radio"
                                                                                    {{-- {{ $i == 0 ? 'checked="checked"' : '' }} --}}
                                                                                    id="poppingFlavorChoice"
                                                                                    name="flavorChoice{{ $bubbleTeadata->id }}"
                                                                                    value="{{ $poppingsdata->id }}">
                                                                                <label
                                                                                    for="poppingFlavorChoice">{{ $poppingsdata->flavor }}</label>
                                                                            </li>
                                                                            <?php
                                                                            $i++;
                                                                            ?>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                                <div class="col-md-5">
                                                                    <h3>How much sugar?</h3>
                                                                    <ul>
                                                                        <li><input {{-- {{ $bubbleTeadata->sugar_quantity == 0 ? 'checked="checked"' : '' }} --}}
                                                                                type="radio" id="contactChoice1"
                                                                                name="contact{{ $bubbleTeadata->id }}"
                                                                                value="0">
                                                                            <label for="contactChoice1">0%</label>
                                                                        </li>
                                                                        <li><input {{-- {{ $bubbleTeadata->sugar_quantity == 1 ? 'checked="checked"' : '' }} --}}
                                                                                type="radio" id="contactChoice1"
                                                                                name="contact{{ $bubbleTeadata->id }}"
                                                                                value="1">
                                                                            <label for="contactChoice1">30%</label>
                                                                        </li>
                                                                        <li><input {{-- {{ $bubbleTeadata->sugar_quantity == 2 ? 'checked="checked"' : '' }} --}}
                                                                                type="radio" id="contactChoice1"
                                                                                name="contact{{ $bubbleTeadata->id }}"
                                                                                value="2">
                                                                            <label for="contactChoice1">50%</label>
                                                                        </li>
                                                                        <li><input {{-- {{ $bubbleTeadata->sugar_quantity == 3 ? 'checked="checked"' : '' }} --}}
                                                                                type="radio" id="contactChoice1"
                                                                                name="contact{{ $bubbleTeadata->id }}"
                                                                                value="3">
                                                                            <label for="contactChoice1">100%</label>
                                                                        </li>
                                                                        <li><input {{-- {{ $bubbleTeadata->sugar_quantity == 4 ? 'checked="checked"' : '' }} --}}
                                                                                type="radio" id="contactChoice1"
                                                                                name="contact{{ $bubbleTeadata->id }}"
                                                                                value="4">
                                                                            <label for="contactChoice1">120%</label>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <hr class="bot">
                                                            <div class="temperature">
                                                                <li><input {{-- {{ $bubbleTeadata->temperature === 1 ? 'checked="checked"' : '' }} --}} type="radio"
                                                                        id="temperatureChoice"
                                                                        name="contact{{ $bubbleTeadata->created_at }}"
                                                                        value="2">
                                                                    <label for="temperatureChoice">Hot?</label>
                                                                <li><input {{-- {{ $bubbleTeadata->temperature === 0 ? 'checked="checked"' : '' }} --}} type="radio"
                                                                        id="temperatureChoice"
                                                                        name="contact{{ $bubbleTeadata->created_at }}"
                                                                        value="1">
                                                                    <label for="temperatureChoice">Cold?</label>
                                                                </li>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        {{-- <form> --}}
                                                        <button onclick="addToCart({{ $bubbleTeadata->id }})"
                                                            class="btn btn-dark btn-block">Validate</button>
                                                        {{-- </form> --}}
                                                        <button type="button" class="btn btn-dark btn-block"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto">Muzzle Bubble</strong>
                    <button type="button" class="btn-close"data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body"> <strong>{{ $bubbleTeadata->name }}</strong> has been added to the cart.</div>
                <div class="toast-body">The deliveryman is on his way.</div>
            </div>
        </div>
    </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.js"></script>
<script>
    function addToCart(bubbleTeaId) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        console.log($('#poppingFlavorChoice:checked').val());
        console.log($('#contactChoice1:checked').val());
        $.ajax({
            url: '/cartAdd',
            method: 'post',
            data: {
                quantity: 1,
                // name: value
                bubbleTeaId: bubbleTeaId,
                poppingId: $('#poppingFlavorChoice:checked').val(),
                quantity_sugar: $('#contactChoice1:checked').val(),
                temperature: $('#temperatureChoice:checked').val(),
                format: $('#sizeChoice:checked').val()
            },
            success: function(data) {
                $('#modify' + bubbleTeaId).modal('hide');
                const toastLiveExample = document.getElementById('liveToast')
                const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
                toastBootstrap.show()
                console.log('ok');
            },
            error: function(data) {
                $('#modify' + bubbleTeaId).modal('hide');
                const toastLiveExample = document.getElementById('liveToast')
                const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
                toastBootstrap.show()
                console.log('KO');
            }
        })
    }
</script>

</html>
