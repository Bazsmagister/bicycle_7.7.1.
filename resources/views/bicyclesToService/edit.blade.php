@extends('layouts.app')
@section('content')

@auth
<div>
    {{-- Logged in user:
    {{Auth::user()->name}} <br>
    with email: {{auth()->user()->email}} --}}

</div>
<div>
    <form id='form' action="/bicyclesToService/{{$bicycleToService->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>

            <input type="text" id="name" name="name" placeholder="Your biycle name.."
                value="{{ old('name', $bicycleToService->name) }}">
            <label for="name">Name</label>
        </div>

        <div>

            <input type="text" rows="4" cols="50" id="description" name="description" placeholder="Description"
                value="{{ old('description', $bicycleToService->description) }}">
            <label for="description">Description</label>
        </div>

        <input class="button btn-success" type="submit" value="Submit">
    </form>

</div>



<hr>

<div>
    <form action="{{ route('bicyclesToService.destroy', $bicycleToService->id) }}" method="POST">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
</div>



@endauth

@endsection
