<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bicycle 7</title>

    <!-- Fonts
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    -->

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #d3b9b7;


            /* color: #636b6f; */
            font-family: sans-serif, 'Nunito';
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .hero-image {
            background-image: url("/storage/BV.jpg");
            background-color: #d3b9b7;
            height: 700px;
            width: 1300px;
            background-position: center;
            background-repeat: no-repeat;
            /* background-size: cover; */
            position: relative;
        }

        .hero-text {
            text-align: center;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
        }

        .alert {
            color: red;
            text-decoration: underline;

            fill: beige;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            /* color: #636b6f; */
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
    {{-- <link rel="stylesheet" href="css/app.css"> --}}


</head>

<body>

    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}">Home</a>
            @else
            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif
            @endauth
        </div>
        @endif


        <div class="content">

            <div class="hero-image">
                <div class="hero-text">
                    <h1 style="font-size:40px">"I want to ride my bicycle..."</h1>
                    {{-- <h4>And I'm a Bicyclist</h4> --}}
                    {{-- <button>Come with me!</button> --}}
                </div>
            </div>
            <img src="/storage/bic.png" alt="a bic png" sizes="" srcset="">
            <div class="title m-b-md">
                Bicycle
            </div>

            <div class="links">
                <a href="/newbikes">New bicycles</a>
                <a href="/rentabike">Rent-a-bicycle</a>
                <a href="/service">Service</a>

            </div>
            <br>

            <br>
            <hr>
            <div class="links">
                <p>Please login or register to use the side!</p>
                <a href="https://laravel.com/docs">Laravel docs</a>

            </div>
        </div>

    </div>
    <x-alert>
        <strong>Whoops!</strong> x-alert component
    </x-alert>

</body>

</html>
