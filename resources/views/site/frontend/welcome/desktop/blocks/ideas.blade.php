@component('site.components.desktop.bock-header2',['header' => 'Идеи для новых открытий'])
    <div class="mt-3 text-muted">
        @lang('Рассмотрите возможные варианты новых путешествий')
    </div>
@endcomponent


<div class="container-fluid">
    <div class="container-xl">

        <div class="row row-cols-4 g-3">
            @include('site.components.desktop.bock-events-vertically', ['events' => $eventsIdeas])
        </div>

        <div class="text-center mt-5">
            @include('site.components.desktop.button',['btn_1_title' => 'Все идеи', 'btn_1_url' => route('events.index'), 'count' => $eventsIdeasCount])
        </div>
    </div>
</div>
