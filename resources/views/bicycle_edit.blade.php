@extends('layouts.app')
@section('bicycle_edit')

@auth
<div>
    {{-- Logged in user:
    {{Auth::user()->name}} <br>
    with email: {{auth()->user()->email}} --}}

</div>
<div>
    <form id='form' action="/bicycle/{{$bicycle->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
           
            <input type="text" id="name" name="name" placeholder="Your biycle name.."
                value="{{ old('name', $bicycle->name) }}">
                <label for="name">Name</label>
        </div>


        <div>
           
            <input type="text" id="price" name="price" placeholder="Price" value="{{ old('price', $bicycle->price) }}">
            <label for="Price">Price</label>
        </div>

        <div>
           
            <input type="text" rows="4" cols="50" id="description" name="description" placeholder="Description"
                value="{{ old('description', $bicycle->description) }}">
                <label for="description">Description</label>
        </div>

        <div>
            <label for="Upload photo">Photo: </label>
            <input type="file" id="image" name="image" placeholder="Upload photo" accept="image/*">
            
        </div>

        <div>
          
            <input type="checkbox" id="sellable" name="is_sellable"
                value="{{old('is_sellable', $bicycle->is_sellable)}}">
                <label for="is_sellable"> For Sell</label><br>
        </div>

        <div>
            
            <input type="checkbox" id="rentable" name="is_rentable"
                value="{{old('is_rentable', $bicycle->is_rentable)}}">
                <label for="is_rentable"> For Rent</label><br>
        </div>

        <div>
            
            <input type="checkbox" id="serviceable" name="is serviceable"
                value="{{old('is_serviceable', $bicycle->is_serviceable)}}">
                <label for="is_serviceable"> For Service</label><br><br>
        </div>

        <input type="submit" value="Submit">
    </form>

    <!-- <div>
        <label for="description">Description</label>
        <textarea id='form' rows="4" cols="50" id="description" name="description" placeholder="Description"
            value="{{ old('description', $bicycle->description) }}">
    </div> -->

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
    <form action="{{ route('bicycle.destroy', $bicycle->id) }}" method="POST">
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
