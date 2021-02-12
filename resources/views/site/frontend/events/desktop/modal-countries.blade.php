<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="eventsCountries" tabindex="-1" aria-labelledby="eventsCountriesLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-secondary text-white">
                <div class="modal-title lead fw-bold" id="eventsCountriesLabel">
                    @lang('Туры по странам')
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{----}}
                @livewire('search-events-by-country')
                {{----}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    @lang('Закрыть')
                </button>
            </div>
        </div>
    </div>
</div>
