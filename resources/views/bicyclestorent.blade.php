@extends('layouts.app')

@section('contentrent')

<div class="id">

    All the bicycles to rent!

    <hr>

    @foreach ($rentable_bicycles as $bicycle)
    <div class="container">
        <ul>

            <li>{{$bicycle -> id }}</li>
            <li>{{$bicycle -> name }} </li>
            <li>{{$bicycle -> description }} </li>
            <li>{{$bicycle -> rent_price }} Ft/day </li>
            <li>{{$bicycle -> is_rentable }} </li>
            <li>{{$bicycle -> is_availableToRent }} </li>
            <img src="{{$bicycle->image}}" alt="interesting" width="150" height="120">

            {{-- <img src="/storage/bic.png" alt="a bicycle png"> --}}
            <img src="/storage/bi.jpg" alt="quarter jpg" width="182" height="109">

            @auth

            <div>
                <a href="bicycle/{{$bicycle->id}}" class="btn btn-info">Show</a>
            </div>

            <br>
            <form action="/rents" method="post">
                @csrf

                <input type="number" id="bicycle_id" name="bicycle_id" value={{$bicycle->id}} hidden>

                {{-- <label for="rentstartdate">Rent start (date and time):</label>
                <input type="date" id="rentstartdate" name="rentStarted_at" > --}}
                <br>
                <button class='button btn-info' type="submit">Rent that bicycle from now on for 1 day</button>
            </form>

            {{--  <a href="/rents/create">create</a> --}}
            <button>
                <a href="/rents/create">Make a more complex rent if you want to plan a rent in the future.</a>
            </button>
            @else
            <div>
                <button class='button btn-info' onclick="alert('Please login or register to rent this bicycle')">Rent
                    that bicycle</button>

                <button class='button btn-info' onclick="swal('Please login or register to rent this bicycle')">Rent
                    that bicycle</button>

                Why doesn't work this when I don't use script tag?->
                <button id='alertbutton' class='button btn-info' onclick="pleaseLogin()">Rent that bicycle</button>

                {{-- <button class='button btn-info' onClick="pleaseLogin()" disabled>Rent that bicycle</button> --}}
            </div>

            @endauth

        </ul>
        <hr>

    </div>

    @endforeach

    @endsection


</div>



<script>
    function pleaseLogin() {

    swal("Please login or register to use this function");
    // swal.fire('hi there', 'wazzup?', 'success');
    // swal('hi there', 'wazzup?', 'info');
    alert("Please login or register to use this function");
    }
</script>
