@extends('layouts.app')
@section('content')

@auth
<div>
    {{-- Logged in user:
    {{Auth::user()->name}} <br>
    with email: {{auth()->user()->email}} --}}

</div>
<div>
    <form id='form' action="/bicyclesToRent/{{$bicycleToRent->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>

            <input type="text" id="name" name="name" placeholder="Your biycle name.."
                value="{{ old('name', $bicycleToRent->name) }}">
            <label for="name">Name</label>
        </div>


        <div>
            <input type="number" name="rent_price" id="rent_price" placeholder="Rent price"
                value="{{ old('rent_price', $bicycleToRent->rent_price) }}" />

            <label for="rent_price">Rent price</label>
        </div>

        <div>

            <input type="text" rows="4" cols="50" id="description" name="description" placeholder="Description"
                value="{{ old('description', $bicycleToRent->description) }}">
            <label for="description">Description</label>
        </div>


        <div>
            <label for="Upload photo">Photo: </label>
            <input type="file" id="image" name="image" accept="image/*">
            <img src="/storage/{{$bicycleToRent->image}}" alt="no little image yet" height="100" width="120">
            <img src="/storage/{{$bicycleToRent->image}}" alt="no image yet">

        </div>

        <input class="button btn-success" type="submit" value="Submit">
    </form>


</div>
<hr>



<div class="input-group">
    <span class="input-group-btn">
        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
            <i class="fa fa-picture-o"></i> Choose
        </a>
    </span>
    <input id="thumbnail" class="form-control" type="text" name="filepath">
</div>
<img id="holder" style="margin-top:15px;max-height:100px;">
</div>

<hr>

<div>
    <form action="{{ route('bicyclesToRent.destroy', $bicycleToRent->id) }}" method="POST">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
</div>



<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
    $('#lfm').filemanager('image');
</script>



@endauth


@endsection
