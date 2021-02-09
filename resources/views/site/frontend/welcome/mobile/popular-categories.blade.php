@component('site.components.mobile.bock-header',['header' => 'Популярные категории для отдыха'])
    <div class="mt-3 text-muted">
        @lang('Узнайте какие категории отдыха пользуются наибольшим спросом')
    </div>
@endcomponent

<div class="container-fluid">

    <div id="popular_categories" class="carousel carousel-dark slide" data-bs-ride="carousel" data-bs-interval="false">
        <div class="carousel-inner">
            @foreach($eventsPopularCategories as $event)
                @php($active = '')
                @if($loop->first)
                    @php($active = 'active')
                @endif
                <div class="carousel-item {{ $active }}">
                    @include('site.components.mobile.bock-events',['event' => $event])
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#popular_categories" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#popular_categories" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </a>
    </div>


    <div class="text-center mt-5">
        @include('site.components.mobile.button',['btn_1_title' => 'Все туры', 'btn_1_url' => '', 'count' => '1000'])
    </div>
</div>

