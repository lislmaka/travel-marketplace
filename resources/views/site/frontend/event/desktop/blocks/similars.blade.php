@component('frontend.event.desktop.parts.bock_header',['header' => 'Похожие туры', 'id' => 'similars'])
    <div class="mt-3 text-muted">
        @lang('Возможно вас заинтересуют похожие туры')
    </div>
@endcomponent

<div class="row row-cols-4 g-4">
    @foreach($similar_events as $key => $similar_event)
        <div class="col">
            <div class="card h-100 my-border-bottom-info">
                <img src="{{ asset('images/demo/demo1/'.$similar_event->img) }}" class="card-img-top" alt="...">
                <div class="card-img-overlay">
                    @if($similar_event->old_price)
                        <div class="lead">
                            <span class="badge bg-danger">
                                @php($discount = round(100 - ($similar_event->price * 100) / $similar_event->old_price))
                                @lang('Скидка') {{ $discount }} %
                            </span>
                        </div>
                    @endif
                    <span class="badge bg-light text-muted">
                        <i class="fas fa-map-marker-alt"></i>
                        {{ $similar_event->city->name }}
                    </span>
                </div>
                <div class="card-body">
                    <div class="card-title overflow-hidden" style="height: 3rem;">
                        <a href="{{ route('events.show', ['event' => $similar_event->id]) }}"
                           class="fw-bold text-decoration-none stretched-link"
                           title="{{ $similar_event->name }}">
                            {{ Str::limit($similar_event->name, 50) }}
                        </a>
                    </div>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Рейтинг
                        <span class="badge bg-light text-muted">
                            @if($similar_event->rating > 3)
                                @for($i=1; $i<=$similar_event->rating; $i++)
                                    <i class="fas fa-star text-success"></i>
                                @endfor
                                {{ number_format($similar_event->rating, 0, '', ',') }}
                            @else
                                @for($i=1; $i<=$similar_event->rating; $i++)
                                    <i class="fas fa-star text-warning"></i>
                                @endfor
                                {{ number_format($similar_event->rating, 0, '', ',') }}
                            @endif
                        </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Цена
                        <span class="badge bg-light text-muted">
                            <i class="fas fa-ruble-sign"></i>
                            {{ number_format($similar_event->price, 0, '', ',') }}
                        </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Отзывы
                        <span class="badge bg-light text-muted">
                            {{ number_format(rand(10, 500), 0, '', ',') }}
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    @endforeach
</div>


