{{--<div>--}}
{{--    @include('site.components.desktop.modal-events-compare',['events' => $events])--}}
{{--</div>--}}

<div class="modal-content">
    <div class="modal-header bg-secondary text-white">
        <div class="modal-title lead fw-bold d-flex justify-content-start align-items-center" id="eventsCompareLabel">
            @lang('Сравнение туров')
            <div wire:loading.flex>
                <span class="badge bg-light text-muted ms-3">
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
