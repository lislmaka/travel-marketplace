@component('site.frontend.event.desktop.parts.bock_header',['header' => 'Похожие туры', 'id' => 'similars'])
    <div class="mt-3 text-muted">
        @lang('Возможно вас заинтересуют похожие туры')
    </div>
@endcomponent

<div class="row row-cols-4 g-1">
    @include('site.components.desktop.bock_events', ['events' => $similar_events])
</div>


