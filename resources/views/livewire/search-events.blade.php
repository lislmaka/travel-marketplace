<div class="w-100">
    <div class="input-group input-group-lg">
        <span class="input-group-text"><i class="fas fa-map-marker-alt text-primary"></i></span>
        <input
            type="text"
            class="form-control"
            placeholder="@lang('Введите страну или город')"
            wire:model="query"
            wire:keydown.escape="clearSearch"
        />
        <span wire:loading.flex class="input-group-text bg-light align-items-center">
            <div class="spinner-grow spinner-grow-sm text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </span>

        @if(!empty($query))
            <button class="btn btn-secondary" type="button"
                    wire:click="clearSearch">
                <i class="fas fa-times"></i>
            </button>
        @endif

        <button class="btn btn-primary" type="button" id="button-addon2">
            <i class="fas fa-search"></i>
        </button>
    </div>
    @if(!empty($query))
        @if($eventsCountries->isNotEmpty() || $eventsCities->isNotEmpty())
            <div class="position-absolute top-0 start-0 mt-5 w-100" style="z-index: 10">
                <div class="row row-cols-1 mt-1 g-0 bg-light rounded shadow-lg overflow-auto scroll"
                     style="max-height: 350px">
                    @if($eventsCountries->isNotEmpty())
                        <div class="col p-1">
                            <div class="card border-light w-100">
                                <div class="card-header lead fw-bold">
                                    @lang('Страны')
                                    <span class="badge bg-primary rounded-pill">{{ $eventsCountries->count() }}</span>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="fw-bold">@lang('Страна')</span>
                                        <span class="fw-bold">@lang('Кол-во туров')</span>
                                    </li>
                                    @foreach($eventsCountries as $country)
                                        <a href="#"
                                           class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"
                                           wire:click="goToCountry({{ $country->country_id }})">
                                            {{ $country->country->name }}
                                            <span class="badge bg-primary rounded-pill">
                                            {{ number_format($country->count, 0, '', '.') }}
                                        </span>
                                        </a>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                    @if($eventsCities->isNotEmpty())
                        <div class="col p-1">
                            <div class="card border-light w-100">
                                <div class="card-header lead fw-bold">
                                    @lang('Города')
                                    <span class="badge bg-primary rounded-pill">{{ $eventsCities->count() }}</span>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="fw-bold">@lang('Город')</span>
                                        <span class="fw-bold">@lang('Кол-во туров')</span>
                                    </li>
                                    @if($eventsCities->isNotEmpty())
                                        @foreach($eventsCities as $city)
                                            <a href="#"
                                               class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"
                                               wire:click="goToCity({{ $city->city_id }})">
                                                <div>
                                                    {{ $city->city->name }}
                                                    <div class="small text-muted">{{ $city->country->name }}</div>
                                                </div>
                                                <span class="badge bg-primary rounded-pill">
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
