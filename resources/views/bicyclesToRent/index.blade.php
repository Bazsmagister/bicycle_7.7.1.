@extends('layouts.app')

@section('content')
<div class="text-center">
    {!! $bicycles->links() !!}
</div>
<div>
    <p>
        All of our bicycles to rent.
        We have {{$bicyclesCount}} bicycles to rent.
        <br>
        Available {{$bicyclesAvailableCount}} bicycles to rent ATM.
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
    <form action="/bicyclesToRent/showmethebike" method="POST">
        @csrf
        <p>Choose the bicycle that you want to rent: </p>
        <input {{--  id="typeahead" --}} class="typeahead form-control" type="text" name="name"
            {{-- data-provide="typeahead"  --}} autocomplete="off" placeholder="Start typing..." required>

        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button class="btn btn-info btn-sm" type="submit">Show me the bike!</button>
    </form>
</div>
<hr>

{{-- <div class="container">
    <h5>Autocomplete search: </h5>
    <input id="autocomplete" class=" typeahead form-control" type="text" placeholder="Start typing...">
</div> --}}



@foreach ($bicycles as $bicycle)
<div class="container">
    <ul>

        <li>{{$bicycle -> id }}</li>
        <li>{{$bicycle -> name }} </li>
        <li>{{$bicycle -> description }} </li>
        <li>{{$bicycle -> rent_price }} Ft</li>
        <li> Available? : {{$bicycle -> is_availableToRent }} </li>
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


<div class="id">
    @if (count($bicycles) == 0)
    <p>
        Sorry, we are out of stock, come back later
    </p>

    @else
    <div>
        All the bicycles you can choose to rent!
        Everything is fine, our business is booming!
        Here are the bicycles, you can choose of!
    </div>
    @endif

    <hr>
    <p>
        Rentable bicycles number : {{ count($bicycles) }}
        {{-- Rentable bicycles number z: {{ count(array($rentable_bicycles)) }} --}}
    </p>
    <hr>



    {{-- <div>
        Rentable bicycles number q :
        {{ count($rentable_bicycles) }}
</div> --}}
{{-- {{ count(array($rentable_bicycles)) }} --}}


@foreach ($bicycles as $bicycle)
<div class="container">
    {{-- {{ count($rentable_bicycles) }} --}}

    {{-- {{ count($bicycle->is_rentable) }} --}}

    {{-- @if($bicycle->count() == 0)
        <p>Sorry, we are out of stock, come back later</p>
        @else
        <p>Everything is fine, our business is booming</p>
        @endif --}}
    {{--
        @if($rentable_bicycles->count() == 0)
        <p>Sorry, we are out of stock, come back later</p>
        @else
        <p>Everything is fine, our business is booming</p>
        @endif --}}

    <ul>

        <li>{{$bicycle -> id }}</li>
        <li>{{$bicycle -> name }} </li>
        <li>{{$bicycle -> description }} </li>
        <li>{{$bicycle -> rent_price }} Ft/day </li>

        <li>{{$bicycle -> is_availableToRent }} </li>
        <img src="{{$bicycle->image}}" alt="interesting" width="150" height="120">

        {{-- <img src="/storage/bic.png" alt="a bicycle png"> --}}
        <img src="/storage/bi.jpg" alt="quarter jpg" width="182" height="109">

        @auth

        <div>
            <a href="bicyclesToRent/{{$bicycle->id}}" class="btn btn-info">Show</a>
        </div>

        <br>
        <form action="/rents" method="post">
            @csrf

            <input type="number" id="bicycle_id" name="bicycle_id" value={{$bicycle->id}} hidden>

            {{-- <label for="rentstartdate">Rent start (date and time):</label>
                <input type="date" id="rentstartdate" name="rentStarted_at" > --}}
            <br>
            <button class='button btn-info' type="submit">Rent that bicycle from now on for 1 day</button>
        </form>

        {{--  <a href="/rents/create">create</a> --}}
        <button>
            <a href="/rents/create">Make a more complex rent if you want to plan a rent in the future.</a>
        </button>
        @else
        <div>
            <button class='button btn-info' onclick="alert('Please login or register to rent this bicycle')">Rent
                that bicycle</button>

            <button class='button btn-info' onclick="swal('Please login or register to rent this bicycle')">Rent
                that bicycle</button>

            Why doesn't work this when I don't use script tag?->
            <button id='alertbutton' class='button btn-info' onclick="pleaseLogin()">Rent that bicycle</button>

            {{-- <button class='button btn-info' onClick="pleaseLogin()" disabled>Rent that bicycle</button> --}}
        </div>

        @endauth

    </ul>
    <hr>

</div>
{{-- @if (count($bicycle)==0)
    <p>
        Sorry, we are out of stock. Come back later!
    </p>
    @endif --}}


@endforeach
@if($bicycles->count() == 0)
<p>Sorry, we are out of stock, come back later :(</p>
@else
<p>Everything is fine, our business is booming!!!</p>
@endif


</div>

{{-- <script>
    var path = "{{ route('autocompleteBikeToRent') }}";
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
    var path = "{{ route('autocompleteBikeToRent') }}";
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


<script>
    function pleaseLogin() {

    swal("Please login or register to use this function");
    // swal.fire('hi there', 'wazzup?', 'success');
    // swal('hi there', 'wazzup?', 'info');
    alert("Please login or register to use this function");
    }
</script>

@endsection
