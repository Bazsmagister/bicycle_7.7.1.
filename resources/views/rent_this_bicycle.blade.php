@extends('layouts.app')

@section('content')

<div style="padding-left: 20px">
    <p>Name :
        {{$bicycle->name}} </p>
    <p> Description :
        {{$bicycle->description}} </p>

    <p> Price :
        {{$bicycle->price}} Ft</p>

    <p> Image :
        @role('super-admin')
        {{$bicycle->image}}
        @endrole

        <img src="/storage/{{$bicycle->image}}" alt="this should be an image3" width="130" height="100">

        <img src="/storage/{{$bicycle->image}}" alt="this should be an image 0">

        {{-- <img src="{{$bicycle->image}}" alt="this should be an image1" width="100" height="100">

        <img src="images/{{$bicycle->image}}" alt="this should be an image2" width="100" height="100"> --}}




        {{-- <img src="{{asset("$bicycle->image")}}" alt="this should be an image4" width="100" height="100">

        <embed src="{{ asset("$bicycle->image")}}" alt="embed">

        <img src="{{asset("$bicycle->image")}}" alt="this should be an image5" width="100" height="100"> --}}


    </p>

    <hr>

    {{-- @hasanyrole('super-admin') --}}
    @auth('super-admin|serviceman|salesman')


    <div>
        <a href="{{$bicycle->id}}/edit" class="btn btn-warning">Edit</a>
    </div>

    {{-- <form action="{{$bicycle->id}}" method="post">

    {{ method_field('delete') }}
    @csrf

    <button class="btn btn-outline-danger" type="submit">Delete the bicycle</button>
    </form> --}}

    <hr>
    <form action="{{ route('bicycle.rent', $bicycle->id) }}" method="POST">
        @csrf
        @method('put')
        <button type="submit" class="btn btn-warning">Rent the bicycle</button>
    </form>

    @endauth
    <hr>

    {{$bicycle}}
    <hr>

    <p>Test roles:</p>
    @hasanyrole('super-admin|serviceman|salesman')
    <p>has any role</p>
    @else
    <p>has not role</p>
    @endhasanyrole

</div>


@endsection
