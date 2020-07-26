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

                    <div class="{{Request::path()==='indexavailabletorent' ? 'active' : ''}}"><a
                            href="/indexavailabletorent">Available
                            bicycles to rent (just available)</a></div>

                    @auth

                    <div class="{{Request::path()==='rents/create' ? 'active' : ''}}"><a href="/rents/create">Create a
                            Rent(auth)</a></div>


                    <div class="{{Request::path()==='file' ? 'active' : ''}}"><a href="/file">file (auth)</a></div>
                    <div class="{{Request::path()==='notifications' ? 'active' : ''}}"><a
                            href="/notifications">Notifications(auth) </a></div>

                    <div class="{{Request::path()==='eventupdate' ? 'active' : ''}}"><a href="/eventupdate">
                            eventupdate</a></div>

                    <div class="{{Request::path()==='stor' ? 'active' : ''}}"><a href="/stor">
                            stor</a></div>

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
            @auth
            <div class="flex-containerauth">
                <div class="{{Request::path()==='myserviceprogress' ? 'active' : ''}}"><a href="/myserviceprogress">My
                        Service
                        Progress(auth)</a>
                </div>

                <div class="{{Request::path()==='myoldservices' ? 'active' : ''}}"><a href="/myoldservices">My
                        Old Services(auth)</a>
                </div>

                <div class="{{Request::path()==='myActiveRents' ? 'active' : ''}}"><a href="/myActiveRents">My
                        Active
                        rent(s)(auth)</a></div>

                <div class="{{Request::path()==='myPreviousRents' ? 'active' : ''}}"><a href="/myPreviousRents">My
                        previous
                        rents(auth)</a></div>

            </div>
            @endauth

            @auth
            <div class="flex-containerauth">

                @role('serviceman')
                <div class="{{Request::path()==='services' ? 'active' : ''}}"><a href="/services">All
                        Services(serviceman)</a></div>
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
            @endauth

            @auth
            <div class="flex-containeradmin">

                @role('super-admin')
                {{-- <div class="admin"><a href="/bicycles">All bicycles(admin)</a></div> --}}
                <div class="admin"><a href="/rents">All rents(admin)</a></div>
                <div class="admin"><a href="/services">All services(admin)</a></div>
                <div class='admin'><a href="/users">All Users(admin) |</a></div>
                <div class='admin'><a href="/indexDeletedAlso">Users index Deleted Also(admin) |</a></div>
                <div class='admin'><a href="/OnlyDeletedUsers">OnlyDeletedUsers |</a></div>
                <div class='admin'><a href="/services">Services(serviceman, admin)</a></div>
                <div class="admin"><a href="/services/create">Create new service</a>
                </div>
                <div class='admin'><a href="/mailservice">Mail new Service created(admin)</a></div>
                <div class='admin'><a href="/mailrent">Mail new Rent created(admin)</a></div>

                <div class="admin"><a href="/mapWithKeys">UserNameDateMapWithKeys(admin)</a></div>
                <div class="admin"><a href="/mkuser/5">Make 5 User(admin)</a></div>
                <div class="admin"><a href="sendemail">Sendemail Mail::raw to mailtrap</a></div>
                <div class="admin"><a href="https://mailtrap.io/">Mailtrap</a></div>
                <div class="admin"><a href="users/5">XMLHttp example</a></div>
                <div class="admin"><a href="/log">Log</a></div>
                <div class="admin"><a href="/helper">custom helper</a></div>
                <div class="admin"><a href="/notifications">notifications</a></div>
                <div class="admin"><a href="/dates">dates</a></div>
                <div class="admin"><a href="/maxuser">maxuser</a></div>
                <div class="admin"><a href="/loginasauth">loginasauth</a></div>
                <div class="admin"><a href="/randomnames">randomnames</a></div>


                @endrole

            </div>
            @endauth
        </nav>

        <main class="py-4">

            {{-- option 1 --}}
            @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif

            {{-- option 2 --}}
            {{-- @if (session('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
            {{ session('message') }}
            </p>
            @endif --}}

            @yield('content')

        </main>

    </div>

    <footer>
        <div class="footer">
            <h6>Made by Bazsmagister <?php echo date("Y"); ?></h6>
        </div>
    </footer>

</body>

</html>
