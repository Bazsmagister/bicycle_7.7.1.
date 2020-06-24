@extends('layouts.app')

@section('contentindex')
<div class="text-center">
    {!! $rents->links() !!}
</div>
<div class='admin'>
    <p>
        For admin : All of our rents
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
        <a href="/rents/create"> Add a new Rent </a>
    </button>
</div>
@endrole

<hr>


<div class="text-center">
    {!! $rents->links() !!}
</div>

<div class=" container mid">
    <table id="table_bikes" class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">user_id</th>
                <th scope="col">bicycle_id</th>
                <th scope="col">rentStarted_at</th>
                <th scope="col">rentEnds_at</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($rents as $rent)
            <tr>
                <td>{{ $rent->id }}</td>
                <td>{{ $rent->user_id }}</td>
                <td>{{ $rent->bicycle_id}}</td>
                <td>{{ $rent->rentStarted_at }}</td>
                <td>{{ $rent->rentEnds_at }}</td>
                <td><a href="rents/{{$rent->id}}/edit " class="btn btn-info">Edit</a>
                <a href="rents/{{$rent->id}} " class="btn btn-info">Show</a>

                <form action="{{ route('rents.destroy', $rent->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>   

            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="container mid">
    <table class="table table-bordered table-striped">
        <tr>
            <th>ID</th>
            <th>User Id</th>
            <th>Bicycle Id</th>
            <th>Rent Start</th>
            <th>Rent End</th>

        </tr>
        @foreach($rents as $rent)
        <tr>
            <td>{{ $rent->id }}</td>
            <td>{{ $rent->user_id}}</td>
            <td>{{ $rent->bicycle_id }}</td>
            <td>{{ $rent->rentStarted_at}}</td>
            <td>{{ $rent->rentEnds_at }}</td>

            <td><a href="rents/{{$rent->id}}/edit " class="btn btn-info">Edit</a>
                <a href="rents/{{$rent->id}} " class="btn btn-info">Show</a>

                <form action="{{ route('rents.destroy', $rent->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>   
        </tr>
        @endforeach
    </table>
</div>



@endsection
