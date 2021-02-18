<div>
    @if($added)
        <button type="button" class="btn btn-sm btn-secondary mb-1"
                wire:click="addRemoveCompare"
                style="z-index:2; position: relative">
            @if($btnType == 'event')
                @lang('Удалить из сравнения')
            @elseif($btnType == 'catalog')
                <i class="fas fa-stream"></i>
            @endif
            <div wire:loading>
                <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
            </div>
        </button>
    @else
        <button type="button" class="btn btn-sm btn-primary mb-1"
                wire:click="addRemoveCompare"
                style="z-index:2; position: relative"
                data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top">
            @if($btnType == 'event')
                @lang('Добавить в сравнение')
            @elseif($btnType == 'catalog')
                <i class="fas fa-stream"></i>
            @endif
            <div wire:loading>
                <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
            </div>
        </button>
    @endif
</div>
