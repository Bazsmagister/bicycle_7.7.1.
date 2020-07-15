@extends('layouts.app')

@section('content')

<div style="padding-left: 20px">
    <p>Brought In :
        {{$service->broughtIn_at}} </p>
    <p>Start to service:
        {{$service->startedToService_at}} </p>
    <p> Ready to take it at :
        {{$service->readyToTakeIt_at}} </p>

    <p> The User who owns the bicycle/ Owner's name :
        {{$service->user->name}} </p>
    <p> Owner's phone: {{$service->user->phone}}</p>
    <p> Owner's email: {{$service->user->email}} </p>

    <p> Notes: {{$service->notes}} </p>

    <p> Status: {{$service->status}} </p>

    <div class="flexbox">
        <div class="{{$service -> status ==='accepted' ? 'accepted' : 'boxes'}}" id="1">Accepted</div>
        <div class="{{$service -> status ==='repairing' ? 'repairing' : 'boxes'}}" id="2">Repairing</div>
        <div class="{{$service -> status ==='ready' ? 'ready' : 'boxes'}}" id="3">Ready</div>
        <div class="{{$service -> status ==='taken' ? 'taken' : 'boxes'}}" id="4">Taken</div>
    </div>

    {{-- <img src="{{$service->user->user_image}}" alt="image 0 should be here">
    <img src="/storage/users/image/{{$service->user->user_image}}" alt="image 1 should be here" width=50px height=50px>
    --}}

    <hr>

    {{$service}}

    <div>
        <a href="{{$service->id}}/edit" class="btn btn-warning">Edit</a>
    </div>

    <form action="{{$service->id}}" method="post">
        {{-- @method('Delete') --}}
        {{ method_field('delete') }}
        @csrf

        <button class="btn btn-danger" type="submit"
            onclick="return confirm('Do you really want to delete it?');">Delete the Service</button>
    </form>
    <hr>
    <form action="{{ route('services.destroy', $service->id) }}" method="POST">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-outline-danger"
            onclick="return confirm('Do you really want to delete it?');">Delete</button>
    </form>

</div>

@endsection
