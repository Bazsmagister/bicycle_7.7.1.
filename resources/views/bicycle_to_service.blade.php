@extends('layouts.app')

@section('contentservice')
All the bicycles to service / under service

<hr>

@foreach ($bicycles_to_service as $bicycle)
<div class="container">
    <ul>

        <li>{{$bicycle -> id }}</li>
        <li>{{$bicycle -> name }} </li>
        {{-- <img src="{{$bicycle->image}}" alt="interesting" width="182" height="109"> --}}
        <img src="{{$bicycle->image}}" alt="interesting" width height>
    </ul>
    <hr>
</div>

@endforeach

@endsection
