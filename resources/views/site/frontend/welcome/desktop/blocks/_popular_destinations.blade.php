@component('site.components.desktop.bock-header2',['header' => 'Популярные направления'])
    <div class="mt-3 text-muted">
        @lang('Узнайте какие направления отдыха пользуются наибольшим спросом')
    </div>
@endcomponent

<div class="container-fluid">
    <div class="container-xl">

        <div class="row row-cols-md-4 g-3">
            @include('site.components.desktop.bock-events-vertically', ['events' => $eventsPopularDestinations])
        </div>

        <div class="text-center mt-5">
            @include('site.components.desktop.button',['btn_1_title' => 'Все направления', 'btn_1_url' => route('events.index'), 'count' => $eventsPopularDestinationsCount])
        </div>
    </div>
</div>
