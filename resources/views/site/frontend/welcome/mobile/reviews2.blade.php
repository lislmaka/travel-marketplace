@component('frontend.welcome.mobile.parts.bock_header',['header' => 'Отзывы и впечатления'])
    <div class="mt-3 text-muted">
        @lang('Почитайте что говорят наши клиенты')
    </div>
@endcomponent

<div class="container-fluid">
    <div class="container-xl">

        <div class="row row-cols-md-4 g-4">
            @foreach($reviews as $key => $review)

                <div class="col">
                    <div class="card h-100 shadow-sm my-border-bottom-info">
                        <div class="card-header text-center">
                            <img src="{{ $faker_faces[$key] }}" class="img-thumbnail rounded-circle" alt="...">
                        </div>
                        <div class="card-body">
                            <div class="card-title overflow-hidden" style="height: 3rem;">
                                <a href="#"
                                   class="fw-bold text-decoration-none"
                                   title="{{ $review->catalog->name }}">
                                    {{ Str::limit($review->catalog->name, 50) }}
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
                                    {{ $review->catalog->city }}
                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Цена
                                <span class="badge bg-light text-muted">
                                    <i class="fas fa-ruble-sign"></i>
                                    {{ number_format($review->catalog->price, 0, '', ',') }}
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

        <div class="text-center mt-5">
            @include('frontend.welcome.desktop.parts.buttons',['btn_1_title' => 'Все отзывы', 'btn_1_url' => '', 'count' => '1000'])
        </div>
    </div>
</div>
