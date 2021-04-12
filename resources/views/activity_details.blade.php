@extends('base')

@section('content')


<div class="d-flex flex-column justify-content-center">
        <p class="text-center text-info fs-1 fw-bold mt-5">Activitis and things to do</p>
</div>

<div class="row row-cols-1 row-cols-md-2">
    <div><img src="/img/1.jpg" class="img-thumbnail m-0 p-0" alt="..."></div>
    <div  class="row text-center align-items-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum officia ex 
            dignissimos odio magnam ea quas 
            cum fugit commodi, molestias sequi modi similique unde illo veniam natus ducimus aut molestiae!</br></br></div>
    <div class="row text-center align-items-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis aut, 
                    commodi neque sequi magni saepe. Excepturi dicta ipsa nobis eos odit iure,
                    in provident omnis maiores necessitatibus hic animi nisi.</div>
    <div><img src="/img/1.jpg" class="img-thumbnail m-0 p-0" alt="..."></div>
</div>

<div>
    <div class="d-flex flex-column justify-content-center">
        <p class="text-info fs-2 fw-bold mt-1">Upcpoming Tour in </p>
    </div>

    @if($packages->count())
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($packages as $package)
            <x-package :package=$package/>
        @endforeach
    </div>
    @else
        <h1>What is Tour go home and stay safe</h1>
    @endif

</div>


@endsection