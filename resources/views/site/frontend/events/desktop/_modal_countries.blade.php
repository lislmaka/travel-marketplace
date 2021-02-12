<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="eventsCountries" tabindex="-1" aria-labelledby="eventsCountriesLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-secondary text-white">
                <div class="modal-title lead fw-bold" id="eventsCountriesLabel">
                    @lang('Туры по странам')
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{----}}

                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex align-items-center justify-content-between">
                        <div class="fw-bold">
                            @lang('Страна')
                        </div>
                        <div class="fw-bold">
                            @lang('Кол-во туров')
                        </div>
                    </li>
                    {{-- --}}
                    @if($events_countries_selected == null)
                        <a href="{{ route('events.events_countries', ['id' => 'all']) }}"
                           class="list-group-item list-group-item-action d-flex justify-content-between align-items-center active">
                            @lang('Все страны')
                            <span class="badge bg-light text-muted rounded-pill">
                                {{ number_format($events_countries_total, 0, '', ',') }}
                            </span>
                        </a>
                    @else
                        <a href="{{ route('events.events_countries', ['id' => 'all']) }}"
                           class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            @lang('Все страны')
                            <span class="badge bg-primary rounded-pill">
                                {{ number_format($events_countries_total, 0, '', ',') }}
                            </span>
                        </a>
                    @endif
                    {{-- --}}
                    @foreach($events_countries_collection as $events_country)
                        @if($events_countries_selected && $events_country->country_id == $events_countries_selected->country_id)
                            <a href="{{ route('events.events_countries', ['id' => $events_country->country_id]) }}"
                               class="list-group-item list-group-item-action d-flex justify-content-between align-items-center active">
                                {{ $events_country->country->name }}
                                <span
                                    class="badge bg-light text-muted rounded-pill">{{ number_format($events_country->count, 0, '', ',') }}
                                </span>
                            </a>
                        @else
                            <a href="{{ route('events.events_countries', ['id' => $events_country->country_id]) }}"
                               class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                {{ $events_country->country->name }}
                                <span
                                    class="badge bg-primary rounded-pill">{{ number_format($events_country->count, 0, '', ',') }}
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
