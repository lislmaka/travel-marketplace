@foreach($events as $key => $event)

    <div class="col">
        <div class="card h-100 shadow-sm my-border-bottom-info">
            <img src="{{ asset('images/demo/demo1/'.$event->img) }}" class="card-img-top" alt="...">
            <div class="card-img-overlay">
                @if($event->old_price)
                    <div class="lead">
                        <span class="badge bg-danger">
                            @php($discount = round(100 - ($event->price * 100) / $event->old_price))
                            @lang('Скидка') {{ $discount }} %
                        </span>
                    </div>
                @endif
                <span class="badge bg-light text-muted">
                    <i class="fas fa-map-marker-alt"></i>
                    <a href="#" class="stretched-link text-decoration-none text-muted">
                        {{ $event->city->name }}
                    </a>
                </span>
            </div>
            <div class="card-body">
                <div class="card-title overflow-hidden" style="height: 4.5rem">
                    <img src="{{ $demo_faces[$key] }}" class="img-thumbnail rounded-circle me-3 float-start" alt="..." width="{{ config('site.img-size-2') }}">
                    <a href="{{ route('events.show', ['event' => $event->id]) }}"
                       class="fw-bold text-decoration-none stretched-link"
                       title="{{ $event->name }}">
                        {{ Str::limit($event->name, 50) }}
                    </a>
                </div>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    @lang('Рейтинг')
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
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    @lang('Цена от')
                    <span class="badge bg-light text-muted">
                        {{ number_format($event->price, 0, '', '.') }}
                        <i class="fas fa-ruble-sign"></i>
                    </span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    @lang('Отзывы')
                    <span class="badge bg-light text-muted">
                        {{ number_format($event->reviews->count(), 0, '', '.') }}
                    </span>
                </li>
            </ul>
        </div>
    </div>
@endforeach
