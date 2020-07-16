<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- in config/app.php --}}
    <title>{{ config('app.name', 'Bicycle_7.1.1') }}</title>

    <!-- Scripts -->

    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js">
    </script>

    <!-- Fonts -->
    <link rel=" dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">




    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">


</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md  navbar-light bg-white shadow" {{-- --}}>
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ 'Welcome' }}
                </a>

                <div class="flex-container">

                    <div class="{{Request::path()==='bicyclesToSell' ? 'active' : ''}}"><a href="/bicyclesToSell">New
                            bicycles to sell</a></div>
                    <div class="{{Request::path()==='bicyclesToRent' ? 'active' : ''}}"><a href="/bicyclesToRent">Our
                            bicycles to rent (all)</a></div>

                    <div class="{{Request::path()==='indexrentable' ? 'active' : ''}}"><a href="/indexrentable">Our
                            bicycles to rent (just available)</a></div>

                    @auth

                    <div class="{{Request::path()==='rents/create' ? 'active' : ''}}"><a href="/rents/create">Create a
                            Rent(auth)</a></div>
                    <div class="{{Request::path()==='myserviceprogress' ? 'active' : ''}}"><a
                            href="/myserviceprogress">MyServiceProgress(auth)</a>
                    </div>

                    <div class="{{Request::path()==='myoldservices' ? 'active' : ''}}"><a
                            href="/myoldservices">MyOldServices(auth)</a>
                    </div>

                    <div class="{{Request::path()==='myActiveRents' ? 'active' : ''}}"><a href="/myActiveRents">My
                            Active
                            rent(s)(auth)</a></div>

                    <div class="{{Request::path()==='myPreviousRents' ? 'active' : ''}}"><a href="/myPreviousRents">My
                            previous
                            rents(auth)</a></div>

                    @endauth


                </div>


                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Current user:
                                @if (auth()->user()->image)
                                {{-- <img src="{{ asset(auth()->user()->image) }}"
                                style="width: 40px; height: 40px; border-radius: 50%;">
                                <img src="{{ auth()->user()->profile_image }}"
                                    style="width: 40px; height: 40px; border-radius: 50%;"> --}}
                                {{-- <img src="/storage/{{ auth()->user()->profile_image }}"
                                style="width: 40px; height: 40px; border-radius: 50%;"> --}}
                                {{-- <img src="storage/{{auth()->user()->profile_image}}" alt="no image yet"> --}}
                                @endif
                                {{ Auth::user()->name  }} &nbsp; <img src="/storage/{{ auth()->user()->profile_image }}"
                                    style="width: 40px; height: 40px; border-radius: 50%;"> &nbsp;
                                {{ Auth::user()->email }}<span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('profile') }}">Profile</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>

            </div>
            <div class="flex-containeradmin">

                @role('serviceman')
                <div class="{{Request::path()==='services' ? 'active' : ''}}"><a
                        href="/services">Services(serviceman)</a></div>
                <div class="{{Request::path()==='myworkshop' ? 'active' : ''}}"><a
                        href="/myworkshop">Service/myWorkshop($serviceman)</a>
                </div>
                <div class="{{Request::path()==='services/create' ? 'active' : ''}}"><a href="/services/create">Create
                        new
                        service($serviceman)</a>
                </div>
                <div class="{{Request::path()==='rents' ? 'active' : ''}}"><a href="/rents">All rents(serviceman)</a>
                </div>
                @endrole

            </div>
            <div class="flex-containeradmin">

                @role('super-admin')
                {{-- <div class="admin"><a href="/bicycles">All bicycles(admin)</a></div> --}}
                <div class="admin"><a href="/rents">All rents(admin)</a></div>
                <div class="admin"><a href="/services">All services(admin)</a></div>
                <div class='admin'><a href="/users">All Users(admin) |</a></div>
                <div class='admin'><a href="/indexDeletedAlso">Users index Deleted Also(admin) |</a></div>
                <div class='admin'><a href="/OnlyDeletedUsers">OnlyDeletedUsers |</a></div>
                <div class='admin'><a href="/services">Services(serviceman, admin)</a></div>
                <div class='admin'><a href="/mail">Mail(admin)</a></div>

                <div class="admin"><a href="/mapWithKeys">UserNameDateMapWithKeys(admin)</a></div>
                <div class="admin"><a href="/mkuser/5">Make 5 User(admin)</a></div>

                @endrole

            </div>

        </nav>

        <main class="py-4">

            @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif

            @yield('content')
            @yield('contentuser')
            @yield('contentindex')
            @yield('contentsell')
            @yield('contentrent')
            @yield('contentservice')
            @yield('bicycles_to_create')
            @yield('bicycle_edit')
            @yield('logged_in')
            @yield('rents_edit')

        </main>

    </div>

</body>

</html>