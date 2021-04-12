@extends('base')

@section('head-element')
<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css')}}">
@endsection

@section('content')
<div class="intro-pic d-flex flex-column justify-content-center">
    <div class="text-center text-uppercase fs-1 fw-bold">
        <p>Explore Bangladesh and </br> Move With Us</p>
    </div>
    <form class="d-flex mx-5">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-danger" type="submit"><i class="bi bi-search"></i></button>
    </form>
</div>

<div class="book-pic d-flex flex-column justify-content-center">
    <div class="text-left text-uppercase fs-1 fw-bold ms-5">
        <p>Book Hotel, Buy accessories & </br>Get Information</p>
    </div>
</div>

<div>
    <div class="d-flex flex-column justify-content-center">
        <p class="text-center text-info fs-1 fw-bold mt-5">Where To Go</p>
        <a class="text-center fs-6 fw-lighter">Discover More</a>
    </div>
    @if($places->count())
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($places as $place)
        
            <x-spot :place=$place/>
        
        @endforeach
        </div>
    @else
        <h1>What is Tour go home and stay safe</h1>
    @endif

  
</div>





<div class="bg-light bg-gradient">
    <p class="text-center text-info fs-1 fw-bold mt-5">Our Services</p>
    <div class="row row-cols-1 row-cols-md-4 p-4">
        <div class="col d-flex">
            <i class="bi bi-house-door-fill"></i>
            <p class="ms-1 fw-4">Book Hotel</p>
        </div>
        <div class="col d-flex">
            <i class="bi bi-cart-check"></i>
            <p class="ms-1 fw-4">Buy accessories for tour</p>
        </div>
        <div class="col d-flex">
            <i class="bi bi-broadcast-pin"></i>
            <p class="ms-1 fw-4">Tour with us</p>
        </div>
        <div class="col d-flex">
            <i class="bi bi-info-square-fill"></i>
            <p class="ms-1 fw-4">Get information of tourist spot</p>
        </div>
    </div>
</div>



<div>
    <div class="d-flex flex-column justify-content-center">
        <p class="text-center text-info fs-1 fw-bold mt-5">Activitis and things to do</p>
        <a class="text-center fs-6 fw-lighter">Show More</a>
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
        <p class="text-center text-info fs-1 fw-bold mt-5">Latest Tour  Packege</p>
        <a class="text-center fs-6 fw-lighter">Show More</a>
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




<div>
    <div class="d-flex flex-column justify-content-center">
        <p class="text-center text-info fs-1 fw-bold mt-5">Latest Article</p>
        <a class="text-center fs-6 fw-lighter">Show More blog and article</a>
    </div>

    
        @if($articles->count() > 0) 
            <div class="row row-cols-1 row-cols-md-2 g-4">
                @foreach($articles->slice(0,2) as $article)
                    <x-article :article=$article/>
                @endforeach
            </div>

            <div class="row row-cols-1 row-cols-md-3 g-4 mt-1">
                @foreach($articles->slice(2,5) as $article)
                    <x-article :article=$article/>
                @endforeach
            </div>
        @else
            <h1>No Blog to show</h1>
        @endif
</div>

@endsection