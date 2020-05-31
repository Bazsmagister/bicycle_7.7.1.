@extends('layouts.app')

@section('content')


<div style="padding-left: 20px">
    {{$user->name}}
    <br>
    {{$user->email}}
    <hr>
    {{-- {{$user}} --}}
    {{$user}}
</div>







@endsection
