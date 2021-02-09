<div class="py-5 bg-light main-banner-bg-desktop">
    <div class="container-xl">
        <h1 class="display-4 fw-bold text-white text-center">
            @lang('Впечатления разные, сервис – один!')
        </h1>
        <p class="h2 my-5 text-white text-center">
            <span class="fw-bold">{{ config('app.name') }}</span>
            @lang('– туристический маркетплейс')
        </p>

        @include('site.components.mobile.button',['btn_1_title' => 'Посмотреть предложения', 'btn_1_url' => route('events.index'), 'count' => $eventsAllCount])
    </div>
</div>
