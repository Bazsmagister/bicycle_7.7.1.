@extends('layouts.app')


@section('logged_in')


{{-- <div>Welcome : {{ Auth::user()->name }} </div> --}}
<p>
    Welcome: {{ auth()->user()->name }}
</p>
@endsection

{{-- @section('content')

<div class="flex-container">

    <div><a href="/service">Service</a></div>
    <div><a href="/rentabike">Rent-a-bicycle</a></div>
    <div><a href="/newbikes">New bicycles</a></div>

</div>

@endsection --}}
