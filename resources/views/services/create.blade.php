@extends('layouts.app')

@section('content')

<div class=container>

    @auth
    {{-- @if ($bicycle->is_rentable==1) --}}
    <form action="/services" method="POST" id="servicecreateform">
        @csrf

        @php
        //$id= auth()->user()->id;
        // dd($id);
        // var_dump($id);
        @endphp

        <div>
            {{-- <h5>Autocomplete Search using Bootstrap Typeahead JS</h5> --}}
            <h5>Autocomplete search user: </h5>
            <input {{--  id="typeahead" --}} class="typeahead form-control" type="text" name="user_name"
                {{-- data-provide="typeahead"  --}} autocomplete="off" placeholder="Start typing...">
        </div>

        {{-- <label for="user_name">Which user has the bicycle that needs to be servised?:</label>
        <input type="text" id="user_name" name="user_name" placeholder="name"> --}}

        <label for="user_id">Which user has the bicycle that needs to be servised? user_id:</label>
        <input type="number" min="1" step="1" id="user_id" name="user_id" required>
        <br>

        <br>
        <label for="bicycle_id">Which Bicycle_id do you want to service (Bicycle_id):</label>
        <input type="number" min="1" step="1" id="bicycle_id" name="bicycle_id" required>
        <br>
        <label for="broughtIndate">Brought In (date and time):</label>
        <input type="date" id="broughtIndate" name="broughtInAt_at">

        <label for="servicestartdate">Service start (date and time):</label>
        <input type="date" id="servicestartdate" name="startedToService_at">

        <label for="readyToTakeIt">Ready to take it at(date and time):</label>
        <input type="date" id="readyToTakeIt" name="readyToTakeIt_at">
        <br>

        {{-- <label for="notes">Notes:</label>
        <input type="textarea" rows='4' cols="50" id="notes" name="notes_at" form="servicecreateform"> --}}

        <br>
        <label for="createtextarea">Notes:</label>
        <br>
        <textarea rows="4" cols="50" name="notes" form="servicecreateform" id=createtextarea>
        Enter notes here...</textarea>
        <br>

        {{-- <label for="status">Status:</label> --}}
        <input type="date" id="status" name="status" value="accepted" hidden>

        <label for="serviceman_id">Serviceman_id: 1 or 2:</label>
        <input type="number" id="serviceman_id" name="serviceman_id" min="1" max="2" step="1" value='1'>

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
    @hasanyrole('super-admin|serviceman|salesman')

    {{-- <div>
        <a href="{{$bicycle->id}}/edit" class="btn btn-warning">Edit</a>
</div>

<hr>
<form action="{{ route('bicycle.destroy', $bicycle->id) }}" method="POST">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-danger">Delete the bicycle</button>
</form> --}}

{{-- <form action="{{$bicycle->id}}" method="post">

{{ method_field('delete') }}
@csrf

<button class="btn btn-outline-danger" type="submit">Delete the bicycle</button>
</form> --}}

<hr>

{{-- {{$bicycle}} --}}
<hr>

@endhasanyrole


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
