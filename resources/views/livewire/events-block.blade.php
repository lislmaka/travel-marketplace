<div>

    @if($blockType == 'popular_countries')
        @php
            $headerText = 'Популярные страны';
            $headerHint = 'Страны, которые пользуются наибольшим спросом';
        @endphp
    @elseif($blockType == 'popular_cities')
        @php
            $headerText = 'Популярный города';
            $headerHint = 'Города, которые пользуются наибольшим спросом';
        @endphp
    @elseif($blockType == 'popular_categories')
        @php
            $headerText = 'Популярные категории';
            $headerHint = 'Туры из категорий, которые пользуются наибольшим спросом';
        @endphp
    @endif

    @component('site.components.desktop.bock-header2',['header' => $headerText, 'topNames' => $topNames, 'selectedItem' => $selectedItem, 'blockType' => $blockType])
        <div class="mt-3 text-muted">
            @lang($headerHint)
        </div>
    @endcomponent

    <div class="container-fluid">
        <div class="container-xl">

            <div class="row row-cols-md-4 g-3">
                @include('site.components.desktop.bock-events-vertically-mainpage', ['events' => $events])
            </div>

            <div class="text-center mt-5">
                @include('site.components.desktop.button',['btn_1_title' => 'Все направления', 'btn_1_url' => route('events.index'), 'count' => $eventsCount])
            </div>
        </div>
    </div>


</div>
