@extends('layouts.app')
@section('rents_edit')

@auth
<div>
    {{-- Logged in user:
    {{Auth::user()->name}} <br>
    with email: {{auth()->user()->email}} --}}

</div>
<div class="container">
    <form id='form' action="/services/{{$service->id}}" method="POST" {{-- enctype="multipart/form-data" --}}>
        @csrf
        @method('patch')

        {{-- <div>
            <h5>Autocomplete search: </h5>
            <input class="typeahead form-control" type="text" name="user_name" autocomplete="off"
                placeholder="Start typing...">
        </div> --}}

        <div>
            <input type="number" min="1" step="1" id="user_id" name="user_id"
                value="{{ old('user_id', $service->user_id) }}">
            <label for="user_id">User ID :{{ $service->user->name }}</label>
        </div>

        <div>

            <input type="number" id="bicycle_id" name="bicycle_id"
                value="{{ old('bicycle_id', $service->bicycle_id) }}">
            <label for="bicycle_id"> Bicycle ID: {{$service->bicycle_id}}</label>
        </div>

        <div>
            <input type="number" min="1" step="1" max="2" id="serviceman_id" name="serviceman_id"
                value="{{ old('serviceman_id', $service->serviceman_id) }}">
            <label for="serviceman_id">Serviceman ID: {{ $service->serviceman_id  }}</label>
        </div>

        <div>
            <input type="text" id="failure_description" name="failure_description"
                value="{{ old('failure_description', $service->failure_description) }}">
            <label for="failure_description">Failure failure_description: {{ $service->failure_description  }}</label>
        </div>

        <div>

            <input type="date" id="broughtIn_at" name="broughtIn_at"
                value="{{ old('broughtIn_at', $service->broughtIn_at) }}">
            <label for="broughtIn_at">Brought in at: {{ $service->broughtIn_at }}</label>
        </div>

        <div>

            <input type="date" id="startedToService_at" name="startedToService_at"
                value="{{ old('startedToService_at', $service->startedToService_at) }}">
            <label for="startedToService_at">Started to Service it at {{ $service->startedToService_at }}</label>
        </div>

        <div>
            <input type="date" id="readyToTakeIt_at" name="readyToTakeIt_at"
                value="{{ old('readyToTakeIt_at', $service->readyToTakeIt_at) }}">
            <label for="readyToTakeIt_at">Ready to take it at: {{ $service->readyToTakeIt_at }}</label>
        </div>

        <div>
            <input type="date" id="taken_at" name="taken_at" value="{{ old('taken_at', $service->taken_at) }}">
            <label for="taken_at">Taken at:</label>
        </div>


        <div>
            <input type="text" id="notes" name="notes" value="{{ old('notes', $service->notes) }}">
            <label for="notes">Notes if any...</label>
        </div>

        <div>

            {{-- <input type="radio" id="Active" name="isActive" value="1">
            <label for="Active">active</label><br>

            <input type="radio" id="Not Active" name="isActive" value="0">
            <label for="Not Active">not active</label><br> --}}
        </div>

        <p>need js to modify it:</p>
        <div class="flexbox">
            <div class="{{$service -> status ==='accepted' ? 'accepted' : 'boxes'}}" id="1">Accepted</div>
            <div class="{{$service -> status ==='repairing' ? 'repairing' : 'boxes'}}" id="2">Repairing</div>
            <div class="{{$service -> status ==='ready' ? 'ready' : 'boxes'}}" id="3">Ready</div>
            <div class="{{$service -> status ==='taken' ? 'taken' : 'boxes'}}" id="4">Taken</div>
        </div>

        <div class="flexbox">
            <button onclick="changeStatus()"
                class="btn btn-info {{$service -> status ==='accepted' ? 'accepted' : 'boxes'}}">
                <div class="{{$service -> status ==='accepted' ? 'accepted' : 'boxes'}}" id="1">Accepted</div>
            </button>

            <button class="{{$service -> status ==='repairing' ? 'repairing' : 'boxes'}}">
                <div class="{{$service -> status ==='repairing' ? 'repairing' : 'boxes'}}" id="2">Repairing</div>
            </button>
            <button class="{{$service -> status ==='ready' ? 'ready' : 'boxes'}}">
                <div class="{{$service -> status ==='ready' ? 'ready' : 'boxes'}}" id="3">Ready</div>
            </button>
            <button class="{{$service -> status ==='taken' ? 'taken' : 'boxes'}}">
                <div class="{{$service -> status ==='taken' ? 'taken' : 'boxes'}}" id="4">Taken</div>
            </button>
        </div>

        <hr>
        <div>
            <input type="radio" id="accepted" name="status" value="accepted">
            <label for="accepted">Accepted</label><br>
        </div>
        <div>
            <input type="radio" id="repairing" name="status" value="repairing">
            <label for="repairing">Repairing</label><br>
        </div>
        <div>
            <input type="radio" id="ready" name="status" value="ready">
            <label for="ready">Ready</label><br>
        </div>
        <div>
            <input type="radio" id="taken" name="status" value="taken">
            <label for="taken">taken</label><br>
        </div>


        <input class="button btn-success" type="submit" value="Submit">
    </form>

</div>
<hr>

<div class="container">
    <form action="{{ route('services.destroy', $service->id) }}" method="POST">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger"
            onclick="return confirm('Do you really want to delete it?');">Delete</button>
    </form>
</div>

@endauth



<script>
    var path = "{{ route('autocompleteUser') }}";
    // var path = "autocompleteUser";
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



function changeStatus(){
    alert('status changed');
}
</script>

@endsection
