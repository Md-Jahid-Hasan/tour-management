@extends('base')

@section('content')

<div id="desc">
    <h1>{{ $package->name}}</h1>
    <p>{{ $package->description }}</p>
    <p><i class="bi bi-geo-alt-fill"></i></p>
</div>


<div class="col" id="photo">
    <img src="/img/1.jpg" class="img-fluid w-100" style="height:450px" alt="...">
</div>

<div class="row row-cols-1 row-cols-md-2" id='details'>
    <div class="col-md-8">
        <div>
            <h1>Whats Include</h1>
            <hr>
            <ul>
                <li>Eat</li>
                <li>Sleep</li>
                <li>Travel</li>
            </ul>
        </div>

        <div>
            <h1>Whats Exclude</h1>
            <hr>
            <p>This is a fantastic tour we will enjoying</p>
        </div>

        <div>
            <h1>What we Do</h1>
            <hr>
            <p>Our tour details</p>
        </div>

        <div>
            <h1>Policies</h1>
            <hr>
            <p>Our tour Policies</p>
        </div>
    </div>
    <div class="col-md-4" id='target'>
        <div>
            <p class="text-center m-0">From</p>
            <p class="fs-2 fw-bold text-success text-center m-0">Dhaka {{ $package->price}}TK</p>
        </div>
        <hr>
        <div class="text-center pt-2">
            <h1>Time Left</h1>
            <p>Time</p>
            <a class="btn btn-info rounded-pill px-5">Book Now</a>
        </div>
    </div>
</div>

<div>
    <h1>Reviews</h1>
    <p>2 reviews with 3.4 start</p>
    <hr>
</div>

<div class="px-4 py-1">
    <p class="text-info m-0">Jahid Hasan</p>
    <p class="fw-bold m-0">Cox Bazar</p>
    <p>It is a great events</p>
    <hr>
</div>


<div>
    <div class="d-flex flex-column justify-content-center">
        <p class="text-info fs-2 fw-bold mt-1">Activites in {{$package->name}}</p>
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



<script>
    let height1 = $('#photo').height();
    let height2 = $('#desc').height();
    let height3 = $('#navbar').height();
    let height4 = $('#details').height();
    let height = height1 + height2 + height3;
    console.log(height4+ height);

    $(window).scroll(function (){
        if($(this).scrollTop() > height && $(this).scrollTop() < height+height4){
            console.log($(this).scrollTop());
            $('.col-md-4').addClass('position-fixed top-0 end-0');
        }else if($(this).scrollTop() > height+height4){
            console.log('else');
            $('.col-md-4').removeClass('position-fixed top-0 end-0');
        }else{
            $('.col-md-4').removeClass('position-fixed top-0 end-0');
        }
    })
</script>
@endsection