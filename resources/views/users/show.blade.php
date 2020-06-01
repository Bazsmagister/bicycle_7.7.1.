@extends('layouts.app')

@section('content')


<div style="padding-left: 20px">
    <p>Name :
        {{$user->name}} </p>
    <p> E-mail :
        {{$user->email}} </p>

    <p> Joined :
        {{$user->created_at}} </p>

    <hr>
    {{-- {{$user}} --}}
    {{$user}}

    <div>
        <a href="{{$user->id}}/edit" class="btn btn-warning">Edit</a>
    </div>

    <div>
        <button class="btn btn-danger" type="submit">Delete the user</button>
    </div>
</div>


@endsection
