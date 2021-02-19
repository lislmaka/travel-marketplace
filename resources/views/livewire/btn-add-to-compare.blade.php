<div>
    @if($added)
        <button type="button" class="btn btn-sm btn-secondary mb-{{ $hintBtnPosition }} my-tooltip"
                wire:click="addRemoveCompare"
                style="z-index:2; position: relative">
            <span class="my-tooltiptext my-tooltip-{{ $hintPosition }}">@lang('Удалить из сравнения')</span>
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
        <button type="button" class="btn btn-sm btn-primary mb-{{ $hintBtnPosition }} my-tooltip"
                wire:click="addRemoveCompare"
                style="z-index:2; position: relative">
            <span class="my-tooltiptext my-tooltip-{{ $hintPosition }}">@lang('Добавить в сравнение')</span>

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
