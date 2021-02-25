<div class="card border-light">
    <div class="card-body d-flex justify-content-between align-items-start" id="description">
{{--        <div class="w-100">--}}
{{--            <div class="card-title">--}}
{{--                @foreach($event_info->categories as $category)--}}
{{--                    <span class="badge bg-secondary">{{ $category->category->name }}</span>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--            <div class="card-title">--}}
{{--                <span class="badge bg-secondary"><i class="fas fa-map-marker-alt"></i></span>--}}
{{--                <span class="badge bg-secondary">{{ $event_info->country->name }}</span>--}}
{{--                <span class="badge bg-secondary">{{ $event_info->city->name }}</span>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="w-100 text-end">
{{--            @livewire('btn-add-to-favorites')--}}
            @php
                $livewareParams = [
                    'event_id' => $event_info->id,
                    'btn_type' => 'event',
                    'hint_position' => 'top',
                    'hint_btn_position' => 0
                ];
            @endphp

            @livewire('btn-add-to-compare', ['livewareParams' => $livewareParams])

        </div>
    </div>
    {{-- --}}
    <ul class="list-group list-group-flush">

        <li class="list-group-item d-flex justify-content-between align-items-center">
            <span class="fw-bold">
                @lang('Страна')
            </span>
            <span class="badge bg-secondary rounded-pill">{{ $event_info->country->name }}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <span class="fw-bold">
                @lang('Город')
            </span>
            <span class="badge bg-secondary rounded-pill">{{ $event_info->city->name }}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <div>
                <span class="fw-bold">
                    @lang('Активность')
                </span>
{{--                <div class="small text-muted">--}}
{{--                    {{ $event_info->activity->description }}--}}
{{--                </div>--}}
            </div>

            <div>
                <span class="badge bg-secondary rounded-pill">{{ $event_info->activity->name }}</span>
                @livewire('btn-show-help',['helpId' => '1'])
            </div>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <div>
                <span class="fw-bold">
                    @lang('Проживание')
                </span>
{{--                --}}
{{--                <div class="small text-muted">--}}
{{--                    {{ $event_info->residence->description }}--}}
{{--                </div>--}}
            </div>

            <div>
                <span class="badge bg-secondary rounded-pill">
                    {{ $event_info->residence->name }}
                </span>
                @livewire('btn-show-help',['helpId' => '1'])
            </div>

        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <div>
                <span class="fw-bold">
                    @lang('Основной язык группы')
                </span>
                <div class="small text-muted">
                    {{ $event_info->language->description }}
                </div>
            </div>

            <span class="badge bg-secondary rounded-pill">{{ $event_info->language->name }}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <div>
                <span class="fw-bold">
                    @lang('Средний возраст группы')
                </span>
                <div class="small text-muted">
                    {{ $event_info->age->description }}
                </div>
            </div>

            <span class="badge bg-secondary rounded-pill">{{ $event_info->age->name }}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <span class="fw-bold">
                @lang('Продолжительность тура')
            </span>
            <span class="badge bg-secondary rounded-pill">
                @php
                    $interval = Carbon\CarbonInterval::make($event_info->duration.'h');
                @endphp
                {{ $interval->cascade()->forHumans() }}
            </span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <span class="fw-bold">
                @lang('Категории тура')
            </span>

            <div>
                @foreach($event_info->categories as $category)
                    <span class="badge bg-secondary rounded-pill">{{ $category->category->name }}</span>
                @endforeach
            </div>
        </li>
    </ul>
    {{-- --}}
    <div class="card-body">
        <div class="card-text mt-3">
            {!! $event_info->description !!}
        </div>
    </div>
</div>

