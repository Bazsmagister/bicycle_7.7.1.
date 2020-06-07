@extends('layouts.app')

@section('content')

@role('super-admin')
<div class='admin'>
    <p>
        For admin : All of our bicycles.
    </p>
    {{-- <p style="background-color: red">
        For admin : All of our bicycles.
    </p> --}}
</div>

<button class="btn btn-dark" type="submit">
    <a href="/users/create">Create a new user</a>
</button>
@endrole

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Users</h3>
                </div>
                <div class="panel-heading">Page {{ $users->currentPage() }} of {{ $users->lastPage() }}
                </div>
                @foreach ($users as $user)
                <div class="panel-body">
                    <li style="list-style-type:disc">
                        <a href="{{ route('users.show', $user->id ) }}"><b>{{ $user->name }} | {{$user->email}}</b><br>

                        </a>
                    </li>
                </div>
                @endforeach
            </div>
            <div class="text-center">
                {!! $users->links() !!}
            </div>
        </div>
    </div>
</div>

@endsection
