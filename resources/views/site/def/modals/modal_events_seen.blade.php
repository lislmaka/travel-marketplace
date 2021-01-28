<!-- Modal -->
<div class="modal fade" id="eventsSeen" tabindex="-1" aria-labelledby="eventsSeenLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-secondary text-white">
                <div class="modal-title lead fw-bold" id="eventsSeenLabel">
                    @lang('Последние 5 просмотренных туров')
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row row-cols-5 g-2 mb-3">
                    @if($events_seen)
                        @foreach($events_seen as $event_seen)
                            <div class="col">
                                <div class="card h-100 my-border-bottom-info">
                                    <img src="{{ asset('images/demo/demo1/'.$event_seen->img) }}" class="card-img-top" alt="...">
                                    <div class="card-img-overlay">
                                        @if($event_seen->old_price)
                                            <div class="lead">
                                                <span class="badge bg-danger">
                                                    @php($discount = round(100 - ($event_seen->price * 100) / $event_seen->old_price))
                                                    @lang('Скидка') {{ $discount }} %
                                                </span>
                                            </div>
                                        @endif
                                        <span class="badge bg-light text-muted">
                                            <i class="fas fa-map-marker-alt"></i>
                                            {{ $event_seen->city->name }}
                                        </span>
                                    </div>
                                    <div class="card-body">
                                        <div class="card-title overflow-hidden" style="height: 3rem;">
                                            <a href="{{ route('events.show', ['event' => $event_seen->id]) }}"
                                               class="fw-bold text-decoration-none stretched-link"
                                               title="{{ $event_seen->name }}">
                                                {{ Str::limit($event_seen->name, 50) }}
                                            </a>
                                        </div>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Рейтинг
                                            <span class="badge bg-light text-muted">
                                                @if($event_seen->rating > 3)
                                                    @for($i=1; $i<=$event_seen->rating; $i++)
                                                        <i class="fas fa-star text-success"></i>
                                                    @endfor
                                                    {{ number_format($event_seen->rating, 0, '', ',') }}
                                                @else
                                                    @for($i=1; $i<=$event_seen->rating; $i++)
                                                        <i class="fas fa-star text-warning"></i>
                                                    @endfor
                                                    {{ number_format($event_seen->rating, 0, '', ',') }}
                                                @endif
                                            </span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Цена
                                            <span class="badge bg-light text-muted">
                                                <i class="fas fa-ruble-sign"></i>
                                                {{ number_format($event_seen->price, 0, '', ',') }}
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
                    @endif
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-primary" href="{{ route('events.events_seen_clean') }}" role="button">
                    @lang('Очистить')
                </a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    @lang('Закрыть')
                </button>
            </div>
        </div>
    </div>
</div>
