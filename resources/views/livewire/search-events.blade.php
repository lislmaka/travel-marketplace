<div class="w-100">
    <div class="input-group input-group-lg">
        <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fas fa-map-marker-alt"></i></span>
        <input
            type="text"
            class="form-control"
            placeholder="@lang('Введите страну или город')"
            wire:model="query"
            wire:keydown.escape="clearSearch"
            wire:click="searchAll"
        />
        <span wire:loading.flex class="input-group-text bg-light align-items-center">
            <div class="spinner-grow spinner-grow-sm text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </span>

        <span class="input-group-text bg-light" id="basic-addon2">
            <span class="small">
                @lang('Всего туров')
            </span>
            <span class="badge bg-primary rounded-pill ms-1">
                {{ number_format($countOfAllEvents, 0, '', '.') }}
            </span>
        </span>
        @if(!empty($query) || $showAll)
            <button class="btn btn-secondary" type="button" id="button-addon2"
                    wire:click="clearSearch">
                <i class="fas fa-times"></i>
            </button>
        @endif
    </div>
    @if(!empty($query) || $showAll)
        @php
            $cols = $events_countries->isEmpty() || $events_cities->isEmpty() ? 1 : 2
        @endphp
        @if($events_countries->isNotEmpty() || $events_cities->isNotEmpty())
            <div class="position-absolute top-0 start-0 mt-5 w-100" style="z-index: 10">
                <div class="row row-cols-{{ $cols }} mt-1 g-0 bg-light rounded shadow-lg">
                    @if($events_countries->isNotEmpty())
                        <div class="col p-1">
                            <div class="card border-light w-100">
                                <div class="card-header lead fw-bold">
                                    @lang('Страны')
                                    <span class="badge bg-primary rounded-pill">{{ $events_countries->count() }}</span>
                                </div>
                                <ul class="list-group list-group-flush overflow-auto" style="max-height: 300px">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="fw-bold">@lang('Страна')</span>
                                        <span class="fw-bold">@lang('Кол-во туров')</span>
                                    </li>
                                    @foreach($events_countries as $country)
                                        <a href="{{ route('events.events_countries', ['id' => $country->country_id]) }}"
                                           class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                            {{ $country->country->name }}
                                            <span class="badge bg-light text-muted rounded-pill">
                                            {{ number_format($country->count, 0, '', '.') }}
                                        </span>
                                        </a>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                    @if($events_cities->isNotEmpty())
                        <div class="col p-1">
                            <div class="card border-light w-100">
                                <div class="card-header lead fw-bold">
                                    @lang('Города')
                                    <span class="badge bg-primary rounded-pill">{{ $events_cities->count() }}</span>
                                </div>
                                <ul class="list-group list-group-flush overflow-auto" style="max-height: 300px">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="fw-bold">@lang('Город')</span>
                                        <span class="fw-bold">@lang('Кол-во туров')</span>
                                    </li>
                                    @if($events_cities->isNotEmpty())
                                        @foreach($events_cities as $city)
                                            <a href="{{ route('events.events_cities', ['id' => $city->city_id]) }}"
                                               class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                                <div>
                                                    {{ $city->city->name }}
                                                    <div class="small text-muted">{{ $city->country->name }}</div>
                                                </div>
                                                <span class="badge bg-light text-muted rounded-pill">
                                                    {{ number_format($city->count, 0, '', '.') }}
                                                </span>
                                            </a>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>
            </div>


        @else
            <div class="position-absolute top-0 start-0 mt-5 w-100" style="z-index: 10">
                <div class="card text-dark bg-warning mt-1 w-100">
                    <div class="card-header lead fw-bold">
                        @lang('Не найдено результатов по вашему запросу')
                    </div>
                    <div class="card-body">
                        <div class="card-text">
                            Не удалось найти туры по вашему запросу
                            <span class="badge bg-secondary">{{ $query }}</span>
                        </div>
                        <div class="card-text mt-3">
                            Попробуйте ввести менее специфический запрос. Начните поиск со страны либо более крупного
                            населенного пункта
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endif
</div>
