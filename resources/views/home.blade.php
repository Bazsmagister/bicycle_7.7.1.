@extends('layouts.app')


@section('logged_in')


{{-- <div>Welcome : {{ Auth::user()->name }} </div> --}}
<p>
    Welcome: {{ auth()->user()->name }}
</p>

{{-- @guest --}}
<li class="list-inline-item">
    <button type="button" class="btn btn-primary btn-outline-light" data-toggle="modal" data-target="#signIn"
        href="{{ route('login') }}">{{ __('Login') }}</button>
</li>
@if (Route::has('register'))
<li class="list-inline-item">
    <button type="button" class="btn btn-primary btn-outline-light" data-toggle="modal" data-target="#signUp"
        href="{{ route('register') }}">{{ __('Register') }} </button>
</li>
@endif
{{-- @endguest --}}

<div class="modal" id="signIn">
    <div class="modal-dialog">
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


@endsection

{{-- @section('content')

<div class="flex-container">

    <div><a href="/service">Service</a></div>
    <div><a href="/rentabike">Rent-a-bicycle</a></div>
    <div><a href="/newbikes">New bicycles</a></div>

</div>

@endsection --}}
