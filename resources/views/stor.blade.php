@extends('layouts.app')

@section('content')



<div>
    @foreach ($files as $filea )
    {{ $filea }}
    @endforeach

    <hr>

    @foreach ($filesall as $fileb )
    {{ $fileb }}
    @endforeach

    <hr>

    @foreach ($directories as $dir )
    {{ $dir }}
    @endforeach

    <hr>
    @foreach ($directoriesall as $dirs )
    {{ $dirs }}
    @endforeach
</div>



@endsection
