{{--<div>--}}
{{--    @include('site.components.desktop.modal-events-compare',['events' => $events])--}}
{{--</div>--}}

<div class="modal-content">
    <div class="modal-header bg-secondary text-white">
        <div class="modal-title lead fw-bold d-flex justify-content-start align-items-center" id="eventsCompareLabel">
            @lang('Сравнение туров')
            @php
                $countCompare = session('events.events_compare') ? count(session('events.events_compare')) : 0
            @endphp

            @if($countCompare > 4)
                <i class="fas fa-chevron-right mx-3"></i>
                @lang('Показано')
                <span class="badge bg-light text-muted mx-3 rounded-pill">4</span>
                @lang('из')
                <span class="badge bg-light text-muted mx-3 rounded-pill">{{ $countCompare }}</span>
            @else
                <span class="badge bg-light text-muted mx-3 rounded-pill">{{ $countCompare }}</span>
            @endif

            <div wire:loading.flex>
                <span class="badge bg-light text-muted ms-3 rounded-pill">
                    <span class="spinner-grow spinner-grow-sm text-primary" role="status" aria-hidden="true"></span>
                    @lang('Идет обновление...')
                </span>

            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        @include('site.components.desktop.modal-events-compare',['events' => $events])
    </div>
    <div class="modal-footer">
        <a class="btn btn-primary" href="{{ route('events.events_compare_clean') }}" role="button">
            @lang('Очистить')
        </a>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            @lang('Закрыть')
        </button>
    </div>
</div>
