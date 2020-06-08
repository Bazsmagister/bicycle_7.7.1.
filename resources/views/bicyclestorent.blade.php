@extends('layouts.app')

@section('contentrent')

<div class="id">

    All the bicycles to rent!

    <hr>

    @foreach ($rentable_bicycles as $bicycle)
    <div class="container">
        <ul>

            <li>{{$bicycle -> id }}</li>
            <li>{{$bicycle -> name }} </li>
            <li>{{$bicycle -> description }} </li>
            <li>{{$bicycle -> rent_price }} Ft/day </li>
            <img src="{{$bicycle->image}}" alt="interesting" width="" height="">

            {{-- <img src="/storage/bic.png" alt="a bicycle png"> --}}
            <img src="/storage/bi.jpg" alt="quarter jpg" width="182" height="109">

            <form action="/rent" method="get">
                <button class='button btn-info' type="submit">Rent that bicycle</button>

            </form>


            {{-- <img src="{{$bicycle->image}}" alt="originalsize"> --}}
            {{-- <img src="$bicycle->image"> --}}
            {{-- <img src="/storage/images/{{$bicycle->image}}"> --}}
            {{-- <img src="/storage/bi.jpg" alt="a bicycle"> --}}
            {{-- <img src="/storage/bic.xcf" alt="a bicycle"> --}}
            {{-- <li>{{$bicycle -> image }} </li> --}}
            {{-- <div><img src="bic.png" alt="a bicycle"></div> --}}
            {{-- <img src="/storage/app/public/bic.png" alt="a bicycle"> --}}
            {{-- <img src="/public/storage/bic.png" alt="?." sizes="24*24" srcset=""> --}}
            {{-- <img src="/home/bazs/code/bicycle_7.7.1/storage/app/public/bic.png"> --}}
            {{-- <img src="/home/bazs/code/bicycle_7.7.1/public/storage/bic.png"> --}}

        </ul>
        <hr>

    </div>

    @endforeach

    @endsection

</div>
