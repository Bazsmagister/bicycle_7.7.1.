@extends ('layouts.app')

@section ('content')

<h3>My active rent(s)</h3>

<ul>
    @foreach ($myRents as $myRent)


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
    @endforeach
</ul>


@endsection
