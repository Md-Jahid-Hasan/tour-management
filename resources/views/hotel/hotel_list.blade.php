@extends('base')

@section('content')
<form action=" {{ route('hotel.search') }}" method='post'>
@csrf
<x-search_hotel/>
</form>
@if($hotel->count())
    <div class="row row-cols-1 row-cols-md-3 g-4">
@foreach($hotel as $hotel)
<div class="col">
    <div class="card h-100 bg-success text-white">
        <img src="/img/1.jpg" class="card-img-top" alt="...">

        <div class="card-img-overlay">
            <p class="card-text">{{ $hotel->description }}</p>
        </div>
        
        <div class="card-body">
            <h5 class="card-title">{{ $hotel->name }}</h5>
            <!-- <p class="card-text">{{ $hotel->description }}</p> -->
            <a href="{{ route('hotel.room', $hotel) }}" class="stretched-link"></a>
        </div>

        <!-- <div class="card-footer">
            <small class="text-white">Available</small>
        </div> -->
    </div>
</div>

@endforeach
    </div>
@else
<h1>No Hotel Available right now</h1>
@endif

@endsection





