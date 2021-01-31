@component('site.frontend.event.desktop.parts.bock_header',['header' => 'Автор тура', 'id' => 'author'])
    <div class="mt-3 text-muted">
        @lang('Информация об авторе тура')
    </div>
@endcomponent

<div class="card border-light my-border-left-info">
    <div class="row g-0">
        <div class="col-md-2 p-3">
            <img src="{{ $demo_faces[rand(0, count($demo_faces) - 1)] }}" alt="..." class="img-thumbnail rounded-circle">
        </div>
        <div class="col-md-10 p-3">
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Образование
                    <span class="badge bg-light text-muted rounded-pill">
                        Высшее
                    </span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Место проживания
                    <span class="badge bg-light text-muted rounded-pill">
                        {{ $event_info->city->name }}
                    </span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Общее кол-во туров
                    <span class="badge bg-light text-muted rounded-pill">
                        {{ number_format(rand(1, 1000), 0, '', '.') }}
                    </span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Отзывы
                    <span class="badge bg-light text-muted rounded-pill">
                        {{ number_format(rand(1, 1000), 0, '', '.') }}
                    </span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Рейтинг
                    <span class="badge bg-light text-muted rounded-pill">
                        @php
                            $author_rating = rand(1, 5);
                        @endphp
                        @if($author_rating > 3)
                            @for($i=1; $i<=$author_rating; $i++)
                                <i class="fas fa-star text-success"></i>
                            @endfor
                            {{ number_format($author_rating, 0, '', '.') }}
                        @else
                            @for($i=1; $i<=$author_rating; $i++)
                                <i class="fas fa-star text-warning"></i>
                            @endfor
                            {{ number_format($author_rating, 0, '', '.') }}
                        @endif
                    </span>
                </li>
            </ul>
        </div>
    </div>
</div>
