All the bicycles to sell

<hr>

@foreach ($bicycles as $bicycle)
<div class="container">
    <ul>

        <li>{{$bicycle -> id }}</li>
        <li>{{$bicycle -> name }} </li>
        <li>{{$bicycle -> price }} </li>
        <li>{{$bicycle -> description }} </li>
        <li>{{$bicycle -> image }} </li>



    </ul>
</div>

@endforeach
