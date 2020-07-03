@extends('layouts.app')

@section('content')

@role('super-admin')
<div class='admin'>
    <p>
        For admin : only deleted Users
    </p>
    {{-- <p style="background-color: red">
        For admin : All of our bicycles.
    </p> --}}
</div>

@endrole


<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Deleted Users:</h3>
                </div>
                {{-- <div class="panel-heading">Page {{ $users->currentPage() }} of {{ $users->lastPage() }}
            </div> --}}
            @foreach ($deletedUsers as $user)
            <div class="panel-body">
                <li style="list-style-type:disc">
                    <a href="{{ route('users.show', $user->id ) }}"><b>{{ $user->name }} | {{$user->email}}</b><br>
                    </a>
                </li>
                <li>Joined at:
                    {{-- {{date('F d, Y', strtotime($user->created_at))}} --}}
                    {{date('Y F d', strtotime($user->created_at))}} at
                    at
                    {{date('g : ia', strtotime($user->created_at))}}
                </li>
                <li>
                    Deleted at:
                    {{date('Y F d', strtotime($user->deleted_at))}}
                    at
                    {{date('g : ia', strtotime($user->deleted_at))}}

                </li>
            </div>
            @endforeach
        </div>
        <div class="text-center">
            {{-- {!! $users->links() !!} --}}
        </div>
    </div>
</div>
</div>

@endsection
