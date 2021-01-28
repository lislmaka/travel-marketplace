<form method="POST" action="#">
    @csrf
    <div class="card border-light mb-3">
        <div class="card-header fw-bold lead">
            @lang('Тематические подборки')
        </div>

        {{-- Begin Тематические подборки --}}
        <ul class="list-group list-group-flush">
            @foreach($events_filters as $events_filter)
                <a href="#"
                   class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                    {{ $events_filter['title'] }}
                    <span class="badge bg-primary rounded-pill">{{ $events_filter['count'] }}</span>
                </a>
            @endforeach
        </ul>
        {{-- End Тематические подборки --}}
    </div>
</form>

