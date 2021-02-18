<!-- Modal -->
<div class="modal fade" id="authorTours" tabindex="-1" aria-labelledby="authorToursLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        @livewire('modal-author-tours', ['authorId' => $event_info->user_id])
    </div>
</div>
