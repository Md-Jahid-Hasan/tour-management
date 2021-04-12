@extends('base')

@section('content')

<div class="row row-cols-1 row-cols-md-2 g-2">
    <div>
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/img/1.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="/img/1.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="/img/1.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p>
                    </div>
                </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <img src="/img/1.jpg" class="img-thumbnail mb-4 d-none d-sm-block" alt="...">
        <!-- <img src="/img/1.jpg" class="img-thumbnail" alt="..."> -->
    </div>


    <div class="row align-self-center">
        <div>
        <h1 class="text-center">{{$place->tourist_spot}}</h1>
        <p  class="text-center">{{ $place->description}}</p>
        </div>
        <img src="/img/1.jpg" class="img-thumbnail mb-4 d-xl-none d-xxl-block" alt="...">
    </div>
</div>

<div>
    <div class="d-flex flex-column justify-content-center">
        <p class="text-info fs-2 fw-bold mt-1">Activites in {{$place->tourist_spot}}</p>
    </div> 
    @if($activites->count())
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($activites as $activity)
            <x-activites :activity=$activity/>
        @endforeach
    </div>
    @else
        <h1>What is Tour go home and stay safe</h1>
        
    @endif
         
</div>

<div>
    <div class="d-flex flex-column justify-content-center">
        <p class="text-info fs-2 fw-bold mt-1">Upcpoming Tour in {{$place->tourist_spot}}</p>
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