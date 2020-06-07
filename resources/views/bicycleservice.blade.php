@extends('layouts.app')

@section('contentservice')
<h3>All the bicycles to service / under service</h3>

<hr>

@foreach ($bicycles_in_service as $bicycle)
<div class="container">
    <ul>
        <div>
            ID: <li>{{$bicycle -> id }}</li>
        </div>
        <br>
        <div>
            Name:<li>{{$bicycle -> name }} </li>
        </div>
        Description : <li>{{$bicycle -> description }} </li>
        Brought im :<li>{{$bicycle -> broughtIn_at }} </li>
        Started to service at : <li>{{$bicycle -> startedToService_at }} </li>
        Ready to take home :<li>{{$bicycle -> readyToTakeHome_at }} </li>
        {{-- <img src="{{$bicycle->image}}" alt="interesting" width="182" height="109"> --}}
        <img src="{{$bicycle->image}}" alt="interesting" width height>
    </ul>
    <hr>
</div>

@endforeach

@endsection
