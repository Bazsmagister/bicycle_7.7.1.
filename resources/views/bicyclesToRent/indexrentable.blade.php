@extends('layouts.app')

@section('content')

<div class="id">
    @if (count($bicycles) == 0)
    <p>
        Sorry, we are out of stock, come back later
    </p>

    @else
    <div>
        All the bicycles you can choose to rent!
        Everything is fine, our business is booming!
        Here are the bicycles, you can choose of!
    </div>
    @endif

    <hr>
    <p>
        Rentable bicycles number : {{ count($bicycles) }}
        {{-- Rentable bicycles number z: {{ count(array($rentable_bicycles)) }} --}}
    </p>
    <hr>



    {{-- <div>
        Rentable bicycles number q :
        {{ count($rentable_bicycles) }}
</div> --}}
{{-- {{ count(array($rentable_bicycles)) }} --}}


@foreach ($bicycles as $bicycle)
<div class="container">
    {{-- {{ count($rentable_bicycles) }} --}}

    {{-- {{ count($bicycle->is_rentable) }} --}}

    {{-- @if($bicycle->count() == 0)
        <p>Sorry, we are out of stock, come back later</p>
        @else
        <p>Everything is fine, our business is booming</p>
        @endif --}}
    {{--
        @if($rentable_bicycles->count() == 0)
        <p>Sorry, we are out of stock, come back later</p>
        @else
        <p>Everything is fine, our business is booming</p>
        @endif --}}

    <ul>

        <li>{{$bicycle -> id }}</li>
        <li>{{$bicycle -> name }} </li>
        <li>{{$bicycle -> description }} </li>
        <li>{{$bicycle -> rent_price }} Ft/day </li>

        <li>Available? : {{$bicycle -> is_availableToRent }} </li>
        <img src="{{$bicycle->image}}" alt="interesting" width="150" height="120">

        {{-- <img src="/storage/bic.png" alt="a bicycle png"> --}}
        <img src="/storage/bi.jpg" alt="quarter jpg" width="182" height="109">

        @auth

        <div>
            <a href="bicyclesToRent/{{$bicycle->id}}" class="btn btn-info">Show</a>
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
{{-- @if (count($bicycle)==0)
    <p>
        Sorry, we are out of stock. Come back later!
    </p>
    @endif --}}




@endforeach
@if($bicycles->count() == 0)
<p>Sorry, we are out of stock, come back later :(</p>
@else
<p>Everything is fine, our business is booming!!!</p>
@endif

</div>

<script>
    var path = "{{ route('autocompleteBikeToRent') }}";
    // $('input.typeahead').typeahead({  //works with class
    $('#autocomplete').typeahead({       //works with id
        source:  function (query, process) {
        return $.get(path, { query: query }, function (data) {
                 return process(data);
                //  return data;
            });
        }
    });

</script>


<script>
    function pleaseLogin() {

    swal("Please login or register to use this function");
    // swal.fire('hi there', 'wazzup?', 'success');
    // swal('hi there', 'wazzup?', 'info');
    alert("Please login or register to use this function");
    }
</script>

@endsection
