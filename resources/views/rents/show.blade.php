@extends('layouts.app')

@section('content')


<div style="padding-left: 20px">
    <p>Start :
        {{$rent->rentStarted_at}} </p>
    <p> Ends :
        {{$rent->rentEnds_at}} </p>

    <p> The User who is rented the bicycle :
        {{$rent->user->name}} </p>
    <img src="{{$rent->user->user_image}}" alt="image 0 should be here"> 
    <img src="/storage/users/image/{{$rent->user->user_image}}" alt="image 1 should be here" width=50px height=50px>

    <hr>
   
    {{$rent}}

    <div>
        <a href="{{$rent->id}}/edit" class="btn btn-warning">Edit</a>
    </div>

    <form action="{{$rent->id}}" method="post">
        {{-- @method('Delete') --}}
        {{ method_field('delete') }}
        @csrf

        <button class="btn btn-danger" type="submit" onclick="return confirm('Do you really want to delete it?');"
>Delete the rent</button>
    </form>
    <hr>
    <form action="{{ route('rents.destroy', $rent->id) }}" method="POST">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Do you really want to delete it?');"
>Delete</button>
    </form>

</div>


@endsection
