@component('site.frontend.event.desktop.parts.bock-header',['header' => 'Автор тура', 'id' => 'author'])
    <div class="mt-3 text-muted">
        @lang('Информация об авторе тура')
    </div>
@endcomponent

<div class="card border-light my-border-left-info">
    <div class="row g-0">
        <div class="col-md-2 p-3">
            <img src="{{ $demo_faces[rand(0, count($demo_faces) - 1)] }}" alt="..."
                 class="img-thumbnail rounded-circle">
            <div class="text-center">
                @if(rand(1, 100) >= 50)
                    <span class="badge bg-primary">@lang('Агентство')</span>
                @else
                    <span class="badge bg-success">@lang('Частник')</span>
                @endif
            </div>
            <div class="text-center">
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
            </div>
        </div>
        <div class="col-md-10 p-3">
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="fw-bold">
                        @lang('ФИО')
                    </span>
                    <span class="badge bg-light text-muted rounded-pill">
                        {{ $event_info->user->name }}
                    </span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="fw-bold">
                        @lang('E-Mail')
                    </span>
                    <div>
                        <span class="badge bg-light text-muted rounded-pill">
                            {{ $event_info->user->email }}
                        </span>
                        @livewire('btn-show-help',['helpId' => '1'])
                    </div>

                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="fw-bold">
                        @lang('Телефон')
                    </span>
                    <div>
                        <span class="badge bg-light text-muted rounded-pill">
                            {{ $event_info->user->phone }}
                        </span>
                        @livewire('btn-show-help',['helpId' => '1'])
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="fw-bold">
                        @lang('Кол-во туров')
                    </span>
                    <span class="badge bg-light text-muted rounded-pill">
                        {{ number_format(rand(1, 1000), 0, '', '.') }}
                    </span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="fw-bold">
                        @lang('Отзывы')
                    </span>
                    <span class="badge bg-light text-muted rounded-pill">
                        {{ number_format(rand(1, 1000), 0, '', '.') }}
                    </span>
                </li>
            </ul>
        </div>
    </div>
    <div class="card-footer d-flex justify-content-end">

        <button type="button" class="btn btn-sm btn-outline-primary ms-3" data-bs-toggle="modal"
                data-bs-target="#helpModal">
            @lang('Перейти на страницу автора')
        </button>
        <button type="button" class="btn btn-sm btn-outline-primary ms-3">
            @lang('Задать вопрос автору тура')
        </button>
    </div>
</div>
