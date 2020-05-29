@extends('layouts.app')

@section('contentservice')
<h3>All the bicycles to service / under service</h3>

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
