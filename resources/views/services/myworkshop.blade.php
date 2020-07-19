@extends('layouts.app')

@section('contentservice')

@auth

<h3>My workshop, all the bicycles I (the logged in serviceman) need to repair :</h3>

<h4>
    Need to repair : {{ $needtorepaircount }} bicycles.
</h4>
<hr>

{{-- <div class="flexbox">
    <div class='boxes' style="background-color: gray" id="1">Accepted</div>
    <div class='boxes' id="2">Repairing</div>
    <div class='boxes' id="3">Ready</div>
    <div class='boxes' id="4">Taken</div>
</div> --}}

<div class="container">
    <table class="table">
        <thead>
            <tr>
                {{-- <th scope="col" width="50%">id</th> --}}
                <th scope="col">id</th>
                <th scope="col">status</th>
                <th scope="col">broughtIn_at</th>
                <th scope="col">startedToService_at</th>
                <th scope="col">Ready to take it</th>
                <th scope="col">Taken</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($mybicyclesneedtorepair as $service)

            <tr>
                <th scope="row">{{$service->id}}</th>
                <td>{{$service->status}}</td>
                <td>{{$service->broughtIn_at}}</td>
                <td>{{$service->startedToService_at}}</td>
                <td>{{$service->readyToTakeIt_at}}</td>
                <td>{{$service->taken_at}}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="container">
    <table class="table">
        <thead>
            <tr>
                {{-- <th scope="col" width="50%">id</th> --}}
                <th scope="col">id</th>
                <th scope="col">status</th>
                <th scope="col">broughtIn_at</th>
                <th scope="col">startedToService_at</th>
                <th scope="col">Ready to take it</th>
                <th scope="col">Taken</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($mybicyclesneedtorepair as $service)

            <tr>
                <th scope="row">{{$service->id}}</th>
                <td>{{$service->status}}</td>
                <td>{{$service->broughtIn_at}}</td>
                <td>{{$service->startedToService_at}}</td>
                <td>{{$service->readyToTakeIt_at}}</td>
                <td>{{$service->taken_at}}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@foreach ($mybicyclesneedtorepair as $service)
<div class="container">
    <ul>
        <div>
            <li> ServiceInstant($service) ID: {{$service -> id }}</li>
        </div>

        <li> Owner's ID :{{$service->user_id }} </li>
        <li> Owner's name :{{$service->user->name }} </li>
        <li> Serviceman ID :{{$service -> serviceman_id }} </li>
        <li> Brought in :{{$service -> broughtIn_at }} </li>
        <li> Started to service at : {{$service -> startedToService_at }} </li>
        <li> Ready to take it home :{{$service -> readyToTakeIt_at }} </li>
        <li> Taken at :{{$service -> taken_at }} </li>

        <li> Notes : {{$service -> notes }} </li>
        <li> Status : {{$service -> status }} </li>

        <div class="flexbox">
            <div class="{{$service -> status ==='accepted' ? 'accepted' : 'boxes'}}" id="1">Accepted</div>
            <div class="{{$service -> status ==='repairing' ? 'repairing' : 'boxes'}}" id="2">Repairing</div>
            <div class="{{$service -> status ==='ready' ? 'ready' : 'boxes'}}" id="3">Ready</div>
            <div class="{{$service -> status ==='taken' ? 'taken' : 'boxes'}}" id="4">Taken</div>
        </div>


        <a href="services/{{$service->id}} " class="btn btn-info">Show</a>



        <a href="services/{{$service->id}}/edit " class="btn btn-warning">Edit</a>


    </ul>
    <hr>
</div>



@endforeach



@endauth

@endsection
