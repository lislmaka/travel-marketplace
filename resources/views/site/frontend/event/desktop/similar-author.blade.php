@component('site.frontend.event.desktop.parts.bock-header',['header' => 'Другие туры автора', 'id' => 'similar_author'])
    <div class="mt-3 text-muted">
        @lang('Возможно вас заинтересуют другие туры от этого автора')
    </div>
@endcomponent

<div class="row row-cols-4 g-3">
    @include('site.components.desktop.bock-events-vertically', ['events' => $similar_author, 'hintPosition' => 'top', 'hintBtnPosition' => 4])
</div>



