<div class="modal-content">
    <div class="modal-header bg-secondary text-white">
        <div class="modal-title lead fw-bold" id="eventsSeenLabel">
            @lang('Последние просмотренные туры')
            <span class="badge bg-light text-muted">{{count($events)}}</span>

            <div wire:loading>
                <span class="badge bg-light text-muted ms-3">
                    <span class="spinner-grow spinner-grow-sm text-primary" role="status" aria-hidden="true"></span>
                    @lang('Идет обновление...')
                </span>

            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="row row-cols-4 g-3">
            @if($events)
                @include('site.components.desktop.bock-events-vertically', ['events' => $events, 'hintPosition' => 'left', 'hintBtnPosition' => 3])
            @endif
        </div>
    </div>
    <div class="modal-footer">
        <a class="btn btn-primary" href="{{ route('events.events_seen_clean') }}" role="button">
            @lang('Очистить')
        </a>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            @lang('Закрыть')
        </button>
    </div>
</div>
