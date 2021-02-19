@component('site.frontend.event.desktop.parts.bock-header',['header' => 'Похожие туры', 'id' => 'similar_city'])
    <div class="mt-3 text-muted">
        @lang('Возможно вас заинтересуют похожие туры')
    </div>
@endcomponent

<div class="row row-cols-4 g-3">
    @include('site.components.desktop.bock-events-vertically', ['events' => $similar_city, 'hintPosition' => 'top', 'hintBtnPosition' => 4])
</div>


