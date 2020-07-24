@extends('layouts.app')

@section('content')

<div style="padding-left: 20px">
    <p>Name :
        {{$bicycleToRent->name}} </p>
    <p> Description :
        {{$bicycleToRent->description}} </p>


    <p> Rent Price /24h :
        {{$bicycleToRent->rent_price}} Ft</p>

    <p> Available : {{ $bicycleToRent->is_availableToRent}}</p>
    <p> Image :
        @role('super-admin')
        {{$bicycleToRent->image}}
        @endrole

        <img src="{{$bicycleToRent->image}}" alt="interesting" width="" height="">

        {{-- <img src="/storage/{{$bicycle->image}}" alt="this should be an image 0">

        <img src="/storage/{{$bicycle->image}}" alt="this should be an image3" width="130" height="100"> --}}



        {{-- <img src="{{$bicycle->image}}" alt="this should be an image1" width="100" height="100">

        <img src="images/{{$bicycle->image}}" alt="this should be an image2" width="100" height="100"> --}}




        {{-- <img src="{{asset("$bicycle->image")}}" alt="this should be an image4" width="100" height="100">

        <embed src="{{ asset("$bicycle->image")}}" alt="embed">

        <img src="{{asset("$bicycle->image")}}" alt="this should be an image5" width="100" height="100"> --}}


    </p>

    <hr>
    @auth
    @if ($bicycleToRent->is_availableToRent ==1)
    <form action="/rents" method="POST">
        @csrf
        {{-- @method('PATCH') --}}

        <input type="number" name='bicycle_id' value='{{$bicycleToRent->id}}' hidden>

        <label for="rentstartdate">Rent start :</label>
        <input type="date" id="rentstartdate" name="rentStarted_at">
        {{-- <input type="date" id="rentstartdate" name="rentStarted_at" required> --}}
        <br>
        {{-- <label for="rentstarttime">Choose a time for rent start:</label> --}}
        {{-- <input type="time" id="rentstarttime" name="rentstarttime" min="08:00" max="20:00" step="1" required> --}}
        {{-- <input type="text" id="rentstarttime" name="rentstarttime" min="08:00" max="20:00" step="1" required> --}}

        <br>
        {{-- <input type="button" value="Rent start now" name="rentstarttime" onclick="datetime()"> --}}

        {{-- <p id="demo1">here comes the now timestamp</p>
        <p id="demo2">here comes the now timestamp</p>
        <p id="demo3">here comes the now timestamp</p>
        <hr> --}}
        <label for="rentenddate">Rent end :</label>
        <input type="date" id="rentenddate" name="rentEnds_at">
        {{-- <input type="datetime-local" not supported in firefox> --}}
        <br>

        {{-- <label for="rentendtime">Choose a time for rent end:</label>
        <input type="time" id="rentendtime" name="rentendtime" min="08:00" max="20:00"> --}}

        <br>
        <button class='button btn-info' type="submit">Rent that bicycle from now on for 1 day</button>

    </form>
    <br>
    <button>
        <a href="/rents/create">Make a more complex rent if you want to plan a rent in the future even for more
            days.</a>
    </button>


    @endif
    @endauth

    {{-- @hasanyrole('super-admin') --}}
    @hasanyrole('super-admin|serviceman|salesman')

    <div>
        <a href="{{$bicycleToRent->id}}/edit" class="btn btn-warning">Edit</a>
    </div>

    <hr>
    <form action="{{ route('bicyclesToRent.destroy', $bicycleToRent->id) }}" method="POST">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger">Delete the bicycle</button>
    </form>

    {{-- <form action="{{$bicycle->id}}" method="post">

    {{ method_field('delete') }}
    @csrf

    <button class="btn btn-outline-danger" type="submit">Delete the bicycle</button>
    </form> --}}

    <hr>

    {{$bicycleToRent}}
    <hr>

    @endhasanyrole


    <p>Test roles:</p>
    @hasanyrole('super-admin|serviceman|salesman')
    <p>has any role</p>
    @else
    <p>has not role</p>
    @endhasanyrole

</div>


@endsection
