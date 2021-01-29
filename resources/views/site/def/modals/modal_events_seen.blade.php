<!-- Modal -->
<div class="modal fade" id="eventsSeen" tabindex="-1" aria-labelledby="eventsSeenLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-secondary text-white">
                <div class="modal-title lead fw-bold" id="eventsSeenLabel">
                    @lang('Последние просмотренные туры')
                    <span class="badge bg-light text-muted">{{count($events_seen)}}</span>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row row-cols-4 g-3">
                    @if($events_seen)
                        @include('site.components.desktop.bock_events', ['events' => $events_seen])
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
    </div>
</div>
