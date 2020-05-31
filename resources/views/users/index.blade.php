@extends('layouts.app')

@section('content')

<ul>
    @foreach ($users as $user)
    <li>
        {{$user}}
    </li>
    @endforeach
</ul>

{{$users->links()}}

@endsection
