@extends('layouts.app')

@section('content')

@hasanyrole('super-admin|serviceman|salesman')
<p>has any role</p>

<h3>All the bicycles to service / under service</h3>
<hr>
<div class="">
    <table id="table_services" class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">User id</th>
                <th scope="col">Bicycle id</th>
                <th scope="col">Serviceman id</th>
                <th scope="col">Failure description</th>
                <th scope="col">Brought In at / accepted</th>
                <th scope="col">Started To Service at repairing</th>
                <th scope="col">Ready To Take It_at ready</th>
                <th scope="col">Taken at taken</th>
                <th scope="col">Notes</th>
                {{--  <th scope="col">Status</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($services as $service)
            <tr>
                <td>{{ $service->id }}</td>
                <td>{{ $service->user_id }}</td>
                <td>{{ $service->bicycle_id}}</td>
                <td>{{ $service->serviceman_id }}</td>
                <td>{{ $service->failure_description}}</td>
                <td>{{ $service->accepted}}</td>
                <td>{{ $service->repairing }}</td>
                <td>{{ $service->ready }}</td>
                <td>{{ $service->taken }}</td>
                {{-- <td>{{ $service->broughtIn_at}}</td>
                <td>{{ $service->startedToService_at }}</td>
                <td>{{ $service->readyToTakeIt_at }}</td>
                <td>{{ $service->taken_at }}</td> --}}
                <td>{{ $service->notes }}</td>
                {{--    <td>{{ $service->status }}</td> --}}
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
<hr>

@foreach ($services as $service)
<div class="container">
    <ul>
        <div>
            <li> Service unique number (ID): {{$service -> id }}</li>
            <li> Serviceman (ID): {{$service -> serviceman_id }}</li>

            <li> Failure description: {{$service ->failure_description }}</li>

        </div>

        <div>
            <li> Bicycle owner id: {{$service->user->id ?? '' }} </li>
            <li> Bicycle owner name: {{$service -> user -> name ?? '' }} </li>
            <li> Bicycle owner phone: {{$service -> user -> phone ?? ''}} </li>
        </div>
        <li>Bicycle's Description : {{$service -> bicycle -> description }} </li>
        <img src="{{$service -> bicycle ->image}}" alt="An image should be here" width="182" height="109">
        {{-- <img src="{{$service -> bicycle ->image}}" alt="interesting" width height> --}}
        <br>

        <li> Brought in :{{$service  -> accepted }} </li>
        <li> Started to service at : {{$service -> repairing }} </li>
        <li>Ready to take it at :{{$service -> ready }} </li>
        <li> Taken at :{{$service  ->taken }} </li>
        {{-- <li> Is Active: {{$service ->isActive }}</li> --}}
        {{--    <li> Status: {{$service ->status }}</li> --}}

        <div class="flexbox">
            <div class="{{$service -> status ==='accepted' ? 'accepted' : 'boxes'}}" id="1">Accepted</div>
            <div class="{{$service -> status ==='repairing' ? 'repairing' : 'boxes'}}" id="2">Repairing</div>
            <div class="{{$service -> status ==='ready' ? 'ready' : 'boxes'}}" id="3">Ready</div>
            <div class="{{$service -> status ==='taken' ? 'taken' : 'boxes'}}" id="4">Taken</div>
        </div>

    </ul>
    <hr>
    <hr>
</div>

@endforeach

@else
<p>(has not role)</p>


@endhasanyrole




@endsection
