@component('site.components.desktop.bock_header2',['header' => 'Популярные варианты отдыха'])
    <div class="mt-3 text-muted">
        @lang('Посмотрите какие варианты отдыха пользуются наибольшим спросом')
    </div>
@endcomponent


<div class="container-fluid">
    <div class="container-xl">

        <div class="row row-cols-md-4 g-4">
            @include('site.components.desktop.bock_events', ['events' => $eventsPopularVariants])
        </div>

        <div class="text-center mt-5">
            @include('site.components.desktop.button',['btn_1_title' => 'Все варианты', 'btn_1_url' => route('events.index'), 'count' => $eventsPopularVariantsCount])
        </div>
    </div>
</div>
