<div>
    @if($added)
        <button type="button" class="btn btn-sm btn-secondary mb-1"
                wire:click="addRemoveFavorite">
            @lang('Удалить из избранного')
            <div wire:loading>
                <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
            </div>
        </button>
    @else
        <button type="button" class="btn btn-sm btn-primary mb-1"
                wire:click="addRemoveFavorite">
            @lang('Добавить в избранное')
            <div wire:loading>
                <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
            </div>
        </button>
    @endif
</div>

