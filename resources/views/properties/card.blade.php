<div class="card ">
    @if($property->getPicture())
    <img src="{{ $property->getPicture()->getImageUrl(530,430) }}" alt="" class="w-100 bg-primary">
    @else
    <img src="/eau.webp" alt="" class="w-100">
    @endif
    <div class="card-body">
        <h5 class="card-title">
            <a href="{{ route('property.show',['slug'=>$property->getSlug(),'property'=>$property])}}">{{ $property->title }}</a>
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


