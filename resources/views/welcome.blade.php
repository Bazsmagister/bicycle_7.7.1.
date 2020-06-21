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
            /* height: 100vh; */
        }

        .hero-image {
            /* background-image: url("/storage/BV.jpg"); */
            background-image: url("/BV.jpg");
            background-color: #d3b9b7;
            width: 1355px;
            height: 940px;

            /* important */
            background-attachment: fixed;
            /* background-attachment: scroll; */
            /* background-attachment: local; */


            background-position: center;
            background-repeat: no-repeat;

            /* Specify the size of a background-image with "auto" and in pixels: */
            background-size: cover;
            background-size: auto;

            /* this doesn't work : */
            /* background-size: 1355px 940px; */


            /* The position prop spec the type ofpositining meth u for an el (static, relative, absolute, fixed, or sticky). */
            position: relative;

            /* z-index: -1; */
        }

        .hero-text {
            text-align: center;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -90%);
            color: white;
        }

        a {
            color: white;
        }

        .alert {
            color: red;
            text-decoration: underline;


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
            color: white;
            /* + z-index makes content closer to on the canvas */
            z-index: +1;
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

            <div>
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





            </div>



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
                <a href="/bicyclestosell">New bicycles</a>
                <a href="/bicyclestorent">Rent-a-bicycle</a>
                @auth
                <a href="/service">Service</a>
                @endauth
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
        <strong>Whoops!</strong> x-alert component try
    </x-alert>


    {{-- @foreach(Auth::user()->unreadNotifications as $not)
    <li>
        <a class="dropdown-item">new rent has been created: {{$not->created_at}}</a>
    </li>
    @endforeach --}}

    {{--  @foreach(Auth::user()->unreadNotifications as $not)
    {{$not}}
    <li>
        <a class="dropdown-item">new rent Expires: {{$not->data['expires']}}</a>
        <br>
        <a class="dropdown-item">new rent fakedata: {{$not->data['data2']}}</a>
    </li>
    @endforeach --}}

</body>

</html>
