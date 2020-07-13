@extends('layouts.app')

@section('content')
<div class="text-center">
    {!! $bicycles->links() !!}
</div>
<div>
    <p>
        All of our bicycles to rent.
    </p>
    {{-- <p style="background-color: red">
        For admin : All of our bicycles.
    </p> --}}
</div>
<hr>
<br>

@role('super-admin')
<div>
    <button class="button btn-warning">
        <a href="/bicyclesToRent/create"> Add a new Bicycle </a>
    </button>
</div>
@endrole

<hr>

<div class="container">
    {{-- <h5>Autocomplete Search using Bootstrap Typeahead JS</h5> --}}
    <h5>Autocomplete search: </h5>
    <input id="autocomplete" class=" typeahead form-control" type="text" placeholder="Start typing...">
</div>



@foreach ($bicycles as $bicycle)
<div class="container">
    <ul>

        <li>{{$bicycle -> id }}</li>
        <li>{{$bicycle -> name }} </li>
        <li>{{$bicycle -> description }} </li>
        <li>{{$bicycle -> rent_price }} Ft</li>
        <img src="/storage/{{$bicycle->image}}" alt="no pic yet..." width="70" height="50">

        <img src="/storage/{{$bicycle->image}}" alt="a bicycle png" width="80" height="60">
        {{-- <img src="/storage/bi.jpg" alt="quarter1 jpg" width="182" height="109"> --}}
        <img src="/storage/bic.png" alt="bic png">

        <img src="/storage/{{$bicycle->image}}" alt="quarter jpg" width="182" height="109">

        <img src="{{$bicycle->image}}" alt="img" width="70" height="50">

        {{-- works: --}}
        <embed src="{{ asset("/storage/$bicycle->image")}}">




        {{-- <a href="{{route('bicycle.edit','$bicycle->id')}}"></a> --}}
        <div>
            <a href="bicyclesToRent/{{$bicycle->id}}" class="btn btn-info">Show</a>
        </div>


        {{-- <img src="{{$bicycle->image}}"> --}}

        {{-- <li>{{$bicycle -> image  }} </li> --}}
        {{-- <img src="{{$bicycle->image}}"> --}}
        {{-- <img src="/storage/images/{{$bicycle->image}}"> --}}
        {{-- <img src="/storage/bic.png" alt="a bicycle"> --}}
        {{-- <img src="/storage/bi.jpg" alt="orig" width="728" height="437"> --}}
        {{-- <img src="/storage/bi.jpg" alt="half" width="364" height="218"> --}}
        {{-- <img src="/storage/bi.jpg" alt="quarter" width="182" height="109"> --}}
        {{-- <li><img src="/home/bazs/code/bicycle_7.7.1/storage/app/public/bic.xcf" alt="a bicycle"></li>
        <li><img src="/home/bazs/code/bicycle_7.7.1/public/storage/bic.png" alt="a bicycle"></li>
        <img src="/home/bazs/code/bicycle_7.7.1/public/storage/bic.png" alt="a bicycle">
        <img src="/home/bazs/code/bicycle_7.7.1/public/storage/bic.xcf" alt="a bicycle"> --}}
        {{-- <img src="/storage/bic.png" alt="a bicycle"> --}}



    </ul>
</div>

@endforeach
<div class="container mid>
    {{-- <div class="text-center"> --}}
    {!! $bicycles->links() !!}
</div>

<div class= " container mid">
    <table id="table_bikes" class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Rent price</th>
                <th scope="col">Image</th>


            </tr>
        </thead>
        <tbody>
            @foreach ($bicycles as $bicycle)
            <tr>
                <td>{{ $bicycle->id }}</td>
                <td>{{ $bicycle->name }}</td>
                <td>{{ $bicycle->description}}</td>
                <td>{{ $bicycle->rent_price }}</td>
                <td><img src="/storage/{{ $bicycle->image }}" height="50" width="50"></td>


            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    var path = "{{ route('autocompleteBikeToRent') }}";
    // $('input.typeahead').typeahead({  //works with class
    $('#autocomplete').typeahead({       //works with id
        source:  function (query, process) {
        return $.get(path, { query: query }, function (data) {
                 return process(data);
                //  return data;
            });
        }
    });

</script>


@endsection
