@extends('layouts.app')

@section('content')
{{-- <div class="text-center">
    {!! $bicycles->links() !!}
</div> --}}
<div class='admin'>
    <p>
        For admin : All of our bicycles to service
    </p>

</div>
<hr>

@role('super-admin')
<div>
    <button class="button btn-warning">
        <a href="/bicyclesToService/create"> Add a new Bicycle to service </a>
    </button>
</div>
@endrole

<hr>

{{-- <div class="container">
    <h5>Autocomplete search: </h5>
    <input id="autocomplete" class=" typeahead form-control" type="text" placeholder="Start typing...">
</div> --}}

<div class="container">
    <form action="/bicyclesToService/showmetheservicebike" method="POST">
        @csrf
        <p>Choose the bicycle that you want to service: </p>
        <input class="typeahead form-control" type="text" name="name" autocomplete="off" placeholder="Start typing..."
            required>

        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button class="btn btn-info btn-sm" type="submit">Show me the bike!</button>
    </form>
</div>

@foreach ($bicycles as $bicycle)
<div class="container">
    <ul>

        <li>Id : {{$bicycle -> id }}</li>
        <li>Name :{{$bicycle -> name }} </li>
        <li>Description : {{$bicycle -> description }} </li>

        <div>
            <a href="bicyclesToService/{{$bicycle->id}}" class="btn btn-info">Show</a>
        </div>

    </ul>
</div>

@endforeach
<div class="container mid>
    {{-- <div class="text-center"> --}}
    {{-- {!! $bicycles->links() !!} --}}
</div>

<div class= " container mid">
    <table id="table_bikes" class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                {{-- <th scope="col">Image</th> --}}
                <th scope="col">Created_at</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($bicycles as $bicycle)
            <tr>
                <td>{{ $bicycle->id }}</td>
                <td>{{ $bicycle->name }}</td>
                <td>{{ $bicycle->description}}</td>
                {{-- <td><img src="/storage/{{ $bicycle->image }}" height="50" width="50"></td> --}}
                <td>{{ $bicycle->created_at }}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    var path = "{{ route('autocompleteBikeToService') }}";
    var $input = $(".typeahead");
     $('input.typeahead').typeahead({  //works with class
    //$('#autocomplete').typeahead({       //works with id
        source:  function (query, process) {
        return $.get(path, { query: query }, function (data) {
                 return process(data);
                //  return data;
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
