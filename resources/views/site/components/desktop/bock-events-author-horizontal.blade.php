@foreach($events as $key => $event)
    <div class="card mb-3 my-border-left-info">
        <div class="row g-0">
            <div class="col-md-3">
                <img src="{{ asset('images/demo/demo1/'.$event->img) }}" class="img-fluid" alt="...">
                <div class="card-img-overlay">
                    <div class="position-absolute top-0 start-0 p-3">
                        @if($event->old_price)
                            <div class="lead">
                                <span class="badge bg-danger">
                                    @php
                                        $discount = round(100 - ($event->price * 100) / $event->old_price)
                                    @endphp
                                    @lang('Скидка') {{ $discount }} %
                                </span>
                            </div>
                        @endif
                        <span class="badge bg-light text-muted">
                            <i class="fas fa-globe"></i>
                            <a href="#" class="stretched-link text-decoration-none text-muted">
                                {{ $event->country->name }}
                            </a>
                        </span>
                        <br>
                        <span class="badge bg-light text-muted">
                            <i class="fas fa-map-marker-alt"></i>
                            <a href="#" class="stretched-link text-decoration-none text-muted">
                                {{ $event->city->name }}
                            </a>
                        </span>
                    </div>
                    <div class="position-absolute start-0 bottom-0 p-3">
                        <div class="badge bg-light text-muted">
{{--                            @for($i=1; $i<=5 - $event->rating; $i++)--}}
{{--                                <i class="far fa-star text-muted"></i>--}}
{{--                            @endfor--}}
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
                </div>
            </div>
            <div class="col-md-9 d-flex align-content-between flex-wrap">
                <div class="card-body">
                    <div class="card-text d-flex justify-content-between align-items-start">
                        <div class="d-flex justify-content-start align-items-start">
                            <a href="{{ route('events.show', ['event' => $event->id]) }}"
                               class="fw-bold text-decoration-none lead stretched-link"
                               title="{{ $event->name }}">
                                {{ Str::limit($event->name, 50) }}
                            </a>
                        </div>

                        <div class="d-flex flex-column ms-3 align-items-end">
                            <div class="h3 m-0">
                                <span class="badge bg-light text-muted">
                                    {{ number_format($event->price, 0, '', '.') }}
                                    <i class="fas fa-ruble-sign"></i>
                                </span>
                            </div>
{{--                            @if($event->old_price)--}}
{{--                                <div class="lead m-0">--}}
{{--                                    <span class="badge bg-light text-muted fw-normal">--}}
{{--                                        <del>--}}
{{--                                            {{ number_format($event->old_price, 0, '', '.') }}--}}
{{--                                            <i class="fas fa-ruble-sign"></i>--}}
{{--                                        </del>--}}
{{--                                    </span>--}}
{{--                                </div>--}}
{{--                            @endif--}}
                        </div>
                    </div>
                </div>
                <div class="card-text px-3 pb-3">
                    {{ Str::limit($event->short_description, 150) }}
                </div>
                <div class="card-footer w-100 bg-transparent d-flex justify-content-between">
                    <div class="card-text text-muted">
                        @foreach($event->categories as $category)
                            <span class="badge bg-light text-muted">{{ $category->category->name }}</span>
                        @endforeach
                    </div>
                    @php
                        $livewareParams = [
                            'event_id' => $event->id,
                            'btn_type' => 'event',
                            'hint_position' => 'top',
                            'hint_btn_position' => 0
                        ];
                    @endphp

                    @livewire('btn-add-to-compare', ['livewareParams' => $livewareParams])
                </div>
            </div>
        </div>
    </div>
@endforeach
