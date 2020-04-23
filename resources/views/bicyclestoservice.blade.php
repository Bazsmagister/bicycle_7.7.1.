All the bicycles to service / under service

<hr>

@foreach ($bicycles as $bicycle)
<div class="container">
    <ul>

        <li>{{$bicycle -> id }}</li>
        <li>{{$bicycle -> name }} </li>

    </ul>
</div>

@endforeach
