@extends ('layouts.app')

@section ('content')

  <ul>
@foreach ($myRents as $myRent) 
 

    <li> 
        <p> Rent started :   {{$myRent->rentStarted_at}}   </p>
    </li>
  

   
    <li>
         <p>bicycle id:  {{$myRent->bicycle_id}} </p>
    </li>

    <hr>
@endforeach
   </ul>
   
   



@endsection