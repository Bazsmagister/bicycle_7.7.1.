@extends('layouts.app')

@section('content')

@if($bicycles->count()>0)
@foreach ($bicycles as $bicycle)
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        {{-- @if($bicycle->image->count()>0) --}}
        {{-- @for($i=0; $i< count($image=$bicycle->images()->get()); $i++) --}}
        {{--   @if($i==0) --}}
        <div class="carousel-item active">
            <img class="bicycles-img" src="/images/1591633307.png" alt="first slide">
        </div>

        {{--  @else --}}

        <div class="carousel-item">
            <img class="bicycles-img" src="/images/1591633307.png" alt="first slide">
        </div>
        {{--    @endif --}}

        {{--     @endfor --}}

        {{--  @endif --}}

    </div>


    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>

    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>

</div>
@endforeach
@endif


@endsection


{{-- full code  When there are more images are belongs to a bicycle 
@if($posts->count()>0)
@foreach ($posts as $post)
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        @if($post->images->count()>0)
        @for($i=0; $i< count($image=$post->images()->get()); $i++)
            @if($i==0)
            <div class="carousel-item active">
                <img class="posts-img" src="/images/{{$image[$i]['image']}}" alt="first slide">
</div>

@else

<div class="carousel-item">
    <img class="posts-img" src="/images/{{$image[$i]['image']}}" alt="first slide">
</div>
@endif

@endfor



@endif



</div>


<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
</a>

<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
</a>

</div>
@endforeach
@endif --}}