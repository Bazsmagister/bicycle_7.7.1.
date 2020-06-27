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
            
@guest
<div class="modal" id="signIn">
    <div class="modal-dialog">
    {{-- <div class="modal-fade"> --}}
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">SignIn</h4>
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email" class="">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="form-control" @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label for="password" class="">{{ __('Password') }}</label>
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">
                            Sign In
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="signUp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Sign up</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
         <form method="POST" action="{{ route('register') }}">
            @csrf
        <div class="md-form mb-5">
          
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" id="orangeForm-name" class="form-control validate" name="name" required>
          <label data-error="wrong" data-success="right" for="orangeForm-name">Your name</label>
        </div>
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="email" id="orangeForm-email" class="form-control validate" name="email" required>
          <label data-error="wrong" data-success="right" for="orangeForm-email">Your email</label>
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" id="password" class="form-control validate" name="password" required>
          <label data-error="wrong" data-success="right" for="orangeForm-pass">Your password</label>
        </div>
        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" placeholder="Confirm Password" id="confirm_password" class="form-control validate" required >
          <label data-error="wrong" data-success="right" for="confirm_password">Confirm password</label>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button type="submit" class="btn btn-deep-orange">Sign up</button>
      </div>
      </form>
    </div>
  </div>
</div>

@endguest

        </div>

    </div>

    <x-alert>
        <strong>Whoops!</strong> x-alert component try
    </x-alert>
<script>
var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>

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
