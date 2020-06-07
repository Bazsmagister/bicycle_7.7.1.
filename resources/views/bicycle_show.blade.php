@extends('layouts.app')

@section('content')


<div style="padding-left: 20px">
    <p>Name :
        {{$bicycle->name}} </p>
    <p> Description :
        {{$bicycle->description}} </p>

    <p> Price :
        {{$bicycle->price}} </p>

    <p> Image :
        {{$bicycle->image}} </p>
    <img src="{{$bicycle->image}}" alt="quarter jpg" width="100" height="100">


    <hr>
    {{-- {{$user}} --}}
    {{$bicycle}}

    {{-- @role('super-user') --}}
    @hasanyrole('super-user|salesman|serviceman')

    <div>
        <a href="{{$bicycle->id}}/edit" class="btn btn-warning">Edit</a>
    </div>

    <form action="{{$bicycle->id}}" method="post">
        {{-- @method('Delete') --}}
        {{ method_field('delete') }}
        @csrf

        <button class="btn btn-danger" type="submit">Delete the bicycle</button>
    </form>
    <hr>
    <form action="{{ route('bicycle.destroy', $bicycle->id) }}" method="POST">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-outline-danger">Delete</button>
    </form>
    {{-- @endrole --}}
    @endhasanyrole

</div>


@endsection
