<div class="card">
    <div class="card-body">
        <h5 class="card-title">
            <a href="#">{{ $property->title }}</a>
        </h5>
        <p class="card-text">
            {{ $property->surface }} m² - {{ $property->city }} ({{ $property->postal_code }})
        </p>
        <div class="text-primary fw-bold" style="font-size: 1.4rem; ">
        {{ number_format($property->price,thousands_separator:'') }} €
        </div>
        <div>
            <p class="card-list">
                @forelse ($property->options as $option )
                <span class="badge bg-primary">{{ $option->name }}</span>
                @empty
                <span class="badge bg-primary">Aucune option</span>
                @endforelse
            </p>
        </div>
    </div>
</div>


