<form method="POST" action="#">
    @csrf
    <div class="card border-light mb-3">
        <div class="card-header fw-bold lead">
            @lang('Авторы туров')
        </div>

        <ul class="list-group list-group-flush">
            @foreach($tour_operators as $tour_operator)
                <a href="#"
                   class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                    <div class="d-flex justify-content-start align-items-center">
                        <img src="{{ $demo_faces[rand(1, count($demo_faces) - 1)] }}" class="img-thumbnail rounded-circle me-3" alt="..." width="{{ config('site.img-size-1') }}">
                        {{ $tour_operator->user->name }}
                    </div>

                    <span class="badge bg-primary rounded-pill ms-3">
                        {{ number_format($tour_operator->user_count, 0, '', '.') }}
                    </span>
                </a>
            @endforeach
        </ul>
    </div>
</form>

