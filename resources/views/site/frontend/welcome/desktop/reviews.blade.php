@component('site.components.desktop.bock-header',['header' => 'Отзывы и впечатления'])
    <div class="mt-3 text-muted">
        @lang('Почитайте что говорят наши клиенты')
    </div>
@endcomponent

<div class="container-fluid">
    <div class="container-xl">

        <div class="row row-cols-md-4 g-3">
            @include('site.components.desktop.bock-reviews-vertically', ['reviews' => $reviews])
        </div>

        <div class="text-center mt-5">
            @include('site.components.desktop.button',['btn_1_title' => 'Все отзывы', 'btn_1_url' => '', 'count' => $countOfReviews])
        </div>
    </div>
</div>
