<div class="py-5 bg-light main-banner-bg-desktop">
    <div class="container-xl">

        <div class="row">
            <div class="col-md-8">
                <h1 class="display-4 fw-bold text-white">
                    @lang('Впечатления разные, сервис – один!')
                </h1>
                <p class="h2 my-5 text-white">
                    <span class="fw-bold">{{ config('app.name') }}</span>
                    @lang('– туристический маркетплейс')
                </p>

                @include('site.components.desktop.button',['btn_1_title' => 'Посмотреть предложения', 'btn_1_url' => route('events.index'), 'count' => $eventsAllCount])

            </div>
            <div class="col-md-4">

            </div>
        </div>
    </div>
</div>
