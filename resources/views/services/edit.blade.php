@extends('layouts.app')
@section('rents_edit')

@auth
<div>
    {{-- Logged in user:
    {{Auth::user()->name}} <br>
    with email: {{auth()->user()->email}} --}}

</div>
<div>
    <form id='form' action="/services/{{$service->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="container">

            {{-- <h5>Autocomplete Search using Bootstrap Typeahead JS</h5> --}}
            <h5>Autocomplete search: </h5>

            <input 
           {{--  id="typeahead" --}}
             class="typeahead form-control" type="text" name="user_name" 
            {{-- data-provide="typeahead"  --}}
            autocomplete="off" 
            placeholder="Start typing...">

        </div>

        <div>
            <input type="number" min="1" step="1" id="user_id" name="user_id"
                value="{{ old('user_id', $service->user_id) }}">
            <label for="ID">ID</label>
        </div>

        <div>

            <input type="number" id="bicycle_id" name="bicycle_id"
                value="{{ old('bicycle_id', $service->bicycle_id) }}">
            <label for="Bike ID"> Bike ID</label>
        </div>

        <div>

            <input type="date" id="broughtIn_at" name="broughtIn_at"
                value="{{ old('broughtIn_at', $service->broughtIn_at) }}">
            <label for="broughtIn_at">Brought in at</label>
        </div>

        <div>

            <input type="date" id="startedToService_at" name="startedToService_at"
                value="{{ old('startedToService_at', $service->startedToService_at) }}">
            <label for="startedToService_at">Started to Service it at</label>
        </div>

        <div>

            <input type="date" id="readyToTakeIt_at" name="readyToTakeIt_at"
                value="{{ old('readyToTakeIt_at', $service->readyToTakeIt_at) }}">
            <label for="readyToTakeIt_at">Ready to take it at</label>
        </div>

        <div>

            <input type="select" id="isActive" name="isActive" value="{{ old('isActive', $service->isActive) }}">
            <label for="isActive">Is active?</label>
        </div>


        {{-- <div>
            <input type="date" name="rentEnds_at" id="rentEnds_at"
                value="{{ old('rentEnds_at', $rent->rentEnds_at) }}" />
        <label for="Rent end">Rent end/<label>
</div> --}}



<input class="button btn-success" type="submit" value="Submit">
</form>



</div>
<hr>


<hr>

<div>
    <form action="{{ route('services.destroy', $service->id) }}" method="POST">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
</div>


@endauth


<script>//works
  /*   var path = "{{ route('autocomplete') }}";
    $('input.typeahead').typeahead({
   
        source:  function (query, process) {
        return $.get(path, { query: query }, function (data) {
                return process(data);
            });
        }
    }); */
</script>

<script>
    var path = "{{ route('autocomplete') }}";
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
