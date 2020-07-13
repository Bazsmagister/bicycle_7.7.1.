@extends ('layouts.app')

@section ('content')

<ul>
    @foreach ($myRents as $myRent)


    <li>
        <p> Rent started : {{$myRent->rentStarted_at}} </p>
    </li>

    <li>
        <p> Rent ended : {{$myRent->rentEnds_at}} </p>
    </li>


    <li>
        <p>Rented bicycle id was : {{$myRent->bicycle_id}} </p>
    </li>

    <li>
        <p>Rented bicycle name was : {{$myRent->bicycle->name}} </p>
    </li>

    <li>
        <p>Rent closed? : {{$myRent->is_closed}} </p>
    </li>

    <hr>
    @endforeach
</ul>


@endsection
