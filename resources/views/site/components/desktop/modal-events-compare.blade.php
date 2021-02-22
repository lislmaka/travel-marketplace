@if($noEvents)
    <div class="alert alert-danger" role="alert">
        @lang('Нет туров для сравнения')
    </div>
@endif

@if(!empty($events))
    <table class="table table-hover">
        <thead>
        <tr>
            <td class="w-25">

            </td>
            @foreach($events as $key => $event)
                <td>
                    <div class="card shadow-sm">
                        <img src="{{ asset('images/demo/demo1/'.$event->img) }}" class="card-img-top" alt="...">
                        <div class="card-img-overlay">
                            <div class="position-absolute top-0 end-0 p-3">
                                <button type="button" class="btn btn-sm btn-light"
                                        wire:click="deleteEventFromCompare({{ $event->id }})">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            <div class="position-absolute top-0 start-0 p-2">
                                <img src="{{ $demo_faces[$key] }}" class="img-thumbnail rounded-circle" alt="..." width="{{ config('site.img-size-2') }}">
                            </div>
                        </div>
                    </div>

                </td>
            @endforeach
        </tr>
        </thead>
        <tbody>

        <tr>
            <td class="fw-bold w-25">
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
                @lang('Страна')
            </td>
            @foreach($events as $key => $event)
                <td>
                    <span class="badge rounded-pill bg-light text-muted">
                        {{ $event->country->name }}
                    </span>
                </td>
            @endforeach
        </tr>

        <tr>
            <td class="fw-bold">
                @lang('Город')
            </td>
            @foreach($events as $key => $event)
                <td>
                    <span class="badge rounded-pill bg-light text-muted">
                        {{ $event->city->name }}
                    </span>
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
                        <span class="badge rounded-pill bg-success">
                            @php
                                $discount = round(100 - ($event->price * 100) / $event->old_price)
                            @endphp
                            @lang('Скидка') {{ $discount }} %
                        </span>
                        </div>
                    @else
                        <div class="lead">
                        <span class="badge rounded-pill bg-light text-muted">
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
                    <span class="badge rounded-pill bg-light text-muted">
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
                        <span class="badge rounded-pill bg-light text-muted">
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
                @lang('Продолжительность тура')
            </td>
            @foreach($events as $key => $event)
                <td>
                    <span class="badge rounded-pill bg-light text-muted">
                        @php
                            $interval = Carbon\CarbonInterval::make($event->duration.'h');
                        @endphp
                        {{ $interval->cascade()->forHumans() }}
                    </span>
                </td>
            @endforeach
        </tr>

        <tr>
            <td class="fw-bold">
                @lang('Рейтинг тура')
            </td>
            @foreach($events as $key => $event)
                <td>
                <span class="badge rounded-pill bg-light text-muted">
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
                <span class="badge rounded-pill bg-light text-muted">
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
                <span class="badge rounded-pill bg-light text-muted">
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
                        <span class="badge rounded-pill bg-light text-muted">
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
                            @if($price)
                                <span class="badge rounded-pill bg-light text-muted">
                                    {{ number_format($price, 0, '', '.') }}
                                    <i class="fas fa-ruble-sign"></i>
                                </span>
                            @else
                                <span class="badge rounded-pill bg-success">
                                    @lang('Бесплатно')
                                </span>
                            @endif
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
