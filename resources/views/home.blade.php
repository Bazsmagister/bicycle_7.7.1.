@extends('layouts.app')


@section('logged_in')


<div>You are logged in (1) : {{ Auth::user()->name }} </div>
<p>
    You are logged in (2): {{ auth()->user()->name }}
</p>
@endsection

{{-- @section('content')

<div class="flex-container">

    <div><a href="/service">Service</a></div>
    <div><a href="/rentabike">Rent-a-bicycle</a></div>
    <div><a href="/newbikes">New bicycles</a></div>

</div>

@endsection --}}
