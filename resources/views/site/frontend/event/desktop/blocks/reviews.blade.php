@component('site.frontend.event.desktop.parts.bock_header',['header' => 'Отзывы', 'id' => 'reviews'])
    <div class="mt-3 text-muted">
        @lang('Отзывы клиентов об этом туре')
    </div>
@endcomponent

<div class="row row-cols-md-1 g-3">

    @include('site.components.desktop.bock-reviews-horizontal', ['reviews' => $reviews])
</div>
