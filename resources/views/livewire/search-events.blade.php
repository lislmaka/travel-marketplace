<div class="w-100">
    <div class="input-group input-group-lg">
        <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fas fa-map-marker-alt"></i></span>
        <input
            type="text"
            class="form-control"
            placeholder="@lang('Выберите страну или город')"
            wire:model="query"
            wire:keydown.escape="clearSearch"
        />
        @if(!empty($query))
            <button class="btn btn-secondary" type="button" id="button-addon2"
                    wire:click="clearSearch">
                <i class="fas fa-times"></i>
            </button>
        @endif
    </div>
    @if(!empty($query))
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
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="fw-bold">@lang('Страна')</span>
                                        <span class="fw-bold">@lang('Кол-во туров')</span>
                                    </li>
                                    @foreach($events_countries as $country)
                                        <a href="{{ route('events.events_countries', ['id' => $country->id]) }}"
                                           class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                            {{ $country->name }}
                                            <span class="badge bg-light text-muted rounded-pill">
                                            {{ number_format(rand(1, 10000), 0, '', '.') }}
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
                                <ul class="list-group list-group-flush overflow-auto" style="max-height: 200px">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="fw-bold">@lang('Город')</span>
                                        <span class="fw-bold">@lang('Кол-во туров')</span>
                                    </li>
                                    @if($events_cities->isNotEmpty())
                                        @foreach($events_cities as $city)
                                            <a href="{{ route('events.events_cities', ['id' => $city->id]) }}"
                                               class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                                {{ $city->name }}
                                                <span class="badge bg-light text-muted rounded-pill">
                                                {{ number_format(rand(1, 10000), 0, '', '.') }}
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
                <div class="card border-light mt-1 w-100">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item list-group-item-danger">
                            @lang('Не найдено результатов по вашему запросу')
                        </li>
                    </ul>
                </div>
            </div>
        @endif
    @endif
</div>
