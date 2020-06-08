@extends('layouts.app')

@section('contentindex')
<div class='admin'>
    <p>
        For admin : All of our bicycles.
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
        <a href="/bicycle/create"> Add a new Bicycle </a>
    </button>
</div>
@endrole

<hr>




@foreach ($bicycles as $bicycle)
<div class="container">
    <ul>

        <li>{{$bicycle -> id }}</li>
        <li>{{$bicycle -> name }} </li>
        <li>{{$bicycle -> description }} </li>
        <li>{{$bicycle -> price }} Ft</li>
        <img src="/storage/{{$bicycle->image}}" alt="no pic yet..." width="50" height="50">

        <img src="/storage/{{$bicycle->image}}" alt="a bicycle png" width="60" height="60">
        {{-- <img src="/storage/bi.jpg" alt="quarter1 jpg" width="182" height="109"> --}}

        <img src="/storage/{{$bicycle->image}}" alt="quarter jpg" width="182" height="109">

        {{-- works: --}}
        {{-- <embed src="{{ asset("/storage/$bicycle->image")}}"> --}}

        {{-- <embed src="{{ asset("$bicycle->image")}}"> --}}


        {{-- <a href="{{route('bicycle.edit','$bicycle->id')}}"></a> --}}
        <div>
            <a href="bicycle/{{$bicycle->id}}" class="btn btn-info">Show</a>
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

@endsection
