All the bicycles to rent

<hr>

@foreach ($bicycles as $bicycle)
<div class="container">
    <ul>

        <li>{{$bicycle -> id }}</li>
        <li>{{$bicycle -> name }} </li>

    </ul>
</div>

@endforeach
