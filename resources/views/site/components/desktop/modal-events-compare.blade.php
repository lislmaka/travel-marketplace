<table class="table table-hover">
    <tbody>
    <tr>
        <td class="w-25">

        </td>
        @foreach($events as $key => $event)
            <td>
                <img src="{{ asset('images/demo/demo1/'.$event->img) }}" class="card-img-top" alt="...">
            </td>
        @endforeach
    </tr>
    <tr>
        <td class="fw-bold">
            @lang('Название тура')
        </td>
        @foreach($events as $key => $event)
            <td>
                <a href="{{ route('events.show', ['event' => $event->id]) }}"
                   class="fw-bold text-decoration-none"
                   title="{{ $event->name }}">
                    {{ Str::limit($event->name, 40) }}
                </a>
            </td>
        @endforeach
    </tr>
    <tr>
        <td class="fw-bold">
            @lang('Цена')
        </td>
        @foreach($events as $key => $event)
            <td>
                <span class="badge bg-light text-muted">
                    {{ number_format($event->price, 0, '', '.') }}
                    <i class="fas fa-ruble-sign"></i>
                </span>
            </td>
        @endforeach
    </tr>

    <tr>
        <td class="fw-bold">
            @lang('Старая цена')
        </td>
        @foreach($events as $key => $event)
            <td>
                @if($event->old_price)
                    <span class="badge bg-light text-muted">
                        <del>
                            {{ number_format($event->old_price, 0, '', '.') }}
                            <i class="fas fa-ruble-sign"></i>
                        </del>
                    </span>
                @endif
            </td>
        @endforeach
    </tr>

    <tr>
        <td class="fw-bold">
            @lang('Скидка')
        </td>
        @foreach($events as $key => $event)
            <td>
                @if($event->old_price)
                    <div class="lead">
                        <span class="badge bg-success">
                            @php($discount = round(100 - ($event->price * 100) / $event->old_price))
                            @lang('Скидка') {{ $discount }} %
                        </span>
                    </div>
                @else
                    <div class="lead">
                        <span class="badge bg-danger">
                            @lang('Нет')
                        </span>
                    </div>
                @endif
            </td>
        @endforeach
    </tr>

    <tr>
        <td class="fw-bold">
            @lang('Рейтинг')
        </td>
        @foreach($events as $key => $event)
            <td>
                <span class="badge bg-light text-muted">
                @if($event->rating > 3)
                        @for($i=1; $i<=$event->rating; $i++)
                            <i class="fas fa-star text-success"></i>
                        @endfor
                        {{ number_format($event->rating, 0, '', '.') }}
                    @else
                        @for($i=1; $i<=$event->rating; $i++)
                            <i class="fas fa-star text-warning"></i>
                        @endfor
                        {{ number_format($event->rating, 0, '', '.') }}
                    @endif
                </span>
            </td>
        @endforeach
    </tr>
    </tbody>
</table>
