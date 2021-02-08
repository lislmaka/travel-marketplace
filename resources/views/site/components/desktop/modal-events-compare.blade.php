@if($noEvents)
    <div class="alert alert-danger" role="alert">
        @lang('Нет туров для сравнения')
    </div>
@endif

@if(!empty($events))
    <table class="table table-hover">
        <tbody>
        <tr>
            <td class="w-25">

            </td>
            @foreach($events as $event)
                <td>
                    <div class="text-center">
                        <button type="button" class="btn btn-sm btn-outline-primary"
                                wire:click="deleteEventFromCompare({{ $event->id }})">
                            @lang('Удалить')
                        </button>
                    </div>
                </td>
            @endforeach
        </tr>

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
                        <span class="badge bg-light text-muted">
                            @lang('Нет')
                        </span>
                        </div>
                    @endif
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
                @lang('Рейтинг тура')
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

        <tr>
            <td class="fw-bold">
                @lang('Рейтинг автора тура')
            </td>
            @foreach($events as $key => $event)
                <td>
                <span class="badge bg-light text-muted">
                    @php($rating = rand(1, 5))
                    @if($rating > 3)
                        @for($i=1; $i<=$rating; $i++)
                            <i class="fas fa-star text-success"></i>
                        @endfor
                        {{ number_format($rating, 0, '', '.') }}
                    @else
                        @for($i=1; $i<=$rating; $i++)
                            <i class="fas fa-star text-warning"></i>
                        @endfor
                        {{ number_format($rating, 0, '', '.') }}
                    @endif
                </span>
                </td>
            @endforeach
        </tr>

        <tr>
            <td class="fw-bold">
                @lang('Кол-во отзывов')
            </td>
            @foreach($events as $key => $event)
                <td>
                <span class="badge bg-light text-muted">
                    {{ number_format(rand(100, 1000), 0, '', '.') }}
                </span>
                </td>
            @endforeach
        </tr>

        <tr>
            <td class="fw-bold">
                @lang('Категории')
            </td>
            @foreach($events as $event)
                <td>
                    @foreach($event->categories as $category)
                        <span class="badge bg-light text-muted">
                        {{ $category->category->name }}
                    </span>
                    @endforeach
                </td>
            @endforeach
        </tr>


        <tr>
            <td class="fw-bold" colspan="{{ count($events) + 1 }}">
                @lang('Опции')
            </td>
        </tr>


        @foreach($pivotEventsOptions as $eventsOption)
            <tr>
                <td class="fw-normal">
                    {{ $eventsOption['option_name'] }}
                    {{--                <div class="small text-muted">--}}
                    {{--                    {{ Str::limit($eventsOption['option_description'], 40) }}--}}
                    {{--                </div>--}}
                </td>
                @foreach($events as $event)
                    @php($flag = false)
                    @php($price = 0)

                    @foreach($event->options as $option)
                        @if($option->option_id == $eventsOption['option_id'])
                            @php($flag = true)
                            @php($price = $option->price)
                        @endif
                    @endforeach
                    @if($flag)
                        <td>
                        <span class="badge bg-light text-muted">
                            {{ number_format($price, 0, '', '.') }}
                            <i class="fas fa-ruble-sign"></i>
                        </span>
                        </td>
                    @else
                        <td>
                        </td>
                    @endif
                @endforeach
            </tr>
        @endforeach


        </tbody>
    </table>
@endif
