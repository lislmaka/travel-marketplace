@component('frontend.welcome.mobile.parts.bock_header',['header' => 'Идеи для новых открытий'])
    <div class="mt-3 text-muted">
        @lang('Рассмотрите возможные варианты новых путешествий')
    </div>
@endcomponent


<div class="container-fluid">
    <div class="container-xl">

        <div id="ideas" class="carousel carousel-dark slide" data-bs-ride="carousel" data-bs-interval="false">
            <div class="carousel-inner">
                @foreach($events as $key => $event)
                    @php($active = '')
                    @if($loop->first)
                        @php($active = 'active')
                    @endif
                    <div class="carousel-item {{ $active }}">
                        <div class="card mb-3 shadow-sm my-border-bottom-info">
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
                                <div class="card-title overflow-hidden" style="height: 3rem;">
                                    <a href="{{ route('events.show', ['event' => $event->id]) }}"
                                       class="fw-bold text-decoration-none stretched-link"
                                       title="{{ $event->name }}">
                                        {{ Str::limit($event->name, 50) }}
                                    </a>
                                </div>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Рейтинг
                                    <span class="badge bg-light text-muted">
                                        @if($event->rating > 3)
                                            @for($i=1; $i<=$event->rating; $i++)
                                                <i class="fas fa-star text-success"></i>
                                            @endfor
                                            {{ number_format($event->rating, 0, '', ',') }}
                                        @else
                                            @for($i=1; $i<=$event->rating; $i++)
                                                <i class="fas fa-star text-warning"></i>
                                            @endfor
                                            {{ number_format($event->rating, 0, '', ',') }}
                                        @endif
                                    </span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Цена от
                                    <span class="badge bg-light text-muted">
                                    <i class="fas fa-ruble-sign"></i>
                                    {{ number_format($event->price, 0, '', ',') }}
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
            <a class="carousel-control-prev" href="#ideas" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#ideas" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>
    </div>

    <div class="text-center mt-5">
        @include('frontend.welcome.desktop.parts.buttons',['btn_1_title' => 'Все идеи', 'btn_1_url' => '', 'count' => '1000'])
    </div>
</div>
