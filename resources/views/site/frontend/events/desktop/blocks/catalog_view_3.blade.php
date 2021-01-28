<div class="row row-cols-2 g-4 mb-3">
    @foreach($events as $key =>$event)
        <div class="col">
            <div class="card h-100 my-border-bottom-info">
                <img src="{{ asset('images/demo/demo1/'.$event->img) }}" class="card-img-top" alt="...">
                <div class="card-header">
                    <a href="{{ route('events.show', ['event' => $event->id]) }}"
                       class="fw-bold text-decoration-none lead stretched-link"
                       title="{{ $event->name }}">
                        {{ Str::limit($event->name, 50) }}
                    </a>
                </div>
                <div class="card-body">
                    <div class="card-text text-muted">
                        {{ Str::limit($event->short_description, rand(50, 100)) }}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

{{ $events->links() }}
