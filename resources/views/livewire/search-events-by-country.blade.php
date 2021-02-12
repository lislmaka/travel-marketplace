<div>
    <div class="input-group input-group-lg mb-3">
        <input
            type="text"
            class="form-control"
            placeholder="@lang('Введите название страны')"
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

    @if($eventsCountriesCollection->isEmpty())
        <div class="alert alert-warning mt-3" role="alert">
            @lang('Не найдено стран по вашему запросу')
            <span class="badge bg-secondary">{{ $querySearch }}</span>
        </div>
    @else
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
            @if($eventsCountriesSelected == null)
                <a href="{{ route('events.events_countries', ['id' => 'all']) }}"
                   class="list-group-item list-group-item-action d-flex justify-content-between align-items-center active">
                    @lang('Все страны')
                    <span class="badge bg-light text-muted rounded-pill">
                    {{ number_format($eventsCountriesTotal, 0, '', ',') }}
                </span>
                </a>
            @else
                <a href="{{ route('events.events_countries', ['id' => 'all']) }}"
                   class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                    @lang('Все страны')
                    <span class="badge bg-primary rounded-pill">
                    {{ number_format($eventsCountriesTotal, 0, '', ',') }}
                </span>
                </a>
            @endif
            {{-- --}}
            @foreach($eventsCountriesCollection as $eventsCountry)
                @if($eventsCountriesSelected && $eventsCountry->country_id == $eventsCountriesSelected->country_id)
                    <a href="{{ route('events.events_countries', ['id' => $eventsCountry->country_id]) }}"
                       class="list-group-item list-group-item-action d-flex justify-content-between align-items-center active">
                        {{ $eventsCountry->country->name }}
                        <span class="badge bg-light text-muted rounded-pill">
                        {{ number_format($eventsCountry->count, 0, '', ',') }}
                    </span>
                    </a>
                @else
                    <a href="{{ route('events.events_countries', ['id' => $eventsCountry->country_id]) }}"
                       class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        {{ $eventsCountry->country->name }}
                        <span class="badge bg-primary rounded-pill">
                        {{ number_format($eventsCountry->count, 0, '', ',') }}
                    </span>
                    </a>
                @endif
            @endforeach
        </ul>
    @endif
</div>
