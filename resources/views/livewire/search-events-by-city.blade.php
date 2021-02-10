<div>
    <div class="input-group input-group-lg mb-3">
        <input
            type="text"
            class="form-control"
            placeholder="@lang('Введите название города')"
            wire:model="querySearch"
        />
        <span wire:loading.flex class="input-group-text bg-light align-items-center">
            <div class="spinner-grow spinner-grow-sm text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </span>
        @if(!empty($querySearch))
            <button class="btn btn-secondary" type="button" id="button-addon2"
                    wire:click="clearSearch">
                <i class="fas fa-times"></i>
            </button>
        @endif
    </div>

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
        @if($eventsCitiesSelected == null)
            <a href="{{ route('events.events_cities', ['id' => 'all']) }}"
               class="list-group-item list-group-item-action d-flex justify-content-between align-items-center active">
                @lang('Все города')
                <span class="badge bg-light text-muted rounded-pill">
                    {{ number_format($eventsCitiesTotal, 0, '', ',') }}
                </span>
            </a>
        @else
            <a href="{{ route('events.events_cities', ['id' => 'all']) }}"
               class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                @lang('Все города')
                <span class="badge bg-primary rounded-pill">
                    {{ number_format($eventsCitiesTotal, 0, '', ',') }}
                </span>
            </a>
        @endif
        {{-- --}}
        @foreach($eventsCitiesCollection as $eventsCity)
            @if($eventsCitiesSelected && $eventsCity->city_id == $eventsCitiesSelected->city_id)
                <a href="{{ route('events.events_cities', ['id' => $eventsCity->city_id]) }}"
                   class="list-group-item list-group-item-action d-flex justify-content-between align-items-center active">
                    <div>
                        {{ $eventsCity->city->name }}
                        <div class="small text-white">{{ $eventsCity->country->name }}</div>
                    </div>
                    <span class="badge bg-light text-muted rounded-pill">
                        {{ number_format($eventsCity->count, 0, '', ',') }}
                    </span>
                </a>
            @else
                <a href="{{ route('events.events_cities', ['id' => $eventsCity->city_id]) }}"
                   class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                    <div>
                        {{ $eventsCity->city->name }}
                        <div class="small text-muted">{{ $eventsCity->country->name }}</div>
                    </div>
                    <span class="badge bg-primary rounded-pill">
                        {{ number_format($eventsCity->count, 0, '', ',') }}
                    </span>
                </a>
            @endif

        @endforeach
    </ul>

    @if($eventsCitiesCollection->isEmpty())
        <div class="alert alert-warning mt-3" role="alert">
            @lang('Не найдено городов по вашему запросу')
            <span class="badge bg-secondary">{{ $querySearch }}</span>
        </div>
    @endif
</div>
