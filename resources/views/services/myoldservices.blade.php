@extends('layouts.app')

@section('contentservice')

@auth

<h3>My service progress / my active service instants</h3>
{{-- <h3>All my bicycles to service / under service</h3> --}}
<hr>

{{-- <div class="flexbox">
    <div class='boxes' style="background-color: gray" id="1">Accepted</div>
    <div class='boxes' id="2">Repairing</div>
    <div class='boxes' id="3">Ready</div>
    <div class='boxes' id="4">Taken</div>
</div> --}}

@foreach ($myoldservices as $service)
<div class="container">
    <ul>
        <div>
            <li> Service ID: {{$service -> id }}</li>
        </div>

        {{-- <li> Brought in :{{$service -> broughtIn_at }} </li>
        <li> Started to service at : {{$service -> startedToService_at }} </li>
        <li> Ready to take it home :{{$service -> readyToTakeIt_at }} </li>
        <li> Taken at :{{$service -> taken_at }} </li> --}}

        <li> Brought in :{{$service -> accepted }} </li>
        <li> Started to service at : {{$service -> repairing }} </li>
        <li> Ready to take it home :{{$service -> ready }} </li>
        <li> Taken at :{{$service -> taken }} </li>

        <li> Notes : {{$service -> notes }} </li>
        {{-- <li> Status : {{$service -> status }} </li> --}}

        {{-- <div class="flexbox">
            <div class="{{$service -> status ==='accepted' ? 'accepted' : 'boxes'}}" id="1">Accepted
</div>
<div class="{{$service -> status ==='repairing' ? 'repairing' : 'boxes'}}" id="2">Repairing</div>
<div class="{{$service -> status ==='ready' ? 'ready' : 'boxes'}}" id="3">Ready</div>
<div class="{{$service -> status ==='taken' ? 'taken' : 'boxes'}}" id="4">Taken</div>
</div> --}}

</ul>
<hr>
</div>

@endforeach

@endauth

@endsection
