@foreach($reviews as $key => $review)

    <div class="col">
        <div class="card h-100 shadow-sm my-border-bottom-info">
            <div class="card-header text-center">
                <img src="{{ $demo_faces[$key] }}" class="img-thumbnail rounded-circle" alt="...">
            </div>
            <div class="card-body">
                <div class="card-title overflow-hidden" style="height: 3rem;">
                    <a href="#"
                       class="fw-bold text-decoration-none"
                       title="{{ $review->event->name }}">
                        {{ Str::limit($review->event->name, 50) }}
                    </a>
                </div>
                <div class="card-text text-muted">
                    {{ Str::limit($review->description, 50) }}
                </div>
            </div>

            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    @lang('Место')
                    <span class="badge bg-light text-muted">
                                    {{ $review->event->city->name }}
                                </span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    @lang('Цена')
                    <span class="badge bg-light text-muted">
                                    {{ number_format($review->event->price, 0, '', '.') }}
                                    <i class="fas fa-ruble-sign"></i>
                                </span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    @lang('Оценка')
                    <span class="badge bg-light text-muted">
                                    @if($review->rating > 3)
                            @for($i=1; $i<=$review->rating; $i++)
                                <i class="fas fa-star text-success"></i>
                            @endfor
                            {{ number_format($review->rating, 0, '', '.') }}
                        @else
                            @for($i=1; $i<=$review->rating; $i++)
                                <i class="fas fa-star text-warning"></i>
                            @endfor
                            {{ number_format($review->rating, 0, '', '.') }}
                        @endif
                                </span>
                </li>
            </ul>
        </div>
    </div>
@endforeach
