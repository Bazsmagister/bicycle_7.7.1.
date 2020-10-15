@extends('layouts.app')

@section('content')
<div class="text-center">
    {!! $bicycles->links() !!}
</div>

<div>
    <p>
        All of our bicycles to sell, you can buy.
        We have {{$bicyclesCount}} bicycles to sell.
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
        <a href="/bicyclesToSell/create"> Add a new sellable bicycle </a>
    </button>
</div>
@endrole

<hr>

<div class="container">
    <form action="/bicyclesToSell/showmethesellablebike" method="POST">
        @csrf
        <p>Choose the bicycle that you want to buy: </p>
        <input {{--  id="typeahead" --}} class="typeahead form-control" type="text" name="name"
            {{-- data-provide="typeahead"  --}} autocomplete="off" placeholder="Start typing..." required>

        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button class="btn btn-info btn-sm" type="submit">Show me the bike!</button>
    </form>
</div>

{{-- <div class="container">
    <h5>Autocomplete search: </h5>
    <input id="autocomplete" class=" typeahead form-control" type="text" placeholder="Start typing...">
</div> --}}

@foreach ($bicycles as $bicycle)
<div class="container">
    <ul>

        <li>ID: {{$bicycle -> id }}</li>
        <li>Bicycle Name: {{$bicycle -> name }} </li>
        <li>Description: {{$bicycle -> description }} </li>
        <li>Price: {{$bicycle -> price }} Ft</li>
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
            <a href="bicyclesToSell/{{$bicycle->id}}" class="btn btn-info">Show</a>
            {{-- <a href="{{ route('bicyclesToSell.show', $bicycle->id) }}" class="btn btn-info"></a> --}}
            <a href="{{ route('bicyclesToSell.show', $bicycle->id) }}" class="btn btn-warning" title="Show">Show using
                route(2params)</a>

            <button type="button" class="btn btn-danger" data-toggle="tooltip" title="{{ $bicycle-> description}}
                Price :{{ $bicycle->price }}">
                Description tooltip. Hover over me!</button>

            <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Description
                collapsible Push Me!</button>
            <div id="demo" class="collapse">
                {{ $bicycle -> description }}
                Price :{{ $bicycle->price }}"
            </div>
        </div>
    </ul>
</div>

@endforeach
<div class="container mid">
    <div class="text-center">
        {!! $bicycles->links() !!}
    </div>

    <div class="container mid">
        <table id="table_bikes" class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Image</th>
                    <th scope="col">Created_at</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($bicycles as $bicycle)
                <tr>
                    <td>{{ $bicycle->id }}</td>
                    <td>{{ $bicycle->name }}</td>
                    <td>{{ $bicycle->description}}</td>
                    <td>{{ $bicycle->price }}</td>
                    <td><img src="/storage/{{ $bicycle->image }}" height="50" width="50"></td>
                    <td>{{ $bicycle->created_at }}</td>

                </tr>
                @endforeach
            </tbody>
        </table>

        <div>
            hello
            <a href="{{ route('myactiverents', $bicycles) }}" class="btn btn-warning" title="My active rents"
                {{-- title="@lang('Edit Paymentdetail')" --}} data-toggle="tooltip" data-placement="top">
                <i class="fas fa-edit"></i>
            </a>
        </div>
    </div>



    {{-- <script>
    var path = "{{ route('autocompleteBikeToSell') }}";
    // $('input.typeahead').typeahead({ //works with class
    $('#autocomplete').typeahead({ //works with id
    source: function (query, process) {
    return $.get(path, { query: query }, function (data) {
    return process(data);
    // return data;
    });
    }
    });

    </script> --}}


    <script>
        var path = "{{ route('autocompleteBikeToSell') }}";
    var $input = $(".typeahead");

        $('input.typeahead').typeahead({
        /* hint: true,
        highlight: true,
        minLength: 1 */
        source: function (query, process) {
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
