All the bicycles to service / under service

<hr>

@foreach ($bicycles as $bicycle)
<div class="container">
    <ul>

        <li>{{$bicycle -> id }}</li>
        <li>{{$bicycle -> name }} </li>
        <img src="{{$bicycle->image}}" alt="interesting" width="182" height="109">

    </ul>
</div>

@endforeach
