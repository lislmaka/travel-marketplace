@foreach($events as $key => $event)
    <div class="card mb-3 my-border-left-info">
        <div class="row g-0">
            <div class="col-md-3">
                <img src="{{ asset('images/demo/demo1/'.$event->img) }}" class="card-img-top" alt="...">
                <div class="card-img-overlay">
                    <div class="position-absolute top-0 start-0 p-3">
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

{{--                    <div class="position-absolute bottom-0 start-0 p-3">--}}
{{--                        <img src="{{ $demo_faces[$key] }}" class="img-thumbnail rounded-circle" alt="..." width="{{ config('site.img-size-2') }}">--}}
{{--                    </div>--}}
                </div>
            </div>
            <div class="col-md-9">
                <div class="card-body">
                    <div class="card-title d-flex justify-content-between align-items-start">
                        <div class="d-flex justify-content-start align-items-start">
                            <img src="{{ $demo_faces[$key] }}" class="img-thumbnail rounded-circle me-3" alt="..." width="{{ config('site.img-size-2') }}">
                            <a href="{{ route('events.show', ['event' => $event->id]) }}"
                               class="fw-bold text-decoration-none lead stretched-link"
                               title="{{ $event->name }}">
                                {{ Str::limit($event->name, 50) }}
                            </a>
                        </div>

                        <div class="d-flex flex-column ms-3 align-items-end">
                            <div class="h3 m-0">
                                <span class="badge bg-light text-muted">
                                    <i class="fas fa-ruble-sign"></i>
                                    {{ number_format($event->price, 0, '', ',') }}
                                </span>
                            </div>
                            @if($event->old_price)
                                <div class="lead m-0">
                                    <span class="badge bg-light text-muted fw-normal">
                                        <del>
                                            {{ number_format($event->old_price, 0, '', ',') }}
                                        </del>
                                    </span>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="card-text mb-1">
                        <div class="badge bg-light text-muted">
                            @for($i=1; $i<=5 - $event->rating; $i++)
                                <i class="far fa-star text-muted"></i>
                            @endfor
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
                        </div>
                    </div>

                    <div class="card-text text-muted">
                        @foreach($event->categories as $category)
                            <span class="badge bg-light text-muted">{{ $category->category->name }}</span>
                        @endforeach
                    </div>
                </div>
{{--                <div class="card-footer text-muted bg-transparent p-3">--}}
{{--                    @foreach($event->categories as $category)--}}
{{--                        <span class="badge bg-light text-muted">{{ $category->category->name }}</span>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
@endforeach
