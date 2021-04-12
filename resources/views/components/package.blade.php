
<div class="col">
    <div class="card h-100">
        <img src="/img/1.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <div class="d-flex">
                <i class="bi bi-calendar-event"></i>
                <p class="mx-3 text-secondary font-monospace">{{ \Carbon\Carbon::parse($package->start_date)->toFormattedDateString()}}</p>
            </div>
            <h5 class="card-title">{{ $package->name }}</h5>
            <div class="card-text d-flex justify-content-between">
                <p>{{ \Carbon\Carbon::parse($package->start_date)->diffForHumans() }}</p>
                <p class="fw-bold text-success">Total {{ $package->price}} BDT</p>
            </div>
            <a href="{{ route('package', $package) }}" class="stretched-link"></a>
        </div>
    </div>
</div>
