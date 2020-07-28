@extends('layouts.app')

@section('content')

<div style="padding-left: 20px">
    <p>Name :
        {{$bicycleToService->name}} </p>
    <p> Description :
        {{$bicycleToService->description}} </p>

    <p> Notes :
        {{$bicycleToService->notes}} </p>

    <hr>


    {{-- @hasanyrole('super-admin') --}}
    @hasanyrole('super-admin|serviceman|salesman')

    <div>
        <a href="{{$bicycleToService->id}}/edit" class="btn btn-warning">Edit</a>
    </div>

    <hr>
    <form action="{{ route('bicyclesToService.destroy', $bicycleToService->id) }}" method="POST">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger">Delete the bicycle</button>
    </form>

    {{-- <form action="{{$bicycle->id}}" method="post">

    {{ method_field('delete') }}
    @csrf

    <button class="btn btn-outline-danger" type="submit">Delete the bicycle</button>
    </form> --}}


    @endhasanyrole


    <p>Test roles:</p>
    @hasanyrole('super-admin|serviceman|salesman')
    <p>has any role</p>
    @else
    <p>has not role</p>
    @endhasanyrole

</div>


@endsection

<script>
    function datetime(){
        var now= Date.now();

        var date = new Date();


        //alert(now);
        var time = date.toLocaleTimeString();
        // document.getElementById("demo").innerHTML = now;

        var date = date.toLocaleDateString();

        var dateAndTime = date.toLocaleString("hu-HU"); //doesn't work...

        document.getElementById("demo1").innerHTML = date;
        document.getElementById("demo2").innerHTML = time;
        document.getElementById("demo3").innerHTML = dateAndTime;


    }
</script>
