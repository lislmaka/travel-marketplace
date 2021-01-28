@component('site.frontend.event.desktop.parts.bock_header',['header' => 'Информация о '.$event_info->city->name, 'id' => 'city'])
    <div class="mt-3 text-muted">
        @lang('Общая информация о ')
        {{ $event_info->city->name }}
    </div>
@endcomponent

<div class="card my-border-left-info">
    <div class="card-body">
        <div class="card mb-3 ms-3 float-end" style="width: 22rem;">
            <div class="card-header fw-bold lead">
                @lang('Где находиться '.$event_info->city->name)
            </div>
            <div class="card-body p-0">
                <div id="YMapsID" style="height: 200px;"></div>
            </div>
        </div>
        {!! $event_info->city->description !!}
    </div>
</div>
