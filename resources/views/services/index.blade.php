@extends('layouts.app')

@section('contentservice')

@hasanyrole('super-admin|serviceman|salesman')
<p>has any role</p>


<h3>All the bicycles to service / under service</h3>

<hr>

@foreach ($services as $service)
<div class="container">
    <ul>
        <div>
            <li> Service unique number (ID): {{$service -> id }}</li>
            <li> Serviceman (ID): {{$service -> serviceman_id }}</li>
            <li> Is Active: {{$service -> isActive }}</li>
        </div>
        <br>
        <div>
            <li> Bicycle owner id: {{$service -> user -> id }} </li>
            <li> Bicycle owner name: {{$service -> user -> name }} </li>
            <li> Bicycle owner phone: {{$service -> user -> phone }} </li>
        </div>
        <li>Bicycle's Description : {{$service -> bicycle -> description }} </li>
        <img src="{{$service -> bicycle ->image}}" alt="interesting" width="182" height="109">
        {{-- <img src="{{$service -> bicycle ->image}}" alt="interesting" width height> --}}
        <br>
        <hr>
        <li> Brought in :{{$service  -> broughtIn_at }} </li>
        <li> Started to service at : {{$service -> startedToService_at }} </li>
        <li>Ready to take it at :{{$service -> readyToTakeIt_at }} </li>


    </ul>
    <hr>
    <hr>
</div>

@endforeach

@else
<p>(has not role)</p>


@endhasanyrole



<div class=" container mid">
    <table id="table_services" class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">user_id</th>
                <th scope="col">bicycle_id</th>
                <th scope="col">broughtIn_at</th>
                <th scope="col">serviceStarted_at</th>
                <th scope="col">serviceEnds_at</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($services as $service)
            <tr>
                <td>{{ $service->id }}</td>
                <td>{{ $service->user_id }}</td>
                <td>{{ $service->bicycle_id}}</td>
                <td>{{ $service->broughtIn_at}}</td>
                <td>{{ $service->rentStarted_at }}</td>
                <td>{{ $service->rentEnds_at }}</td>
                <td><a href="services/{{$service->id}}/edit " class="btn btn-info">Edit</a>
                    <a href="services/{{$service->id}} " class="btn btn-info">Show</a>

                    <form action="{{ route('services.destroy', $service->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Do you really want to delete it?');">Delete</button>
                    </form>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
