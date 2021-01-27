<a class="btn btn-lg btn-primary" href="{{ $btn_1_url }}" role="button">
    @lang($btn_1_title)
    @if($count)
        <span class="badge bg-light text-dark">
            {{ number_format(rand(10, $count), 0, '', ',') }}
        </span>
    @endif
</a>

