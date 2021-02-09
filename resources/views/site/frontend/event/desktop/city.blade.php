@component('site.frontend.event.desktop.parts.bock-header',['header' => 'Информация о '.$event_info->city->name, 'id' => 'city'])
    <div class="mt-3 text-muted">
        @lang('Общая информация о ')
        {{ $event_info->city->name }}
    </div>
@endcomponent

<input type="hidden" id="event_id" value="{{ $event_info->id }}">

<div class="card my-border-left-info">
    <div class="card-body">
        <div class="card mb-3 ms-3 float-end" style="width: 22rem;">
            <div class="card-body p-0">
                <div id="YMapsID" style="height: 200px;"></div>
            </div>
        </div>
        {!! $event_info->city->description !!}
    </div>
</div>
