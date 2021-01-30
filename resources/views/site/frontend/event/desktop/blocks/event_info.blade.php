<div class="card border-light">
{{--    <h1 class="card-header h2 fw-bold py-3 bg-transparent" id="description">--}}
{{--        {{ $event_info->name }}--}}
{{--    </h1>--}}

    <div class="card-body" id="description">
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
        <div class="card-text">
            {!! $event_info->description !!}
        </div>
    </div>
</div>

