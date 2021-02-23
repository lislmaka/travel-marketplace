<div class="py-5 bg-light main-banner-bg-events">
    <div class="container-xl">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8 d-flex align-items-center position-relative p-0">
                @livewire('search-events')
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center g-3">
                {{-- Begin categories --}}

                {{-- --}}
                @if($events_categories_selected == null)
                    <a href="{{ route('events.events_categories', ['id' => 'all']) }}"
                       class="btn btn-sm btn-primary rounded-pill m-1">
                        @lang('Все категории')
                        <span class="badge bg-light text-muted rounded-pill ms-3">
                            {{ number_format($events_categories_total, 0, '', '.') }}
                        </span>
                    </a>
                @else
                    <a href="{{ route('events.events_categories', ['id' => 'all']) }}"
                       class="btn btn-sm btn-light rounded-pill m-1">
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
                           class="btn btn-sm btn-primary rounded-pill m-1">
                            {{ $category->category->name }}
                            <span class="badge bg-light text-muted rounded-pill ms-3">
                                {{ number_format($category->event_count, 0, '', '.') }}
                            </span>
                        </a>
                    @else
                        <a href="{{ route('events.events_categories', ['id' => $category->category_id]) }}"
                           class="btn btn-sm btn-light rounded-pill m-1">
                            {{ $category->category->name }}
                            <span class="badge bg-primary rounded-pill ms-3">
                                {{ number_format($category->event_count, 0, '', '.') }}
                            </span>
                        </a>
                    @endif
                @endforeach
                {{-- End categories --}}
            </div>
        </div>
    </div>
</div>
