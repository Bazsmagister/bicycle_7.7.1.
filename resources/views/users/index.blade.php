@extends('layouts.app')

@section('content')

@role('super-admin')
<div class='admin'>
    <p>
        For admin : All of our users. <br>
        We have {{ $activeUserCount }} active users.
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

    {{-- <h5>Autocomplete Search using Bootstrap Typeahead JS</h5> --}}
    <h5>Autocomplete search: </h5>

    <input class="typeahead form-control" type="text" placeholder="Start typing...">

</div>

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
                    <li>Joined at:
                        {{-- {{date('F d, Y', strtotime($user->created_at))}} --}}
                        {{date('Y F d', strtotime($user->created_at))}} at
                        at
                        {{date('g : ia', strtotime($user->created_at))}}
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

<hr>
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col" width="50%">name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Created_at</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <th scope="row">{{$user->name}}</th>
                <td>{{$user->email}}</td>
                <td>{{$user->phone}}</td>
                <td>{{$user->created_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


<button onclick="fetcher()">Fetch/GET OnlyDeletedUsers</button>
<br>
<button onclick="fetcher2()">Fetch/GET OnlyDeletedUsers 2</button>
<br>
<button onclick="evalize()">Eval serialize js github try doesn1t work ATM</button>


<script>
    var path = "{{ route('autocompleteUser') }}";
$('input.typeahead').typeahead({
source: function (query, process) {
return $.get(path, { query: query }, function (data) {
return process(data);
});
}
});
</script>

<script>
    function fetcher(){

        fetch('OnlyDeletedUsersAPI')
        .then(response => response.json())
        .then(data => {
        console.log(data) // Prints result from `response.json()` in getRequest
        console.log(data[0].email)
        alert(data[0].name)
        })
        .catch(error => console.error(error))
        }

    // function fetcher2(){
    //     let response = await fetch('OnlyDeletedUsers');
    //     let text = await response.text();
    //     //console.log(text)
    //     alert(text.slice(0, 80) + '...');
    //     }
</script>

<script>
    async function fetcher2(){
    let response = await fetch('OnlyDeletedUsersAPI');
    let text = await response.text();
    //console.log(text)
    alert(text.slice(0, 80) + '...');
    alert(text);

    }


</script>

<script>
    function evalize(){
    eval('('+ serialize({"foo": /1" + console.log(1)/i, "bar": '"@__R-<UID>-0__@'}) + ')');

        }
</script>



@endsection
