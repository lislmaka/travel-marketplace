<div>
    @if($added)
        <button type="button" class="btn btn-sm btn-secondary mb-{{ $livewareParams['hint_btn_position'] }} my-tooltip"
                wire:click="addRemoveCompare"
                style="z-index:2; position: relative">
            <span class="my-tooltiptext my-tooltip-{{ $livewareParams['hint_position'] }}">@lang('Удалить из сравнения')</span>
            @if($livewareParams['btn_type'] == 'event')
                @lang('Удалить из сравнения')
            @elseif($livewareParams['btn_type'] == 'catalog')
                <i class="fas fa-stream"></i>
            @endif
            <div wire:loading>
                <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
            </div>
        </button>
    @else
        <button type="button" class="btn btn-sm btn-primary mb-{{ $livewareParams['hint_btn_position'] }} my-tooltip"
                wire:click="addRemoveCompare"
                style="z-index:2; position: relative">
            <span class="my-tooltiptext my-tooltip-{{ $livewareParams['hint_position'] }}">@lang('Добавить в сравнение')</span>

            @if($livewareParams['btn_type'] == 'event')
                @lang('Добавить в сравнение')
            @elseif($livewareParams['btn_type'] == 'catalog')
                <i class="fas fa-stream"></i>
            @endif
            <div wire:loading>
                <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
            </div>
        </button>
    @endif
</div>
