@extends('layouts.app')

@section('content')

<div class=container>

    @auth

    <form action="/users/findId" method="POST">
        @csrf
        <div>
            {{-- <h5>Autocomplete Search using Bootstrap Typeahead JS</h5> --}}
            <h5>User name / Autocomplete : </h5>
            <input {{--  id="typeahead" --}} class="typeahead form-control" type="text" name="name"
                {{-- data-provide="typeahead"  --}} autocomplete="off" placeholder="Start typing..." required>
        </div>
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button class="btn btn-info btn-sm" type=" submit">Get the Id</button>
    </form>

    Username is : {{ $foundname ?? '' }} <br>
    User id is: {{ $myid ?? '' }}

    <hr>

    <form action="/services" method="POST" id="servicecreateform">
        @csrf


        {{-- <div>
        <h5>Autocomplete search user: </h5>
        <input class="typeahead form-control" type="text" name="user_name"
            autocomplete="off" placeholder="Start typing...">
        </div> --}}

        {{-- <label for="user_name">Which user has the bicycle that needs to be servised?:</label>
        <input type="text" id="user_name" name="user_name" placeholder="name"> --}}

        <label for="user_id">Which user has the bicycle that needs to be servised? user_id:</label>
        <input type="number" min="1" step="1" id="user_id" name="user_id" value="{{ $myid ?? '' }}" required>
        @error('user_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>

        <br>
        <label for="bicycle_id">Which Bicycle_id do you want to service (Bicycle_id):</label>
        <input type="number" min="1" step="1" id="bicycle_id" name="bicycle_id" required>
        @error('bicycle_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>

        <br>
        <label for="failure_description">Failure description:</label>
        <input type="text" id="failure_description" name="failure_description" required>
        @error('failure_description')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>

        <label for="broughtIndate">Brought In (date and time):</label>
        <input type="date" id="broughtIndate" name="broughtIn_at">
        @error('broughtIn_at')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label for="servicestartdate">Service start (date and time):</label>
        <input type="date" id="servicestartdate" name="startedToService_at">
        @error('startedToService_at')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label for="readyToTakeIt">Ready to take it at(date and time):</label>
        <input type="date" id="readyToTakeIt" name="readyToTakeIt_at">
        @error('readyToTakeIt_at')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <br>
        <label for="createtextarea">Notes:</label>
        <br>
        <textarea rows="4" cols="50" name="notes" form="servicecreateform" id=createtextarea
            required>Write here...</textarea>
        @error('notes')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <br>

        {{-- <label for="status">Status:</label> --}}
        <input type="text" id="status" name="status" value="accepted" hidden>
        @error('status')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label for="serviceman_id">Serviceman_id: 1 or 2:</label>
        <input type="number" id="serviceman_id" name="serviceman_id" min="1" max="2" step="1" value='1'>
        @error('serviceman_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        {{-- <label for="rentstarttime">Choose a time for rent start:</label> --}}
        {{-- <input type="time" id="rentstarttime" name="rentstarttime" min="08:00" max="20:00" step="1" required> --}}
        {{-- <input type="text" id="rentstarttime" name="rentstarttime" min="08:00" max="20:00" step="1" required> --}}

        <br>
        {{--  <input type="button" value="Rent start now" name="rentStarted_at" onclick="datetime()">
        <p id="demo1">here comes the now timestamp</p>
        <p id="demo2">here comes the now timestamp</p>
        <p id="demo3">here comes the now timestamp</p> --}}



        {{-- <input type="datetime-local" not supported in firefox> --}}
        <br>

        {{-- <label for="rentendtime">Choose an (Estimated) time for rent end:</label>
        <input type="time" id="rentendtime" name="rentEnds_at" min="08:00" max="20:00"> --}}

        <br>
        <button class='button btn-info' type="submit">Start to service that bicycle</button>

    </form>


    {{-- @endif --}}
    @endauth

    {{-- @hasanyrole('super-admin') --}}


    <p>Test roles:</p>
    @hasanyrole('super-admin|serviceman|salesman')
    <p>has any role</p>
    @else
    <p>has not role</p>
    @endhasanyrole

</div>

<script>
    var path = "{{ route('autocompleteUser') }}";
    var $input = $(".typeahead");

    $('input.typeahead').typeahead({
      /*   hint: true,
        highlight: true,
        minLength: 1 */
        source:  function (query, process) {
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
