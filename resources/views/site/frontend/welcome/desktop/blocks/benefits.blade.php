@component('site.components.desktop.bock_header',['header' => 'Преимущества работы с нами'])
    <div class="mt-3 text-muted">
        @lang('У нас много плюсов. Вот некоторые из них')
    </div>
@endcomponent


<div class="container-xl">
    <div class="row row-cols-md-3">
        <div class="col d-flex align-items-center">
            <i class="fas fa-globe h1 text-primary me-3"></i>
            <div class="card border-0 h-100 bg-transparent">
                <div class="card-body">
                    <div class="card-text fw-bold">
                        Огромный выбор
                    </div>
                    <div class="card-text text-muted">
                        Находите мероприятия по всему миру
                    </div>
                </div>
            </div>
        </div>
        <div class="col d-flex align-items-center">
            <i class="fas fa-award h1 text-primary me-3"></i>
            <div class="card border-0 h-100 bg-transparent">
                <div class="card-body">
                    <div class="card-text fw-bold">
                        Гарантия лучшей цены
                    </div>
                    <div class="card-text text-muted">
                        На более чем 10 000 вариантов отдыха
                    </div>
                </div>
            </div>
        </div>
        <div class="col d-flex align-items-center">
            <i class="fas fa-mobile-alt h1 text-primary me-3"></i>
            <div class="card border-0 h-100 bg-transparent">
                <div class="card-body">
                    <div class="card-text fw-bold">
                        Удобное и безопасное бронирование
                    </div>
                    <div class="card-text text-muted">
                        Вход по электронным билетам
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
