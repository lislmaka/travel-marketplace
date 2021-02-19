<form method="POST" action="#">
    @csrf
    <div class="card border-light mb-3">
        <div class="card-header fw-bold lead">
            @lang('Поиск по категориям')
        </div>

        <ul class="list-group list-group-flush">
            {{-- --}}
            @if($events_categories_selected == null)
                <a href="{{ route('events.events_categories', ['id' => 'all']) }}"
                   class="list-group-item list-group-item-action d-flex justify-content-between align-items-center active">
                    @lang('Все категории')
                    <span class="badge bg-light text-muted rounded-pill ms-3">
                        {{ number_format($events_categories_total, 0, '', '.') }}
                    </span>
                </a>
            @else
                <a href="{{ route('events.events_categories', ['id' => 'all']) }}"
                   class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                    @lang('Все категории')
                    <span class="badge bg-primary rounded-pill ms-3">
                        {{ number_format($events_categories_total, 0, '', '.') }}
                    </span>
                </a>
            @endif
            {{-- --}}

            @foreach($events_categories_collection as $category)

                @if($events_categories_selected && $category->category_id == $events_categories_selected->category_id)
                    <a href="{{ route('events.events_categories', ['id' => $category->category_id]) }}"
                       class="list-group-item list-group-item-action d-flex justify-content-between align-items-center active">
                        {{ $category->category->name }}
                        <span class="badge bg-light text-muted rounded-pill ms-3">
                            {{ number_format($category->event_count, 0, '', '.') }}
                        </span>
                    </a>
                @else
                    <a href="{{ route('events.events_categories', ['id' => $category->category_id]) }}"
                       class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        {{ $category->category->name }}
                        <span class="badge bg-primary rounded-pill ms-3">
                            {{ number_format($category->event_count, 0, '', '.') }}
                        </span>
                    </a>
                @endif
            @endforeach
        </ul>
    </div>
</form>

