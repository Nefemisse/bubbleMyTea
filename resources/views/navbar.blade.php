@extends('main')

<section class="navbar navbar-default">
    <nav class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/"><img class="logo" src="css/img/logo.jpeg" alt="logo"></a>
        </div>
        <div class="right">
            <ul class="nav navbar-nav">
                <li class="nav-item"><a class="active" href="/">Home</a></li>
                <li class="nav-item"><a href="order">Order</a></li>
                <li class="nav-item"><a href="contactUs">Contact us</a></li>
            </ul>
            <div class="search_bar">
                <input id="field" type="text" name="search" placeholder="Find your bubble tea"><button><i
                        class="fa-solid fa-magnifying-glass"></i></button>
            </div>
            <a href='registration'><i class="fa-solid fa-user"></i></a>
            <a href="cart"><i class="fa-solid fa-cart-shopping"></i></a>
        </div>
    </nav>
</section>
