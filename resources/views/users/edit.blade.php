@extends('layouts.app')

@section('content')



<form class="text-center border border-light p-5" action="/users" method="POST">
    @csrf
    <p class="h4 mb-4">Edit User</p>

    <div class="form-row mb-4">
        <div class="col">
            <!-- First name -->
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" placeholder="Name">
        </div>

    </div>

    <!-- E-mail -->
    <label for="email">Email</label>
    <input type="email" id="email" name="email" class="form-control mb-4" placeholder="E-mail"
        value="{{ old('email') }}">

    <!-- Password -->
    <label for="password">Password</label>
    <input type="password" id="password" name="password" class="form-control" placeholder="Password"
        value="{{ old('password') }}" aria-describedby="defaultRegisterFormPasswordHelpBlock">
    <small id="password" class="form-text text-muted mb-4">
        At least 8 characters and 1 digit
    </small>

    <!-- Phone number -->
    <label for="phone">Phone</label>
    <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone number"
        value="{{ old('phone') }}" aria-describedby="defaultRegisterFormPhoneHelpBlock">
    <small id="phone" class="form-text text-muted mb-4">
        Optional - for two step authentication
    </small>

    {{-- <!-- Newsletter -->
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="defaultRegisterFormNewsletter">
        <label class="custom-control-label" for="defaultRegisterFormNewsletter">Subscribe to our newsletter</label>
    </div> --}}

    <!-- Sign up button -->
    <button class="btn btn-info my-4 btn-block" type="submit">Submit</button>

    <!-- Social register -->
    {{-- <p>or sign up with:</p>

    <a href="#" class="mx-2" role="button"><i class="fab fa-facebook-f light-blue-text"></i></a>
    <a href="#" class="mx-2" role="button"><i class="fab fa-twitter light-blue-text"></i></a>
    <a href="#" class="mx-2" role="button"><i class="fab fa-linkedin-in light-blue-text"></i></a>
    <a href="#" class="mx-2" role="button"><i class="fab fa-github light-blue-text"></i></a> --}}

    <hr>

    <!-- Terms of service -->
    {{-- <p>By clicking
        <em>Sign up</em> you agree to our
        <a href="" target="_blank">terms of service</a> --}}

</form>


@endsection
