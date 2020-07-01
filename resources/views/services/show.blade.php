@extends('layouts.app')

@section('content')


<div style="padding-left: 20px">
    <p>Brought In :
        {{$service->broughtIn_at}} </p>
    <p>Start :
        {{$service->serviceStarted_at}} </p>
    <p> Ends :
        {{$service->readyToTakeIt_at}} </p>

    <p> The User who owns the bicycle :
        {{$service->user->name}} </p>
    <img src="{{$service->user->user_image}}" alt="image 0 should be here">
    <img src="/storage/users/image/{{$service->user->user_image}}" alt="image 1 should be here" width=50px height=50px>

    <hr>

    {{$service}}

    <div>
        <a href="{{$service->id}}/edit" class="btn btn-warning">Edit</a>
    </div>

    <form action="{{$service->id}}" method="post">
        {{-- @method('Delete') --}}
        {{ method_field('delete') }}
        @csrf

        <button class="btn btn-danger" type="submit">Delete the Service</button>
    </form>
    <hr>
    <form action="{{ route('services.destroy', $service->id) }}" method="POST">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-outline-danger">Delete</button>
    </form>

</div>


@endsection
