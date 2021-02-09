@component('frontend.welcome.mobile.parts.bock_header',['header' => 'Отзывы и впечатления'])
    <div class="mt-3 text-muted">
        @lang('Почитайте что говорят наши клиенты')
    </div>
@endcomponent

<div class="container-fluid">
    <div class="container-xl">

        <div id="reviews" class="carousel carousel-dark slide" data-bs-ride="carousel" data-bs-interval="false">
            <div class="carousel-inner">
                @foreach($reviews as $key => $review)
                    @php($active = '')
                    @if($loop->first)
                        @php($active = 'active')
                    @endif
                    <div class="carousel-item {{ $active }}">
                        <div class="card shadow-sm">
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
                                    Место
                                    <span class="badge bg-light text-muted">
                                    {{ $review->event->city->name }}
                                </span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Цена
                                    <span class="badge bg-light text-muted">
                                    <i class="fas fa-ruble-sign"></i>
                                    {{ number_format($review->event->price, 0, '', ',') }}
                                </span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Оценка
                                    <span class="badge bg-light text-muted">
                                    <i class="fas fa-star"></i>
                                    {{ number_format(rand(1, 5), 0, '', ',') }}
                                </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#reviews" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#reviews" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>
    </div>

    <div class="text-center mt-5">
        @include('frontend.welcome.desktop.parts.buttons',['btn_1_title' => 'Все отзывы', 'btn_1_url' => '', 'count' => '1000'])
    </div>
</div>
