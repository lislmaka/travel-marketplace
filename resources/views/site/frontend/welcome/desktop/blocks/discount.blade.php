<div class="container-fluid bg-warning">
    <div class="container-xl py-3">
        <div class="row">
            <div class="col-md-9 py-3 d-flex align-content-center flex-wrap">
                <div class="h2 fw-bold">
                    @lang('Скидка 30% на экскурсии, билеты, туры!')
                </div>
                <div class="">
                    @lang('Расскажите о своих впечатлениях в социальных сетях или блоге с упоминанием нашего ресурса!')
                </div>
            </div>
            <div class="col-md-3 py-3 d-flex align-items-center">
                @include('site.components.desktop.button',['btn_1_title' => 'Получить скидку', 'btn_1_url' => '', 'count' => ''])
            </div>
        </div>
    </div>
</div>
