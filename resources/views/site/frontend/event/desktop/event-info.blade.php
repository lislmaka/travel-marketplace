<div class="card border-light">
    <div class="card-body d-flex justify-content-between align-items-start" id="description">
        <div class="w-100">
            <div class="card-title">
                @foreach($event_info->categories as $category)
                    <span class="badge bg-secondary">{{ $category->category->name }}</span>
                @endforeach
            </div>
            <div class="card-title">
                <span class="badge bg-secondary"><i class="fas fa-map-marker-alt"></i></span>
                <span class="badge bg-secondary">{{ $event_info->country->name }}</span>
                <span class="badge bg-secondary">{{ $event_info->city->name }}</span>
            </div>
        </div>
        <div class="w-100 text-end">
{{--            @livewire('btn-add-to-favorites')--}}
            @livewire('btn-add-to-compare', ['event_id' => $event_info->id])
        </div>
    </div>
    <div class="card-body">
        <div class="card-text">
            {!! $event_info->description !!}
        </div>
    </div>
</div>

