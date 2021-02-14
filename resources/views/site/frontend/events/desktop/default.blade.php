@if(session('events.events_country') != 'all' || session('events.events_city') != 'all' || session('events.events_category') != 'all')
    <div class="card border-light mb-3">
        <div class="card-header fw-bold lead">
            @lang('Информация')
        </div>
        <div class="card-body">
            <div class="card-text text-muted">
                Вы используете фильтрацию каталога. Для быстрого возврата к настройкам по умолчанию сбросьте фильтр
            </div>

        </div>
        <div class="card-footer">
            <a class="btn btn-danger" href="{{ route('events.events_default') }}" role="button">
                Сбросить настройки фильтра
            </a>
        </div>
    </div>
@endif


