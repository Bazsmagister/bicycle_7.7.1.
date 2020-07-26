@extends('layouts.app')

@section('content')

<div class="container">


    @auth
    {{-- @if ($bicycle->is_rentable==1) --}}

    <form action="/bicyclesToRent/findId" method="POST">
        @csrf
        <p>Choose the bicycle that you want to rent: </p>
        <input {{--  id="typeahead" --}} class="typeahead form-control" type="text" name="name"
            {{-- data-provide="typeahead"  --}} autocomplete="off" placeholder="Start typing..." required>

        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button class="btn btn-info btn-sm" type="submit">Get the Id</button>
    </form>
    <br>
    Bikename is : {{ $foundbikename ?? '' }}
    <br>
    Bike id is: {{ $myid ?? '' }}

    <form action="/rents" method="POST">
        @csrf

        @php
        $id= auth()->user()->id;
        // dd($id);
        // var_dump($id);
        @endphp

        {{-- <div class="container">
        <h5>Bicycle search(autocomplete): </h5>
        <input id="autocomplete" class=" typeahead form-control" type="text" placeholder="Start typing...">
    </div> --}}


        {{-- <label for="user_id">Which user_id are you?:</label> --}}
        <input type="number" min="1" step="1" value="{{$id}}" id="user_id" name="user_id" required hidden>

        <label for="bicycle_id">Which Bicycle id do you want to rent?:</label>
        <input type="number" min="1" step="1" value="{{$myid ?? ''}}" name="bicycle_id" required>
        <br>
        <label for="rentstartdate">Rent start (default now):</label>
        <input type="date" id="rentstartdate" name="rentStarted_at">
        <br>
        {{-- <label for="rentstarttime">Choose a time for rent start:</label> --}}
        {{-- <input type="time" id="rentstarttime" name="rentstarttime" min="08:00" max="20:00" step="1" required> --}}
        {{-- <input type="text" id="rentstarttime" name="rentstarttime" min="08:00" max="20:00" step="1" required> --}}

        <br>
        {{--  <input type="button" value="Rent start now" name="rentStarted_at" onclick="datetime()">
        <p id="demo1">here comes the now timestamp</p>
        <p id="demo2">here comes the now timestamp</p>
        <p id="demo3">here comes the now timestamp</p> --}}

        <label for="rentenddate">Rent end (defalult tomorrow):</label>
        <input type="date" id="rentenddate" name="rentEnds_at">

        {{-- <input type="datetime-local" not supported in firefox> --}}
        <br>

        {{-- <label for="rentendtime">Choose an (Estimated) time for rent end:</label>
        <input type="time" id="rentendtime" name="rentEnds_at" min="08:00" max="20:00"> --}}

        <br>
        <button class='button btn-info' type="submit">Rent that bicycle</button>


    </form>


    {{-- @endif --}}
    @endauth

    <p>Test roles:</p>
    @hasanyrole('super-admin|serviceman|salesman')
    <p>has any role</p>
    @else
    <p>has not role</p>
    @endhasanyrole

</div>

<script>
    var path = "{{ route('autocompleteBikeToRentAvailable') }}";
    var $input = $(".typeahead");

        $('input.typeahead').typeahead({
        /* hint: true,
        highlight: true,
        minLength: 1 */
        source: function (query, process) {
        return $.get(path, { query: query }, function (data) {
        return process(data);
        });
        }
        });
        $input.change(function() {
        var current = $input.typeahead("getActive");
        if (current) {
        // Some item from your model is active!
        if (current.name == $input.val()) {
        // This means the exact match is found. Use toLowerCase() if you want case insensitive match.
        } else {
        // This means it is only a partial match, you can either add a new item
        // or take the active if you don't want new items
        }
        } else {
        // Nothing is active so it is a new value (or maybe empty value)
        }
        });
</script>

@endsection
