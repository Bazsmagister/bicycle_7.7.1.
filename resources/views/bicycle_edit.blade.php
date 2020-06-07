@extends('layouts.app')
@section('bicycle_edit')

@auth
<div>
    {{-- Logged in user:
    {{Auth::user()->name}} <br>
    with email: {{auth()->user()->email}} --}}

</div>
<div>
    <form action="/bicycle/{{$bicycle->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <label for="name">Name</label>
        <input type="text" id="name" name="name" placeholder="Your biycle name.."
            value="{{ old('name', $bicycle->name) }}">

        <label for="description">Description</label>
        <input type="text" id="description" name="description" placeholder="Description"
            value="{{ old('description', $bicycle->description) }}">

        <label for="Price">Price</label>
        <input type="text" id="price" name="price" placeholder="Price" value="{{ old('price', $bicycle->price) }}">
        <div>
            <label for="Upload photo">Photo(s)</label>
            <input type="file" id="image" name="image" placeholder="Upload photo" accept="image/*">
        </div>


        <input type="checkbox" id="sellable" name="is_sellable" value="{{old('is_sellable', $bicycle->is_sellable)}}">
        <label for="is_sellable"> For Sell</label><br>
        <input type="checkbox" id="rentable" name="is_rentable" value="{{old('is_rentable', $bicycle->is_rentable)}}">
        <label for="is_rentable"> For Rent</label><br>
        {{-- <input type="checkbox" id="serviceable" name="is serviceable" value="1">
        <label for="is_serviceable"> For Service</label><br><br> --}}

        <input type="submit" value="Submit">
    </form>
</div>



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

<div>
    <form action="{{ route('bicycle.destroy', $bicycle->id) }}" method="POST">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-outline-danger">Delete</button>
    </form>
</div>



<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
    $('#lfm').filemanager('image');
</script>



@endauth


@endsection
