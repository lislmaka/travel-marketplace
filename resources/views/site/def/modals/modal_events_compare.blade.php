<!-- Modal -->
<div class="modal fade" id="eventsCompare" tabindex="-1" aria-labelledby="eventsCompareLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-fullscreen modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-secondary text-white">
                <div class="modal-title lead fw-bold" id="eventsCompareLabel">
                    @lang('Сравнение туров')
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- Modal Compare Begin --}}
                @livewire('modal-compare')
                {{-- Modal Compare End --}}
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
    </div>
</div>
