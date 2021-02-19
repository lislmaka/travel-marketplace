<div class="modal-content">
    <div class="modal-header bg-secondary text-white">
        <div class="modal-title lead fw-bold" id="helpModalLabel">
            @lang('Все туры автора')
            <span class="badge bg-light text-muted">{{ $authorName }}</span>
            <span class="badge bg-light text-muted">{{ $events->count() }}</span>
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
        @include('site.components.desktop.bock-events-author-horizontal', ['events' => $events, 'hintPosition' => 'left', 'hintBtnPosition' => 3])
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            @lang('Закрыть')
        </button>
    </div>
</div>
