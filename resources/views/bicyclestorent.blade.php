All the bicycles to rent

<hr>

@foreach ($rentablebicycles as $bicycle)
<div class="container">
    <ul>

        <li>{{$bicycle -> id }}</li>
        <li>{{$bicycle -> name }} </li>
        <li>{{$bicycle -> description }} </li>
        <li>{{$bicycle -> image }} </li>
        <div><img src="bic.png" alt="a bicycle"></div>
        {{-- <img src="/storage/app/public/bic.png" alt="a bicycle"> --}}
        {{-- <img src="/public/storage/bic.png" alt="?." sizes="24*24" srcset=""> --}}
        <img src="/storage/bic.png" alt="?" sizes="24*24" srcset="">
        {{-- <img src="/home/bazs/code/bicycle_7.7.1/storage/app/public/bic.png"> --}}
        {{-- <img src="/home/bazs/code/bicycle_7.7.1/public/storage/bic.png"> --}}

    </ul>
</div>

@endforeach
