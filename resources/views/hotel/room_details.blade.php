@extends('base')

@section('content')
<div class="row">
    <div class="col-8">
        <img src="/img/1.jpg" class="img-fluid" alt="...">
        <div class="row border border-secondary">
            <div class="col-md-4">
                <p class="text-info">Type : <span class="text-muted">{{ $room->type }}</span></p>
                <p class="text-info">Rating : <span class="text-muted">Hotel</span></p>
                <p class="text-info">Location : <span class="text-muted">{{$hotel[0]->location->divison}}, {{$hotel[0]->location->tourist_spot}}</span></p>
                <p class="text-info">Check In Time : <span class="text-muted">Hotel</span></p>
                <p class="text-info">Check Out Time : <span class="text-muted">Hotel</span></p>
            </div>
            <div class="col-md-8">{{ $room->description }}</div>
        </div>
    </div>
    <div class="col-4">
        <h2>{{ $hotel[0]->name }}</h2>
        <h4>{{  $room->name }}</h4>
        <p>{{ $hotel[0]->rating}} start</p>
        <p><span class="fw-bold fs-1 text-success">100</span>/night</p>
        
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Book Now</button>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>   
            </div>
            <div class="modal-body">
            @if (session('status'))
            <h1>{{session('status')}}</h1>
            @else
            <form action="{{ route('guest.book', $room) }}" method="post">
                @csrf
                <x-search_hotel />
            </form>
            @endif
            </div>
            </div>
        </div>
    </div>



        <div class="d-flex flex-column">
            <div><i class="bi bi-envelope-fill"></i> hotel@gmail.com</div>
            <div><i class="bi bi-envelope-fill"></i> hotel@gmail.com</div>
            <div><i class="bi bi-envelope-fill"></i> hotel@gmail.com</div>
        </div>

        <div>
            <h1>Similar Hotel</h1>
        </div>
    </div>

</div>
@endsection

@section('java-script')
<script>
    let message = "{{session('status')}}";
    let myModal = new bootstrap.Modal(document.getElementById('exampleModal'))
   
    if(message){
        console.log(message);
        myModal.show()
    }
    else {
        console.log("Hello");
    }

</script>
@endsection