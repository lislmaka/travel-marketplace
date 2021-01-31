@foreach($reviews as $key => $review)

    <div class="col">
        <div class="card my-border-left-info">
            <div class="card-body d-flex justify-content-start align-items-start">
                <img src="{{ $demo_faces[$key] }}" class="img-thumbnail rounded-circle me-3" alt="..." width="{{ config('site.img-size-2') }}">
                <div>
                    <div>
                        @lang('Отзыв сделан')
                        <span class="badge bg-light text-muted">
                            {{ $review->created_at->diffForHumans() }}
                        </span>

                        @lang('Оценка')
                        <span class="badge bg-light text-muted">
                            @if($review->rating > 3)
                                @for($i=1; $i<=$review->rating; $i++)
                                    <i class="fas fa-star text-success"></i>
                                @endfor
                                {{ number_format($review->rating, 0, '', ',') }}
                            @else
                                @for($i=1; $i<=$review->rating; $i++)
                                    <i class="fas fa-star text-warning"></i>
                                @endfor
                                {{ number_format($review->rating, 0, '', ',') }}
                            @endif
                        </span>
                    </div>
                    <div class="mt-3">
                        {{ Str::limit($review->description, 2000) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
