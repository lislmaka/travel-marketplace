<div>
    <div>
        @if($added)
            <button type="button" class="btn btn-sm btn-primary mb-1"
                    wire:click="addRemoveCompare">
                @lang('Удалить из сравнения')
                <div wire:loading>
                    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                </div>
            </button>
        @else
            <button type="button" class="btn btn-sm btn-secondary mb-1"
                    wire:click="addRemoveCompare">
                @lang('Добавить в сравнение')
                <div wire:loading>
                    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                </div>
            </button>
        @endif
    </div>
</div>
