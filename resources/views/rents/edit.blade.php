@extends('layouts.app')
@section('rents_edit')

@auth
<div>
    {{-- Logged in user:
    {{Auth::user()->name}} <br>
    with email: {{auth()->user()->email}} --}}

</div>
<div>
    <form id='form' action="/rents/{{$rent->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('patch')


        <div>

            <input type="number" id="user_id" name="user_id" value="{{ old('user_id', $rent->user_id) }}">
            <label for="ID">ID</label>
        </div>

        <div>

            <input type="number" id="bicycle_id" name="bicycle_id" value="{{ old('bicycle_id', $rent->bicycle_id) }}">
            <label for="Bike ID"> Bike ID</label>
        </div>

        <div>

            <input type="date" id="rentStarted_at" name="rentStarted_at"
                value="{{ old('rentStarted_at', $rent->rentStarted_at) }}">
            <label for="rent started at">rent started at</label>
        </div>


        <div>
            <input type="date" name="rentEnds_at" id="rentEnds_at"
                value="{{ old('rentEnds_at', $rent->rentEnds_at) }}" />
            {{-- <input type="text" id="price" name="price" placeholder="Price" pattern="[0-9.]+"
                value="{{ old('price', $bicycle->price) }}"> --}}
            <label for="Rent end">Rent end/<label>
        </div>



        <input class="button btn-success" type="submit" value="Submit">
    </form>



</div>
<hr>






<hr>

<div>
    <form action="{{ route('rents.destroy', $rent->id) }}" method="POST">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
</div>


@endauth


@endsection
