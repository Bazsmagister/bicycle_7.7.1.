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

    <form action="{{$user->id}}" method="post">
        {{-- @method('Delete') --}}
        {{ method_field('delete') }}
        @csrf

        <button class="btn btn-danger" type="submit">Delete the user</button>
    </form>
    <hr>
    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-outline-danger">Delete</button>
    </form>

</div>


@endsection
