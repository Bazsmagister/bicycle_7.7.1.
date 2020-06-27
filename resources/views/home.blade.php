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
          <input type="text" id="orangeForm-name" class="form-control validate" name="name">
          <label data-error="wrong" data-success="right" for="orangeForm-name">Your name</label>
        </div>
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="email" id="orangeForm-email" class="form-control validate" name="email">
          <label data-error="wrong" data-success="right" for="orangeForm-email">Your email</label>
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" id="orangeForm-pass" class="form-control validate" name="password">
          <label data-error="wrong" data-success="right" for="orangeForm-pass">Your password</label>
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



@endsection

{{-- @section('content')

<div class="flex-container">

    <div><a href="/service">Service</a></div>
    <div><a href="/rentabike">Rent-a-bicycle</a></div>
    <div><a href="/newbikes">New bicycles</a></div>

</div>

@endsection --}}
