<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="eventsCities" tabindex="-1" aria-labelledby="eventsCitiesLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-secondary text-white">
                <div class="modal-title lead fw-bold" id="eventsCitiesLabel">
                    @lang('Туры по городам')
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{----}}

                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex align-items-center justify-content-between">
                        <div class="fw-bold">
                            @lang('Город')
                        </div>
                        <div class="fw-bold">
                            @lang('Кол-во туров')
                        </div>
                    </li>
                    {{-- --}}
                    @if($events_cities_selected == null)
                        <a href="{{ route('events.events_cities', ['id' => 'all']) }}"
                           class="list-group-item list-group-item-action d-flex justify-content-between align-items-center active">
                            @lang('Все города')
                            <span class="badge bg-light text-muted rounded-pill">
                                {{ number_format($events_cities_total, 0, '', ',') }}
                            </span>
                        </a>
                    @else
                        <a href="{{ route('events.events_cities', ['id' => 'all']) }}"
                           class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            @lang('Все города')
                            <span class="badge bg-primary rounded-pill">
                                {{ number_format($events_cities_total, 0, '', ',') }}
                            </span>
                        </a>
                    @endif
                    {{-- --}}
                    @foreach($events_cities_collection as $events_city)
                        @if($events_cities_selected && $events_city->city_id == $events_cities_selected->city_id)
                            <a href="{{ route('events.events_cities', ['id' => $events_city->city_id]) }}"
                               class="list-group-item list-group-item-action d-flex justify-content-between align-items-center active">
                                <div>
                                    {{ $events_city->city->name }}
                                    <div class="small text-white">{{ $events_city->country->name }}</div>
                                </div>
                                <span
                                    class="badge bg-light text-muted rounded-pill">{{ number_format($events_city->count, 0, '', ',') }}
                                </span>
                            </a>
                        @else
                            <a href="{{ route('events.events_cities', ['id' => $events_city->city_id]) }}"
                               class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                <div>
                                    {{ $events_city->city->name }}
                                    <div class="small text-muted">{{ $events_city->country->name }}</div>
                                </div>
                                <span
                                    class="badge bg-primary rounded-pill">{{ number_format($events_city->count, 0, '', ',') }}
                                </span>
                            </a>
                        @endif

                    @endforeach
                </ul>
                {{----}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    @lang('Закрыть')
                </button>
            </div>
        </div>
    </div>
</div>
