<div class="modal-content">
    <div class="modal-header bg-secondary text-white">
        <div class="modal-title lead fw-bold" id="helpModalLabel">
            <span wire:loading class="input-group-text bg-light align-items-center">
                <div class="spinner-grow spinner-grow-sm text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </span>
            {{ $title }}
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        {!! $message !!}
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            @lang('Закрыть')
        </button>
    </div>
</div>
