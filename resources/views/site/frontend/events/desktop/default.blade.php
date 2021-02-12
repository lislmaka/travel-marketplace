@if(session('events.events_country') != 'all' || session('events.events_city') != 'all' || session('events.events_category') != 'all')
    <div class="card border-light mb-3">
        <div class="card-body text-center">
            <a class="btn btn-danger" href="{{ route('events.events_default') }}" role="button">
                Сбросить настройки фильтра
            </a>
        </div>
    </div>
@endif


