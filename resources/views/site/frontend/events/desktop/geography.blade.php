<div class="card border-light mb-3">
        <div class="card-header fw-bold lead">
            @lang('География туров')
        </div>
        {{-- Begin поиск по странам --}}
        <div class="card-body pb-1 fw-bold" data-bs-toggle="modal" data-bs-target="#eventsCountries">
            @lang('По странам')
            @livewire('btn-show-help',['helpId' => '1'])
            <div class="small text-muted fw-normal">Выберите страну, которая вас интересует</div>
        </div>
        <ul class="list-group list-group-flush">

            @if($events_countries_selected == null)
                <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"
                   data-bs-toggle="modal" data-bs-target="#eventsCountries">
                    @lang('Все страны')
                    <span class="badge bg-primary rounded-pill">
                        {{ number_format($events_countries_total, 0, '', '.') }}
                    </span>
                </a>
            @else
                <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center active"
                   data-bs-toggle="modal" data-bs-target="#eventsCountries">
                    {{$events_countries_selected->country->name}}
                    <span class="badge bg-light text-muted rounded-pill">
                        {{ number_format($events_countries_selected->count, 0, '', '.') }}
                    </span>
                </a>
            @endif
        </ul>
        {{-- End поиск по странам --}}

        {{-- Begin поиск по городам --}}
        <div class="card-body pb-1 fw-bold" data-bs-toggle="modal" data-bs-target="#eventsCities">
            @lang('По городам')
            @livewire('btn-show-help',['helpId' => '1'])
            <div class="small text-muted fw-normal">Выберите город, который вас интересует</div>
        </div>
        <ul class="list-group list-group-flush">
            @if($events_cities_selected == null)
                <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"
                   data-bs-toggle="modal" data-bs-target="#eventsCities">
                    @lang('Все города')
                    <span class="badge bg-primary rounded-pill">
                        {{ number_format($events_cities_total, 0, '', '.') }}
                    </span>
                </a>
            @else
                <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center active"
                   data-bs-toggle="modal" data-bs-target="#eventsCities">
                    <div>
                        {{$events_cities_selected->city->name}}
                        <div class="small text-white">{{ $events_cities_selected->country->name }}</div>
                    </div>

                    <span class="badge bg-light text-muted rounded-pill">
                        {{ number_format($events_cities_selected->count, 0, '', '.') }}
                    </span>
                </a>
            @endif
            {{-- --}}
        </ul>
        {{-- End поиск по городам --}}
    </div>


