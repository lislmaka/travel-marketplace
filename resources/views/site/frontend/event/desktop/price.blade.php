<div class="card border-light mb-3 shadow-lg">
    {{--    <div class="card-header fw-bold lead text-center">--}}
    {{--        @lang('Стоимость тура')--}}
    {{--    </div>--}}

    <input type="hidden" id="price" value="{{ $event_info->price }}">
    <input type="hidden" id="old_price" value="{{ $event_info->old_price }}">


    <div class="card-body">
        <div class="d-flex flex-column ms-3 align-items-center">

            <div class="h1 m-0">
                <span class="badge bg-light text-muted">
                    @{{ formatPrice(summa) }}
                    <i class="fas fa-ruble-sign"></i>
                </span>
            </div>
            @if($event_info->old_price)
                <div class="lead m-0">
                    <span class="badge bg-light text-muted fw-normal">
                        <del>
                            @{{ formatPrice(summa_old) }}
                            <i class="fas fa-ruble-sign"></i>
                        </del>
                    </span>
                </div>
            @endif
        </div>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item d-flex justify-content-between align-items-center border-top">
            @lang('Цена 1 чел.')
            <span class="badge bg-primary rounded-pill">
                {{ number_format($event_info->price, 0, '', '.') }}
                 <i class="fas fa-ruble-sign"></i>
            </span>
        </li>
        @if($event_info->old_price)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                @lang('Старая цена 1 чел.')
                <span class="badge bg-light text-muted rounded-pill">
                    <del>
                        {{ number_format($event_info->old_price, 0, '', '.') }}
                        <i class="fas fa-ruble-sign"></i>
                    </del>
                </span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                @lang('Скидка')
                @php($discount = round(100 - ($event_info->price * 100) / $event_info->old_price))
                <span class="badge bg-primary rounded-pill">{{ $discount }}%</span>
            </li>
        @endif
        <li class="list-group-item d-flex justify-content-between align-items-center">
            @lang('Кол-во человек')
            <span class="badge bg-primary rounded-pill">
                 @{{ quantity }}
            </span>
        </li>

        <li class="list-group-item d-flex justify-content-between align-items-center lead">
            <div class="fw-bold">@lang('Итого')</div>

            <span class="badge bg-primary rounded-pill">
                 @{{ formatPrice(summa) }}
                <i class="fas fa-ruble-sign"></i>
            </span>
        </li>
    </ul>
    <div class="card-footer text-center d-grid">
        <button type="submit" class="btn btn-lg btn-danger">
            Заказать
            @if($event_info->old_price)
                @php($discount = round(100 - ($event_info->price * 100) / $event_info->old_price))
                тур со скидкой
                <span class="badge bg-light text-muted">{{ $discount }}%</span>
            @endif
        </button>
    </div>
</div>


