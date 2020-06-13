@extends('layouts.app')

@section('contentindex')
<div class="text-center">
    {!! $bicycles->links() !!}
</div>
<div class='admin'>
    <p>
        For admin : All of our bicycles.
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
        <a href="/bicycle/create"> Add a new Bicycle </a>
    </button>
</div>
@endrole

<hr>




@foreach ($bicycles as $bicycle)
<div class="container">
    <ul>

        <li>{{$bicycle -> id }}</li>
        <li>{{$bicycle -> name }} </li>
        <li>{{$bicycle -> description }} </li>
        <li>{{$bicycle -> price }} Ft</li>
        <img src="/storage/{{$bicycle->image}}" alt="no pic yet..." width="70" height="50">

        <img src="/storage/{{$bicycle->image}}" alt="a bicycle png" width="80" height="60">
        {{-- <img src="/storage/bi.jpg" alt="quarter1 jpg" width="182" height="109"> --}}
        <img src="/storage/bic.png" alt="bic png">

        <img src="/storage/{{$bicycle->image}}" alt="quarter jpg" width="182" height="109">

        <img src="{{$bicycle->image}}" alt="img" width="70" height="50">

        {{-- works: --}}
        <embed src="{{ asset("/storage/$bicycle->image")}}">




        {{-- <a href="{{route('bicycle.edit','$bicycle->id')}}"></a> --}}
        <div>
            <a href="bicycle/{{$bicycle->id}}" class="btn btn-info">Show</a>
        </div>


        {{-- <img src="{{$bicycle->image}}"> --}}

        {{-- <li>{{$bicycle -> image  }} </li> --}}
        {{-- <img src="{{$bicycle->image}}"> --}}
        {{-- <img src="/storage/images/{{$bicycle->image}}"> --}}
        {{-- <img src="/storage/bic.png" alt="a bicycle"> --}}
        {{-- <img src="/storage/bi.jpg" alt="orig" width="728" height="437"> --}}
        {{-- <img src="/storage/bi.jpg" alt="half" width="364" height="218"> --}}
        {{-- <img src="/storage/bi.jpg" alt="quarter" width="182" height="109"> --}}
        {{-- <li><img src="/home/bazs/code/bicycle_7.7.1/storage/app/public/bic.xcf" alt="a bicycle"></li>
        <li><img src="/home/bazs/code/bicycle_7.7.1/public/storage/bic.png" alt="a bicycle"></li>
        <img src="/home/bazs/code/bicycle_7.7.1/public/storage/bic.png" alt="a bicycle">
        <img src="/home/bazs/code/bicycle_7.7.1/public/storage/bic.xcf" alt="a bicycle"> --}}
        {{-- <img src="/storage/bic.png" alt="a bicycle"> --}}



    </ul>
</div>

@endforeach

<div class="text-center">
    {!! $bicycles->links() !!}
</div>

<table id="table_bikes" class="table table-striped table-bordered">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th scope="col">Image</th>
            <th scope="col">Created_at</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($bicycles as $bicycle)
        <tr>
            <td>{{ $bicycle->id }}</td>
            <td>{{ $bicycle->name }}</td>
            <td>{{ $bicycle->description}}</td>
            <td>{{ $bicycle->price }}</td>
            <td><img src="/storage/{{ $bicycle->image }}" height="50" width="50"></td>
            <td>{{ $bicycle->created_at }}</td>

        </tr>
        @endforeach
    </tbody>
</table>


<div class="container mid">
    <h4 class="text-center">Users</h4>
  
    <form class="form-group">
      <div>
  
        <button type="button" class="btn btn-outline-dark create-order-btn"><i class='far fa-sticky-note'></i>CREATE NEW USER</button>
        <input type="text" placeholder="SEARCH TERM" class="search-bar" id="admin-search">
        <button type="submit" class="btn btn-secondary search-btn"><i class='fas fa-search'></i>SEARCH</button>
  
      </div>
  
    </form>
    <table class="table table-borderless">
  
      <tbody>
        <tr>
          <td><h5 class="name">Name Surname</h5>
          <p class="table-content">Position</p>
          </td>
          <td class="col-btn"><button type="button" class="btn btn-outline-dark edit-btn">EDIT</button>
            <button type="submit" class="btn btn-secondary remove-btn">REMOVE</button>
          </td>
        </tr>
      </tbody>
    </table>

@endsection
