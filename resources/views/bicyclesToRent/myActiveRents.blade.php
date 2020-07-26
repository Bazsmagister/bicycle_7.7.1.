@extends ('layouts.app')

@section ('content')

<h3>My active rent(s)</h3>


<p>Rent user: id</p>
<p id="event"></p>

<p>Rent id:</p>
<p id="event2"></p>


@foreach ($myRents as $myRent)
<ul>



    <li>
        <p> Rent started : {{$myRent->rentStarted_at}} </p>
    </li>

    <li>
        <p>Rent ends at : {{$myRent->rentEnds_at}} </p>
    </li>


    <li>
        <p>bicycle id: {{$myRent->bicycle_id}} </p>
    </li>

    <li>
        <p>Rented bicycle id is : {{$myRent->bicycle_id}} </p>
    </li>

    <li>
        <p>Rented bicycle name is : {{$myRent->bicycle->name}} </p>
    </li>


    <li>
        <p>Rent closed? : {{$myRent->is_closed}} </p>
    </li>
    <hr>

</ul>
@endforeach


@endsection
