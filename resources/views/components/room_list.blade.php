<div class="col">
    <div class="card h-100 bg-success text-white">
        <img src="/img/1.jpg" class="card-img-top" alt="...">

        <div class="card-img-overlay">
            <p class="card-text">{{ $room->description}}</p>
        </div>
        
        <div class="card-body">
            <h5 class="card-title">{{$room->name}} </h5>
           
            <a href="{{route('hotel.room.details', $room)}}" class="stretched-link"></a>
        </div>

        <!-- <div class="card-footer">
            <small class="text-white">Available</small>
        </div> -->
    </div>
</div>