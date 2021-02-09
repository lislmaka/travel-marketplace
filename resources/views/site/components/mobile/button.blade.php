<div class="text-center">
    <a class="btn btn-primary" href="{{ $btn_1_url }}" role="button">
        @lang($btn_1_title)
        @if($count)
            <span class="badge bg-light text-dark">
            {{ number_format($count, 0, '', '.') }}
        </span>
        @endif
    </a>
</div>


