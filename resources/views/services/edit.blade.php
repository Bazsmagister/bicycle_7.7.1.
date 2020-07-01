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


        <div>

            <input type="number" min="0" step="1" id="user_id" name="user_id"
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
            <label for="brought in at">Brought in at</label>
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


@endsection
