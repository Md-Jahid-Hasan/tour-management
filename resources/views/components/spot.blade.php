
<div class="col">
    <div class="card h-100">
        <img src="/img/1.jpg" class="card-img-top" alt="...">
        <div class="card-img-overlay">
            <h5 class="card-title text-center">{{ $place->tourist_spot }}</h5>
            <p class="card-text">{{ strlen($place->description) > 300 ? 
                    substr($place->description, 0, 300).'...' : $place->description }}</p>
            <a href="{{ route('place', $place) }}" class="stretched-link"></a>
        </div>
    </div>
</div>
