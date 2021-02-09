<div class="container-fluid bg-warning">
    <div class="container-xl py-3">
        <div class="card bg-transparent border-0">
            <div class="card-body text-center">
                <div class="h2 fw-bold">
                    @lang('Скидка 30% на экскурсии, билеты, туры!')
                </div>
                <div class="mb-3">
                    @lang('Расскажите о своих впечатлениях в социальных сетях или блоге с упоминанием нашего ресурса!')
                </div>
                @include('site.components.mobile.button',['btn_1_title' => 'Получить скидку', 'btn_1_url' => '', 'count' => ''])
            </div>
        </div>
    </div>
</div>
