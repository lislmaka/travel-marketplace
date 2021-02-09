<div class="py-5 bg-light main-banner-bg-desktop">
    <div class="container-xl">
        <h1 class="lead fw-bold text-white">
            @lang('Впечатления разные, сервис – один!')
        </h1>
        <p class="h2 my-5 text-white">
            <span class="fw-bold">{{ config('app.name') }}</span>
            @lang('– туристический маркетплейс')
        </p>

        @include('site.components.mobile.button',['btn_1_title' => 'Посмотреть предложения', 'btn_1_url' => route('events.index'), 'count' => $eventsAllCount])
    </div>
</div>
