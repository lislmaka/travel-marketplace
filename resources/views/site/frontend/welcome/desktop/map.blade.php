@component('site.components.desktop.bock-header',['header' => 'Все объекты на карте'])
    <div class="mt-3 text-muted">
        @lang('Выберите удобный для себя вариант')
    </div>
@endcomponent

<div class="container-fluid">
    <div class="container-xl">

        <div class="card">
            <div id="YMapsID" style="height: 300px;"></div>
        </div>

        <div class="text-center mt-5">
            @include('site.components.desktop.button',['btn_1_title' => 'Каталог', 'btn_1_url' => '', 'count' => '1000'])
        </div>
    </div>
</div>
