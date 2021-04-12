
<div class="col">
    <div class="card h-100">
        <img src="/img/1.jpg" class="card-img-top" alt="...">
        <div class="card-img-overlay">
            <h5 class="card-title text-center">{{ $activity->name }}</h5>
            <p class="card-text">{{ $activity->description }}</p>
            <a href="{{ route('activity', $activity) }}" class="stretched-link"></a>
        </div>
    </div>
</div>