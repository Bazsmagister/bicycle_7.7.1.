@extends('layouts.app')

@section('content')

<div style="padding-left: 20px">
    <p>Name :
        {{$bicycle->name}} </p>
    <p> Description :
        {{$bicycle->description}} </p>

    <p> Price :
        {{$bicycle->price}} Ft</p>

    <p> Rent Price /24h :
        {{$bicycle->rent_price}} Ft</p>

    <p> Image :
        @role('super-admin')
        {{$bicycle->image}}
        @endrole

        <img src="{{$bicycle->image}}" alt="interesting" width="150" height="120">

        <img src="/storage/{{$bicycle->image}}" alt="this should be an image 0">

        <img src="/storage/{{$bicycle->image}}" alt="this should be an image3" width="130" height="100">



        {{-- <img src="{{$bicycle->image}}" alt="this should be an image1" width="100" height="100">

        <img src="images/{{$bicycle->image}}" alt="this should be an image2" width="100" height="100"> --}}




        {{-- <img src="{{asset("$bicycle->image")}}" alt="this should be an image4" width="100" height="100">

        <embed src="{{ asset("$bicycle->image")}}" alt="embed">

        <img src="{{asset("$bicycle->image")}}" alt="this should be an image5" width="100" height="100"> --}}


    </p>

    <hr>
    @auth
    @if ($bicycle->is_rentable==1)
    <form action="/bicycles/{id}" method="POST">
        @csrf
        @method('PATCH')

        <label for="rentstartdate">Rent start (date and time):</label>
        <input type="date" id="rentstartdate" name="rentStarted_at" required>
        <br>
        <label for="rentstarttime">Choose a time for rent start:</label>
        {{-- <input type="time" id="rentstarttime" name="rentstarttime" min="08:00" max="20:00" step="1" required> --}}
        {{-- <input type="text" id="rentstarttime" name="rentstarttime" min="08:00" max="20:00" step="1" required> --}}

        <br>
        <input type="button" value="Rent start now" name="rentstarttime" onclick="datetime()">

        <p id="demo1">here comes the now timestamp</p>
        <p id="demo2">here comes the now timestamp</p>
        <p id="demo3">here comes the now timestamp</p>
        <hr>
        <label for="rentenddate">Rent end (date and time):</label>
        <input type="date" id="rentenddate" name="rentenddate">
        {{-- <input type="datetime-local" not supported in firefox> --}}
        <br>

        <label for="rentendtime">Choose a time for rent end:</label>
        <input type="time" id="rentendtime" name="rentendtime" min="08:00" max="20:00">

        <br>
        <button class='button btn-info' type="submit">Rent that bicycle</button>

    </form>


    @endif
    @endauth

    {{-- @hasanyrole('super-admin') --}}
    @hasanyrole('super-admin|serviceman|salesman')

    <div>
        <a href="{{$bicycle->id}}/edit" class="btn btn-warning">Edit</a>
    </div>

    <hr>
    <form action="{{ route('bicycle.destroy', $bicycle->id) }}" method="POST">
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

    {{$bicycle}}
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

<script>
    function datetime(){
        var now= Date.now();

        var date = new Date();


        //alert(now);
        var time = date.toLocaleTimeString();
        // document.getElementById("demo").innerHTML = now;

        var date = date.toLocaleDateString();

        var dateAndTime = date.toLocaleString("hu-HU"); //doesn't work...

        document.getElementById("demo1").innerHTML = date;
        document.getElementById("demo2").innerHTML = time;
        document.getElementById("demo3").innerHTML = dateAndTime;


    }
</script>
